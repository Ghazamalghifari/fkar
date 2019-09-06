<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; 
use App\DataSekolah; 
use Session;
use Mail;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables; 
use App\Role;
use Excel;  

class DataAnggotaControllers extends Controller
{
    //
     public function index(Request $request, Builder $htmlBuilder)
     {
         if ($request->ajax()) {
             $data_anggota = User::with(['data_sekolah'])->where('status','anggotarohis');
             return Datatables::of($data_anggota)
                 ->addColumn('action', function($data_anggotas){
                     return view('datatable._action', [
                         'model'    => $data_anggotas,
                         'form_url' => route('data-anggota.destroy', $data_anggotas->id),
                         'edit_url' => route('data-anggota.edit', $data_anggotas->id),
                         'confirm_message' => 'Yakin Mau Mengapus Anggota Rohis,dengan ID ROHIS : ' . $data_anggotas->id_rohis . '?'
                         ]);
                 })->make(true);
         }
         $html = $htmlBuilder
          ->addColumn(['data' => 'id_rohis', 'name' => 'id_rohis', 'title' => 'Id Rohis'])
          ->addColumn(['data' => 'name', 'name' => 'name', 'title' => 'Nama'])
          ->addColumn(['data' => 'data_sekolah.nama_sekolah', 'name' => 'data_sekolah.nama_sekolah', 'title' => 'Sekolah'])
          ->addColumn(['data' => 'kelas', 'name' => 'kelas', 'title' => 'Kelas'])
          ->addColumn(['data' => 'no_wa', 'name' => 'no_wa', 'title' => 'Nomor Handphone'])
          ->addColumn(['data' => 'action', 'name'=>'action','title'=>'', 'orderable'=>false, 'searchable'=>false]);
          return view('data_anggota.index')->with(compact('html'));   
      }
     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
         //
         return view('data_anggota.create');
     }
     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(Request $request)
     {
         //
         $password = '2019'; 
         $status = 'anggotarohis';
         
         $user = User::create([
             'name' => $request['name'],
             'tanggal_lahir' => $request['tanggal_lahir'],
             'alamat' => $request['alamat'],
             'id_sekolah' => $request['id_sekolah'],
             'kelas' => $request['kelas'],
             'golongan_darah' => $request['golongan_darah'],
             'kategori_daftar' => $request['kategori_daftar'],
             'jenis_kelamin' => $request['jenis_kelamin'], 
             'no_wa' => $request['no_wa'], 
             'email' => $request['email'], 
             'status' => $status,
             'password' => bcrypt($password),
         ]);
       
         $tahun = date('Y');
         $passwordnew = "$tahun$user->id"; 
         $request_user = User::where('id',$user->id)->first();   
         $request_user->password  = bcrypt($passwordnew);
         $request_user->id_rohis  = $passwordnew;
         $request_user->save();  
 
         $memberRole = Role::where('name', 'member')->first();
         $user->attachRole($memberRole);
         $sekolah = DataSekolah::where('id',$request['id_sekolah'])->first();
         
         
         Mail::send('email', ['data' => $request,'idrohis'=>$passwordnew,'sekolah'=>$sekolah->nama_sekolah], function ($message) use ($request)
         { 
             $message->subject('Selamat Anda telah terdaftar sebagai Angota Rohis');
             $message->from('info@fkar.org', 'FKAR Bandar Lampung');
             $message->to($request['email'], '');
         });
          
         Session::flash("flash_notification",[
             "level"=>"success",
             "message"=>"Berhasil Menambah Anggota Rohis,IDROHIS : $request->id_rohis"
             ]);
         return redirect()->route('data-anggota.index');
     }
     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function show($id)
     {
         //
     }

     public function downloadExcel(Request $request, $type)
     {
         $data = User::with('data_sekolah')->where('status','anggotarohis')->get()->toArray();
         $data_excel = [];
         foreach ($data as $val ) {
             $val['id_sekolah']=$val['data_sekolah']['nama_sekolah'];
             array_push($data_excel,$val);
         }
         
         return Excel::create('data_anggota', function($excel) use ($data_excel) {
             $excel->sheet('mySheet', function($sheet) use ($data_excel)
             {
                 $sheet->fromArray($data_excel);
             });
         })->download($type);
     }
 
     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function edit($id)
     {
         //
         $dataanggota = User::find($id);
         return view('data_anggota.edit')->with(compact('dataanggota'));
     }
     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, $id)
     { 
        $user = User::find($id);
        if(!$user->update($request->all())) return redirect()->back();
        
         Session::flash("flash_notification", [
             "level"=>"success",
             "message"=>"Berhasil Mengubah Anggota"
             ]);
         return redirect()->route('data-anggota.index');
     }
     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
         // 
         User::destroy($id);
         Session::flash("flash_notification", [
             "level"=>"success",
             "message"=>"Anggota Rohis Berhasil Di Hapus"
             ]);
         return redirect()->route('data-anggota.index');
     }
}
