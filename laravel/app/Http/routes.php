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


Route::group([], function(){

  Route::get('/', 'SiteController@home');
  Route::get('/user', 'SiteController@homeUser');
  Route::get('cadastro', 'SiteController@cadastro');
  Route::get('login', 'SiteController@login');

  Route::post('cadastroUsuario', 'UserController@InserirUsuario');
  Route::post('loginUsuario', 'UserController@loginUsuario');
  Route::get('logout', 'UserController@logout');
});

Route::group([], function(){

  Route::get('cadastroRecurso', 'RecursoController@create');
  Route::post('cadastroRecurso', 'RecursoController@store');
  Route::get('editarRecurso/{id}', 'RecursoController@edit');
  Route::post('updateRecurso/{id}','RecursoController@update');
  Route::get('deletarRecurso/{id}','RecursoController@destroy');

  Route::get('showReserva/{id}','ReservaController@show');
  Route::post('updateReserva/{id}','ReservaController@update');
  Route::post('cadastroReserva/{id}', 'ReservaController@store');


});
