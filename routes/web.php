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

Route::get('/addasesor', 'AsesorController@new');

Route::post('/addasesor', 'AsesorController@store');

Route::get('/editasesor/{id}', 'AsesorController@edit');

Route::put('/editasesor/{id}', 'AsesorController@update');

Route::delete('/deleteasesor/{id}', 'AsesorController@destroy');

Route::delete('/asesor/deleteimage/{id}', 'AsesorController@deleteimage');

// Proyectos

Route::get('/proyecto/{slug}', 'ProyectoController@show');

Route::get('/addproyecto', 'ProyectoController@new');

Route::post('/addproyecto', 'ProyectoController@store');

Route::get('/editproyecto/{slug}', 'ProyectoController@edit');

Route::put('/editproyecto/{slug}', 'ProyectoController@update');

Route::delete('/deleteproyecto/{id}', 'ProyectoController@destroy');

Route::delete('/deleteactualizacion/{id}', 'ProyectoController@deleteactualizacion');

// Usuarios

Route::get('/perfil/{id}', 'UserController@edit');

Route::put('/perfil/{id}', 'UserController@update');

Route::delete('/user/deleteimage/{id}', 'UserController@deleteimage');

Route::get('/usuario/{id}', 'UserController@show');


// Borrar imagenes, documentos y logos de los proyectos

Route::delete('/archivos/deletelogo/{id}', 'ArchivosController@deletelogo');

Route::delete('/archivos/deletedocumento/{id}', 'ArchivosController@deleteplano');

Route::delete('/archivos/deleteimage/{id}', 'ArchivosController@deleteimage');
