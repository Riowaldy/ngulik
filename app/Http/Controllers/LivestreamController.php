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
        $livestreams = Livestream::selectLivestream();
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
        $this->validate(request(), [
            'link' => 'required'
        ]);

        Livestream::createLivestream();

        return back()->with('success');
    }

// End Insert

// Update

    public function editLivestream()
    {
        $edit = Livestream::selectLivestream()->where('id', request('id'));
        $edit = Livestream::updateLivestream();
      return back()->with('success');
    }

// End Update

// Delete

    public function hapusLivestream()
    {
        $delete = Livestream::selectLivestream()->where('id', request('id'));

        $kelas = $request->input('kelas_id');
        
        $delete = Livestream::deleteLivestream();
        return redirect()->route('detailKelas', ['kelas' => $kelas]);
    }

// End Delete
}
