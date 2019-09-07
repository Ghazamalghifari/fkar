<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KuponSohib; 
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;
use App\User;
use Auth;

class KuponSohibControllers extends Controller
{
    //
     public function index(Request $request, Builder $htmlBuilder)
     {
         if ($request->ajax()) {
             $kuponsohib = KuponSohib::where('id_sohib',Auth::user()->id);
             return Datatables::of($kuponsohib)
                 ->addColumn('action', function($kuponsohibs){
                     return view('data_kupon._action', [
                         'model'    => $kuponsohibs,
                         'form_url' => route('kupon-sohib.destroy', $kuponsohibs->id),
                         'edit_url' => route('kupon-sohib.edit', $kuponsohibs->id),
                         'confirm_message' => 'Yakin Mau Mengapus Sekolah ' . $kuponsohibs->nama_kupon . '?'
                         ]);
                 })
                 ->addColumn('statuse', function($status){
                     if($status->status == 0){
                        return "Tidak Aktif";
                     }else{
                        return "Aktif";
                     } 
                     })->make(true);
         }
         $html = $htmlBuilder
          ->addColumn(['data' => 'nama_kupon', 'name' => 'nama_kupon', 'title' => 'Nama Promo']) 
          ->addColumn(['data' => 'statuse', 'name' => 'statuse', 'title' => 'Status']) 
          ->addColumn(['data' => 'action', 'name'=>'action','title'=>'', 'orderable'=>false, 'searchable'=>false]);
          return view('data_kupon.index')->with(compact('html'));   
      }
      
    public function create()
    {
        //
        return view('data_kupon.create');
    }
    
    public function store(Request $request)
    {
        // 
        $this->validate($request,[
            'nama_kupon'=>'required|unique:kupon_sohibs,nama_kupon']);

            KuponSohib::create([
                'nama_kupon' => $request['nama_kupon'], 
                'id_sohib' => Auth::user()->id
            ]); 

        Session::flash("flash_notification",[
            "level"=>"success",
            "message"=>"Berhasil Menambah Promo"
            ]);
        return redirect()->route('kupon-sohib.index');
    }
    
    public function edit($id)
    {
        //
        $kuponsohib = KuponSohib::find($id);
        if($kuponsohib->status == 0 ){
            $editKuponSohib = KuponSohib::find($id);    
            $editKuponSohib->status  = 1 ;
            $editKuponSohib->save();
        }
        else{ 
            $editKuponSohib = KuponSohib::find($id);    
            $editKuponSohib->status  = 0 ;
            $editKuponSohib->save();
        }
        return redirect()->route('kupon-sohib.index');
    }
}
