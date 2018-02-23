<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

 //Route::get('/', function () {
   // if( Auth::user() ) //se valida si esta logueado
   //     if( Auth::user()->rol =='admin' ) //se valida el tipo de usuario
  //          return redirect('admin');
  //      else
  //          return redirect('/vacation/calendar');
  //  else
  //      return redirect('/home');
//});

//rutas accessibles slo si el usuario no se ha logueado
Route::group(['middleware' => 'guest'], function () {

	Route::get('login', 'Auth\AuthController@getLogin');
	Route::post('login', ['as' =>'login', 'uses' => 'Auth\AuthController@postLogin']); 
	// Registration routes...
	//Route::get('register', 'Auth\AuthController@getRegister');
	//Route::post('register', ['as' => 'auth/register', 'uses' => 'Auth\AuthController@postRegister']);

});

//rutas accessibles solo si el usuario esta autenticado y ha ingresado al sistema
Route::group(['middleware' => 'auth'], function () {

	Route::get('/', 'HomeController@index');
    
    Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);
    Route::get('admin','HomeController@admin');

});

//rutas accessibles solo para el usuario administrador
Route::group(['middleware' => 'usuarioAdmin'], function () {

    Route::get('home', 'HomeController@index');
    Route::get('/worker/create', 'WorkerController@create');
    Route::post('/worker/store', 'WorkerController@store');
    Route::post('/worker/upload',  ['as' => 'worker.upload', 'uses' => 'WorkerController@upload']);
    Route::get('/worker/show/{id_worker}', 'WorkerController@show');
    Route::get('/worker/edit/{id_worker}', 'WorkerController@edit');
    Route::post('/worker/update', 'WorkerController@update');
    Route::get('/worker/retirados', 'WorkerController@retirados');
    Route::post('/worker/remove', 'WorkerController@remove');
    Route::get('/worker/showall', 'WorkerController@showall');

    Route::get('/area', 'AreaController@index');
    Route::get('/area/create', 'AreaController@create');
    Route::post('/area/store', 'AreaController@store');
    
    //Vacaciones
    Route::get('/vacation/creat/{id_worker}/{name_worker}', 'VacationController@create');
    Route::post('/vacation/store', 'VacationController@store');
    Route::get('/vacation/calendar', 'VacationController@index');
    //Aprobar vacaciones
    Route::get('/vacation/request', 'VacationController@solicitudes');
    Route::put('vacation/update', 'VacationController@update');
    Route::post('/vacation/update', 'VacationController@update');
    
    Route::get('/vacation/deny', 'VacationController@delSolicitudes');
    Route::post('/vacation/delete', 'VacationController@delete');
});

//Rutas Calendario
Route::get('cargaEventos{id?}','CalendarController@index');
Route::post('guardaEventos', array('as' => 'guardaEventos','uses' => 'CalendarController@create'));
Route::post('actualizaEventos','CalendarController@update');
Route::post('eliminaEvento','CalendarController@delete');

//rutas accessibles solo para el usuario standard
Route::group(['middleware' => 'usuarioStandard'], function () {	
    
    Route::get('/vacation/create', 'VacationController@index');
    Route::get('/vacation/create/{id_worker}/{name_worker}', 'VacationController@create');
    Route::post('/vacation/store', 'VacationController@store');
    //Route::get('/vacation/calendar', 'VacationController@index');
    

});