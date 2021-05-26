<?php namespace App\Models;

use CodeIgniter\Model;



class FondacijaModel extends Model{

   protected $table='fondacija';
   protected $primaryKey='idFondacija';
   protected $allowedFields=['idFondacija','naziv','logo'];

}