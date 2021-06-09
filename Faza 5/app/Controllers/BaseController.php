<?php

namespace App\Controllers;

use App\Models\FondacijaModel;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */

class BaseController extends Controller
{
	/**
	 * Instance of the main Request object.
	 *
	 * @var IncomingRequest|CLIRequest
	 */
	protected $request;

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = ['form', 'url'];

	/**
	 * Constructor.
	 *
	 * @param RequestInterface  $request
	 * @param ResponseInterface $response
	 * @param LoggerInterface   $logger
	 */
	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		$this->session = \Config\Services::session();
	}

	protected function prikaz($stranica, $podaci)
	{

		throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
	}

/**
* Funkcija koja unistava sesiju i vrsi logout trenutnog korisnika
*
*@author Masa Hadzi-Nikolic 18/0271
*
*/
	public function logout()
	{
		$this->session->destroy;
		return redirect()->to(site_url("/Gost"));
	}

	 /**

* Funkcija koja azurira iznos fondacija nakon izvrsene uplate od strane kompanije ili korisnika
* @param int $iznos
*@param int $id
*
*@author Masa Hadzi-Nikolic 18/0271
*
*/
	function azuriraj($id, $iznos)
    {

        $fondacijaModel = new FondacijaModel();
        $fondacija = $fondacijaModel->where("idFondacija", $id)->first();
        $novi = $iznos + $fondacija['iznos'];

        $data = [
            'iznos' => $novi
        ];
        
        $fondacijaModel->update($id, $data);
    }

}
