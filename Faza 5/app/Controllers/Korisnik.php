<?php

namespace App\Controllers;

use App\Models\KategorijaModel;
use App\Models\LicitacijaModel;
use App\Models\FondacijaModel;
use App\Models\RecenzijaModel;
use App\Models\KorisnikModel;

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

        $this->prikaz("proizvod", ['licitacija' => $licitacija, 'fondacija' => $fondacija['naziv']]);
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
        $this->prikaz("profil_korisnik", ['korisnik' => $korisnik]);
    }

    public function kreiranje_licitacije()
    {
        $fondacijamodel=new FondacijaModel();
        $kategorijamodel=new KategorijaModel();
        $fondacije=$fondacijamodel->findAll();
        $kategorije=$kategorijamodel->findAll();
        $this->prikaz("kreiranje_licitacije", ['fondacije'=>$fondacije,'kategorije'=>$kategorije]);
    }


    public function proveraLicitacije()
    {
        
        $fondacijamodel=new FondacijaModel();
        $kategorijamodel=new KategorijaModel();
        $fondacije=$fondacijamodel->findAll();
        $kategorije=$kategorijamodel->findAll();
        

        $validation = \Config\Services::validation();

        $validation = $this->validate(['nazivProizvoda' => ['rules' => 'required','errors' => ['required' => 'Nije unet naziv proizvoda!'  ] ], 
        'trajanje' => ['rules' => 'required', 'errors' => ['required' => 'Nije uneto trajanje licitacije!' ]  ],
        'opis' => [ 'rules' => 'required',  'errors' => [ 'required' => 'Nije unet opis proizvoda!'  ] ],
        'pocetnaCena' => [ 'rules' => 'required',  'errors' => [ 'required' => 'Nije uneta pocetna cena proizvoda!'  ] ],
        'fondacija' => [ 'rules' => 'required',  'errors' => [ 'required' => 'Nije izabrana fondacija!'  ] ],
        'kategorija' => [ 'rules' => 'required',  'errors' => [ 'required' => 'Nije izabrana kategorija!'  ] ],
        'slika' => [ 'rules' => 'required',  'errors' => [ 'required' => 'Nije uneta slika proizvoda!'  ] ],]);

        if (!$validation) 
        {
            return $this->prikaz("kreiranje_licitacije", ['validation' => $this->validator,'fondacije'=>$fondacije,'kategorije'=>$kategorije]);
          
        }
       else
        {
         $licitacijamodel = new LicitacijaModel();

         $licitacijamodel->insert([
            "naziv_stvari" => $this->request->getVar("nazivProizvoda"),
            "opis" => $this->request->getVar("opis"),
            "pocetna_cena" => $this->request->getVar("pocetnaCena"),
            "trajanje" => $this->request->getVar("trajanje"),
            "slika" => base64_decode($this->request->getVar("slika")),
            "aktivna"=> "1",
            "Kategorija_IdKategorije"=> $this->request->getVar("kategorija"),
            "Fondacija_idFondacija"=> $this->request->getVar("fondacija")
         ]);
       
         $this->prikaz("uspeh", ["uspeh" => "Uspešno ste kreirali licitaciju"]);
         
        }
        

        
    }

   
   
}




