<?php namespace App\Models;

use CodeIgniter\Model;



class TrenutnacenaModel extends Model{

   protected $table='trenutne_cene';
   protected $primaryKey='Licitacija_idLicitacija';
   protected $allowedFields=['Cena','Korisnik_idKorisnik'];

}