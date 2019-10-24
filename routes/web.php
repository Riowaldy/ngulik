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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profil','AdminController@profil')->name('profil');
Route::get('/pengguna','AdminController@pengguna')->name('pengguna');
Route::get('/kelas','AdminController@kelas')->name('kelas');
Route::get('/kelas/{kelas}','AdminController@detailKelas')->name('detailKelas');
Route::get('/materi','AdminController@materi')->name('materi');
Route::get('/materi/{detail}','AdminController@detailMateri')->name('detailMateri');

Route::post('/editProfil','AdminController@editProfil')->name('editProfil');
Route::post('/editStatus','AdminController@editStatus')->name('editStatus');
Route::post('/editKelas','AdminController@editKelas')->name('editKelas');

Route::post('/kelasStore','AdminController@kelasStore')->name('kelasStore');

Route::delete('/hapusKelas','AdminController@hapusKelas')->name('hapusKelas');

Route::get('/changePassword','AdminController@showChangePasswordForm');
Route::post('/changePassword','AdminController@changePassword')->name('changePassword');