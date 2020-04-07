<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function (){
    Route::get('logout','Auth\LoginController@logout')->name('admin.logout');

    Route::resource('dashboard','DashboardController');
    Route::get('/sungai','ReportController@sungai')->name('sungai');
    Route::get('/debittumpah','ReportController@debittumpah')->name('debittumpah');
    Route::get('/report','ReportController@index')->name('report');


});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
