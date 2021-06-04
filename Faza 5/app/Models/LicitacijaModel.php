<?php namespace App\Models;

use CodeIgniter\Model;




class LicitacijaModel extends Model{

   protected $table='licitacija';
   protected $primaryKey='idLicitacija';
   protected $allowedFields=['naziv_stvari','opis','pocetna_cena','trajanje','slika','aktivna','Kategorija_IdKategorije','Fondacija_idFondacija','uplaceno'];
   

}