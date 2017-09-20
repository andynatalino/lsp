<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
 public function jadwal(){
   	 return $this->belongsTo('App\Jadwal', 'id_jadwal');
   }
}
