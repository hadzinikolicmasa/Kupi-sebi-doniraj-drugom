<?php

namespace App\Controllers;

use App\Models\FondacijaModel;
use App\Models\UplataModel;
use App\Models\KompanijaModel;



class Kompanija extends BaseController
{

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

    public function profil()
    {
        $kompanija = $this->session->get('kompanija');
        $kompanijamodel = new KompanijaModel();
        $kompanija = $kompanijamodel->find($kompanija['PIB']);
        $this->prikaz("profil_kompanija", ['kompanija' => $kompanija]);
    }

    public function izmena()
    {
        $kompanija = $this->session->get('kompanija');
        $this->prikaz("profil_kompanija", ['kompanija' => $kompanija, 'rezimizmena' => true]);
    }



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
