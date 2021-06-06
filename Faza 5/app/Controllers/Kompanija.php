<?php

namespace App\Controllers;

use App\Models\FondacijaModel;
use App\Models\UplataModel;
use App\Models\KompanijaModel;

/**
* KompanijaController – klasa za opis svih funkcionalnosti  kompanije
*
* @version 1.0
*/

class Kompanija extends BaseController
{
    /**
* Funkcija koja sluzi sa prikaz delova stranica koji su uvek isti - header admina i footer kao i promenljivog dela stranica 
* 
* 
*@author Nina Savkic 18/0692
*/

    protected function prikaz($strana, $podaci)
    {

        $podaci['controller'] = "Kompanija";

        echo view("sablon/header_kompanija");
        echo view("stranice/$strana", $podaci);
        echo view("sablon/footer");
    }
    
    public function index()
    {
        $fondacijaModel = new FondacijaModel();
        $fondacije = $fondacijaModel->findAll();
        $kompanija = $this->session->get('kompanija');

        $this->prikaz("biranje_fondacije", ['fondacije' => $fondacije, 'kompanija' => $kompanija]);
    }

    /**
* Funkcija koja proverava da li je kompanija izabrala fondaciju kojoj zeli da uplati novac. Ukoliko nije, prosledjuje poruku o gresci a  
* ukoliko jeste poziva formu za uplatu tj uplata.php
* 
*@author Masa Hadzi-Nikolic 18/0271
*@author Nina Savkic 18/0692
*/

    public function proveraizbor()
    {

        $fondacijaModel = new FondacijaModel();
        $fondacije = $fondacijaModel->findAll();
        $kompanija = $this->session->get('kompanija');

        if (!isset($_POST['radio'])) {

            return  $this->prikaz("biranje_fondacije", ['greskabiranje' => 'Morate izabrati fondaciju.', 'kompanija' => $kompanija, 'fondacije' => $fondacije]);
        }


        $fondacija = $fondacijaModel->where('naziv', $_POST['radio'])->first();
        $this->session->set("fondacija", $fondacija);
        $this->prikaz("uplata", ['kompanija' => $kompanija, "fondacija" => $fondacija]);
    }

  /**
*Funkcija koja se poziva nakon sto kompanija pokusa da uplati novac i proverava unete podatke. Ukoliko postoji greska, prosledjuje
* poruku o gresci , a ukoliko ne postoji onda poziva uspeh.php sa odgovarajucom porukom
* 
*@author Masa Hadzi-Nikolic 18/0271
*@author Nina Savkic 18/0692
*/

    public function proverauplata()
    {

        $fondacija = $this->session->get("fondacija");
        $kompanija = $this->session->get('kompanija');

        if (!$this->validate(['iznos' => 'required'])) {
            return $this->prikaz("uplata", ['kompanija' => $kompanija, 'fondacija' => $fondacija, 'greskauplata' => 'Iznos mora biti unet.']);
        } else if (!$this->validate(['iznos' => 'integer'])) {
            return $this->prikaz("uplata", ['kompanija' => $kompanija, 'fondacija' => $fondacija, 'greskauplata' => 'Iznos sme da sadrzi samo brojeve.']);
        } else if (!$this->validate(['model' => 'required'])) {
            return $this->prikaz("uplata", ['kompanija' => $kompanija, 'fondacija' => $fondacija, 'greskauplata' => 'Model mora biti unet.']);
        } else if (!$this->validate(['model' => 'integer'])) {
            return $this->prikaz("uplata", ['kompanija' => $kompanija, 'fondacija' => $fondacija, 'greskauplata' => 'Model sme da sadrzi samo brojeve.']);
        } else if (!$this->validate(['poziv' => 'required'])) {
            return $this->prikaz("uplata", ['kompanija' => $kompanija, 'fondacija' => $fondacija, 'greskauplata' => 'Poziv mora biti unet.']);
        } else if (!$this->validate(['poziv' => 'integer'])) {
            return $this->prikaz("uplata", ['kompanija' => $kompanija, 'fondacija' => $fondacija, 'greskauplata' => 'Poziv sme da sadrzi samo brojeve.']);
        }

        $uplata = new UplataModel();
        $uplata->insert([
            "uplatilac" => $this->session->get('kompanija')['naziv'],
            "valuta" => $this->request->getVar("valuta"),
            "iznos" => $this->request->getVar("iznos"),
            'racunprimaoca' => $this->session->get('fondacija')['racun'],
            "primalac" => $this->session->get('fondacija')['idFondacija']
        ]);

        $this->azuriraj($this->session->get('fondacija')['idFondacija'], $this->request->getVar("iznos"));
        $this->session->remove("fondacija");
        $this->prikaz("uspeh", ["uspeh" => "Uspešno ste izvršili uplatu"]);
    }

   

    public function profil()
    {
        $kompanija = $this->session->get('kompanija');
        $kompanijamodel = new KompanijaModel();
        $kompanija = $kompanijamodel->find($kompanija['PIB']);
        $this->prikaz("profil_kompanija", ['kompanija' => $kompanija]);
    }

      /**

*  Funckija koja se poziva ukoliko korisnik zeli da izvrsi izmenu profila
* 
*@author Masa Hadzi-Nikolic 18/0271
*@author  Nadja Milojkovic 18/0269
*/

    public function izmena()
    {
        $kompanija = $this->session->get('kompanija');
        $this->prikaz("profil_kompanija", ['kompanija' => $kompanija, 'rezimizmena' => true]);
    }

 /**

*  Funkcija koja proverava unete podatke o izmeni profila. Ukoliko postoji greska, prosledjuje poruku o istoj a ukoliko ne postoji
* prikazuju kompaniji ponovo njegov profil
*
*@author Masa Hadzi-Nikolic 18/0271
*@author  Nadja Milojkovic 18/0269
*/

    public function proveraIzmena(){

        $kompanija = $this->session->get('kompanija');

        if (!$this->validate(['adresa' => 'required'])) {
            return $this->prikaz("profil_kompanija", ['kompanija' => $kompanija,  'greskaizmena' => 'Adresa mora biti uneta.', 'rezimizmena' => true]);
        }else if (!$this->validate(['telefon' => 'required'])) {
            return $this->prikaz("profil_kompanija", ['kompanija' => $kompanija,  'greskaizmena' => 'Telefon mora biti unet.', 'rezimizmena' => true]);
        } else if (!$this->validate(['telefon' => 'integer'])) {
            return $this->prikaz("profil_kompanija", ['kompanija' => $kompanija,  'greskaizmena' => 'Telefon mora da ima samo cifre .', 'rezimizmena' => true]);
        }

        
        $kompanijamodel = new KompanijaModel();

        $data = [
            'adresa' => $this->request->getVar('adresa'),
            'telefon' => $this->request->getVar('telefon')
        ];
        $kompanijamodel->update($kompanija['PIB'], $data);
        $kompanija = $kompanijamodel->find($kompanija['PIB']);
        $this->session->set('kompanija',$kompanija);

        $this->prikaz("profil_kompanija", ['kompanija' => $kompanija]);
    }
}
