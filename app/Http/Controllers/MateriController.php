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
use DB;

class MateriController extends Controller
{

// View

    public function materiVideo(Kelas $kelas){

        $materis = Materi::orderby('id','desc')->where('kelas_id', $kelas->id)->where('jenis', 'Youtube')->paginate(6);
        
        return view('materiVideo', compact('kelas','materis'));
    }
    public function materiAudio(Kelas $kelas){

        $materis = Materi::orderby('id','desc')->where('kelas_id', $kelas->id)->where('jenis', 'Audio')->paginate(6);
        return view('materiAudio', compact('kelas','materis'));
    }
    public function materiTekstual(Kelas $kelas){

        $materis = Materi::orderby('id','desc')->where('kelas_id', $kelas->id)->where('jenis', 'Tekstual')->paginate(6);
        return view('materiTekstual', compact('kelas','materis'));
    }
    public function materiGithub(Kelas $kelas){

        $materis = Materi::orderby('id','desc')->where('kelas_id', $kelas->id)->where('jenis', 'Github')->paginate(6);
        return view('materiGithub', compact('kelas','materis'));
    }
    public function detailMateri(Kelas $kelas, Materi $materi)
    {   
        $materi2 = Materi::selectMateri();
        $komentars2 = Komentar::selectKomentar();
        $komentars = Komentar::where('kelas_id', $kelas->id)->where('materi_id', $materi->id)->paginate(10);
        return view('detailMateri', compact('kelas','materi','materi2','komentars','komentars2'));
    }

// End View

// Update

    public function editStatusMateri(){
        // $edit = \DB::table('materis')->select('id')->where('id', $request->input('id'));
        // $edit->update(['status' => $request->input('status')]);

        $edit = Materi::selectMateri()->where('id', request('id'));
        $edit = Materi::updateStatusMateri();
        return back()->with('success');
    }
    public function editMateri(){
        $edit = Materi::selectMateri()->where('id', request('id'));
        $edit = Materi::updateMateri();
        return back()->with('success');
    }

// End Update

// Insert

    public function materiStore()
    {
        $this->validate(request(), [
            'nama' => 'required',
            'deskripsi' => 'required',
            'link' => 'required'
        ]);

        Materi::createMateri();

        return back()->with('success');
    }

    public function materiVideoStore()
    {
        // $dataExplode = explode("=" , request('link'));
        // $dataEnd = end($dataExplode);
        $this->validate(request(), [
            'nama' => 'required',
            'deskripsi' => 'required',
            'link' => 'required'
        ]);

        // Materi::create([
        //     'user_id' => request('user_id'),
        //     'kelas_id' => request('kelas_id'),
        //     'nama' => request('nama'),
        //     'jenis' => request('jenis'),
        //     'status' => request('status'),
        //     'deskripsi' => request('deskripsi'),
        //     'link' => $dataEnd
        // ]);

        Materi::createMateriVideo();

        return back()->with('success');
    }

    public function materiAudioStore()
    {
        // $dataExplode = explode("/" , request('link'));
        // $dataEnd = $dataExplode[5];
        $this->validate(request(), [
            'nama' => 'required',
            'deskripsi' => 'required',
            'link' => 'required'
        ]);

        // Materi::create([
        //     'user_id' => request('user_id'),
        //     'kelas_id' => request('kelas_id'),
        //     'nama' => request('nama'),
        //     'jenis' => request('jenis'),
        //     'status' => request('status'),
        //     'deskripsi' => request('deskripsi'),
        //     'link' => $dataEnd
        // ]);

        Materi::createMateriAudio();

        return back()->with('success');
    }

    public function materiTekstualStore()
    {
        // $dataExplode = explode("/" , request('link'));
        // $dataEnd = $dataExplode[5];
        $this->validate(request(), [
            'nama' => 'required',
            'deskripsi' => 'required',
            'link' => 'required'
        ]);

        // Materi::create([
        //     'user_id' => request('user_id'),
        //     'kelas_id' => request('kelas_id'),
        //     'nama' => request('nama'),
        //     'jenis' => request('jenis'),
        //     'status' => request('status'),
        //     'deskripsi' => request('deskripsi'),
        //     'link' => $dataEnd
        // ]);

        Materi::createMateriTekstual();

        return back()->with('success');
    }

    public function materiGithubStore()
    {
        
        $this->validate(request(), [
            'nama' => 'required',
            'deskripsi' => 'required',
            'link1' => 'required',
            'link2' => 'required'
        ]);

        // Materi::create([
        //     'user_id' => request('user_id'),
        //     'kelas_id' => request('kelas_id'),
        //     'nama' => request('nama'),
        //     'jenis' => request('jenis'),
        //     'status' => request('status'),
        //     'deskripsi' => request('deskripsi'),
        //     'link' => request('link1').'/'.request('link2')
        // ]);

        Materi::createMateriGithub();

        return back()->with('success');
    }

// End Insert

// Delete

    public function hapusMateri(Request $request)
    {
        $deleteKomentar = \DB::table('komentars')->select('id')->where('materi_id', $request->input('id'));
        $delete = Materi::selectMateri()->where('id', request('id'));

        $kelas = $request->input('kelas_id');
        
        $deleteKomentar->delete();
        $delete = Materi::deleteMateri();
        return redirect()->route('detailKelas', ['kelas' => $kelas]);
    }

// End Delete
}
