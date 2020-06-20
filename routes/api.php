<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::get('sungai','Api\SungaiRTController@index');
Route::post('sungai/create','Api\SungaiRTController@store');
//Route::get('sungai/{id}','Api\SungaiRTController@show');
Route::put('sungai/{id}','Api\SungaiRTController@update');

Route::post('register','RegisterController@create');

//Route::get('debittumpah/{id}','Api\DebitTumpahRTController@show');
Route::put('debittumpah/{id}','Api\DebitTumpahRTController@update');
Route::post('debittumpah/create','Api\DebitTumpahRTController@store');

Route::post('report/create','Api\ReportController@store');
Route::get('report/monthnow','Api\ReportController@monthnow');
Route::get('report/daynow','Api\ReportController@daynow');


