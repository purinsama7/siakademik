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
    return view('auths.login');
});

//login
Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');


Route::group(['middleware' => 'auth'], function () {
    //Route Data Siswa
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/siswa', 'SiswaController@index');
    Route::post('/siswa/create', 'SiswaController@create');
    Route::get('/siswa/{id}/edit','SiswaController@edit');
    Route::post('/siswa/{id}/update', 'SiswaController@update');
    Route::get('/siswa/{id}/delete','SiswaController@delete');
    Route::get('/siswa/{id}/profile','SiswaController@profile');
    Route::get('/siswa/cetak_pdf', 'SiswaController@cetak_pdf');
    Route::get('/siswa/export_excel', 'SiswaController@export_excel');
    Route::post('/siswa/import_excel', 'SiswaController@import_excel');

    //Route Data Kepsek
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/kepsek', 'KepsekController@index');
    Route::post('/kepsek/create', 'KepsekController@create');
    Route::get('/kepsek/{id}/edit','KepsekController@edit');
    Route::post('/kepsek/{id}/update', 'KepsekController@update');
    Route::get('/kepsek/{id}/delete','KepsekController@delete');
    Route::get('/kepsek/{id}/profile','KepsekController@profile');

    //Route Data Guru
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/guru', 'GuruController@index');
    Route::post('/guru/create', 'GuruController@create');
    Route::get('/guru/{id}/edit','GuruController@edit');
    Route::post('/guru/{id}/update', 'GuruController@update');
    Route::get('/guru/{id}/delete','GuruController@delete');
    Route::get('/guru/{id}/profile','GuruController@profile');
    Route::get('/guru/cetak_pdf', 'GuruController@cetak_pdf');
    Route::get('/guru/export_excel', 'GuruController@export_excel');
    Route::post('/guru/import_excel', 'GuruController@import_excel');

    //Route Data TU
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/tu', 'TUController@index');
    Route::post('/tu/create', 'TUController@create');
    Route::get('/tu/{id}/edit','TUController@edit');
    Route::post('/tu/{id}/update', 'TUController@update');
    Route::get('/tu/{id}/delete','TUController@delete');
    Route::get('/tu/{id}/profile','TUController@profile');

    //Route Mapel
    Route::get('/mapel', 'MapelController@index');
    Route::post('/mapel/create', 'MapelController@create');
    Route::get('/mapel/{id}/edit','MapelController@edit');
    Route::post('/mapel/{id}/update', 'MapelController@update');
    Route::get('/mapel/{id}/delete','MapelController@delete');

    //Route kelas
    Route::get('/kelas', 'KelasController@index');
    Route::post('/kelas/create', 'KelasController@create');
    Route::get('/kelas/{id}/edit','KelasController@edit');
    Route::post('/kelas/{id}/update', 'KelasController@update');
    Route::get('/kelas/{id}/delete','KelasController@delete');

    //Route tahun
    Route::get('/tahun', 'TahunController@index');
    Route::post('/tahun/create', 'TahunController@create');
    Route::get('/tahun/{id}/edit','TahunController@edit');
    Route::post('/tahun/{id}/update', 'TahunController@update');
    Route::get('/tahun/{id}/delete','TahunController@delete');

    //Route info
    Route::get('/info', 'InfoController@index');
    Route::post('/info/create', 'InfoController@create');
    Route::get('/info/{id}/edit','InfoController@edit');
    Route::post('/info/{id}/update', 'InfoController@update');
    Route::get('/info/{id}/delete','InfoController@delete');

    //Route nilai Pengetahuan
    Route::get('/nilai','NilaiController@index')->name('index');
    Route::get('/nilai/{id}','NilaiController@nilai')->name('nilai');
    Route::post('/nilai/create', 'NilaiController@create');
    Route::post('/nilai/get-nilai', 'NilaiController@getNilai');
    Route::get('/nilai/{id}/edit','NilaiController@edit');
    Route::post('/nilai/{id}/update', 'NilaiController@update');
    Route::get('/nilai/{id}/delete','NilaiController@delete');

    //Route nilai Keterampilan
    Route::get('/ketram','KetramController@index')->name('index');
    Route::get('/ketram/{id}','KetramController@Ketram');
    Route::post('/ketram/create', 'KetramController@create');
    Route::post('/ketram/cek_nilai', 'KetramController@cek_nilai');
    Route::get('/ketram/{id}/edit','KetramController@edit');
    Route::post('/ketram/{id}/update', 'KetramController@update');
    Route::get('/ketram/{id}/delete','KetramController@delete');
});
