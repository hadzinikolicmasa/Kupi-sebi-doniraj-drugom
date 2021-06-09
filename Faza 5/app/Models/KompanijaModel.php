<?php namespace App\Models;

use CodeIgniter\Model;




class KompanijaModel extends Model{

   protected $table='kompanija';
   protected $primaryKey='PIB';
   protected $allowedFields=['PIB','registarskibroj','naziv','adresa','telefon','lozinka'];

}