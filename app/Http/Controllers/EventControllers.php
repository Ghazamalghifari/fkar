<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event; 
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;
use App\User;
use App\PesertaEvent;
use Illuminate\Support\Str;

class EventControllers extends Controller
{
    //
     public function index(Request $request, Builder $htmlBuilder)
     {
         if ($request->ajax()) {
            $event = Event::select(['id','id_event','nama_event','tanggal_event','jumlah_peserta']);
            return Datatables::of($event)
                ->addColumn('action', function($events){
                    return view('datatable._actionevent', [
                        'model'    => $events,
                        'form_url' => route('event.destroy', $events->id),
                        'edit_url' => route('event.edit', $events->id),
                        'id_event' => route('event.peserta', $events->id_event),
                        'confirm_message' => 'Yakin Mau Mengapus ' . $events->nama_event . '?'
                        ]);
                })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data' => 'id_event', 'name' => 'id_event', 'title' => 'ID Event'])
          ->addColumn(['data' => 'nama_event', 'name' => 'nama_event', 'title' => 'Nama Event'])
          ->addColumn(['data' => 'tanggal_event', 'name' => 'tanggal_event', 'title' => 'Tanggal Event'])
          ->addColumn(['data' => 'jumlah_peserta', 'name' => 'jumlah_peserta', 'title' => 'Jumlah Peserta'])
          ->addColumn(['data' => 'action', 'name'=>'action','title'=>'', 'orderable'=>false, 'searchable'=>false]);
          return view('event.index')->with(compact('html'));   
      }
      
     public function peserta_event(Request $request, Builder $htmlBuilder,$id)
     {
         if ($request->ajax()) {
            $peserta = PesertaEvent::with(['event','peserta'])->where('id_event',$id)->get();
            return Datatables::of($peserta)->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data' => 'peserta.id_rohis', 'name' => 'peserta.id_rohis', 'title' => 'ID Rohis'])
          ->addColumn(['data' => 'peserta.name', 'name' => 'peserta.name', 'title' => 'Nama'])
          ->addColumn(['data' => 'created_at', 'name' => 'created_at', 'title' => 'Waktu Daftar']);
          $event = Event::select(['id','id_event','nama_event','tanggal_event','jumlah_peserta'])->where('id_event',$id)->first();
          return view('event.peserta', ['event' => $event])->with(compact('html'));   
      }

    public function create()
    { 
        return view('event.create');
    }
    
    public function store(Request $request)
    { 
        $this->validate($request,['nama_event'=>'required|unique:events,nama_event']);
        
        $event = Event::create([
            'id_event' => $request['id_event'],
            'nama_event' => $request['nama_event'],
            'tanggal_event' => $request['tanggal_event']
        ]);
         

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
    
    public function destroy($id)
    {
        // 
        Event::destroy($id);
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Event Berhasil Di Hapus"
            ]);
        return redirect()->route('event.index');
    }
}
