<?php namespace App\Models;

use CodeIgniter\Model;




class KorisnikModel extends Model{

   protected $table='korisnik';
   protected $primaryKey='idKorisnik';
   protected $allowedFields=['ime','prezime','pol','telefon','grad','adresa','korisnickoime','lozinka'];

}