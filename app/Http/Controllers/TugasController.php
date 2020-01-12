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
                ->select('tugass.id','tugass.jenis', 'tugass.kelas_id', 'tugasusers.id as idtgs','tugasusers.user_id', 'tugasusers.tugas_id','tugasusers.link','tugasusers.nilai','users.nama')
                ->orderby('tugasusers.nilai','desc')
                ->join('tugasusers','tugasusers.tugas_id', '=', 'tugass.id')
                ->join('users','users.id','=','tugasusers.user_id')
                ->where('tugasusers.tugas_id', '=', $tugas->id)
                ->get();
        return view('detailTugas', compact('tugass','kelas','tugas'));
    }

    public function learningPath(Kelas $kelas)
    {   
        $tugass = Tugas::all()->where('kelas_id',$kelas->id);
        return view('learningPath', compact('tugass','kelas'));
    }

    public function detailLearningPath(Kelas $kelas, Tugas $tugas)
    {   
        $tugass1 = Tugas::all()->where('kelas_id',$kelas->id);
        $tugass = Tugasuser::all()->where('tugas_id',$tugas->id)->where('user_id',Auth::id());
        $tugass2 = DB::table('tugasusers')
                ->select('tugasusers.id','tugasusers.user_id','tugasusers.tugas_id','tugass.jenis')
                ->join('tugass','tugass.id', '=', 'tugasusers.tugas_id')
                ->where('tugasusers.tugas_id',$tugas->id)
                ->where('tugasusers.user_id',Auth::id())
                ->get();
        return view('detailLearningPath', compact('tugass','kelas','tugas','tugass1','tugass2'));
    }

    public function detailTugasuser(Kelas $kelas, Tugas $tugas, Tugasuser $tugasuser)
    {   
        $tugass = DB::table('tugasusers')
                ->select('tugasusers.id','tugasusers.link','tugasusers.nilai','tugasusers.created_at','tugasusers.user_id','tugasusers.tugas_id','tugass.jenis', 'tugass.kelas_id')
                ->join('users','users.id', '=', 'tugasusers.user_id')
                ->join('tugass','tugass.id', '=', 'tugasusers.tugas_id')
                ->where('tugasusers.id', '=', $tugasuser->id)
                ->get();
        return view('detailTugasuser', compact('kelas', 'tugass','tugas','tugasuser'));
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
    		$dataExplode = explode("." , request('link'));
            if(count($dataExplode) == 3)
            {
                $dataExplode2 = explode("=" , request('link'));
                $dataEnd = end($dataExplode2);
            }
            else if (count($dataExplode) == 2)
            {
                $dataExplode2 = explode("/" , request('link'));
                $dataEnd = end($dataExplode2);
            }
            else
            {
                $dataEnd = '...........';
            }
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
        $kelas = $request->input('kelas_id');
        $tugas = $request->input('tugas_id');
        $edit->update(['nilai' => $request->input('nilai')]);
        return redirect()->route('detailTugas', ['kelas' => $kelas, 'tugas' => $tugas]);
    }

// End Update

// Delete

    public function hapusTugas()
    {
        $delete = Tugas::selectTugas()->where('id', request('id'));

        $delete = Tugas::deleteTugas();
      return back()->with('success');
    }

    public function hapusTugasuser(Request $request)
    {
        $delete = \DB::table('tugasusers')->select('id')->where('id', $request->input('id'));

        $kelas = $request->input('kelas_id');
        $tugas = $request->input('tugas_id');

        $delete->delete();
        return redirect()->route('detailTugas', ['kelas' => $kelas, 'tugas' => $tugas]);
    }

// End Delete
}
