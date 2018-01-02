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

Route::get('/', function () {
    return redirect()->route('dosen.index');
});

Route::resource('dosen', 'DosenController');
Route::resource('matkul', 'MatakuliahController');
Route::resource('hari', 'HariController');
Route::resource('jam', 'JamController');
Route::resource('kelas', 'KelasController');
Route::resource('pengampu', 'PengampuController');
Route::resource('ruangan', 'RuanganController');
Route::resource('tahun-ajaran', 'TahunAjaranController');

Route::resource('ketentuan-dosen', 'KetentuanDosenController');
Route::resource('ketentuan-ruangan', 'KetentuanRuanganController');
Route::resource('ketentuan-matkul', 'KetentuanMatkulController');

Route::group(['prefix'=>'penjadwalan'], function(){
    Route::get('/', 'PenjadwalanController@index')->name('penjadwalan.index');
    Route::post('/genetika', 'PenjadwalanController@penjadwalan')->name('penjadwalan.post');
});


