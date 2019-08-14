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

//email
Route::get('/email', function () {
    return view('email');
});

Route::post('/sendEmail', 'Email@sendEmail');
Route::get('downloadExcel/{type}', 'DataAnggotaControllers@downloadExcel');
Auth::routes();

Route::group(['middleware' => 'auth'], function(){
	Route::get('/home', 'HomeController@index');
	Route::get('/profil', 'HomeController@profil');
	Route::resource('data-anggota', 'DataAnggotaControllers');    
	Route::resource('event', 'EventControllers');  
	Route::get('profil-update/{id}',[
		'middleware' => ['auth'],
		'as' => 'profil.update_profil',
		'uses' => 'HomeController@update_profil'
		]);
	Route::get('profil-reset/{id}',[
		'middleware' => ['auth'],
		'as' => 'profil.reset_profil',
		'uses' => 'HomeController@reset_profil'
	]);
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