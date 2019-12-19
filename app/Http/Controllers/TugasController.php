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

class TugasController extends Controller
{

// View

	public function detailTugas(Kelas $kelas, Tugas $tugas)
    {   
        $tugass = DB::table('tugass')
                ->select('tugass.id','tugass.jenis', 'tugasusers.id as idtgs','tugasusers.user_id', 'tugasusers.tugas_id','tugasusers.link','tugasusers.nilai','users.nama')
                ->join('tugasusers','tugasusers.tugas_id', '=', 'tugass.id')
                ->join('users','users.id','=','tugasusers.user_id')
                ->where('tugasusers.tugas_id', '=', $tugas->id)
                ->get();
        return view('detailTugas', compact('tugass'));
    }

    public function detailTugasuser(Tugas $tugas, Tugasuser $tugasuser)
    {   
        $tugass = DB::table('tugasusers')
                ->select('tugasusers.*')
                ->join('users','users.id', '=', 'tugasusers.user_id')
                ->where('tugasusers.id', '=', $tugasuser->id)
                ->get();
        return view('detailTugasuser', compact('tugass'));
    }

// End View

// Insert

    public function tugasStore()
    {
        $this->validate(request(), [
            'judul' => 'required',
            'isitugas' => 'required',
            'jenis' => 'required'
        ]);

        Tugas::createTugas();

        return back()->with('success');
    }

    public function tugasuserStore()
    {
    	if(request('jenis') == 'Video'){
    		$dataExplode = explode("=" , request('link'));
        	$dataEnd = end($dataExplode);
    	}
        else{
        	$dataExplode = explode("/" , request('link'));
        	$dataEnd = $dataExplode[5];
        }
        $this->validate(request(), [
            'tugas_id' => 'required',
            'user_id' => 'required',
            'link' => 'required'
        ]);

        Tugasuser::create([
            'tugas_id' => request('tugas_id'),
            'user_id' => request('user_id'),
            'link' => $dataEnd
        ]);

        return back()->with('success');
    }
// End Insert

// Update

    public function editTugas(){
        $edit = Tugas::selectTugas()->where('id', request('id'));
        $edit = Tugas::updateTugas();
        return back()->with('success','Berhasil Di Edit');
    }

    public function editNilai(Request $request){
        $edit = \DB::table('tugasusers')->select('id')->where('id', $request->input('id'));
        $edit->update(['nilai' => $request->input('nilai')]);
        return back()->with('success');
    }

// End Update

// Delete

    public function hapusTugas(Request $request)
    {
        $delete = Tugas::selectTugas()->where('id', request('id'));

        $delete = Tugas::deleteTugas();
      return back()->with('success');
    }

// End Delete
}
