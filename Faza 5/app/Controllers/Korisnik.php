<?php

namespace App\Controllers;

use App\Models\KategorijaModel;
use App\Models\LicitacijaModel;
use App\Models\FondacijaModel;
use App\Models\RecenzijaModel;
use App\Models\KorisnikModel;
use App\Models\TrenutnaCenaModel;
use App\Models\UplataModel;

/**
 *KorisnikController – klasa za opis svih funkcionalnosti korisnika
 *
 * @version 1.0
 */

class Korisnik extends BaseController
{
    /**
     * Funkcija koja sluzi sa prikaz delova stranica koji su uvek isti - header korisnika i footer kao i promenljivog dela stranica 
     * 
     * 
     *@author Nina Savkic 18/0692
     *@param String $strana
     *@param  $podaci
     */

    protected function prikaz($strana, $podaci)
    {
        $podaci['controller'] = "Korisnik";


        echo view("sablon/header_korisnik");
        echo view("stranice/$strana", $podaci);
        echo view("sablon/footer");
    }
    /**
     * Funkcija koja poziva pocetnu stranu korisnika koja sadrzi spisak svih kategorija i pregled licitacija
     * @author Nina Savkic 18/0692
     */


    public function index()
    {
        $korisnik = $this->session->get("korisnik");
        $kategorijamodel = new KategorijaModel();
        $kategorije = $kategorijamodel->findAll();

        $licitacijamodel = new LicitacijaModel();
        $licitacije = $licitacijamodel->findAll();

        $this->prikaz("korisnik_pocetna", ['kategorije' => $kategorije, 'licitacije' => $licitacije, 'korisnik' => $korisnik]);
    }

    /**
     * Funkcija koja prikazuje listu svih stvari izabrane kategorije od strane korisnika
     *@param String $naziv
     *
     *@author Masa Hadzi-Nikolic 18/0271
     *
     */

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

    /**
     * Funkcija koja prikazuje proizvod  koji korisnik trenutno gleda
     *@param int $id
     *@author Masa Hadzi-Nikolic 18/0271
     *
     */
    public function proizvod($id, $poruka = null)
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

        $trenutni = $this->session->get("korisnik");

       
        $poslednji=null;
        if ($lic['Licitator'] != null && $lic["Korisnik_idKorisnik"] != null){
            $poslednji = $korisnikmodel->find($lic["Korisnik_idKorisnik"]);
            
        }
        $pobednik = $lic['Licitator'];

        $this->prikaz("proizvod", ['poruka' => $poruka, 'pobednik' => $pobednik, 'poslednji' => $poslednji, 'trenutni' => $trenutni, 'ocena' => $ocena, 'cena' => $lic["Cena"], 'licitacija' => $licitacija, 'fondacija' => $fondacija['naziv']]);
    }
    /** 
     *Ova funkcija vraca prikaz recenzije, odnosno stranicu na kojoj se upisuju potrebni
     *podaci za davanje ocene.
     *@param String $korisnik
     * @author Nadja Milojkovic 18/0269
     *
     */
    public function recenzija()
    {
        $korisnik = $this->request->getVar("korisnik");

        $this->prikaz("recenzija", ['korisnik' => $korisnik]);
    }
    /** 
     *Funkcija u kojoj se vrsi provera svih podataka koje je korisnik uneo kako bi dao ocenu izabranom
     *korisniku. Podaci kao sto su korisnicko ime,ocena i komentar moraju biti uneti u suprotnom se ispisuje greska.
     *
     *@author Nadja Milojkovic 18/0269

     */
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
        if ($this->request->getVar("korisnickoime") == $this->session->get("korisnik")['korisnickoime']) {
            return $this->prikaz("recenzija", ['poruka' => 'Ne mozete ostaviti recenziju za samog sebe']);
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
    /** 
     *Sledeca funkcija dohvata korisnika koji je trenutno prijavljen na sistem 
     *i prikazuje njegov profil, odnosno ispisuje sve njegove podatke.
     *
     *@author Nadja Milojkovic 18/0269
     *
     */

    public function profil()
    {

        $korisnik = $this->session->get('korisnik');
        $korisnikmodel = new KorisnikModel();
        $korisnik = $korisnikmodel->find($korisnik['idKorisnik']);
        $this->prikaz("profil_korisnik", ['korisnik' => $korisnik]);
    }

    /**

     *  Funkcija koja se poziva ukoliko korisnik zeli da izvrsi izmenu profila
     * 
     *@author Masa Hadzi-Nikolic 18/0271
     *@author  Nadja Milojkovic 18/0269
     */
    public function izmena()
    {
        $korisnik = $this->session->get('korisnik');
        $this->prikaz("profil_korisnik", ['korisnik' => $korisnik, 'rezimizmena' => true]);
    }

    /**

     *  Funkcija koja se poziva kada korisnik zeli da kreira licitaciju
     * 
     *@author Nina Savkic 18/0692
     */
    public function kreiranje_licitacije()
    {
        $fondacijamodel = new FondacijaModel();
        $kategorijamodel = new KategorijaModel();
        $fondacije = $fondacijamodel->findAll();
        $kategorije = $kategorijamodel->findAll();
        $this->prikaz("kreiranje_licitacije", ['fondacije' => $fondacije, 'kategorije' => $kategorije]);
    }

    /**

     *  Funkcija koja se poziva nakon sto korisnik klikne dugme "Postavi". Nakon toga se vrsi provera unetih podataka.
     *  Ukoliko korisnik ne popuni sva obavezna polja ispisuje mu se odgovarajuca poruka. U suprotnom se prelazi na stranicu
     *  uspeh.php i ispisuje mu se poruka "Uspesno ste kreirali licitaciju" gde dolazi do promene u bazi tako sto se dodaje kreirana licitacija.
     *
     * 
     *@author Nina Savkic 18/0692
     */
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

        $to_time = strtotime($this->request->getVar("trajanje"));
        $from_time = strtotime(Date('y:m:d'));
        if (!$validation) {
            return $this->prikaz("kreiranje_licitacije", ['validation' => $this->validator, 'fondacije' => $fondacije, 'kategorije' => $kategorije]);
        } else if ($to_time - $from_time <= 0) {
            return $this->prikaz("kreiranje_licitacije", ['validation' => $this->validator, 'poruka' => 'Morate uneti datum u buducnosti', 'fondacije' => $fondacije, 'kategorije' => $kategorije]);
        } {
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
                "Licitacija_idLicitacija" => $poslednji['idLicitacija'],
                'Licitator'=>null

            ]);


            $this->prikaz("uspeh", ["uspeh" => "Uspešno ste kreirali licitaciju"]);
        }
    }
    /**

     *  Funkcija koja proverava unete podatke o izmeni profila. Ukoliko postoji greska, prosledjuje poruku o istoj a ukoliko ne postoji
     * prikazuju korisniku ponovo njegov profil
     *
     *@author Masa Hadzi-Nikolic 18/0271
     *@author  Nadja Milojkovic 18/0269
     */

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

    /**

     * Funckija koja se poziva nakon sto korisnik pokusa da licitira za trenutni proizvod ciji je id prosledjen
     * Funkcija proverava uneti iznos i opciju anonimno i na osnovu toga azurira trenutnu cenu tog proizvoda
     *
     *@param int $id
     *@author Masa Hadzi-Nikolic 18/0271
     *@author  Nina Savkic 18/0692
     */


    public function licitiraj($id)
    {
        $trenutnaCenamodel = new TrenutnaCenaModel();
        $trenutna = $trenutnaCenamodel->find($id);
       
        if ($this->session->get('korisnik')['korisnickoime'] == $this->request->getVar("postavio")) {
            return $this->proizvod($id, "Ne mozete licitirati za svoju licitaciju");
        } else if ($this->request->getVar('cena') == "") {
            return $this->proizvod($id, "Morate predložiti cenu");
        } else if ($this->request->getVar('cena') <= ($trenutna['Cena'])) {
            return $this->proizvod($id, "Cena mora biti veca od trenutne");
        }
        if ($this->request->getVar('cena') != '' && $this->request->getVar('cena') > ($trenutna['Cena'])) {
            if ($this->request->getVar('anonimno') != 'anonimno') {

                $data = [
                    'Cena' => $this->request->getVar('cena'),
                    'Korisnik_idKorisnik' => $this->session->get('korisnik')['idKorisnik'],
                    'Licitator' =>  $this->session->get('korisnik')['korisnickoime']
                ];
            } else {

                $data = [
                    'Cena' => $this->request->getVar('cena'),
                    'Korisnik_idKorisnik' => null,
                    'Licitator' =>  $this->session->get('korisnik')['korisnickoime']

                ];
            }
            $trenutnacenamodel = new TrenutnacenaModel();
            $trenutnacenamodel->update($id, $data);
        }


        $this->proizvod($id);
    }

    /**

     * Funkcija koja se poziva nakon sto pobednik licitacije pokusa da uplati novac za licitaciju na kojoj je pobedio
     * 
     *@param int $id
     *@author Masa Hadzi-Nikolic 18/0271
     *
     */


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

    /**

     * Funkcija koja proverava unete podatke o uplati
     * 
     *@param int $id
     *@author Masa Hadzi-Nikolic 18/0271
     *
     */

    function proverauplata($id)
    {
        $korisnik = $this->session->get('korisnik');
        $licitacijaModel = new LicitacijaModel();
        $licitacija = $licitacijaModel->find($id);
        $fondacijamodel = new FondacijaModel();
        $fondacija = $fondacijamodel->find($licitacija['Fondacija_idFondacija']);

        $trenutnacenamodel = new TrenutnaCenaModel();
        $cena = $trenutnacenamodel->find($id);


        if (!$this->validate(['model' => 'required'])) {
            return  $this->prikaz("uplata_korisnik", ['greskauplata' => 'Morate uneti model', 'cena' => $cena['Cena'], 'korisnik' => $korisnik, 'licitacija' => $id, 'fondacija' => $fondacija]);
        } else if (!$this->validate(['model' => 'integer'])) {
            return  $this->prikaz("uplata_korisnik", ['greskauplata' => 'Model mora biti unet kao broj', 'cena' => $cena['Cena'], 'korisnik' => $korisnik, 'licitacija' => $id, 'fondacija' => $fondacija]);
        } else if (!$this->validate(['poziv' => 'required'])) {
            return  $this->prikaz("uplata_korisnik", ['greskauplata' => 'Poziv na broj je obavezan', 'cena' => $cena['Cena'], 'korisnik' => $korisnik, 'licitacija' => $id, 'fondacija' => $fondacija]);
        } else if (!$this->validate(['poziv' => 'integer'])) {
            return  $this->prikaz("uplata_korisnik", ['greskauplata' => 'Poziv na broj mora biti unet kao broj', 'cena' => $cena['Cena'], 'korisnik' => $korisnik, 'licitacija' => $id, 'fondacija' => $fondacija]);
        }


        $uplata = new UplataModel();
        $uplata->insert([
            "uplatilac" => $this->session->get('korisnik')['korisnickoime'],
            "valuta" => $this->request->getVar("valuta"),
            "iznos" => $cena['Cena'],
            'racunprimaoca' => $fondacija['racun'],
            "primalac" => $fondacija['idFondacija'],
            'svrhauplate' => $id
        ]);

        $data = [
            'uplaceno' => $cena['Cena']
        ];
        $licitacijaModel->update($id, $data);

        $this->azuriraj($fondacija['idFondacija'], $cena['Cena']);

        return $this->prikaz("uspeh", ["uspeh" => "Uspešno ste izvršili uplatu"]);
    }
/**

     * Funkcija koja prikazuje sve komentare nekog korisnika
     * 
     *@param int $korisnik
     *@author Masa Hadzi-Nikolic 18/0271
     *
     */
    public function recenzije($korisnik)
    {
        $korisnikmodel = new KorisnikModel();
        $korisnik = $korisnikmodel->where("korisnickoime", $korisnik)->first();
        $recenzijamodel = new RecenzijaModel();
        $licitacija = $this->request->getVar("licitacija");
        $recenzije = $recenzijamodel->where("Korisnik_idKorisnik", $korisnik['idKorisnik'])->findAll();

        return $this->prikaz("sve_recenzije", ["recenzije" => $recenzije, "korisnik" => $korisnik, "licitacija" => $licitacija]);
    }
}
