<?php

namespace App\Controllers;

use App\Models\KategorijaModel;
use App\Models\LicitacijaModel;
use App\Models\FondacijaModel;
use App\Models\RecenzijaModel;
use App\Models\KorisnikModel;
use App\Models\TrenutnaCenaModel;
use App\Models\UplataModel;


class Korisnik extends BaseController
{

    protected function prikaz($strana, $podaci)
    {
        $podaci['controller'] = "Korisnik";


        echo view("sablon/header_korisnik");
        echo view("stranice/$strana", $podaci);
        echo view("sablon/footer");
    }

    public function index()
    {
        $korisnik = $this->session->get("korisnik");
        $kategorijamodel = new KategorijaModel();
        $kategorije = $kategorijamodel->findAll();

        $licitacijamodel = new LicitacijaModel();
        $licitacije = $licitacijamodel->findAll();

        $this->prikaz("korisnik_pocetna", ['kategorije' => $kategorije, 'licitacije' => $licitacije, 'korisnik' => $korisnik]);
    }

    public function kategorija($naziv)
    {
        $korisnik = $this->session->get("korisnik");

        $kategorijamodel = new KategorijaModel();
        $kategorija = $kategorijamodel->where('naziv', $naziv)->first();
        $kategorije = $kategorijamodel->findAll();

        $licitacijamodel = new LicitacijaModel();
        $licitacije = $licitacijamodel->where('Kategorija_IdKategorije', $kategorija['IdKategorije'])->findAll();

        $this->prikaz("korisnik_pocetna", ['kategorije' => $kategorije, 'licitacije' => $licitacije, 'odabrana' => $naziv, 'korisnik' => $korisnik]);
    }

    public function proizvod($id)
    {
        $licitacijamodel = new LicitacijaModel();
        $licitacija = $licitacijamodel->where('idLicitacija', $id)->first();
        $fondacijamodel = new FondacijaModel();

        $fondacija = $fondacijamodel->where('idFondacija', $licitacija['Fondacija_idFondacija'])->first();

        $trenutnacena = new TrenutnacenaModel();
        $korisnikmodel = new KorisnikModel();
        $recenzijamodel = new RecenzijaModel();

        $lic = $trenutnacena->find($id);

        $korisnik = $korisnikmodel->where('korisnickoime', $licitacija['korisnik'])->first();

        $ocene = $recenzijamodel->where('Korisnik_idKorisnik', $korisnik['idKorisnik'])->findAll();

        $ocena = 0;
        $count = 0;

        foreach ($ocene as $zbir) {
            $count++;
            $ocena += $zbir['Ocena'];
        }

        if ($count != 0) $ocena = $ocena / $count;

        if ($lic['Korisnik_idKorisnik'] != null) $korisnik = $korisnikmodel->find($lic['Korisnik_idKorisnik']);
        else  $korisnik = null;

        $trenutni = $this->session->get("korisnik");

        $tmp = $trenutnacena->where("Licitacija_idLicitacija", $id)->first();
        $pobednik = NULL;
        if ($tmp['Korisnik_idKorisnik'] != NULL)
            $pobednik = $korisnikmodel->find($tmp["Korisnik_idKorisnik"]);

        $this->prikaz("proizvod", ['pobednik' => $pobednik, 'trenutni' => $trenutni, 'ocena' => $ocena, 'korisnik' => $korisnik, 'cena' => $lic["Cena"], 'licitacija' => $licitacija, 'fondacija' => $fondacija['naziv']]);
    }

    public function recenzija()
    {
        $this->prikaz("recenzija", []);
    }

    public function proveraRecenzije()
    {
        $validation = \Config\Services::validation();

        $validation = $this->validate([
            'korisnickoime' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nije uneto korisničko ime!'
                ]
            ],

            'ocena' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nije uneta ocena!'
                ]
            ],

            'komentar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nije unet komentar!'
                ]
            ]
        ]);

        if (!$validation) {
            return $this->prikaz("recenzija", ['validation' => $this->validator]);
        }

        $korisnikmodel = new KorisnikModel();
        $korisnik = $korisnikmodel->where('korisnickoime', $this->request->getVar("korisnickoime"))->first();
        $idKor = $korisnik['idKorisnik'];

        if ($korisnik != null) {

            $recenzijamodel = new RecenzijaModel();

            $recenzijamodel->insert([
                "ocena" => $this->request->getVar("ocena"),
                "komentar" => $this->request->getVar("komentar"),
                "Korisnik_idKorisnik" => $idKor
            ]);

            return $this->prikaz("uspeh", ['uspeh' => "Uspešno ste ostavili recenziju!"]);
        } else {

            return $this->prikaz("recenzija", ['greskarecenzija2' => 'Korisnik ne postoji u bazi.']);
        }
    }

    public function profil()
    {

        $korisnik = $this->session->get('korisnik');
        $korisnikmodel = new KorisnikModel();
        $korisnik = $korisnikmodel->find($korisnik['idKorisnik']);
        $this->prikaz("profil_korisnik", ['korisnik' => $korisnik]);
    }

    public function izmena()
    {
        $korisnik = $this->session->get('korisnik');
        $this->prikaz("profil_korisnik", ['korisnik' => $korisnik, 'rezimizmena' => true]);
    }


    public function kreiranje_licitacije()
    {
        $fondacijamodel = new FondacijaModel();
        $kategorijamodel = new KategorijaModel();
        $fondacije = $fondacijamodel->findAll();
        $kategorije = $kategorijamodel->findAll();
        $this->prikaz("kreiranje_licitacije", ['fondacije' => $fondacije, 'kategorije' => $kategorije]);
    }


    public function proveraLicitacije()
    {

        $fondacijamodel = new FondacijaModel();
        $kategorijamodel = new KategorijaModel();
        $fondacije = $fondacijamodel->findAll();
        $kategorije = $kategorijamodel->findAll();


        $validation = \Config\Services::validation();

        $validation = $this->validate([
            'nazivProizvoda' => ['rules' => 'required', 'errors' => ['required' => 'Nije unet naziv proizvoda!']],
            'trajanje' => ['rules' => 'required', 'errors' => ['required' => 'Nije uneto trajanje licitacije!']],
            'opis' => ['rules' => 'required',  'errors' => ['required' => 'Nije unet opis proizvoda!']],
            'pocetnaCena' => ['rules' => 'required',  'errors' => ['required' => 'Nije uneta pocetna cena proizvoda!']],
            'fondacija' => ['rules' => 'required',  'errors' => ['required' => 'Nije izabrana fondacija!']],
            'kategorija' => ['rules' => 'required',  'errors' => ['required' => 'Nije izabrana kategorija!']],
            'slika' => ['rules' => 'required',  'errors' => ['required' => 'Nije uneta slika proizvoda!']],
        ]);

        if (!$validation) {
            return $this->prikaz("kreiranje_licitacije", ['validation' => $this->validator, 'fondacije' => $fondacije, 'kategorije' => $kategorije]);
        } else {
            $licitacijamodel = new LicitacijaModel();

            $src = '/' . 'slike/' . $this->request->getVar("slika");

            $licitacijamodel->insert([
                "naziv_stvari" => $this->request->getVar("nazivProizvoda"),
                "opis" => $this->request->getVar("opis"),
                "pocetna_cena" => $this->request->getVar("pocetnaCena"),
                "trajanje" => $this->request->getVar("trajanje"),
                "slika" => $src,
                "Kategorija_IdKategorije" => $this->request->getVar("kategorija"),
                "Fondacija_idFondacija" => $this->request->getVar("fondacija"),
                "korisnik" => $this->session->get("korisnik")['korisnickoime']
            ]);

            $trenutnaCenamodel = new TrenutnaCenaModel();
            $licitacijaModel = new LicitacijaModel();
            $poslednji = $licitacijaModel->where("naziv_stvari", $this->request->getVar("nazivProizvoda"))->orderby('idLicitacija', 'desc')->first();


            $trenutnaCenamodel->insert([
                "Cena" => $this->request->getVar("pocetnaCena"),
                "Licitacija_idLicitacija" => $poslednji['idLicitacija']

            ]);


            $this->prikaz("uspeh", ["uspeh" => "Uspešno ste kreirali licitaciju"]);
        }
    }

    public function proveraIzmena()
    {


        $korisnik = $this->session->get('korisnik');

        if (!$this->validate(['adresa' => 'required'])) {
            return $this->prikaz("profil_korisnik", ['korisnik' => $korisnik,  'greskaizmena' => 'Adresa mora biti uneta.', 'rezimizmena' => true]);
        } else if (!$this->validate(['grad' => 'required'])) {
            return $this->prikaz("profil_korisnik", ['korisnik' => $korisnik,  'greskaizmena' => 'Grad mora biti unet.', 'rezimizmena' => true]);
        } else if (!$this->validate(['telefon' => 'required'])) {
            return $this->prikaz("profil_korisnik", ['korisnik' => $korisnik,  'greskaizmena' => 'Telefon mora biti unet.', 'rezimizmena' => true]);
        } else if (!$this->validate(['telefon' => 'integer'])) {
            return $this->prikaz("profil_korisnik", ['korisnik' => $korisnik,  'greskaizmena' => 'Telefon mora da ima samo cifre .', 'rezimizmena' => true]);
        }


        $korisnikmodel = new KorisnikModel();

        $data = [
            'adresa' => $this->request->getVar('adresa'),
            'telefon' => $this->request->getVar('telefon'),
            'grad' => $this->request->getVar('grad')
        ];
        $korisnikmodel->update($korisnik['idKorisnik'], $data);
        $korisnik = $korisnikmodel->find($korisnik['idKorisnik']);
        $this->session->set('korisnik', $korisnik);

        $this->prikaz("profil_korisnik", ['korisnik' => $korisnik]);
    }


    public function licitiraj($id)
    {
        $trenutnaCenamodel = new TrenutnaCenaModel();
        $trenutna = $trenutnaCenamodel->find($id);

        if ($this->request->getVar('cena') != '' && $this->request->getVar('cena') > ($trenutna['Cena'])) {
            if ($this->request->getVar('anonimno') != 'anonimno') {

                $data = [
                    'Cena' => $this->request->getVar('cena'),
                    'Korisnik_idKorisnik' => $this->session->get('korisnik')['idKorisnik']
                ];
            } else {

                $data = [
                    'Cena' => $this->request->getVar('cena'),
                    'Korisnik_idKorisnik' => $this->session->get('korisnik')['idKorisnik']
                ];
            }
            $trenutnacenamodel = new TrenutnacenaModel();
            $trenutnacenamodel->update($id, $data);
        }


        $this->proizvod($id);
    }


    function uplata($id)
    {
        $korisnik = $this->session->get('korisnik');
        $licitacijaModel = new LicitacijaModel();
        $licitacija = $licitacijaModel->find($id);
        $fondacijamodel = new FondacijaModel();
        $fondacija = $fondacijamodel->find($licitacija['Fondacija_idFondacija']);

        $trenutnacenamodel = new TrenutnaCenaModel();
        $cena = $trenutnacenamodel->find($id);

        $this->prikaz("uplata_korisnik", ['cena' => $cena['Cena'], 'korisnik' => $korisnik, 'licitacija' => $id, 'fondacija' => $fondacija]);
    }

    function proverauplata($id){
        $korisnik = $this->session->get('korisnik');
        $licitacijaModel = new LicitacijaModel();
        $licitacija = $licitacijaModel->find($id);
        $fondacijamodel = new FondacijaModel();
        $fondacija = $fondacijamodel->find($licitacija['Fondacija_idFondacija']);

        $trenutnacenamodel = new TrenutnaCenaModel();
        $cena = $trenutnacenamodel->find($id);


         if (!$this->validate(['model' => 'required'])) {
            return  $this->prikaz("uplata_korisnik", ['greskauplata'=>'Morate uneti model','cena' => $cena['Cena'], 'korisnik' => $korisnik, 'licitacija' => $id, 'fondacija' => $fondacija]);

        } else if (!$this->validate(['model' => 'integer'])) {
            return  $this->prikaz("uplata_korisnik", ['greskauplata'=>'Model mora biti unet kao broj','cena' => $cena['Cena'], 'korisnik' => $korisnik, 'licitacija' => $id, 'fondacija' => $fondacija]);
        } else if (!$this->validate(['poziv' => 'required'])) {
            return  $this->prikaz("uplata_korisnik", ['greskauplata'=>'Poziv na broj je obavezan','cena' => $cena['Cena'], 'korisnik' => $korisnik, 'licitacija' => $id, 'fondacija' => $fondacija]);
        } else if (!$this->validate(['poziv' => 'integer'])) {
            return  $this->prikaz("uplata_korisnik", ['greskauplata'=>'Poziv na broj mora biti unet kao broj','cena' => $cena['Cena'], 'korisnik' => $korisnik, 'licitacija' => $id, 'fondacija' => $fondacija]);
        }


        $uplata = new UplataModel();
        $uplata->insert([
            "uplatilac" => $this->session->get('korisnik')['korisnickoime'],
            "valuta" => $this->request->getVar("valuta"),
            "iznos" => $cena['Cena'],
            'racunprimaoca' =>$fondacija['racun'],
            "primalac" => $fondacija['idFondacija'],
            'svrhauplate'=>$id
        ]);

        $data = [
            'uplaceno' => $cena['Cena']
        ];
        $licitacijaModel->update($id, $data);

        $this->azuriraj($fondacija['idFondacija'], $cena['Cena']);
        
        return $this->prikaz("uspeh", ["uspeh" => "Uspešno ste izvršili uplatu"]);
    }
}
