<?php namespace App\Models;

use CodeIgniter\Model;




class RecenzijaModel extends Model{

   protected $table='recenzija';
   protected $primaryKey='idRecenzija';
   protected $allowedFields=['komentar','ocena'];

}

