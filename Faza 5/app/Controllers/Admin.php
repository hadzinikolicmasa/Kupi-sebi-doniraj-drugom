<?php

namespace App\Controllers;

use App\Models\KorisnikModel;
use App\Models\RecenzijaModel;
use App\Models\FondacijaModel;
use App\Models\LicitacijaModel;
use App\Models\TrenutnacenaModel;



/**
* AdminController – klasa za оpis svih funkcionalnosti admina
*
* @version 1.0
*/



class Admin extends BaseController
{
 /**
* Funkcija koja sluzi sa prikaz delova stranica koji su uvek isti - header admina i footer kao i promenljivog dela stranica 
* 
* 
*@author Nadja Milojkovic 18/0269
*/
   protected function prikaz($strana, $podaci)
   {

      $podaci['controller'] = "Admin";
      $podaci['admin'] = $this->session->get('admin');
      echo view("sablon/header_admin");
      echo view("stranice/$strana", $podaci);
      echo view("sablon/footer");
   }
/**
     * Funkcija koja poziva pocetnu stranu konrolera
     * @author Nadja Milojkovic 18/0269
     */
   public function index()
   {

      $fondacijaModel = new FondacijaModel();
      $fondacije = $fondacijaModel->findAll();
      $admin = $this->session->get('admin');

      $this->prikaz("pocetna_admin", ['admin' => $admin, 'fondacije' => $fondacije]);
   }

/**
* Funkcija koja prikazuje spisak svih registrovanih korisnika pozivajuci korisnici.php. Poziva se nakon sto admin izabere korisnici iz menija 
* 
* 
*@author Masa Hadzi-Nikolic 18/0271
*/

   public function korisnici()
   {

      $korisnikModel = new KorisnikModel();
      $korisnici = $korisnikModel->findAll();

      $recenzijaModel = new RecenzijaModel();
      $recenzije = $recenzijaModel->findAll();

      $this->prikaz("korisnici", ['korisnici' => $korisnici, 'recenzije' => $recenzije]);
   }

/**
* Funkcija koja brise odgovarajuceg korisnika iz baze nakon cega se ponovo prikazuje stranica bez tog korisnika 
* 
* 
*@author Masa Hadzi-Nikolic 18/0271
*/

   public function brisi()
   {
      $id = $this->request->getVar('id');
      $recenzijaModel = new RecenzijaModel();
      $recenzijaModel->where(['Korisnik_idKorisnik' => $id])->delete();
      $korisnikModel = new KorisnikModel();
      $korisnikModel->delete($id);

      $this->korisnici();
   }
/**
* Funkcija koja prikazuje formu za dodavanje fondacija 
* 
* 
*@author Milanka Labovic 18/0689
*/
   public function  dodavanjeFond()
   {

      $this->prikaz("dodavanjeFondacija", []);
   }

   /**
* Funkcija koja se poziva nakon sto admin pritisne dodajFondaciju i sluzi da proveri unete podatke o fondaciji. Vraca poruku u slucaju greske,
* a u slucaju uspeha poziva uspeh.php sa odgovarajucom porukom
* 
*@author Milanka Labovic 18/0689
*/

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
         $src = '/' . 'slike/' . $this->request->getVar("logoFond");


         $fondacijamodel->insert([
            "naziv" => $this->request->getVar("nazivFond"),
            "adresa" => $this->request->getVar("adresaFond"),
            "racun" => $this->request->getVar("racunFond"),
            'opis' => $this->request->getVar("opisFond"),
            "logo" => $src,
            "iznos" => "0"
         ]);

         $this->prikaz("uspeh", ["uspeh" => "Uspešno ste dodali fondaciju"]);
      }
   }

  
   public function licitacije()
   {

      $licitacijaModel = new LicitacijaModel();
      $licitacije = $licitacijaModel->findAll();
      $trenutnaCenamodel = new TrenutnaCenaModel();
      $trenutnecene = $trenutnaCenamodel->findAll();
      $this->prikaz("azuriranje_licitacije", ['licitacije' => $licitacije, 'trenutnecene' => $trenutnecene]);
   }

   public function azuriranje_licitacije()
   {
      $id = $this->request->getVar('id');
      $licitacijaModel = new LicitacijaModel();

      if (isset($_POST['Opcija'])) {

         if ($_POST['Opcija'] == "brisanje") {

            $trenutnaCenaModel = new TrenutnacenaModel();
            $trenutnaCenaModel->where(['Licitacija_idLicitacija' => $id])->delete();

            $licitacijaModel->delete($id);
         } else if ($_POST['Opcija'] == "reaktivacija") {
            $licitacija = $licitacijaModel->find($id);



            $tmstamp = Date('y:m:d', strtotime('+3 days'));
            $data = [
               'trajanje' => $tmstamp
            ];
            $licitacijaModel->update($id, $data);
         }
      }


      $this->licitacije();
   }
}
