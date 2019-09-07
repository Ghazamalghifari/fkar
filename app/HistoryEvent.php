<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoryEvent extends Model
{
    //
    protected $fillable = ['id','id_rohis','id_event','nama_kegiatan','tanggal_kegiatan'];
}
