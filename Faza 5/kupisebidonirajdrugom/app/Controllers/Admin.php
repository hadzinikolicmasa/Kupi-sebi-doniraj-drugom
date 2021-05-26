<?php

namespace App\Controllers;
use App\Models\KorisnikModel;
use App\Models\RecenzijaModel;


class Admin extends BaseController
{


    protected function prikaz($strana,$podaci){
$podaci['controller']="Admin";
        $podaci['admin']=$this->session->get('admin');
        echo view("sablon/header_admin");
        echo view("stranice/$strana",$podaci);
        echo view("sablon/footer");

    }
	public function index()
	{
		$this->prikaz("pocetna_admin",[]);
	}


    public function korisnici(){

     $korisnikModel=new KorisnikModel();
     $korisnici=$korisnikModel->findAll();

     $recenzijaModel=new RecenzijaModel();
     $recenzije=$recenzijaModel->findAll();
     
     $this->prikaz("korisnici",['korisnici'=>$korisnici,'recenzije'=>$recenzije]);

    }


    
    public function brisi($id){
        
        $recenzijaModel=new RecenzijaModel();
        $recenzijaModel->where(['Korisnik_idKorisnik'=>$id])->delete();
        $korisnikModel=new KorisnikModel();
       $korisnikModel->delete($id);
  
        $this->korisnici();

    }

}