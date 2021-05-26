<?php namespace App\Models;

use CodeIgniter\Model;




class UplataModel extends Model{

   protected $table='uplata';
   protected $primaryKey='idUplata';
   protected $allowedFields=['uplatilac','valuta','iznos','račun primaoca','svrha uplate','primalac'];

}