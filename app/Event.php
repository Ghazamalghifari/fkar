<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $fillable = ['id','nama_event','tanggal_event','jumlah_peserta'];
}
