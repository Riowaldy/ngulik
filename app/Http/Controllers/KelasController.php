<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\Environment;
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

class KelasController extends Controller
{

// View

    public function kelas(){

        $kelass = Kelas::selectKelas();
        $kelass2 = Kelas::selectKelas()->where('user_id', Auth::id());
        $kelasusers = DB::table('kelass')
                    ->join('kelasusers', function($join){
                        $join->on('kelass.id', '=', 'kelasusers.kelas_id')
                        ->where('kelasusers.user_id', '=', Auth::id());
                    })
                    ->get();
        $users = User::selectUser()->where('status', 'pengajar');

        return view('kelas', compact('kelass','kelass2','users','kelasusers'));
    }

    public function detailKelas(Kelas $kelas)
    {   
        $livestreams = livestream::selectLivestream()->where('kelas_id', $kelas->id);
        $pengumumans2 = Pengumuman::selectPengumuman();
        $tugass2 = Tugas::selectTugas();
        $tugasusers = Tugasuser::all();

        $tugass = Tugas::orderby('id','desc')->where('kelas_id', $kelas->id)->paginate(3, ['*'], 't');

        $tugass3 = DB::table('tugass')
                ->select('tugass.id','tugass.judul','tugass.jenis','tugass.isitugas', 'tugasusers.user_id', 'tugasusers.tugas_id')
                ->leftjoin('tugasusers','tugasusers.tugas_id', '=', 'tugass.id')
                ->paginate(3, ['*'], 't');

        $pengumumans = Pengumuman::orderby('id','desc')->where('kelas_id', $kelas->id)->paginate(3, ['*'], 'p');

        $materivid = Materi::where('kelas_id', $kelas->id)->where('status', 'Terverifikasi')->where('jenis', 'Youtube')->paginate(1, ['*'], 'mv');
        $materiaud = Materi::where('kelas_id', $kelas->id)->where('status', 'Terverifikasi')->where('jenis', 'Audio')->paginate(1, ['*'], 'ma');
        $materiteks = Materi::where('kelas_id', $kelas->id)->where('status', 'Terverifikasi')->where('jenis', 'Tekstual')->paginate(1, ['*'], 'mt');
        $materigit = Materi::where('kelas_id', $kelas->id)->where('status', 'Terverifikasi')->where('jenis', 'Github')->paginate(1, ['*'], 'mg');

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
        $users4 = DB::table('users')->where('id', $kelas->user_id)->get();
        $kelasusers = Kelasuser::all()->where('kelas_id', $kelas->id)->where('user_id', Auth::id());

        return view('detailKelas', compact('kelas','materivid','materiaud','materiteks','materigit','pengumumans','pengumumans2','tugass','tugass2','tugass3','livestreams','users','users2','users3','users4','kelasusers','tugasusers'));
    }

// End View

// Update

    public function editKelas(){
        $edit = Kelas::selectKelas()->where('id', request('id'));
        $edit = Kelas::updateKelas();
        return back()->with('success','Berhasil Di Edit');
    }


// End Update

// Insert

    public function kelasStore()
    {
        $this->validate(request(), [
            'nama' => 'required',
            'deskripsi' => 'required'
        ]);

        Kelas::createKelas();

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
        $deleteKelasuser = \DB::table('kelasusers')->select('id')->where('kelas_id', $request->input('id'));
        $deleteMateri = \DB::table('materis')->select('id')->where('kelas_id', $request->input('id'));
        $deleteTugas = \DB::table('tugass')->select('id')->where('kelas_id', $request->input('id'));
        $deletePengumuman = \DB::table('pengumumans')->select('id')->where('kelas_id', $request->input('id'));
        $deleteKomentar = \DB::table('komentars')->select('id')->where('kelas_id', $request->input('id'));
        $deleteLivestream = \DB::table('livestreams')->select('id')->where('kelas_id', $request->input('id'));
        $delete = Kelas::selectKelas()->where('id', request('id'));

        $deleteKelasuser->delete();
        $deleteMateri->delete();
        $deleteTugas->delete();
        $deletePengumuman->delete();
        $deleteKomentar->delete();
        $deleteLivestream->delete();
        $delete = Kelas::deleteKelas();
      return back()->with('success');
    }

    public function hapusKelasuser(Request $request)
    {
        $delete = \DB::table('kelasusers')->select('id')->where('id', $request->input('kelas_id'))->where('user_id', $request->input('user_id'));

        $delete->delete();
      return back()->with('success');
    }

// End Delete
}
