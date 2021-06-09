<?php

namespace App\Controllers;

use App\Models\KorisnikModel;
use App\Models\AdminModel;
use App\Models\KompanijaModel;
use App\Models\FondacijaModel;
use App\Models\KategorijaModel;
use App\Models\LicitacijaModel;

/**
* GostController – klasa za opis svih funkcionalnosti gosta 
*
* @version 1.0
*/

class Gost extends BaseController
{

   /**
* Funkcija koja sluzi sa prikaz delova stranica koji su uvek isti - header gosta i footer kao i promenljivog dela stranica 
* 
* 
*@author Milanka Labovic 18/0689
*@param String $strana
*@param String $podaci
*

*/
   
   protected function prikaz($strana, $podaci)
   {

      $podaci['controller'] = "Gost";
      echo view("sablon/header_gost");
      echo view("stranice/$strana", $podaci);
      echo view("sablon/footer");
   }
   /**
     * Funkcija koja poziva pocetnu stranu konrolera
     * @author Milanka Labovic 18/0689
     */

   public function index()
   {

      $fondacijaModel = new FondacijaModel();
      $fondacije = $fondacijaModel->findAll();

      $this->prikaz("pocetna", ['fondacije' => $fondacije]);
   }

   /**
     * Funckija koja poziva view prijava.php
     * 
     * 
     * @author Masa Hadzi-Nikolic 18/0271
     */

   public function prijava()
   {

      $this->prikaz("prijava", []);
      
   }

/**
* Funkcija koja se poziva nakon sto korisnik aplikacije pokusa da se prijavi i koja zatim proverava da li je korisnik
* uneo postojece korisnicko ime i odgovarajucu lozinku. Ukoliko nije, prosledjuje poruku o gresci a ukoliko jeste, pokrece se
* sesija za odgovarajuceg tipa korisnika
*
* 
*
* @author Masa Hadzi-Nikolic 18/0271
*
*/

   public function proveraprijave()
   {

      if (!$this->validate(['korisnickoime' => 'required'])) {
         return $this->prikaz("prijava", ['greskaprijava' => 'Korisničko ime nije uneto']);
      } else if (!$this->validate(['lozinkaprijava' => 'required'])) {
         return $this->prikaz("prijava", ['greskaprijava' => 'Lozinka  nije uneta']);
      }

      $korisnikmodel = new KorisnikModel();
      $korisnik = $korisnikmodel->where('korisnickoime', $this->request->getVar("korisnickoime"))->first();

      if ($korisnik != null) {
         if ($korisnik['lozinka'] != $this->request->getVar('lozinkaprijava')) {
            return $this->prikaz("prijava", ['greskaprijava' => 'Nije dobra lozinka.']);
         } else {
            $this->session->set('korisnik', $korisnik);
            return redirect()->to(site_url('Korisnik'));
         }
      }

      $adminmodel = new AdminModel();
      $admin = $adminmodel->where('korisnickoime', $this->request->getVar("korisnickoime"))->first();

      if ($admin != null) {
         if ($admin['lozinka'] != $this->request->getVar('lozinkaprijava')) {

            return $this->prikaz("prijava", ['greskaprijava' => 'Nije dobra lozinka.']);
         } else {
            $this->session->set('admin', $admin);
            return redirect()->to(site_url('Admin'));
         }
      }

      $kompanijamodel = new KompanijaModel();
      $kompanija = $kompanijamodel->where('naziv', $this->request->getVar("korisnickoime"))->first();

      if ($kompanija != null) {
         if ($kompanija['lozinka'] != $this->request->getVar('lozinkaprijava')) {

            return $this->prikaz("prijava", ['greskaprijava' => 'Nije dobra lozinka.']);
         } else {
            $this->session->set('kompanija', $kompanija);
            return redirect()->to(site_url('Kompanija'));
         }
      }


      return $this->prikaz("prijava", ['greskaprijava' => 'Ne postojite u bazi.']);
   }

/**
* Funkcija koja prikazuje pocetnu registracionu formu a poziva se kada gost izabere opciju registracije iz menija
* 
* 
*@author Milanka Labovic 18/0689
*/
   public function registracija()
   {
      $this->prikaz("registracijaTip", []);
   }

   /**
* Funkcija koja proverava da li je korisnik koji pokusava da se registruje izabrao neki tip. Ukoliko nije, poziva ponovo istu stranu
* sa greskom a ukoliko jeste, preusmerava ga na sledecu registracionu formu u zavisnosti od izabranog tipa
* 
*@author Milanka Labovic 18/0689
*/

   public function proveraTipa()
   {

      if (isset($_POST["Tip"])) {
         $tip = $_POST["Tip"];

         if (!($tip != "tipKompanija")) {
            return $this->prikaz("registracijaKompanija", []);
         } else {
            $this->prikaz("registracijaKorisnik", []);
         }
      } else {
         return $this->prikaz("registracijaTip", ['greskaRegTip' => 'Niste izabrali tip korisnika!']);
      }
   }


/**
* Funkcija koja proverava unete podatke od strane korisnika. Ukoliko korisnik nije uneo odgovarajuce podatke, prikazuje poruku o gresci
* a ukoliko jeste onda poziva uspeh.php gde ce biti prikazana odgovarajuca poruka o uspehu
* 
*@author Milanka Labovic 18/0689
*/


   public function proveraRegKor()
   {
      $validation = \Config\Services::validation();
      $validation = $this->validate([
         'pol' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'Morate izabrati pol'
            ]
         ],

         'ime' => [
            'rules' => 'required|alpha_space',
            'errors' => [
               'required' => 'Morate uneti ime',
               'alpha_space' => "Ime sadrzi samo slova i razmake"
            ]
         ],

         'prez' => [
            'rules' => 'required|alpha_space',
            'errors' => [
               'required' => 'Morate uneti prezime',
               'alpha_space' => "Prezime sadrzi samo slova i razmake"
            ]
         ],

         'adr' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'Morate uneti adresu'
            ]
         ],

         'fon' => [
            'rules' => 'required|integer',
            'errors' => [
               'required' => 'Morate uneti broj telefona',
               'integer' => 'Broj telefona treba da sadrži samo cifre'
            ]
         ],

         'grad' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'Morate uneti grad'
            ]
         ],

         'korime' => [
            'rules' => 'required|is_unique[korisnik.korisnickoime]',
            'errors' => [
               'required' => 'Morate uneti korisničko ime',
               'is_unique' => 'Korisničko ime već postoji'
            ]
         ],

         'lozinkareg' => [
            'rules' => 'required|min_length[6]|max_length[20]|regex_match[/(?=.*?[A-Z])(?=(.*[\d]){1,})/]',
            'errors' => [
               'required' => 'Morate uneti lozinku',
               'min_length' => 'Lozinka mora sadržati minimalno 6 karaktera',
               'max_length' => 'Lozinka može sadržati maksimalno 20 karaktera',
               'regex_match' => 'Lozinka mora sadržati barem jedno veliko slovo i barem jednu cifru'
            ]
         ]

      ]);

      if (!$validation) return $this->prikaz("registracijaKorisnik", ['validation' => $this->validator]);
      else {
         $korisnikmodel = new KorisnikModel();

         $korisnikmodel->insert([
            "ime" => $this->request->getVar("ime"),
            "prezime" => $this->request->getVar("prez"),
            "adresa" => $this->request->getVar("adr"),
            'telefon' => $this->request->getVar("fon"),
            "grad" => $this->request->getVar("grad"),
            "korisnickoime" => $this->request->getVar("korime"),
            "lozinka" => $this->request->getVar("lozinkareg"),
            "pol" => $this->request->getVar("pol")
         ]);



         $this->prikaz("uspeh", ["uspeh" => "Uspešno ste se registrovali"]);
      }
   }
/**
* Funkcija koja proverava unete podatke od strane kompanije. Ukoliko kompanije nije unela odgovarajuce podatke, prikazuje poruku o gresci
* a ukoliko jeste onda poziva uspeh.php gde ce biti prikazana odgovarajuca poruka o uspehu
* 
*@author Milanka Labovic 18/0689
*/

   public function proveraRegKomp()
   {
      $validation = \Config\Services::validation();
      $validation = $this->validate([
         'nazivKomp' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'Morate uneti naziv kompanije',
            ]
         ],

         'pib' => [
            'rules' => 'required|integer|exact_length[9]|is_unique[kompanija.PIB]',
            'errors' => [
               'required' => 'Morate uneti PIB',
               'integer' => "PIB mora sadrzati samo cifre",
               'exact_length' => "PIB mora imati 9 cifara",
               'is_unique' => "PIB već postoji"
            ]
         ],


         'adresa' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'Morate uneti adresu'
            ]
         ],

         'telefon' => [
            'rules' => 'required|integer',
            'errors' => [
               'required' => 'Morate uneti broj telefona',
               'integer' => 'Broj telefona treba da sadrži samo cifre'
            ]
         ],


         'regBr' => [
            'rules' => 'required|integer',
            'errors' => [
               'required' => 'Morate uneti registarski broj'
            ]
         ],

         'lozinka' => [
            'rules' => 'required|min_length[6]|max_length[20]|regex_match[/(?=.*?[A-Z])(?=(.*[\d]){1,})/]',
            'errors' => [
               'required' => 'Morate uneti lozinku',
               'min_length' => 'Lozinka mora sadržati minimalno 6 karaktera',
               'max_length' => 'Lozinka može sadržati maksimalno 20 karaktera',
               'regex_match' => 'Lozinka mora sadržati barem jedno veliko slovo i barem jednu cifru'
            ]
         ]

      ]);

      if (!$validation) return $this->prikaz("registracijaKompanija", ['validation' => $this->validator]);
      else {
         $kompanijakmodel = new KompanijaModel();

         $kompanijakmodel->insert([
            "PIB" => $this->request->getVar("pib"),
            "naziv" => $this->request->getVar("nazivKomp"),
            "registarskibroj" => $this->request->getVar("regBr"),
            'telefon' => $this->request->getVar("telefon"),
            "adresa" => $this->request->getVar("adresa"),
            "lozinka" => $this->request->getVar("lozinka")
         ]);



         $this->prikaz("uspeh", ["uspeh" => "Uspešno ste se registrovali"]);
      }
   }

   /**
* Funkcija koja vrsi pregled svih dostupnih proizvoda na aplikaciji, iz svih kategorija. Takodje, prikazuje i sve kategorije
* koje se mogu izabrati 
* 
*@author Masa Hadzi-Nikolic 18/0271
*/
   public function pregled()
	{	

		$kategorijamodel = new KategorijaModel();
		$kategorije = $kategorijamodel->findAll();

		$licitacijamodel = new LicitacijaModel();
		$licitacije = $licitacijamodel->findAll();

		$this->prikaz("pregled", ['kategorije' => $kategorije, 'licitacije' => $licitacije]);
	}

     /**
* Funkcija koja vrsi pregled svih dostupnih proizvoda izabrane kategorije koja se dobija kao parametar ove funkcije
* @param String $naziv
* 
*@author Masa Hadzi-Nikolic 18/0271
*/

	public function kategorija($naziv)
	{

		$kategorijamodel = new KategorijaModel();
		$kategorija = $kategorijamodel->where('naziv', $naziv)->first();
		$kategorije = $kategorijamodel->findAll();

		$licitacijamodel = new LicitacijaModel();
		$licitacije = $licitacijamodel->where('Kategorija_IdKategorije', $kategorija['IdKategorije'])->findAll();

		$this->prikaz("pregled", ['kategorije' => $kategorije, 'licitacije' => $licitacije, 'odabrana' => $naziv]);
	}

     /**
* Funkcija koja  se poziva ukoliko gost pokusa da pristupi nekom proizvodu i ispisuje poruku o gresci
* 
* 
*@author Masa Hadzi-Nikolic 18/0271
* @param int $id
*/

   public function unavailable($id)
   {
      $kategorijamodel = new KategorijaModel();
      $kategorije = $kategorijamodel->findAll();
      $licitacijamodel = new LicitacijaModel();
      $licitacije=$licitacijamodel->findAll();
      
      if($id=='undefined')
      {
         
        return $this->prikaz("pregled", ['kategorije' => $kategorije, 'licitacije' => $licitacije,'unavailable'=>"Morate se prijaviti prvo."]);

      }
    
		$kategorija = $kategorijamodel->where('naziv', $id)->first();
		$licitacije = $licitacijamodel->where('Kategorija_IdKategorije', $kategorija['IdKategorije'])->findAll();

		$this->prikaz("pregled", ['kategorije' => $kategorije, 'licitacije' => $licitacije, 'odabrana' => $kategorija['naziv'],'unavailable'=>"Morate se prijaviti prvo."]);
   }
}
