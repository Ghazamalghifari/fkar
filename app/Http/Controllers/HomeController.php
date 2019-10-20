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
    public function index(Request $request, Builder $htmlBuilder) {
        //halaman admin  
        $jumlahanggota = User::where('status','anggotarohis')->count();  
        $datasekolah = DataSekolah::count();

        //halaman member
        $tanggalsekarang = date('d-m-Y');
        if ($request->ajax()) {
            $peserta = PesertaEvent::with(['event','peserta'])->where('tanggal_event',$tanggalsekarang)->get();
            return Datatables::of($peserta)
            ->addColumn('sekolah', function($sekolah){
                $peserta = User::where('id',$sekolah->id_peserta)->first();
                $sekolah = DataSekolah::where('id',$peserta->id_sekolah)->first();
                return $sekolah->nama_sekolah;   
                })->make(true);
        }
        $html = $htmlBuilder->addColumn(['data' => 'peserta.name', 'name' => 'peserta.name', 'title' => 'Nama'])
                            ->addColumn(['data' => 'sekolah', 'name' => 'sekolah', 'title' => 'Sekolah']);
        $history_event = HistoryEvent::where('id_rohis',Auth::user()->id_rohis)->where('tanggal_kegiatan',$tanggalsekarang)->count();
        $cek_event = Event::where('tanggal_event',$tanggalsekarang)->count();

        return view('home', [
            'datasekolah' => $datasekolah,
            'jumlahanggota' => $jumlahanggota,
            'cek_event' => $cek_event,
            'history_event' => $history_event
        ])->with(compact('html'));  
    }

    public function ikut_event(Request $request, Builder $htmlBuilder)
    { 
        $cek_idevent = Event::where('id_event',$request->id_event)->count();
 
        if($cek_idevent  > 0){ 
            $pesertaevent = PesertaEvent::create([
                'id_event' => $request->id_event,
                'id_peserta' => Auth::user()->id,
                'tanggal_event' => date('d-m-Y')
            ]);

            $event = Event::select('id','id_event','nama_event','tanggal_event')->where('id_event',$request->id_event);
            
            $tanggalsekarang = date('d-m-Y');
            HistoryEvent::create([
                'id_event' => $event->first()->id_event,
                'id_rohis' => Auth::user()->id_rohis,
                'nama_kegiatan' => $event->first()->nama_event,
                'tanggal_kegiatan' => $tanggalsekarang ,
            ]);

            $events = Event::where('id_event',$request->id_event)->first(); 
            $TambahPesertaEvent = Event::find($events->id);   
            $TambahPesertaEvent->jumlah_peserta  +=1 ;
            $TambahPesertaEvent->save();  
         
            Session::flash("flash_notification", [
                "level"=>"success",
                "message"=>"Anda Berhasil Mengikuti Event "
                ]);
            return redirect()->back();
        }  else{

            Session::flash("flash_notification", [
                "level"=>"danger",
                "message"=>"Maaf ID Event yang anda masukan tidak ada"
                ]);
            return redirect()->back();
        } 
    }

    public function history_event(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
            $user = User::find(Auth::user()->id);
            $event = HistoryEvent::select(['id','id_rohis','nama_kegiatan','tanggal_kegiatan'])->where('id_rohis',$user->id_rohis);
            return Datatables::of($event)->make(true);
        }
        $html = $htmlBuilder 
          ->addColumn(['data' => 'nama_kegiatan', 'name' => 'nama_kegiatan', 'title' => 'Nama Kegiatan']) 
          ->addColumn(['data' => 'tanggal_kegiatan', 'name' => 'tanggal_kegiatan', 'title' => 'Tanggal Kegiataan'])  ;
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
