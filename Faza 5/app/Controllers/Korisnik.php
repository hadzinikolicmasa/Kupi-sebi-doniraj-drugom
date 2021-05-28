<?php

namespace App\Controllers;

class Korisnik extends BaseController
{

	protected function prikaz($strana,$podaci){
        $podaci['controller']="Korisnik";

	
        echo view("sablon/header_korisnik");
        echo view("stranice/$strana",$podaci);
        echo view("sablon/footer");

    }

	public function index()
	{
        $korisnik=$this->session->get("korisnik");
		 $this->prikaz('korisnik_pocetna',['korisnik'=>$korisnik]);
	}
}
