<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => 'auth'

], function () {

    Route::post('login', 'AuthenticationController@login');
    Route::post('logout', 'AuthenticationController@logout');
    Route::post('refresh', 'AuthenticationController@refresh');
    Route::post('me', 'AuthenticationController@me');
});

Route::group([
    'prefix' => 'misc'
], function () {
    Route::get('localidad/{id}', 'ApiMiscEndpointsController@obtenerLocalidad');
    Route::get('localidades', 'ApiMiscEndpointsController@obtenerLocalidades');
    Route::get('asesores', 'ApiMiscEndpointsController@obtenerAsesores');
});
