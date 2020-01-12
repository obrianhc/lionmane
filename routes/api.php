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

Route::middleware('api')->get('/contacts', 'ContactoController@index');
Route::middleware('api')->get('/getContact/{idContacto}', 'ContactoController@show');
Route::middleware('api')->post('/updateContact/{idContact}', 'ContactoController@update');
Route::middleware('api')->post('/newContact', 'ContactoController@store');
Route::middleware('api')->delete('/deleteContact/{idContact}', 'ContactoController@destroy');

Route::middleware('api')->get('/phones/{idContact}', 'TelefonoController@indexOf');
Route::middleware('api')->get('/getPhone/{idPhone}', 'TelefonoController@show');
Route::middleware('api')->post('/updatePhone/{idPhone}', 'TelefonoController@update');
Route::middleware('api')->post('/newPhone', 'TelefonoController@store');
Route::middleware('api')->delete('/deletePhone/{idPhone}', 'TelefonoController@destroy');

Route::middleware('api')->get('/emails/{idContact}', 'EmailController@indexOf');
Route::middleware('api')->get('/email/{idEmail}', 'EmailController@show');
Route::middleware('api')->post('/updateEmail/{idEmail}', 'EmailController@update');
Route::middleware('api')->post('/newEmail', 'EmailController@store');
Route::middleware('api')->delete('/deleteEmail/{idEmail}', 'EmailController@destroy');