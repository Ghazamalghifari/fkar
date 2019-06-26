<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest'); 
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'id_sekolah' => 'required',
            'kelas' => 'required',
            'golongan_darah' => 'required', 
            'no_wa' => 'required',
            'email' => 'required|email|max:255|unique:users'
        ]);
         
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $password = '2019';
        $kategori_daftar = 'Baru';
        $status = 'anggotarohis';
        
        $user = User::create([
            'name' => $data['name'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'alamat' => $data['alamat'],
            'id_sekolah' => $data['id_sekolah'],
            'kelas' => $data['kelas'],
            'golongan_darah' => $data['golongan_darah'],
            'kategori_daftar' => $kategori_daftar,
            'jenis_kelamin' => $data['jenis_kelamin'], 
            'no_wa' => $data['no_wa'], 
            'email' => $data['email'], 
            'status' => $status,
            'password' => bcrypt($password),
        ]);
          
        $memberRole = Role::where('name', 'member')->first();
        $user->attachRole($memberRole);
        return $user; 
    }
}
