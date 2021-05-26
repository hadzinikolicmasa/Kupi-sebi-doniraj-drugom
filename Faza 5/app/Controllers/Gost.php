<?php

namespace App\Controllers;
use App\Models\KorisnikModel;
use App\Models\AdminModel;
use App\Models\KompanijaModel;
use App\Models\FondacijaModel;
use App\Models\KategorijaModel;


class Gost extends BaseController
{

    protected function prikaz($strana,$podaci){

        $podaci['controller']="Gost";
        echo view("sablon/header_gost");
        echo view("stranice/$strana",$podaci);
        echo view("sablon/footer");

    }
	public function index()
	{
      $f=new FondacijaModel();
      $fondacije=$f->findAll();
        $this->prikaz("pocetna",['fondacije'=>$fondacije]); 
	}


    public function prijava(){
        $this->prikaz("prijava",[]);
    }

    public function proveraprijave(){
     
       if(!$this->validate(['korisnickoime'=>'required'])){
           
        return $this->prikaz("prijava",['greskaprijava'=>'Korisničko ime nije uneto']);
       }else if(!$this->validate(['lozinkaprijava'=>'required'])){

        return $this->prikaz("prijava",['greskaprijava'=>'Lozinka  nije uneta']);

    }

     $korisnikmodel=new KorisnikModel();
     $korisnik=$korisnikmodel->where('korisnickoime',$this->request->getVar("korisnickoime"))->first();

     if($korisnik!=null){
        if($korisnik['lozinka']!=$this->request->getVar('lozinkaprijava')){

            return $this->prikaz("prijava",['greskaprijava'=>'Nije dobra lozinka.']);
    
         }else{
            $this->session->set('korisnik',$korisnik);
            return redirect()->to(site_url('Korisnik'));
         }
        
    }
    $adminmodel=new AdminModel();
     $admin=$adminmodel->where('korisnickoime',$this->request->getVar("korisnickoime"))->first();
     
     if($admin!=null){
        if($admin['lozinka']!=$this->request->getVar('lozinkaprijava')){

            return $this->prikaz("prijava",['greskaprijava'=>'Nije dobra lozinka.']);
    
         }else{
            $this->session->set('admin',$admin);
            return redirect()->to(site_url('Admin'));
         }
        
    }
    
    $kompanijamodel=new KompanijaModel();
     $kompanija=$kompanijamodel->where('naziv',$this->request->getVar("korisnickoime"))->first();
     
     if($kompanija!=null){
        if($kompanija['lozinka']!=$this->request->getVar('lozinkaprijava')){

            return $this->prikaz("prijava",['greskaprijava'=>'Nije dobra lozinka.']);
    
         }else{
            $this->session->set('kompanija',$kompanija);
            return redirect()->to(site_url('Kompanija'));
         }
         
        
    }


    return $this->prikaz("prijava",['greskaprijava'=>'Ne postojite u bazi.']);

     

    }

    




}