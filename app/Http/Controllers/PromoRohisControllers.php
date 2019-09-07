<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KuponSohib; 
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;
use App\User;

class PromoRohisControllers extends Controller
{
    //
     public function index(Request $request, Builder $htmlBuilder)
     {
         if ($request->ajax()) {
             $kuponsohib = KuponSohib::all();
             return Datatables::of($kuponsohib)->make(true);
         }
         $html = $htmlBuilder
          ->addColumn(['data' => 'nama_kupon', 'name' => 'nama_kupon', 'title' => 'Nama Promo']);
          return view('promo_rohis')->with(compact('html'));   
      }
      
    
}
