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
Route::get('/laporan','AdminController@laporan')->name('laporan');
Route::get('/livecode','AdminController@livecode')->name('livecode');
Route::get('/laporan/user','AdminController@laporanUser')->name('laporanUser');
Route::get('/laporan/kelas','AdminController@laporanKelas')->name('laporanKelas');
Route::get('/laporan/materi','AdminController@laporanMateri')->name('laporanMateri');
Route::get('/laporan/tugas','AdminController@laporanTugas')->name('laporanTugas');
Route::get('/laporan/pengumuman','AdminController@laporanPengumuman')->name('laporanPengumuman');
Route::get('/laporan/komentar','AdminController@laporanKomentar')->name('laporanKomentar');
Route::get('/kelas','KelasController@kelas')->name('kelas');
Route::get('/kelas/{kelas}','KelasController@detailKelas')->name('detailKelas');
Route::get('/kelas/{kelas}/learningPath','TugasController@learningPath')->name('learningPath');
Route::get('/kelas/{kelas}/learningPath/{tugas}','TugasController@detailLearningPath')->name('detailLearningPath');
Route::get('/kelas/{kelas}/materiVideo','MateriController@materiVideo')->name('materiVideo');
Route::get('/kelas/{kelas}/materiAudio','MateriController@materiAudio')->name('materiAudio');
Route::get('/kelas/{kelas}/materiTekstual','MateriController@materiTekstual')->name('materiTekstual');
Route::get('/kelas/{kelas}/materiGithub','MateriController@materiGithub')->name('materiGithub');
Route::get('/kelas/{kelas}/{materi}','MateriController@detailMateri')->name('detailMateri');
Route::get('/kelas/{kelas}/tugas/{tugas}','TugasController@detailTugas')->name('detailTugas');
Route::get('/kelas/{kelas}/tugas/{tugas}/chartTugas','AdminController@chartTugas')->name('chartTugas');
Route::get('/kelas/{kelas}/tugas/{tugas}/{tugasuser}','TugasController@detailTugasuser')->name('detailTugasuser');
Route::get('/obrolan','ObrolanController@obrolan')->name('obrolan');
Route::get('/obrolan/{obrolan}','ObrolanController@detailObrolan')->name('detailObrolan');
Route::get('/kelas/{kelas}/live/{livestream}','LivestreamController@detailLivestream')->name('detailLivestream');

Route::post('/editProfil','UserController@editProfil')->name('editProfil');
Route::post('/editStatus','UserController@editStatus')->name('editStatus');
Route::post('/editKelas','KelasController@editKelas')->name('editKelas');
Route::post('/editStatusMateri','MateriController@editStatusMateri')->name('editStatusMateri');
Route::post('/editMateri','MateriController@editMateri')->name('editMateri');
Route::post('/editPengumuman','PengumumanController@editPengumuman')->name('editPengumuman');
Route::post('/editLivestream','LivestreamController@editLivestream')->name('editLivestream');
Route::post('/editKomentar','KomentarController@editKomentar')->name('editKomentar');
Route::post('/editTugas','TugasController@editTugas')->name('editTugas');
Route::post('/editNilai','TugasController@editNilai')->name('editNilai');

Route::post('/kelasStore','KelasController@kelasStore')->name('kelasStore');
Route::post('/kelasuserStore','KelasController@kelasuserStore')->name('kelasuserStore');
Route::post('/tugasuserStore','TugasController@tugasuserStore')->name('tugasuserStore');
Route::post('/pengumumanStore','PengumumanController@pengumumanStore')->name('pengumumanStore');
Route::post('/tugasStore','TugasController@tugasStore')->name('tugasStore');
Route::post('/pesanStore','ObrolanController@pesanStore')->name('pesanStore');
Route::post('/materiStore','MateriController@materiStore')->name('materiStore');
Route::post('/materiVideoStore','MateriController@materiVideoStore')->name('materiVideoStore');
Route::post('/materiAudioStore','MateriController@materiAudioStore')->name('materiAudioStore');
Route::post('/materiTekstualStore','MateriController@materiTekstualStore')->name('materiTekstualStore');
Route::post('/materiGithubStore','MateriController@materiGithubStore')->name('materiGithubStore');
Route::post('/komentarStore','KomentarController@komentarStore')->name('komentarStore');
Route::post('/livestreamStore','livestreamController@livestreamStore')->name('livestreamStore');

Route::delete('/hapusKelas','KelasController@hapusKelas')->name('hapusKelas');
Route::delete('/hapusKelasuser','KelasController@hapusKelasuser')->name('hapusKelasuser');
Route::delete('/hapusMateri','MateriController@hapusMateri')->name('hapusMateri');
Route::delete('/hapusTugasuser','TugasController@hapusTugasuser')->name('hapusTugasuser');
Route::delete('/hapusPengumuman','PengumumanController@hapusPengumuman')->name('hapusPengumuman');
Route::delete('/hapusLivestream','LivestreamController@hapusLivestream')->name('hapusLivestream');
Route::delete('/hapusPengguna','UserController@hapusPengguna')->name('hapusPengguna');
Route::delete('/hapusKomentar','KomentarController@hapusKomentar')->name('hapusKomentar');
Route::delete('/hapusPesan','ObrolanController@hapusPesan')->name('hapusPesan');
Route::delete('/hapusTugas','TugasController@hapusTugas')->name('hapusTugas');

Route::get('/changePassword','UserController@showChangePasswordForm');
Route::post('/changePassword','UserController@changePassword')->name('changePassword');

Route::get('/dynamic_pdfUser','AdminController@indexUserPDF')->name('UserPDF');
Route::get('/dynamic_pdf/pdfUser','AdminController@pdfUserPDF')->name('UserPDF');
Route::get('/dynamic_pdfKelas','AdminController@indexKelasPDF')->name('KelasPDF');
Route::get('/dynamic_pdf/pdfKelas','AdminController@pdfKelasPDF')->name('KelasPDF');
Route::get('/dynamic_pdfMateri','AdminController@indexMateriPDF')->name('MateriPDF');
Route::get('/dynamic_pdf/pdfMateri','AdminController@pdfMateriPDF')->name('MateriPDF');
Route::get('/dynamic_pdfTugas','AdminController@indexTugasPDF')->name('TugasPDF');
Route::get('/dynamic_pdf/pdfTugas','AdminController@pdfTugasPDF')->name('TugasPDF');
Route::get('/dynamic_pdfPengumuman','AdminController@indexPengumumanPDF')->name('PengumumanPDF');
Route::get('/dynamic_pdf/pdfPengumuman','AdminController@pdfPengumumanPDF')->name('PengumumanPDF');
Route::get('/dynamic_pdfKomentar','AdminController@indexKomentarPDF')->name('KomentarPDF');
Route::get('/dynamic_pdf/pdfKomentar','AdminController@pdfKomentarPDF')->name('KomentarPDF');