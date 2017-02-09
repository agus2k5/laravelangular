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


//api docente
Route::get('/api/docente/{id?}','DocenteController@index');
Route::post('/api/docente','DocenteController@store');
Route::post('/api/docente/{id}','DocenteController@update');
Route::delete('/api/docente/{id}','DocenteController@destroy');
//test de funcionamiento en travis
Route::get('/api/prueba','DocenteController@prueba');