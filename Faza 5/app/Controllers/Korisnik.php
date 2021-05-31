<?php

namespace App\Controllers;
use App\Models\KorisnikModel;
use App\Models\RecenzijaModel;


class Korisnik extends BaseController
{

    public function index()
	{
        $korisnik=$this->session->get("korisnik");
		 $this->prikaz('korisnik_pocetna',['korisnik'=>$korisnik],'header_korisnik');
	}


	protected function prikaz($strana,$podaci){
        $podaci['controller']="Korisnik";

	
        echo view("sablon/header_korisnik");
        echo view("stranice/$strana",$podaci);
        echo view("sablon/footer");

    }

    public function recenzija(){
        $this->prikaz("recenzija",[]);

    } 
    
    public function proveraRecenzije(){
        $validation=\Config\Services::validation();
        
        $validation=$this->validate([
            'korisnickoime'=>[
             'rules'=>'required',
             'errors'=>[
                'required'=>'Nije uneto korisničko ime!'
             ]
             ],
   
          'ocena'=>[
            'rules'=>'required',
            'errors'=>[
               'required'=>'Nije uneta ocena!'
            ]
            ],
   
            'komentar'=>[
               'rules'=>'required',
               'errors'=>[
                  'required'=>'Nije unet komentar!'
               ]
               ]
        ]);
   

    $korisnikmodel=new KorisnikModel();
    $korisnik=$korisnikmodel->where('korisnickoime',$this->request->getVar("korisnickoime"))->first();
    $idKor=$korisnik['idKorisnik'];

    if($korisnik!=null){
        
    if (!$validation){
         return $this->prikaz("recenzija",['validation'=>$this->validator]);}
    else {
      $recenzijamodel=new RecenzijaModel();
      
      $recenzijamodel->insert([
         "ocena"=>$this->request->getVar("ocena"),
         "komentar"=>$this->request->getVar("komentar"),
         "Korisnik_idKorisnik"=>$idKor
     ]);

     return redirect()->to(site_url('Korisnik'));
}
        
    } else{
        return $this->prikaz("recenzija",['greskarecenzija2'=>'Korisnik ne postoji u bazi.']);
    }

  }    

  public function profil(){
    $this->prikaz("profil",[]);

} 

     public function ispisProfila(){

        $korisnik=$this->session->get("korisnik");

       


        

     }


}
