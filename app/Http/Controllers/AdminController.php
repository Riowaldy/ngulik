<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Kelas;
use App\Materi;
use App\Kelasuser;
use App\Pengumuman;
use App\Obrolan;
use App\Komentar;
use App\Livestream;
use App\Tugas;
use App\Tugasuser;
use DB;
use PDF;

class AdminController extends Controller
{

    public function livecode(){
        return view('livecode');
    }
	public function laporan(){

        $kelass = Kelas::selectKelas();
        $users = User::selectUser();
        $materis = Materi::selectMateri();
        $pengumumans = Pengumuman::selectPengumuman();
        $komentars = Komentar::selectKomentar();

        return view('laporan', compact('kelass'));
    }

    public function laporanUser(){

        $users = User::where('status','!=','admin')->orderBy('status')->paginate(10);
        $users2 = User::selectUser()->where('status','!=','admin')->count();

        return view('laporanUser', compact('users','users2'));
    }

    public function laporanKelas(){

        $kelass = Kelas::orderBy('user_id')->paginate(10);
        $kelass2 = Kelas::selectKelas()->count();

        return view('laporanKelas', compact('kelass','kelass2'));
    }

    public function laporanMateri(){

        $materis = Materi::orderBy('jenis')->paginate(10);
        $materis2 = Materi::selectMateri()->count();

        return view('laporanMateri', compact('materis','materis2'));
    }

    public function laporanTugas(){

        $tugass = DB::table('tugasusers')
                ->select('tugasusers.id','tugasusers.tugas_id','tugasusers.user_id','tugasusers.nilai','tugass.judul','users.nama')
                ->orderBy('nilai')
                ->join('tugass','tugass.id', '=', 'tugasusers.tugas_id')
                ->join('users','users.id', '=', 'tugasusers.user_id')
                ->paginate(10);
        $tugass2 = Tugasuser::selectTugasuser()->count();

        return view('laporanTugas', compact('tugass','tugass2'));
    }

    public function chartTugas(Kelas $kelas, Tugas $tugas){
        $tugass = DB::table('tugasusers')
            ->select('tugasusers.nilai','tugasusers.tugas_id','tugass.judul','users.nama')
            ->join('tugass','tugass.id', '=', 'tugasusers.tugas_id')
            ->join('users','users.id', '=', 'tugasusers.user_id')
            ->where('tugasusers.tugas_id',$tugas->id)
            ->get();
        $categories = [];
        $nilai = [];
        $judul = [];
        foreach ($tugass as $tugas) {
            $categories[] = $tugas->nama;
            $nilai[] = $tugas->nilai;
            $judul[0] = $tugas->judul;
        }
        return view('chartTugas', compact('tugass','categories','nilai','judul'));
    }

    public function laporanPengumuman(){

        $pengumumans = DB::table('pengumumans')
                ->select('pengumumans.id','pengumumans.kelas_id','pengumumans.user_id','pengumumans.nama','kelass.nama as namakelas','users.nama as namauser')
                ->orderBy('namakelas')
                ->join('kelass','kelass.id', '=', 'pengumumans.kelas_id')
                ->join('users','users.id', '=', 'pengumumans.user_id')
                ->paginate(10);
        $pengumumans2 = Pengumuman::selectPengumuman()->count();

        return view('laporanPengumuman', compact('pengumumans','pengumumans2'));
    }

    public function laporanKomentar(){

        $komentars = DB::table('komentars')
                ->select('komentars.id','komentars.materi_id','komentars.user_id','komentars.isikomentar','materis.nama as namamateri','users.nama as namauser')
                ->orderBy('namamateri')
                ->join('materis','materis.id', '=', 'komentars.materi_id')
                ->join('users','users.id', '=', 'komentars.user_id')
                ->paginate(10);
        $komentars2 = Komentar::selectKomentar()->count();

        return view('laporanKomentar', compact('komentars','komentars2'));
    }

    // METHOD CETAK PDF USER
    function indexUserPDF()
    {
        $users = $this->get_post_data_user();
        return view('dynamic_pdf')->with('users', $users);
    }

    function get_post_data_user()
    {
        $users = User::selectUser()->where('status','!=','admin');
        return $users;
    }

    function get_post_data_user2()
    {
        $users2 = User::selectUser()->where('status','!=','admin')->count();
        return $users2;
    }

    function pdfUserPDF()
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_post_data_user_to_html());
        return $pdf->stream();
    }

    function convert_post_data_user_to_html()
    {
        $users = $this->get_post_data_user();
        $users2 = $this->get_post_data_user2();
        $output = '
        <div style="margin-bottom:20px; height:100px; width:100px;"><img style="height:100px; width:100px;" src="img/upn.png"></div>
        <div style="position:absolute; margin-bottom:20px; margin-left:120px; height:100px; width:460px; text-align:center;">
            <div><h3>HIMPUNAN MAHASISWA SISTEM INFORMASI</h3></div>
            <div><h3>UPN VETERAN JAWA TIMUR</h3></div>
        </div>
        <div style="position:absolute; margin-bottom:20px; margin-left:600px; height:100px; width:100px;"><img style="height:100px; width:100px;" src="img/himasifo.png"></div>

        <div style="background-color:black; height: 4px;"></div>
        <h3 align="center">Laporan Data User</h3>
        <h4>Jumlah User : '.$users2.'</h4>
        <table width="100%" style="border-collapse: collapse; border: 0px;">
            <tr style="background-color:#1255ff;">
                <th style="border: 1px solid; padding:12px; text-align:center;" width="15%">Nama</th>
                <th style="border: 1px solid; padding:12px; text-align:center;" width="7%">Status</th>
                <th style="border: 1px solid; padding:12px; text-align:center;" width="20%">Email</th>
            </tr>
        ';  
        foreach($users as $user)
        {
            $output .= '
            <tr>
                <td style="border: 1px solid; padding:12px; text-align:center;">'.$user->nama.'</td>
                <td style="border: 1px solid; padding:12px; text-align:center;">'.$user->status.'</td>
                <td style="border: 1px solid; padding:12px; text-align:center;">'.$user->email.'</td>
            </tr>
            ';
        }
        $output .= '</table>
        <div style="margin-top:20px; margin-left:400px; height:100px; width:300px; text-align:center;;">
            <h4>Mengetahui,</h4>
        </div>
        <div style="margin-top:40px; margin-left:400px; height:100px; width:300px; text-align:center;">
            <h4>Kepala Departemen Litbang</h4>
        </div>
        ';
        return $output;
    }
    // AKHIR METHOD CETAK PDF USER

    // METHOD CETAK PDF KELAS
    function indexKelasPDF()
    {
        $kelass = $this->get_post_data_kelas();
        return view('dynamic_pdf')->with('kelass', $kelass);
    }

    function get_post_data_kelas()
    {
        $kelass = Kelas::selectKelas();
        return $kelass;
    }

    function get_post_data_kelas2()
    {
        $kelass2 = Kelas::selectKelas()->count();
        return $kelass2;
    }

    function pdfKelasPDF()
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_post_data_kelas_to_html());
        return $pdf->stream();
    }

    function convert_post_data_kelas_to_html()
    {
        $kelass = $this->get_post_data_kelas();
        $kelass2 = $this->get_post_data_kelas2();
        $output = '
        <div style="margin-bottom:20px; height:100px; width:100px;"><img style="height:100px; width:100px;" src="img/upn.png"></div>
        <div style="position:absolute; margin-bottom:20px; margin-left:120px; height:100px; width:460px; text-align:center;">
            <div><h3>HIMPUNAN MAHASISWA SISTEM INFORMASI</h3></div>
            <div><h3>UPN VETERAN JAWA TIMUR</h3></div>
        </div>
        <div style="position:absolute; margin-bottom:20px; margin-left:600px; height:100px; width:100px;"><img style="height:100px; width:100px;" src="img/himasifo.png"></div>

        <div style="background-color:black; height: 4px;"></div>
        <h3 align="center">Laporan Data Kelas</h3>
        <h4>Jumlah Kelas : '.$kelass2.'</h4>
        <table width="100%" style="border-collapse: collapse; border: 0px;">
            <tr style="background-color:#1255ff;">
                <th style="border: 1px solid; padding:12px; text-align:center;" width="20%">Nama Kelas</th>
                <th style="border: 1px solid; padding:12px; text-align:center;" width="10%">Pengajar</th>
            </tr>
        ';  
        foreach($kelass as $kelas)
        {
            $output .= '
            <tr>
                <td style="border: 1px solid; padding:12px; text-align:center;">'.$kelas->nama.'</td>
                <td style="border: 1px solid; padding:12px; text-align:center;">'.$kelas->user->nama.'</td>
            </tr>
            ';
        }
        $output .= '</table>

        <div style="margin-top:20px; margin-left:400px; height:100px; width:300px; text-align:center;;">
            <h4>Mengetahui,</h4>
        </div>
        <div style="margin-top:40px; margin-left:400px; height:100px; width:300px; text-align:center;">
            <h4>Kepala Departemen Litbang</h4>
        </div>';
        return $output;
    }
    // AKHIR METHOD CETAK PDF KELAS

    // METHOD CETAK PDF MATERI
    function indexMateriPDF()
    {
        $kelass = $this->get_post_data_materi();
        return view('dynamic_pdf')->with('materis', $materis);
    }

    function get_post_data_materi()
    {
        $materis = Materi::selectMateri();
        return $materis;
    }

    function get_post_data_materi2()
    {
        $materis2 = Materi::selectMateri()->count();
        return $materis2;
    }

    function pdfMateriPDF()
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_post_data_materi_to_html());
        return $pdf->stream();
    }

    function convert_post_data_materi_to_html()
    {
        $materis = $this->get_post_data_materi();
        $materis2 = $this->get_post_data_materi2();
        $output = '
        <div style="margin-bottom:20px; height:100px; width:100px;"><img style="height:100px; width:100px;" src="img/upn.png"></div>
        <div style="position:absolute; margin-bottom:20px; margin-left:120px; height:100px; width:460px; text-align:center;">
            <div><h3>HIMPUNAN MAHASISWA SISTEM INFORMASI</h3></div>
            <div><h3>UPN VETERAN JAWA TIMUR</h3></div>
        </div>
        <div style="position:absolute; margin-bottom:20px; margin-left:600px; height:100px; width:100px;"><img style="height:100px; width:100px;" src="img/himasifo.png"></div>

        <div style="background-color:black; height: 4px;"></div>
        <h3 align="center">Laporan Data Materi</h3>
        <h4>Jumlah Materi : '.$materis2.'</h4>
        <table width="100%" style="border-collapse: collapse; border: 0px;">
            <tr style="background-color:#1255ff;">
                <th style="border: 1px solid; padding:12px; text-align:center;" width="30%">Nama Pengirim</th>
                <th style="border: 1px solid; padding:12px; text-align:center;" width="30%">Nama Materi</th>
                <th style="border: 1px solid; padding:12px; text-align:center;" width="30%">Jenis Materi</th>
            </tr>
        ';  
        foreach($materis as $materi)
        {
            $output .= '
            <tr>
                <td style="border: 1px solid; padding:12px; text-align:center;">'.$materi->user->nama.'</td>
                <td style="border: 1px solid; padding:12px; text-align:center;">'.$materi->nama.'</td>
                <td style="border: 1px solid; padding:12px; text-align:center;">'.$materi->jenis.'</td>
            </tr>
            ';
        }
        $output .= '</table>

        <div style="margin-top:20px; margin-left:400px; height:100px; width:300px; text-align:center;;">
            <h4>Mengetahui,</h4>
        </div>
        <div style="margin-top:40px; margin-left:400px; height:100px; width:300px; text-align:center;">
            <h4>Kepala Departemen Litbang</h4>
        </div>';
        return $output;
    }
    // AKHIR METHOD CETAK PDF MATERI

    // METHOD CETAK PDF TUGAS
    function indexTugasPDF()
    {
        $kelass = $this->get_post_data_tugas();
        return view('dynamic_pdf')->with('tugass', $tugass);
    }

    function get_post_data_tugas()
    {
        $tugass = DB::table('tugasusers')
                ->select('tugasusers.id','tugasusers.tugas_id','tugasusers.user_id','tugasusers.nilai','tugass.judul','users.nama')
                ->join('tugass','tugass.id', '=', 'tugasusers.tugas_id')
                ->join('users','users.id', '=', 'tugasusers.user_id')
                ->get();
        return $tugass;
    }

    function get_post_data_tugas2()
    {
        $tugass2 = Tugasuser::selectTugasuser()->count();
        return $tugass2;
    }

    function pdfTugasPDF()
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_post_data_tugas_to_html());
        return $pdf->stream();
    }

    function convert_post_data_tugas_to_html()
    {
        $tugass = $this->get_post_data_tugas();
        $tugass2 = $this->get_post_data_tugas2();
        $output = '
        <div style="margin-bottom:20px; height:100px; width:100px;"><img style="height:100px; width:100px;" src="img/upn.png"></div>
        <div style="position:absolute; margin-bottom:20px; margin-left:120px; height:100px; width:460px; text-align:center;">
            <div><h3>HIMPUNAN MAHASISWA SISTEM INFORMASI</h3></div>
            <div><h3>UPN VETERAN JAWA TIMUR</h3></div>
        </div>
        <div style="position:absolute; margin-bottom:20px; margin-left:600px; height:100px; width:100px;"><img style="height:100px; width:100px;" src="img/himasifo.png"></div>

        <div style="background-color:black; height: 4px;"></div>
        <h3 align="center">Laporan Data Tugas</h3>
        <h4>Jumlah Tugas : '.$tugass2.'</h4>
        <table width="100%" style="border-collapse: collapse; border: 0px;">
            <tr style="background-color:#1255ff;">
                <th style="border: 1px solid; padding:12px; text-align:center;" width="30%">Nama Pengirim</th>
                <th style="border: 1px solid; padding:12px; text-align:center;" width="30%">Nama Tugas</th>
                <th style="border: 1px solid; padding:12px; text-align:center;" width="30%">Nilai</th>
            </tr>
        ';  
        foreach($tugass as $tugas)
        {
            $output .= '
            <tr>
                <td style="border: 1px solid; padding:12px; text-align:center;">'.$tugas->nama.'</td>
                <td style="border: 1px solid; padding:12px; text-align:center;">'.$tugas->judul.'</td>
                <td style="border: 1px solid; padding:12px; text-align:center;">'.$tugas->nilai.'</td>
            </tr>
            ';
        }
        $output .= '</table>
        <div style="margin-top:20px; margin-left:400px; height:100px; width:300px; text-align:center;;">
            <h4>Mengetahui,</h4>
        </div>
        <div style="margin-top:40px; margin-left:400px; height:100px; width:300px; text-align:center;">
            <h4>Kepala Departemen Litbang</h4>
        </div>';
        return $output;
    }
    // AKHIR METHOD CETAK PDF TUGAS

    // METHOD CETAK PDF PENGUMUMAN
    function indexPengumumanPDF()
    {
        $kelass = $this->get_post_data_pengumuman();
        return view('dynamic_pdf')->with('pengumumans', $pengumumans);
    }

    function get_post_data_pengumuman()
    {
        $pengumumans = DB::table('pengumumans')
                ->select('pengumumans.id','pengumumans.kelas_id','pengumumans.user_id','pengumumans.nama','kelass.nama as namakelas','users.nama as namauser')
                ->join('kelass','kelass.id', '=', 'pengumumans.kelas_id')
                ->join('users','users.id', '=', 'pengumumans.user_id')
                ->get();
        return $pengumumans;
    }

    function get_post_data_pengumuman2()
    {
        $pengumumans2 = Pengumuman::selectPengumuman()->count();
        return $pengumumans2;
    }

    function pdfPengumumanPDF()
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_post_data_pengumuman_to_html());
        return $pdf->stream();
    }

    function convert_post_data_pengumuman_to_html()
    {
        $pengumumans = $this->get_post_data_pengumuman();
        $pengumumans2 = $this->get_post_data_pengumuman2();
        $output = '
        <div style="margin-bottom:20px; height:100px; width:100px;"><img style="height:100px; width:100px;" src="img/upn.png"></div>
        <div style="position:absolute; margin-bottom:20px; margin-left:120px; height:100px; width:460px; text-align:center;">
            <div><h3>HIMPUNAN MAHASISWA SISTEM INFORMASI</h3></div>
            <div><h3>UPN VETERAN JAWA TIMUR</h3></div>
        </div>
        <div style="position:absolute; margin-bottom:20px; margin-left:600px; height:100px; width:100px;"><img style="height:100px; width:100px;" src="img/himasifo.png"></div>

        <div style="background-color:black; height: 4px;"></div>
        <h3 align="center">Laporan Data Pengumuman</h3>
        <h4>Jumlah Pengumuman : '.$pengumumans2.'</h4>
        <table width="100%" style="border-collapse: collapse; border: 0px;">
            <tr style="background-color:#1255ff;">
                <th style="border: 1px solid; padding:12px; text-align:center;" width="30%">Nama Pengirim</th>
                <th style="border: 1px solid; padding:12px; text-align:center;" width="30%">Nama Kelas</th>
                <th style="border: 1px solid; padding:12px; text-align:center;" width="30%">Judul Pengumuman</th>
            </tr>
        ';  
        foreach($pengumumans as $pengumuman)
        {
            $output .= '
            <tr>
                <td style="border: 1px solid; padding:12px; text-align:center;">'.$pengumuman->namauser.'</td>
                <td style="border: 1px solid; padding:12px; text-align:center;">'.$pengumuman->namakelas.'</td>
                <td style="border: 1px solid; padding:12px; text-align:center;">'.$pengumuman->nama.'</td>
            </tr>
            ';
        }
        $output .= '</table>
        <div style="margin-top:20px; margin-left:400px; height:100px; width:300px; text-align:center;;">
            <h4>Mengetahui,</h4>
        </div>
        <div style="margin-top:40px; margin-left:400px; height:100px; width:300px; text-align:center;">
            <h4>Kepala Departemen Litbang</h4>
        </div>';
        return $output;
    }
    // AKHIR METHOD CETAK PDF PENGUMUMAN

    // METHOD CETAK PDF KOMENTAR
    function indexKomentarPDF()
    {
        $kelass = $this->get_post_data_komentar();
        return view('dynamic_pdf')->with('komentars', $komentars);
    }

    function get_post_data_komentar()
    {
        $komentars = DB::table('komentars')
                ->select('komentars.id','komentars.materi_id','komentars.user_id','komentars.isikomentar','materis.nama as namamateri','users.nama as namauser')
                ->join('materis','materis.id', '=', 'komentars.materi_id')
                ->join('users','users.id', '=', 'komentars.user_id')
                ->get();
        return $komentars;
    }

    function get_post_data_komentar2()
    {
        $komentars2 = Komentar::selectKomentar()->count();
        return $komentars2;
    }

    function pdfKomentarPDF()
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_post_data_komentar_to_html());
        return $pdf->stream();
    }

    function convert_post_data_komentar_to_html()
    {
        $komentars = $this->get_post_data_komentar();
        $komentars2 = $this->get_post_data_komentar2();
        $output = '
        <div style="margin-bottom:20px; height:100px; width:100px;"><img style="height:100px; width:100px;" src="img/upn.png"></div>
        <div style="position:absolute; margin-bottom:20px; margin-left:120px; height:100px; width:460px; text-align:center;">
            <div><h3>HIMPUNAN MAHASISWA SISTEM INFORMASI</h3></div>
            <div><h3>UPN VETERAN JAWA TIMUR</h3></div>
        </div>
        <div style="position:absolute; margin-bottom:20px; margin-left:600px; height:100px; width:100px;"><img style="height:100px; width:100px;" src="img/himasifo.png"></div>

        <div style="background-color:black; height: 4px;"></div>
        <h3 align="center">Laporan Data Komentar</h3>
        <h4>Jumlah Komentar : '.$komentars2.'</h4>
        <table width="100%" style="border-collapse: collapse; border: 0px;">
            <tr style="background-color:#1255ff;">
                <th style="border: 1px solid; padding:12px; text-align:center;" width="30%">Nama Pengirim</th>
                <th style="border: 1px solid; padding:12px; text-align:center;" width="30%">Nama Materi</th>
                <th style="border: 1px solid; padding:12px; text-align:center;" width="30%">Isi Komentar</th>
            </tr>
        ';  
        foreach($komentars as $komentar)
        {
            $output .= '
            <tr>
                <td style="border: 1px solid; padding:12px; text-align:center;">'.$komentar->namauser.'</td>
                <td style="border: 1px solid; padding:12px; text-align:center;">'.$komentar->namamateri.'</td>
                <td style="border: 1px solid; padding:12px; text-align:center;">'.$komentar->isikomentar.'</td>
            </tr>
            ';
        }
        $output .= '</table>
        </table>
        <div style="margin-top:20px; margin-left:400px; height:100px; width:300px; text-align:center;;">
            <h4>Mengetahui,</h4>
        </div>
        <div style="margin-top:40px; margin-left:400px; height:100px; width:300px; text-align:center;">
            <h4>Kepala Departemen Litbang</h4>
        </div>';
        return $output;
    }
    // AKHIR METHOD CETAK PDF KOMENTAR
}
