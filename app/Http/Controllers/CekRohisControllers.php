<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class CekRohisControllers extends Controller
{
    //
    
    public function cek_rohis(Request $request)
    {    
        $data_rohis = User::with(['data_sekolah'])->where('id_rohis',$request->id_rohis);
        
        if($data_rohis->count() > 0) {
            $result = $data_rohis->first();
        } else {
            $result = null;
        }
        
        return view('auth.login')->with(compact('result'));  
    }
}
