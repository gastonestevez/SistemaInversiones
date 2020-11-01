<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
// https://stackoverflow.com/questions/42695917/laravel-5-4-disable-register-route
// Deshabilitamos la ruta register ya que únicamente los admins van a poder crear usuarios.

/////////////////////////////////// RUTAS DE PRUEBA /////////////////////////////////////////

Route::get('/prueba', 'Controller@prueba')->name('prueba');

Route::get('/perfil/{id}', 'Controller@editarperfil')->name('perfil.show');

Route::put('/perfil/{id}', 'Controller@updateperfil')->name('perfil.show');

Route::get('/proyecto/{slug}', 'Controller@proyecto')->name('proyecto.show');

Route::get('/ping','AuthenticationController@ping');

/////////////////////////////////// RUTAS DEL PROYECTO /////////////////////////////////////////

Route::get('/', 'HomeController@index')->name('home');


// Asesores

Route::get('/asesor/{id}', 'AsesorController@show');

Route::get('/addasesor', 'AsesorController@new')->middleware('admin');

Route::post('/addasesor', 'AsesorController@store')->middleware('admin');

Route::get('/editasesor/{id}', 'AsesorController@edit')->middleware('admin');

Route::put('/editasesor/{id}', 'AsesorController@update')->middleware('admin');

Route::delete('/deleteasesor/{id}', 'AsesorController@destroy')->middleware('admin');

Route::delete('/asesor/deleteimage/{id}', 'AsesorController@deleteimage')->middleware('admin');

// Proyectos

Route::get('/proyecto/{slug}', 'ProyectoController@show');

Route::get('/addproyecto', 'ProyectoController@new')->middleware('admin');

Route::post('/addproyecto', 'ProyectoController@store')->middleware('admin');

Route::get('/editproyecto/{slug}', 'ProyectoController@edit')->middleware('admin');

Route::put('/editproyecto/{slug}', 'ProyectoController@update')->middleware('admin');

Route::delete('/deleteproyecto/{id}', 'ProyectoController@destroy')->middleware('admin');

Route::delete('/deleteactualizacion/{id}', 'ProyectoController@deleteactualizacion')->middleware('admin');

// Usuarios

Route::get('/perfil/{id}', 'UserController@edit')->middleware('admin');

Route::get('/perfil', 'UserController@edit')->middleware('auth');

Route::put('/perfil/{id}', 'UserController@update')->middleware('admin');

Route::delete('/user/deleteimage/{id}', 'UserController@deleteimage')->middleware('auth');

Route::get('/usuario/{id}', 'UserController@show')->middleware('admin');

Route::put('/acreditar-dinero/{id}', 'UserController@acreditar')->middleware('admin');

Route::put('/invertir/{id}', 'UserController@invertir')->middleware('admin');

// Billetera

Route::get('/billetera/{id}', 'BilleteraController@edit')->middleware('admin');

Route::put('/billetera/{id}', 'BilleteraController@update')->middleware('admin');

// Localidades

Route::get('/localidades', 'LocalidadController@directory')->middleware('admin');

Route::post('/addlocalidad', 'LocalidadController@store')->middleware('admin');

Route::put('/editlocalidad/{id}', 'LocalidadController@update')->middleware('admin');

Route::delete('/deletelocalidad/{id}', 'LocalidadController@destroy')->middleware('admin');

// Referentes

Route::get('/referentes', 'ReferenteController@directory')->middleware('admin');

Route::post('/addreferente', 'ReferenteController@store')->middleware('admin');

Route::put('/editreferente/{id}', 'ReferenteController@update')->middleware('admin');

Route::delete('/deletereferente/{id}', 'ReferenteController@destroy')->middleware('admin');


// Borrar imagenes, documentos y logos de los proyectos

Route::delete('/archivos/deletelogo/{id}', 'ArchivosController@deletelogo')->middleware('admin');

Route::delete('/archivos/deletedocumento/{id}', 'ArchivosController@deleteplano')->middleware('admin');

Route::delete('/archivos/deleteimage/{id}', 'ArchivosController@deleteimage')->middleware('admin');
