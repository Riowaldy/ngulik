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
Route::get('/kelas/{kelas}/materiVideo','AdminController@materiVideo')->name('materiVideo');
Route::get('/kelas/{kelas}/materiAudio','AdminController@materiAudio')->name('materiAudio');
Route::get('/kelas/{kelas}/materiTekstual','AdminController@materiTekstual')->name('materiTekstual');
Route::get('/kelas/{kelas}/{materi}','AdminController@detailMateri')->name('detailMateri');
Route::get('/obrolan','AdminController@obrolan')->name('obrolan');

Route::get('/detailUser','AdminController@detailUser')->name('detailUser');

Route::post('/editProfil','AdminController@editProfil')->name('editProfil');
Route::post('/editStatus','AdminController@editStatus')->name('editStatus');
Route::post('/editKelas','AdminController@editKelas')->name('editKelas');
Route::post('/editStatusMateri','AdminController@editStatusMateri')->name('editStatusMateri');
Route::post('/editMateri','AdminController@editMateri')->name('editMateri');

Route::post('/kelasStore','AdminController@kelasStore')->name('kelasStore');
Route::post('/kelasuserStore','AdminController@kelasuserStore')->name('kelasuserStore');
Route::post('/pengumumanStore','AdminController@pengumumanStore')->name('pengumumanStore');
Route::post('/pesanStore','AdminController@pesanStore')->name('pesanStore');
Route::post('/materiVideoStore','AdminController@materiVideoStore')->name('materiVideoStore');
Route::post('/materiAudioStore','AdminController@materiAudioStore')->name('materiAudioStore');
Route::post('/materiTekstualStore','AdminController@materiTekstualStore')->name('materiTekstualStore');
Route::post('/komentarStore','AdminController@komentarStore')->name('komentarStore');

Route::delete('/hapusKelas','AdminController@hapusKelas')->name('hapusKelas');

Route::get('/changePassword','AdminController@showChangePasswordForm');
Route::post('/changePassword','AdminController@changePassword')->name('changePassword');