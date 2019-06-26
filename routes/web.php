<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
	Route::get('/home', 'HomeController@index');
	Route::resource('data-anggota', 'DataAnggotaControllers'); 
});
Route::get('/jumlah-sekolah', 'HomeController@jumlah_sekolah');
	Route::group(['prefix'=>'master-data','middleware'=>['auth', 'role:admin']], function () {
		Route::resource('data-sekolah','DataSekolahControllers'); 
		Route::resource('data-users','UserControllers'); 
		Route::get('filterotoritas/{id}',[
			'middleware' => ['auth'],
			'as' => 'data-users.filter_otoritas',
			'uses' => 'UserControllers@filter_otoritas'
			]);
		   
			Route::get('reset/{id}',[
			'middleware' => ['auth','role:admin'],
			'as' => 'data-users.reset',
			'uses' => 'UserControllers@reset'
			]);
}); 