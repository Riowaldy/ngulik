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
use DB;

class MateriController extends Controller
{

// View

    public function materiVideo(Kelas $kelas){

        $materis = Materi::where('kelas_id', $kelas->id)->where('jenis', 'Youtube')->paginate(6);
        return view('materiVideo', compact('kelas','materis','url2','urldrive','urlyt'));
    }
    public function materiAudio(Kelas $kelas){

        $materis = Materi::where('kelas_id', $kelas->id)->where('jenis', 'Audio')->paginate(6);
        return view('materiAudio', compact('kelas','materis','url2','urldrive','urlyt'));
    }
    public function materiTekstual(Kelas $kelas){

        $materis = Materi::where('kelas_id', $kelas->id)->where('jenis', 'Tekstual')->paginate(6);
        return view('materiTekstual', compact('kelas','materis','url2','urldrive','urlyt'));
    }
    public function detailMateri(Kelas $kelas, Materi $materi)
    {   
        $komentars = Komentar::all()->where('kelas_id', $kelas->id)->where('materi_id', $materi->id);
        return view('detailMateri', compact('kelas','materi','komentars','url2','urldrive','urlyt'));
    }

// End View

// Update

    public function editStatusMateri(Request $request){
        $edit = \DB::table('materis')->select('id')->where('id', $request->input('id'));
        $edit->update(['status' => $request->input('status')]);
      return back()->with('success');
    }
    public function editMateri(Request $request){
        $edit = \DB::table('materis')->select('id')->where('id', $request->input('id'));
        $edit->update(['nama' => $request->input('nama')]);
        $edit->update(['deskripsi' => $request->input('deskripsi')]);
      return back()->with('success');
    }

// End Update

// Insert

    public function materiVideoStore()
    {
        $dataExplode = explode("=" , request('link'));
        $dataEnd = end($dataExplode);
        $this->validate(request(), [
            'nama' => 'required',
            'deskripsi' => 'required',
            'link' => 'required'
        ]);

        Materi::create([
            'user_id' => request('user_id'),
            'kelas_id' => request('kelas_id'),
            'nama' => request('nama'),
            'jenis' => request('jenis'),
            'status' => request('status'),
            'deskripsi' => request('deskripsi'),
            'link' => $dataEnd
        ]);

        return back()->with('success');
    }

    public function materiAudioStore()
    {
        $dataExplode = explode("/" , request('link'));
        $dataEnd = $dataExplode[5];
        $this->validate(request(), [
            'nama' => 'required',
            'deskripsi' => 'required',
            'link' => 'required'
        ]);

        Materi::create([
            'user_id' => request('user_id'),
            'kelas_id' => request('kelas_id'),
            'nama' => request('nama'),
            'jenis' => request('jenis'),
            'status' => request('status'),
            'deskripsi' => request('deskripsi'),
            'link' => $dataEnd
        ]);

        return back()->with('success');
    }

    public function materiTekstualStore()
    {
        $dataExplode = explode("/" , request('link'));
        $dataEnd = $dataExplode[5];
        $this->validate(request(), [
            'nama' => 'required',
            'deskripsi' => 'required',
            'link' => 'required'
        ]);

        Materi::create([
            'user_id' => request('user_id'),
            'kelas_id' => request('kelas_id'),
            'nama' => request('nama'),
            'jenis' => request('jenis'),
            'status' => request('status'),
            'deskripsi' => request('deskripsi'),
            'link' => $dataEnd
        ]);

        return back()->with('success');
    }

// End Insert
}
