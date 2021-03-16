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

Route::get('/login','LoginController@index')->name('login');
Route::post('/postlogin','LoginController@postlogin');
Route::get('/logout','LoginController@logout');


Route::group(['middleware' => ['auth','CheckRole:1']], function(){


    Route::get('/', function () {
        return view('backend.master');
    });
    
    Route::get('/jabatan','JabatanController@index');
    Route::get('/jabatan/create','JabatanController@create');
    Route::post('/jabatan/store','JabatanController@store');
    Route::get('/jabatan/{uuid}/show','JabatanController@show');
    Route::get('/jabatan/{uuid}/edit','JabatanController@edit');
    Route::post('/jabatan/{uuid}/update','JabatanController@update');
    Route::get('/jabatan/{uuid}/destroy','JabatanController@destroy');

    
    Route::get('/pegawai','PegawaiController@index');
    Route::get('/pegawai/create','PegawaiController@create');
    Route::post('/pegawai/store','PegawaiController@store');
    Route::get('/pegawai/{uuid}/destroy','PegawaiController@destroy');


});


Route::group(['middleware' => ['auth','CheckRole:1,2']], function(){

    Route::get('/dashboard','DashboardController@index');

    
    Route::get('/pegawai/{uuid}/show','PegawaiController@show');
    
    Route::get('/pegawai/{uuid}/edit','PegawaiController@edit');
    Route::post('/pegawai/{uuid}/update','PegawaiController@update');
    Route::get('/gantipassword/{uuid}','LoginController@edit');
    Route::post('/gantipassword/{uuid}/update','LoginController@update');

    Route::post('/absen','AbsenController@absen');
    
    Route::get('/absen/cetak/daynow','ReportController@absendaynow');
    Route::get('/pegawai/cetak','ReportController@pegawaiAll');

    Route::get('/pegawai/{uuid}/cetak/kartu','ReportController@pegawaiKartu');
    
});