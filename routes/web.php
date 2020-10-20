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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes(['register' => false]);
// https://stackoverflow.com/questions/42695917/laravel-5-4-disable-register-route
// Deshabilitamos la ruta register ya que únicamente los admins van a poder crear usuarios.

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/prueba', 'Controller@prueba')->name('prueba');

Route::get('/perfil/{id}', 'Controller@editarperfil')->name('perfil.show');

Route::put('/perfil/{id}', 'Controller@updateperfil')->name('perfil.show');

Route::get('/proyecto/{slug}', 'Controller@proyecto')->name('proyecto.show');

Route::get('/ping','AuthenticationController@ping');

////////////////////////////////////////////////////////////////////////////

Route::get('/', 'HomeController@index')->name('home');

// Asesores

Route::get('/asesor/{id}', 'AsesorController@show');

Route::get('/addasesor', 'AsesorController@new');

Route::post('/addasesor', 'AsesorController@store');

Route::get('/editasesor/{id}', 'AsesorController@edit');

Route::put('/editasesor/{id}', 'AsesorController@update');

Route::delete('/deleteasesor/{id}', 'AsesorController@destroy');

Route::delete('/deleteimagen/{id}', 'AsesorController@deleteimagen');

// Borrar imagenes, planos y logos

Route::post('/deletelogo/{id}', 'HomeController@deletelogo');

Route::post('/deleteplano/{id}', 'HomeController@deleteplano');

Route::delete('/deleteimage/{id}', 'HomeController@deleteImage');
