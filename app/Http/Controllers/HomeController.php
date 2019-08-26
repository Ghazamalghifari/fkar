<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;
use Auth;
use App\User;
use App\DataSekolah;
use App\Event;
use App\PesertaEvent;
use App\HistoryEvent;

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
     public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
            $event = Event::select(['id','id_event','nama_event','tanggal_event','jumlah_peserta']);
            return Datatables::of($event)
                ->addColumn('action', function($events){  
                    return view('datatable._actionpesertaevent', [ 
                        'id_event' => route('event.peserta', $events->id)
                        ]);
                })->addColumn('ikutevent', function($ikutevent){  
                    $peserta = PesertaEvent::where('id_event',$ikutevent->id_events)->first();
                    return view('datatable._actionpesertaeventjoin', [
                        'model'    => $ikutevent,  
                        'id_event' => route('event.peserta', $ikutevent->id),
                        'confirm_message' => 'Apakah Anda Ingin Mengikuti Event ' . $ikutevent->nama_event . '?'
                        ]);
                })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data' => 'id_event', 'name' => 'id_event', 'title' => 'Id Event'])
         ->addColumn(['data' => 'nama_event', 'name' => 'nama_event', 'title' => 'Nama Event'])
         ->addColumn(['data' => 'tanggal_event', 'name' => 'tanggal_event', 'title' => 'Tanggal Event'])
         ->addColumn(['data' => 'jumlah_peserta', 'name' => 'jumlah_peserta', 'title' => 'Jumlah Peserta'])
         ->addColumn(['data' => 'action', 'name'=>'action','title'=>'Peserta', 'orderable'=>false, 'searchable'=>false])
         ->addColumn(['data' => 'ikutevent', 'name'=>'ikutevent','title'=>'Status', 'orderable'=>false, 'searchable'=>false]);

        $datasekolah = DataSekolah::count();
        $jumlahanggota = User::where('status','anggotarohis')->count(); 

        return view('home', ['datasekolah' => $datasekolah,'jumlahanggota' => $jumlahanggota])->with(compact('html'));  
    }

    public function ikut_event($id)
    { 
        $pesertaevent = PesertaEvent::create([
            'id_event' => $id,
            'id_peserta' => Auth::user()->id
        ]);

        $data_event = Event::select(['id','id_event','nama_event','tanggal_event','jumlah_peserta'])->where('id_event',$id)->first();

        print_r($data_event);
        exit;
        $historyevent = HistoryEvent::create([
            'id_rohis' => Auth::user()->id_rohis,
            'nama_kegiatan' => $data_event->nama_event,
            'tanggal_kegiatan' => $data_event->tanggal_event
        ]);
        $TambahPesertaEvent = Event::find($id);   
        $TambahPesertaEvent->jumlah_peserta  +=1 ;
        $TambahPesertaEvent->save();  
 
        
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Anda Berhasil Mengikuti Event $data_event->nama_event"
            ]);
        return redirect()->back();
    }

    public function history_event(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
           $event = HistoryEvent::select(['id','id_rohis','nama_kegiatan','tanggal_kegiatan'])->where('id_rohis',Auth::user()->id_rohis)->get();
           return Datatables::of($event)->make(true);
       }
       $html = $htmlBuilder 
         ->addColumn(['data' => 'nama_kegiatan', 'name' => 'nama_kegiatan', 'title' => 'Nama Event'])
         ->addColumn(['data' => 'tanggal_kegiatan', 'name' => 'tanggal_kegiatan', 'title' => 'Tanggal Event']);
         return view('history_event')->with(compact('html'));   
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
