<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_rohis','name','email', 'tanggal_lahir','alamat','id_sekolah','kelas','golongan_darah','kategori_daftar','no_wa', 'password','status','jenis_kelamin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
      public function data_sekolah()
    {
        return $this->hasOne('App\DataSekolah', 'id', 'id_sekolah');
    }
    
    public function role()
          {
            return $this->hasOne('App\User_otoritas','user_id','id');
          }   
}
