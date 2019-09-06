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

class SohibControllers extends Controller
{
    //
     public function index(Request $request, Builder $htmlBuilder)
     {
         if ($request->ajax()) {
             $data_sohib = User::where('status','anggotasohib');
             return Datatables::of($data_sohib)
                 ->addColumn('action', function($data_sohibs){
                     return view('datatable._action', [
                         'model'    => $data_sohibs,
                         'form_url' => route('data-sohib.destroy', $data_sohibs->id),
                         'edit_url' => route('data-sohib.edit', $data_sohibs->id),
                         'confirm_message' => 'Yakin Mau Mengapus Anggota Sohib ?'
                         ]);
                 })->make(true);
         }
         $html = $htmlBuilder 
         ->addColumn(['data' => 'id', 'name' => 'id', 'title' => 'ID']) 
          ->addColumn(['data' => 'name', 'name' => 'name', 'title' => 'Nama Pemilik']) 
          ->addColumn(['data' => 'email', 'name' => 'email', 'title' => 'Email Perusahaan'])
          ->addColumn(['data' => 'no_wa', 'name' => 'no_wa', 'title' => 'Nomor Telphone Perusahaan'])
          ->addColumn(['data' => 'alamat', 'name' => 'alamat', 'title' => 'Alamat Perusahaan'])
          ->addColumn(['data' => 'action', 'name'=>'action','title'=>'', 'orderable'=>false, 'searchable'=>false]);
          return view('data_sohib.index')->with(compact('html'));   
      }
    
    public function create()
    { 
        
        return view('data_sohib.create');
    }
    
    public function store(Request $request)
    {
        //
        $password = '2019'; 
        $status = 'anggotasohib';
        
        $user = User::create([
            'name' => $request['name'], 
            'email' => $request['email'], 
            'no_wa' => $request['no_wa'], 
            'alamat' => $request['alamat'], 
            'status' => $status,
            'password' => bcrypt($password),
        ]);
      
        $tahun = date('Y');
        $passwordnew = "$tahun$user->id"; 
        $request_user = User::where('id',$user->id)->first();   
        $request_user->password  = bcrypt($passwordnew);
        $request_user->id_rohis  = $passwordnew;
        $request_user->save();  

        $sohibRole = Role::where('name', 'sohib')->first();
        $user->attachRole($sohibRole); 
         
         
        Session::flash("flash_notification",[
            "level"=>"success",
            "message"=>"Berhasil Menambah Anggota Sohib,IDSOHIB : $user->id"
            ]);
        return redirect()->route('data-sohib.index');
    }
    
    public function edit($id)
    {
        //
        $datasohib = User::find($id);
        return view('data_sohib.edit')->with(compact('datasohib'));
    }

    public function update(Request $request, $id)
    { 
       $user = User::find($id);
       if(!$user->update($request->all())) return redirect()->back();
       
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Mengubah Anggota Sohib"
            ]);
        return redirect()->route('data-sohib.index');
    }
    
    public function destroy($id)
    {
        // 
        User::destroy($id);
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Anggota Sohib Berhasil Di Hapus"
            ]);
        return redirect()->route('data-sohib.index');
    }
}
