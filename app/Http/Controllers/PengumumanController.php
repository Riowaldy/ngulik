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

class PengumumanController extends Controller
{
    
// Insert

    public function pengumumanStore()
    {
        $this->validate(request(), [
            'nama' => 'required',
            'deskripsi' => 'required'
        ]);

        Pengumuman::createPengumuman();

        return back()->with('success');
    }

// End Insert

// Update

    public function editPengumuman(){
        $edit = Pengumuman::selectPengumuman()->where('id', request('id'));
        $edit = Pengumuman::updatePengumuman();
        return back()->with('success');
    }

// End Update

// Delete

    public function hapusPengumuman()
    {
      $delete = Pengumuman::selectPengumuman()->where('id', request('id'));

      $delete = Pengumuman::deletePengumuman();
      return back()->with('success');
    }

// End Delete

}
