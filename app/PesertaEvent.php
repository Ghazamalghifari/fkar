<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PesertaEvent extends Model
{
    //
    protected $fillable = ['id','id_event','id_peserta','tanggal_event','created_at'];
    
    public function Event()
          {
            return $this->hasOne('App\Event','id_event','id_event');
          }   
          
    public function Peserta()
    {
      return $this->hasOne('App\User','id','id_peserta');
    }   
}
