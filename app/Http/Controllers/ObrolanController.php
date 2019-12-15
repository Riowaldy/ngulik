<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;
use App\User;
use App\Kelas;
use App\Materi;
use App\Kelasuser;
use App\Pengumuman;
use App\Obrolan;
use App\Komentar;
use App\Livestream;
use DB;

class ObrolanController extends Controller
{

// View

    public function obrolan(){
        // SELECT * FROM `obrolans` WHERE `penerima`= 2 GROUP BY `pengirim`
        $obrolans = DB::table('obrolans')
                    ->select('obrolans.*','users.nama')
                    ->orderBy('obrolans.id','DESC')
                    ->groupBy('obrolans.pengirim')
                    ->join('users','users.id','=','obrolans.pengirim')
                    ->where('obrolans.penerima', '=', Auth::id())
                    ->get();
        $obrolans2 = DB::table('obrolans')
                    ->select('obrolans.*','users.nama')
                    ->orderBy('obrolans.id','DESC')
                    ->join('users','users.id','=','obrolans.penerima')
                    ->where('obrolans.pengirim', '=', Auth::id())
                    ->get();

        return view('obrolan', compact('obrolans','obrolans2'));
    }
    public function detailObrolan(Obrolan $obrolan){
        // SELECT * FROM `obrolans` WHERE (`pengirim`= 1 and `penerima`= 2) or (`pengirim`= 2 and `penerima`= 1)

        $obrolan4 = Obrolan::selectObrolan();
        $obrolans = DB::table('obrolans')
                    ->select('obrolans.*','users.nama')
                    ->orderBy('obrolans.id','desc')
                    ->join('users','users.id','=','obrolans.pengirim')
                    ->where('obrolans.penerima', $obrolan->pengirim)
                    ->where('obrolans.pengirim', Auth::id())
                    ->orwhere('obrolans.penerima', Auth::id())
                    ->where('obrolans.pengirim', $obrolan->pengirim)
                    ->take(5)
                    ->get();
        $reverse =$obrolans->reverse();
        $obrolans2 = DB::table('obrolans')
                    ->orderBy('obrolans.id')
                    ->join('users','users.id','=','obrolans.pengirim')
                    ->where('obrolans.penerima', Auth::id())
                    ->where('obrolans.pengirim', $obrolan->pengirim)
                    ->take(1)
                    ->get();
        $obrolans3 = DB::table('obrolans')
                    ->select('obrolans.*','users.nama')
                    ->orderBy('obrolans.id','DESC')
                    ->groupBy('obrolans.pengirim')
                    ->join('users','users.id','=','obrolans.pengirim')
                    ->where('obrolans.penerima', '=', Auth::id())
                    ->get();

        return view('detailObrolan', compact('obrolan','obrolans','obrolans2','obrolans3','obrolan4','reverse'));
        
    }

// End View

// Insert

    public function pesanStore()
    {
        $this->validate(request(), [
            'isipesan' => 'required'
        ]);

        // Obrolan::create([
        //     'pengirim' => request('pengirim'),
        //     'penerima' =>request('penerima'),
        //     'isipesan' => request('isipesan')
        // ]);

        Obrolan::createPesan();

        return back()->with('success');
    }

// End Insert

// Delete

    public function hapusPesan(Request $request)
    {
        $delete = \DB::table('obrolans')->select('id')->where('id', $request->input('id'));

        $delete->delete();
        return back()->with('success');
    }

// End Delete
}
