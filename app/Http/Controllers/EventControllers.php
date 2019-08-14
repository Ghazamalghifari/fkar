<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event; 
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;
use App\User;

class EventControllers extends Controller
{
    //
     public function index(Request $request, Builder $htmlBuilder)
     {
         if ($request->ajax()) {
             $event = Event::select(['id','nama_event','tanggal_event','jumlah_peserta']);
             return Datatables::of($event)
                 ->addColumn('action', function($events){
                     return view('datatable._action', [
                         'model'    => $events,
                         'form_url' => route('event.destroy', $events->id),
                         'edit_url' => route('event.edit', $events->id),
                         'confirm_message' => 'Yakin Mau Mengapus ' . $events->nama_event . '?'
                         ]);
                 })->make(true);
         }
         $html = $htmlBuilder
          ->addColumn(['data' => 'nama_event', 'name' => 'nama_event', 'title' => 'Nama Event'])
          ->addColumn(['data' => 'tanggal_event', 'name' => 'tanggal_event', 'title' => 'Tanggal Event'])
          ->addColumn(['data' => 'jumlah_peserta', 'name' => 'jumlah_peserta', 'title' => 'Jumlah Peserta'])
          ->addColumn(['data' => 'action', 'name'=>'action','title'=>'', 'orderable'=>false, 'searchable'=>false]);
          return view('event.index')->with(compact('html'));   
      }
      
    public function create()
    { 
        return view('event.create');
    }
    
    public function store(Request $request)
    { 
        $this->validate($request,['nama_event'=>'required|unique:events,nama_event']);
        Event::create($request->all());  

        Session::flash("flash_notification",[
            "level"=>"success",
            "message"=>"Berhasil Menambah Event"
            ]);
        return redirect()->route('event.index');
    }
    public function edit($id)
    { 
        $event = Event::find($id);
        return view('event.edit')->with(compact('event'));
    }
    public function update(Request $request, $id)
    { 
        $this->validate($request, ['nama_event'   => 'required|unique:events,nama_event,' .$id]);
        Event::where('id', $id) ->update(['nama_event'=>$request->nama_event,'tanggal_event'=>$request->tanggal_event,]); 

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Mengubah Event"
            ]);
        return redirect()->route('event.index');
    }
}
