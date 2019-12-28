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
        $delete = Komentar::selectKomentar()->where('id', request('id'));

        $delete = Komentar::deleteKomentar();
        return back()->with('success');
    }

// End Insert
}
