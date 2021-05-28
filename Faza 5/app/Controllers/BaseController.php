<?php

namespace App\Controllers;
use App\Models\KategorijaModel;
use App\Models\LicitacijaModel;
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
	protected $helpers = ['form','url'];

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
	protected function prikaz($stranica,$podaci){
		throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
	}

	public function logout(){
		$this->session->destroy;
		return redirect()->to(site_url("/Gost"));
	}

	public function pregled(){
		$kategorijamodel=new KategorijaModel();
		$kategorije=$kategorijamodel->findAll(); 
        $licitacijamodel=new LicitacijaModel();
        $licitacije=$licitacijamodel->findAll();
		 $this->prikaz("pregled",['kategorije'=>$kategorije,'licitacije'=>$licitacije]);
	  }

	  public function kategorija($naziv){
		$kategorijamodel=new KategorijaModel();
		$kategorija=$kategorijamodel->where('naziv',$naziv)->first(); 
		$kategorije=$kategorijamodel->findAll(); 
		$licitacijamodel=new LicitacijaModel();
        $licitacije=$licitacijamodel->where('Kategorija_IdKategorije',$kategorija['IdKategorije'])->findAll();
		
		$this->prikaz("pregled",['kategorije'=>$kategorije,'licitacije'=>$licitacije,'odabrana'=>$naziv]);


	  }
}