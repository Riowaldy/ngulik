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

class KomentarController extends Controller
{

// Insert

    public function komentarStore()
    {
        $this->validate(request(), [
            'isikomentar' => 'required'
        ]);

        // Komentar::create([
        //     'kelas_id' => request('kelas_id'),
        //     'materi_id' => request('materi_id'),
        //     'user_id' => request('user_id'),
        //     'isikomentar' => request('isikomentar')
        // ]);

        Komentar::createKomentar();

        return back()->with('success');
    }

    public function editKomentar(){
        $edit = Komentar::selectKomentar()->where('id', request('id'));
        $edit = Komentar::updateKomentar();

        return back()->with('success');
    }

    public function hapusKomentar()
    {
        // $delete = \DB::table('komentars')->select('id')->where('id', $request->input('id'));
        $delete = Komentar::selectKomentar()->where('id', request('id'));

        // $delete->delete();
        $delete = Komentar::deleteKomentar();
        return back()->with('success');
    }

// End Insert
}
