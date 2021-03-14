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

    
        Route::get('/siswa','SiswaController@index');

      
        Route::get('/wali','SiswaController@indexwali');
        Route::get('/siswa/create','SiswaController@create');
        Route::post('/siswa/store','SiswaController@store');
        Route::get('/siswa/{uuid}/show','SiswaController@show');
        Route::get('/siswa/{uuid}/edit','SiswaController@edit');
        Route::post('/siswa/{uuid}/update','SiswaController@update');
        Route::get('/siswa/{uuid}/destroy','SiswaController@destroy');

        Route::get('/pointsiswa','PointSiswaController@index');
        Route::get('/pointsiswa/{uuid}/show','PointSiswaController@show');

        Route::get('/kelas','KelasController@index');
        Route::post('/kelas/store','KelasController@store');
        Route::get('/kelas/{uuid}/edit','KelasController@edit');
        Route::get('/kelas/{uuid}/show','KelasController@show');
        Route::post('/kelas/{uuid}/update','KelasController@update');
        Route::get('/kelas/{uuid}/destroy','KelasController@destroy');

        Route::get('/guru','GuruController@index');
        Route::post('/guru/store','GuruController@store');
        Route::get('/guru/{uuid}/edit','GuruController@edit');
        Route::post('/guru/{uuid}/update','GuruController@update');
        Route::get('/guru/{uuid}/destroy','GuruController@destroy');

        Route::get('/point','PointController@index');
        Route::post('/point/store','PointController@store');
        Route::get('/point/{uuid}/edit','PointController@edit');
        Route::post('/point/{uuid}/update','PointController@update');
        Route::get('/point/{uuid}/destroy','PointController@destroy');

        Route::get('/konsultasi','KonsultasiController@index');
        Route::post('/konsultasi/store','KonsultasiController@store');
        Route::get('/konsultasi/{uuid}/edit','KonsultasiController@edit');
        Route::post('/konsultasi/{uuid}/update','KonsultasiController@update');
        Route::get('/konsultasi/{uuid}/destroy','KonsultasiController@destroy');
        Route::get('/konsultasi/{uuid}/show','KonsultasiController@show');

        Route::get('/pelanggaran','PelanggaranController@index');
        Route::post('/pelanggaran/store','PelanggaranController@store');
        Route::get('/pelanggaran/{uuid}/show','PelanggaranController@show');
        Route::get('/pelanggaran/{uuid}/edit','PelanggaranController@edit');
        Route::post('/pelanggaran/{uuid}/update','PelanggaranController@update');
        Route::get('/pelanggaran/{uuid}/destroy','PelanggaranController@destroy');
        Route::get('/pelanggaran/filter/uraian','PelanggaranController@filter');
        Route::get('/pelanggaran/filter/waktu','PelanggaranController@filterwaktu');

        Route::get('/prestasi','PrestasiController@index');
        Route::post('/prestasi/store','PrestasiController@store');
        Route::get('/prestasi/{uuid}/show','PrestasiController@show');
        Route::get('/prestasi/{uuid}/edit','PrestasiController@edit');
        Route::post('/prestasi/{uuid}/update','PrestasiController@update');
        Route::get('/prestasi/{uuid}/destroy','PrestasiController@destroy');
        Route::get('/prestasi/filter/uraian','PrestasiController@filter');
        Route::get('/prestasi/filter/waktu','PrestasiController@filterwaktu');

        // route report

        Route::get('/report','ReportController@index');

        Route::get('/siswa/cetak','ReportController@siswaAll');
        Route::get('/siswa/{uuid}/kartu','ReportController@siswaKartu');

        Route::get('/pointsiswa/{uuid}/cetak','ReportController@pointSiswa');

        Route::get('/pelanggaran/cetak','ReportController@pelanggaranAll');
        Route::get('/pelanggaran/{uuid}/cetak','ReportController@pelanggaran');
        Route::post('/pelanggaran/filter/uraian/cetak','ReportController@pelanggaranfilter');
        Route::post('/pelanggaran/filter/waktu/cetak','ReportController@pelanggaranfilterwaktu');

        Route::get('/prestasi/cetak','ReportController@prestasiAll');
        Route::get('/prestasi/{uuid}/cetak','ReportController@prestasi');
        Route::post('/prestasi/filter/uraian/cetak','ReportController@prestasifilter');
        Route::post('/prestasi/filter/waktu/cetak','ReportController@prestasifilterwaktu');


        Route::get('/wali/cetak','ReportController@waliAll');

        Route::get('/guru/cetak','ReportController@guruAll');

        Route::get('/kelas/{uuid}/cetak','ReportController@kelas');

        Route::get('/konsultasi/cetak','ReportController@konsultasiAll');
        Route::get('/konsultasi/{uuid}/cetak','ReportController@konsultasi');

});


Route::group(['middleware' => ['auth','CheckRole:1,2']], function(){

    Route::get('/dashboard','DashboardController@index');

    
    Route::get('/pegawai/{uuid}/show','PegawaiController@show');
    
    Route::get('/pegawai/{uuid}/edit','PegawaiController@edit');
    Route::post('/pegawai/{uuid}/update','PegawaiController@update');
    Route::get('/gantipassword/{uuid}','LoginController@edit');
    Route::post('/gantipassword/{uuid}/update','LoginController@update');

    Route::post('/absen','AbsenController@absen');
    
});