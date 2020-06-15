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

Route::get('sungai','SungaiRTController@index');
Route::post('sungai/create','SungaiRTController@store');
Route::get('sungai/{id}','SungaiRTController@show');
Route::put('sungai/{id}','SungaiRTController@update');

Route::get('debittumpah/{id}','DebitTumpahRTController@show');
Route::put('debittumpah/{id}','DebitTumpahRTController@update');
Route::post('debittumpah/create','DebitTumpahRTController@store');

Route::post('report/create','ReportController@store');
Route::get('report/monthnow','ReportController@monthnow');
Route::get('report/daynow','ReportController@daynow');


