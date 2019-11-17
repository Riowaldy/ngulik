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

class LivestreamController extends Controller
{

// View

	public function detailLivestream(Kelas $kelas, Livestream $livestream)
    {   
    	$users = DB::table('users')
                ->select('users.*', 'kelasusers.user_id', 'kelasusers.kelas_id')
                ->join('kelasusers','kelasusers.user_id', '=', 'users.id')
                ->where('kelasusers.kelas_id', '=', $kelas->id)
                ->get();
        return view('detailLivestream', compact('kelas','livestream','users'));
    }

// End View

// Insert

    public function livestreamStore()
    {

    	$dataExplode = explode("/" , request('link'));
    	$dataEnd = $dataExplode[4];
    	$dataExplode2 = explode("?" , $dataEnd);
    	$dataEnd2 = $dataExplode2[0];
        $this->validate(request(), [
            'link' => 'required'
        ]);

        Livestream::create([
            'user_id' => request('user_id'),
            'kelas_id' => request('kelas_id'),
            'link' => $dataEnd2
        ]);

        return back()->with('success');
    }

// End Insert

// Update

    public function editLivestream(Request $request){
        $dataExplode = explode("/" , request('link'));
        $dataEnd = $dataExplode[4];
        $dataExplode2 = explode("?" , $dataEnd);
        $dataEnd2 = $dataExplode2[0];
        $edit = \DB::table('livestreams')->select('id')->where('id', $request->input('id'));
        $edit->update(['link' => $dataEnd2]);
      return back()->with('success');
    }

// End Update

// Delete

    public function hapusLivestream(Request $request)
    {
        $delete = \DB::table('livestreams')->select('id')->where('id', $request->input('id'));

        $kelas = $request->input('kelas_id');
        
        $delete->delete();
      return redirect()->route('detailKelas', ['kelas' => $kelas]);
    }

// End Delete
}
