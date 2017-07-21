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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware'=>'admin'], function(){

    //  return view('admin.index');
    Route::get('/admin', 'UserController@index');
    Route::post('/admin', 'UserController@store');
    Route::get('/usuario/{id}', 'UserController@edit');
    Route::post('/usuario/{id}', 'UserController@update');
    Route::get('/usuario/{id}/eliminar', 'UserController@delete');

});
Route::group(['middleware'=>'cliente'], function(){
  Route::get('/cliente', function () {
      return view('cliente.index');
  });
});
Route::group(['middleware'=>'visita'], function(){
  Route::get('/visita', function () {
      return view('visita.index');
  });
});
