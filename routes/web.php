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
Route::get('/profil','UserController@profil')->name('profil');
Route::get('/pengguna','UserController@pengguna')->name('pengguna');
Route::get('/kelas','KelasController@kelas')->name('kelas');
Route::get('/kelas/{kelas}','KelasController@detailKelas')->name('detailKelas');
Route::get('/kelas/{kelas}/materiVideo','MateriController@materiVideo')->name('materiVideo');
Route::get('/kelas/{kelas}/materiAudio','MateriController@materiAudio')->name('materiAudio');
Route::get('/kelas/{kelas}/materiTekstual','MateriController@materiTekstual')->name('materiTekstual');
Route::get('/kelas/{kelas}/{materi}','MateriController@detailMateri')->name('detailMateri');
Route::get('/obrolan','ObrolanController@obrolan')->name('obrolan');

Route::get('/detailUser','AdminController@detailUser')->name('detailUser');

Route::post('/editProfil','UserController@editProfil')->name('editProfil');
Route::post('/editStatus','UserController@editStatus')->name('editStatus');
Route::post('/editKelas','KelasController@editKelas')->name('editKelas');
Route::post('/editStatusMateri','MateriController@editStatusMateri')->name('editStatusMateri');
Route::post('/editMateri','MateriController@editMateri')->name('editMateri');

Route::post('/kelasStore','KelasController@kelasStore')->name('kelasStore');
Route::post('/kelasuserStore','KelasController@kelasuserStore')->name('kelasuserStore');
Route::post('/pengumumanStore','PengumumanController@pengumumanStore')->name('pengumumanStore');
Route::post('/pesanStore','ObrolanController@pesanStore')->name('pesanStore');
Route::post('/materiVideoStore','MateriController@materiVideoStore')->name('materiVideoStore');
Route::post('/materiAudioStore','MateriController@materiAudioStore')->name('materiAudioStore');
Route::post('/materiTekstualStore','MateriController@materiTekstualStore')->name('materiTekstualStore');
Route::post('/komentarStore','KomentarController@komentarStore')->name('komentarStore');

Route::delete('/hapusKelas','KelasController@hapusKelas')->name('hapusKelas');

Route::get('/changePassword','UserController@showChangePasswordForm');
Route::post('/changePassword','UserController@changePassword')->name('changePassword');