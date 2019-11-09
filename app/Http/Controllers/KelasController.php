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

class KelasController extends Controller
{

// View

    public function kelas(){

        $kelass = Kelas::all();
        $kelass2 = Kelas::all()->where('user_id', Auth::id());

        $kelass3 = DB::table('kelass')
            ->leftjoin('kelasusers', 'kelass.id', '=', 'kelasusers.kelas_id')
            ->select('kelass.*','kelasusers.user_id','kelasusers.kelas_id')
            ->get();

        $kelasusers = DB::table('kelass')
                    ->join('kelasusers', function($join){
                        $join->on('kelass.id', '=', 'kelasusers.kelas_id')
                        ->where('kelasusers.user_id', '=', Auth::id());
                    })
                    ->get();

        $users = DB::table('users')->where('status', 'pengajar')->get();
        // return $data;
        return view('kelas', compact('kelass','kelass2','data','data2','x','length','kelass3','users','kelasusers'));
    }

    public function detailKelas(Kelas $kelas)
    {   
        $pengumumans = Pengumuman::all()->where('kelas_id', $kelas->id);
        $materivid = Materi::all()->where('kelas_id', $kelas->id)->where('status', 'Terverifikasi')->where('jenis', 'Youtube');
        $materiaud = Materi::all()->where('kelas_id', $kelas->id)->where('status', 'Terverifikasi')->where('jenis', 'Audio');
        $materiteks = Materi::all()->where('kelas_id', $kelas->id)->where('status', 'Terverifikasi')->where('jenis', 'Tekstual');
        $users = DB::table('users')->where('status', 'pengajar')->get();

        $users2 = DB::table('users')
                ->select('users.*', 'kelasusers.user_id', 'kelasusers.kelas_id')
                ->join('kelasusers','kelasusers.user_id', '=', 'users.id')
                ->where('kelasusers.kelas_id', '=', $kelas->id)
                ->where('users.id', '!=', Auth::id())
                ->get();

        $users3 = DB::table('users')
                ->select('users.*', 'kelasusers.user_id', 'kelasusers.kelas_id')
                ->join('kelasusers','kelasusers.user_id', '=', 'users.id')
                ->where('kelasusers.kelas_id', '=', $kelas->id)
                ->where('users.id', '=', Auth::id())
                ->get();
        
        $kelasusers = Kelasuser::all()->where('kelas_id', $kelas->id)->where('user_id', Auth::id());
        // return $kelasusers;

        return view('detailKelas', compact('kelas','materivid','materiaud','materiteks','pengumumans','users','users2','users3','kelasusers'));
    }

// End View

// Update

    public function editKelas(Request $request){
        $edit = \DB::table('kelass')->select('id')->where('id', $request->input('id'));
        $edit->update(['nama' => $request->input('nama')]);
        $edit->update(['user_id' => $request->input('user_id')]);
        $edit->update(['deskripsi' => $request->input('deskripsi')]);
      return back()->with('success');
    }

// End Update

// Insert

    public function kelasStore()
    {
        $this->validate(request(), [
            'nama' => 'required',
            'deskripsi' => 'required'
        ]);

        Kelas::create([
            'nama' => request('nama'),
            'user_id' => request('user_id'),
            'deskripsi' => request('deskripsi')
        ]);

        return redirect() -> route('kelas')->with('success');
    }
    public function kelasuserStore()
    {
        $this->validate(request(), [
            'kelas_id' => 'required',
            'user_id' => 'required'
        ]);

        Kelasuser::create([
            'kelas_id' => request('kelas_id'),
            'user_id' => request('user_id')
        ]);

        return redirect() -> route('kelas')->with('success');
    }

// End Insert

// Delete

    public function hapusKelas(Request $request)
    {
      $delete = \DB::table('kelass')->select('id')->where('id', $request->input('id'));

      $delete->delete();
      return back()->with('success');
    }

// End Delete
}
