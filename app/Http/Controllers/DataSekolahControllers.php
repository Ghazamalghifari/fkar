<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataSekolah; 
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;

class DataSekolahControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
            $datasekolah = DataSekolah::select(['id','nama_sekolah']);
            return Datatables::of($datasekolah)
                ->addColumn('action', function($datasekolahs){
                    return view('datatable._action', [
                        'model'    => $datasekolahs,
                        'form_url' => route('data-sekolah.destroy', $datasekolahs->id),
                        'edit_url' => route('data-sekolah.edit', $datasekolahs->id),
                        'confirm_message' => 'Yakin Mau Mengapus Sekolah ' . $datasekolahs->nama_sekolah . '?'
                        ]);
                })->make(true);
        }
        $html = $htmlBuilder
         ->addColumn(['data' => 'nama_sekolah', 'name' => 'nama_sekolah', 'title' => 'Nama Sekolah'])
         ->addColumn(['data' => 'action', 'name'=>'action','title'=>'', 'orderable'=>false, 'searchable'=>false]);
         return view('data_sekolah.index')->with(compact('html'));   
     }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('data_sekolah.create');
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
       
        $this->validate($request,['nama_sekolah'=>'required|unique:data_sekolahs,nama_sekolah']);
         DataSekolah::create($request->all()); 
        Session::flash("flash_notification",[
            "level"=>"success",
            "message"=>"Berhasil Menambah Sekolah"
            ]);
        return redirect()->route('data-sekolah.index');
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
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $datasekolah = DataSekolah::find($id);
        return view('data_sekolah.edit')->with(compact('datasekolah'));
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
        $this->validate($request, ['nama_sekolah'   => 'required|unique:data_sekolahs,nama_sekolah,' .$id]);
        DataSekolah::where('id', $id) ->update(['nama_sekolah'=>$request->nama_sekolah]); 

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Mengubah Sekolah"
            ]);
        return redirect()->route('data-sekolah.index');
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
        $user = User::where('id_sekolah',$id);
        if ($user->count == '0'){ 
            Session::flash("flash_notification", [
                "level"=>"success",
                "message"=>"Sekolah Tidak Bisa di hapus"
                ]);
            return redirect()->back();

        }
        DataSekolah::destroy($id);
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Sekolah Berhasil Di Hapus"
            ]);
        return redirect()->route('data-sekolah.index');
    }
}