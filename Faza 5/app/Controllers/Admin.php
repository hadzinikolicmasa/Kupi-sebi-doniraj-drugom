<?php

namespace App\Controllers;

use App\Models\KorisnikModel;
use App\Models\RecenzijaModel;
use App\Models\FondacijaModel;
use App\Models\LicitacijaModel;

class Admin extends BaseController
{

   protected function prikaz($strana, $podaci)
   {

      $podaci['controller'] = "Admin";
      $podaci['admin'] = $this->session->get('admin');
      echo view("sablon/header_admin");
      echo view("stranice/$strana", $podaci);
      echo view("sablon/footer");
   }

   public function index()
   {

      $fondacijaModel = new FondacijaModel();
      $fondacije = $fondacijaModel->findAll();
      $admin = $this->session->get('admin');

      $this->prikaz("pocetna_admin", ['admin' => $admin, 'fondacije' => $fondacije]);
   }



   public function korisnici()
   {

      $korisnikModel = new KorisnikModel();
      $korisnici = $korisnikModel->findAll();

      $recenzijaModel = new RecenzijaModel();
      $recenzije = $recenzijaModel->findAll();

      $this->prikaz("korisnici", ['korisnici' => $korisnici, 'recenzije' => $recenzije]);
   }



   public function brisi($id)
   {

      $recenzijaModel = new RecenzijaModel();
      $recenzijaModel->where(['Korisnik_idKorisnik' => $id])->delete();
      $korisnikModel = new KorisnikModel();
      $korisnikModel->delete($id);

      $this->korisnici();
   }

   public function  dodavanjeFond()
   {

      $this->prikaz("dodavanjeFondacija", []);
   }

   public function proveraDodavanjaFondacije()
   {

      $validation = \Config\Services::validation();
      $validation = $this->validate([
         'nazivFond' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'Morate uneti naziv fondacije'
            ]
         ],

         'opisFond' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'Morate uneti opis fondacije',
            ]
         ],

         'adresaFond' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'Morate uneti adresu fondacije',

            ]
         ],

         'racunFond' => [
            'rules' => 'required|regex_match[/^[\d]{3}[-]{1}[\d]{13}[-]{1}[\d]{2}$/]',
            'errors' => [
               'required' => 'Morate uneti racun fondacije',
               'regex_match' => "Morate uneti racun u ispravnom formatu"
            ]
         ],

         'logoFond' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'Morate uneti logo fondacije'
            ]
         ]

      ]);

      if (!$validation) return $this->prikaz("dodavanjeFondacija", ['validation' => $this->validator]);
      else {
         $fondacijamodel = new FondacijaModel();

         $fondacijamodel->insert([
            "naziv" => $this->request->getVar("nazivFond"),
            "adresa" => $this->request->getVar("adresaFond"),
            "racun" => $this->request->getVar("racunFond"),
            'opis' => $this->request->getVar("opisFond"),
            "logo" => base64_decode($this->request->getVar("logoFond")),
            "iznos" => "0"
         ]);

         $this->prikaz("uspeh", ["uspeh" => "Uspešno ste dodali fondaciju"]);
      }
   }
   public function licitacije()
   {

      $licitacijaModel = new LicitacijaModel();
      $licitacije = $licitacijaModel->findAll();
      $trenutnaCenamodel= new TrenutnaCenaModel();
      $trenutnecene=$trenutnaCenamodel->findAll();
      $this->prikaz("azuriranje_licitacije", ['licitacije' => $licitacije,'trenutnecene'=>$trenutnecene]);
   }

   /*public function azuriranje_licitacije($id)
   {
      $licitacijaModel = new LicitacijaModel();
      $licitacijaModel->delete($id);
      $this->licitacije();
      $licitacijaModel->update($id,$aktivna);
      $this->licitacije();
   }*/

  
}
