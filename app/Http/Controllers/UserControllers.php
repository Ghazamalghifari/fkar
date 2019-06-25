<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Role;
use App\User_otoritas;
use Auth; 
use Session;
class UserControllers extends Controller
{
    public function index(Request $request, Builder $htmlBuilder)
    {
        //
        if ($request->ajax()) {
            # code...
            $data_users = User::with('role');
            return Datatables::of($data_users)
            ->addColumn('action', function($data_user){
                    return view('datatable._action', [
                        'model'     => $data_user,
                        'form_url'  => route('data-users.destroy', $data_user->id),
                        'edit_url'  => route('data-users.edit', $data_user->id),
                        'confirm_message'   => 'Yakin Mau Menghapus User ' . $data_user->name . '?'
                        ]);
                }) 
                ->addColumn('role', function($user){
                $role = User_otoritas::with('role')->where('user_id',$user->id)->get();
                    return view('data_users._role', [ 
                        'model_role'     => $role,
                        'id_role' => $user->id,
                        ]); 
                })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data' => 'name', 'name' => 'name', 'title' => 'Nama'])
        ->addColumn(['data' => 'email', 'name' => 'email', 'title' => 'Username'])   
        ->addColumn(['data' => 'role', 'name' => 'role', 'title' => 'Otoritas', 'orderable' => false, 'searchable'=>false])  
        ->addColumn(['data' => 'action', 'name' => 'action', 'title' => '', 'orderable' => false, 'searchable'=>false]);
 
        $role = Role::all();
        return view('data_users.index',['role' => $role])->with(compact('html'));
    }
 
    public function filter_otoritas(Request $request, Builder $htmlBuilder,$id)
    {
        //
        if ($request->ajax()) {
            # code... 
            $data_users = User::with('role')
            ->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
            ->where('role_id',$id);
            return Datatables::of($data_users)
            ->addColumn('action', function($data_user){
                    return view('datatable._action', [
                        'model'     => $data_user,
                        'form_url'  => route('data-users.destroy', $data_user->id),
                        'edit_url'  => route('data-users.edit', $data_user->id),
                        'confirm_message'   => 'Yakin Mau Menghapus User ' . $data_user->name . '?'
                        ]);
                })
                ->addColumn('role', function($user){
                $role = Role::where('id',$user->role->role_id)->first();
                return $role->display_name;
                })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data' => 'name', 'name' => 'name', 'title' => 'Nama'])
        ->addColumn(['data' => 'email', 'name' => 'email', 'title' => 'Username'])   
        ->addColumn(['data' => 'role', 'name' => 'role', 'title' => 'Otoritas', 'orderable' => false, 'searchable'=>false])  
        ->addColumn(['data' => 'action', 'name' => 'action', 'title' => '', 'orderable' => false, 'searchable'=>false]);
 
        $role = Role::all();
        return view('data_users.index',['role' => $role])->with(compact('html'));
    } 
    public function create()
    { 
        return view('data_users.create'); 
    }
    public function store(Request $request)
    {
        //
         $this->validate($request, [
            'name'   => 'required',
            'email'     => 'required|unique:users',  
            'role_id'    => 'required'
            ]);
         $user_baru = User::create([ 
            'name' =>$request->name,
            'email'=>$request->email,   
            'password' => bcrypt('123456')]);
            
        $role_baru = Role::where('id',$request->role_id)->first();
        $user_baru->attachRole($role_baru->id);
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Menambah User $request->name"
            ]);
        return redirect()->route('data-users.index');
    }
    public function edit($id)
    {
        //
        $data_users = User::with('role')->find($id);
        return view('data_users.edit')->with(compact('data_users'));
    }
 
     public function update(Request $request, $id)
    {
        //
         $this->validate($request, [
            'name'   => 'required',
            'email'     => 'required|unique:users,email,' .$id,  
            'role_id'    => 'required',
            'role_lama'    => 'required'
            ]);
        $user = User::where('id', $id) ->update([ 
            'name' =>$request->name,
            'email'=>$request->email
            ]);
        $role_lama = Role::where('id',$request->role_lama)->first();
        $role_baru = Role::where('id',$request->role_id)->first();
        $user_baru = User::find($id);
        $user_baru->detachRole($role_lama->id);
        $user_baru->attachRole($role_baru->id);
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Mengubah User $request->name"
            ]);
        return redirect()->route('data-users.index');
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
        //
        
        $user_role = User::find($id);
        $otoritas = User_otoritas::where('user_id',$id)->first();
        $user_role->detachRole($otoritas->role_id);
        if (!User::destroy($id)) {
            return redirect()->back();
        }
        else{
            Session::flash("flash_notification", [
                "level"     => "danger",
                "message"   => "User Berhasil Di Hapus"
            ]);
        return redirect()->route('data-users.index');
        }
    }
}