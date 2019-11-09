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

class ObrolanController extends Controller
{

// View

    public function obrolan(){

        $obrolans = DB::table('obrolans')
                    ->select('obrolans.*','users.nama')
                    ->join('users','users.id','=','obrolans.pengirim')
                    ->where('obrolans.penerima', '=', Auth::id())
                    ->get();
        $obrolans2 = DB::table('obrolans')
                    ->select('obrolans.*','users.nama')
                    ->join('users','users.id','=','obrolans.penerima')
                    ->where('obrolans.pengirim', '=', Auth::id())
                    ->get();
        return view('obrolan', compact('obrolans','obrolans2'));
    }

// End View

// Insert

    public function pesanStore()
    {
        $this->validate(request(), [
            'isipesan' => 'required'
        ]);

        Obrolan::create([
            'pengirim' => request('pengirim'),
            'penerima' =>request('penerima'),
            'isipesan' => request('isipesan')
        ]);

        return back()->with('success');
    }

// End Insert
}
