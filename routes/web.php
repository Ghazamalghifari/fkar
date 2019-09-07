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
Route::post('/cek-rohis', 'CekRohisControllers@cek_rohis');	
Route::get('/register-sohib', 'SohibControllers@index');	
Route::post('/registersohib', 'SohibControllers@create');	

Route::get('/', function () {
	$result = null;
    return view('auth.login')->with(compact('result'));
});

//email
Route::get('/email', function () {
    return view('email');
});

Route::post('/sendEmail', 'Email@sendEmail');
Route::get('downloadExcel/{type}', 'DataAnggotaControllers@downloadExcel');
Auth::routes();

Route::group(['middleware' => 'auth'], function(){
	Route::resource('kupon-sohib', 'KuponSohibControllers'); 
	Route::resource('data-sohib', 'SohibControllers'); 
	Route::resource('promo-rohis', 'PromoRohisControllers'); 
	Route::get('/home', 'HomeController@index');
	Route::get('/profil', 'HomeController@profil');	
	Route::post('ikut-event',[
		'middleware' => ['auth'],
		'as' => 'event.ikutevent',
		'uses' => 'HomeController@ikut_event'
	]); 

	Route::get('history-event',[
		'middleware' => ['auth'],
		'as' => 'event.history',
		'uses' => 'HomeController@history_event'
	]);
   
	Route::resource('data-anggota', 'DataAnggotaControllers');    
	Route::get('peserta-event/{id}',[
		'middleware' => ['auth'],
		'as' => 'event.peserta',
		'uses' => 'EventControllers@peserta_event'
		]);

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
		Route::resource('event', 'EventControllers');  
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