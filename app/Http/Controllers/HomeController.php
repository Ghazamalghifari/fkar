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
        $jumlahanggota = User::where('status','anggotarohis')->count();
        return view('home', ['datasekolah' => $datasekolah,'jumlahanggota' => $jumlahanggota]);
    }

    public function profil()
    {
        $datauser = User::find(Auth::user()->id);
        return view('layouts.profil')->with(compact('datauser'));
    }
    
    public function update_profil(Request $request, $id)
    { 
       $user = User::find($id);
       if(!$user->update($request->all())) return redirect()->back();
       
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Mengubah Profil"
            ]);
        return redirect()->back();
    }

    public function reset_profil(Request $request, $id)
    { 
       $user = User::find($id);
       
       
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Silahkan Cek Email anda untuk melihat Password Anda"
            ]);
        return redirect()->back();
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
