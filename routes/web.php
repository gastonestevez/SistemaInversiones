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

Route::delete('/deleteimagen/{id}', 'AsesorController@deleteimagen');

// Proyectos

Route::get('/proyecto/{slug}', 'ProyectoController@show');

Route::get('/addproyecto', 'ProyectoController@new');

Route::post('/addproyecto', 'ProyectoController@store');

Route::get('/editproyecto/{slug}', 'ProyectoController@edit');

Route::get('/editproyecto/{slug}', 'ProyectoController@update');

Route::delete('/deleteproyecto/{slug}', 'ProyectoController@destroy');


// Borrar imagenes, documentos y logos de los proyectos

Route::post('/deletelogo/{id}', 'HomeController@deletelogo');

Route::post('/deletedocumento/{id}', 'HomeController@deleteplano');

Route::delete('/deleteimage/{id}', 'HomeController@deleteImage');
