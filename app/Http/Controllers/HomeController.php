<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;
use Auth;
use App\User;
use App\DataSekolah;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datasekolah = DataSekolah::count();
        $jumlahanggota = User::count();
        return view('home', ['datasekolah' => $datasekolah,'jumlahanggota' => $jumlahanggota]);
    }

    public function profil()
    {
        $dataanggota = User::find(Auth::user()->id);
        return view('layouts.profil')->with(compact('dataanggota'));
    }
    
    public function jumlah_sekolah(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
            $datasekolah = DataSekolah::select(['id','nama_sekolah']);
            return Datatables::of($datasekolah)->make(true);
        }
        $html = $htmlBuilder
         ->addColumn(['data' => 'nama_sekolah', 'name' => 'nama_sekolah', 'title' => 'Nama Sekolah']);
         return view('jumlahsekolah')->with(compact('html'));   
    }
}
