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
use Cache;
use DB;

class UserController extends Controller
{

// View
    public function userOnlineStatus()
    {
        $users = DB::table('users')->get();
    
        foreach ($users as $user) {
            if (Cache::has('user-is-online-' . $user->id))
                echo "User " . $user->nama . " is online.";
            else
                echo "User " . $user->nama . " is offline.";
        }
    }

	public function profil(){
        $profil = User::selectAuthUser();
        return view('profil', compact('profil'));
    }
    public function pengguna(){
        $users = User::selectUser()->whereIn('status', ['moderator','pengajar','murid']);
        // $users = User::all();
        return view('pengguna', compact('users'));
    }

// End View

// Update

    public function editProfil()
    {
        $edit = User::selectUser()->where('id', request('id'));
        $edit = User::updateUser();
        return back()->with('success');
    }
    public function editStatus(Request $request){
        // $edit = \DB::table('users')->select('id')->where('id', $request->input('id'));
        // $edit->update(['nama' => $request->input('nama')]);
        // $edit->update(['status' => $request->input('status')]);

        $edit = User::selectUser()->where('id', request('id'));
        $edit = User::updateStatusUser();
      return back()->with('success');
    }

    public function showChangePasswordForm(){
        return view('auth.changepassword');
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function changePassword(Request $request){
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
        //Change Password
        $user = Auth::user();
        $user->password = Hash::make($request->get('new-password'));
        $user->save();
        return redirect()->back()->with("success","Password changed successfully !");
    }

// End Update

// Delete


    public function hapusPengguna(Request $request)
    {
        $deleteKelasuser = \DB::table('kelasusers')->select('id')->where('user_id', $request->input('id'));
        $deleteMateri = \DB::table('materis')->select('id')->where('user_id', $request->input('id'));
        $deletePengumuman = \DB::table('pengumumans')->select('id')->where('user_id', $request->input('id'));
        $deleteKomentar = \DB::table('komentars')->select('id')->where('user_id', $request->input('id'));
        $deleteLivestream = \DB::table('livestreams')->select('id')->where('user_id', $request->input('id'));
        $deleteObrolan = \DB::table('obrolans')->select('id')->where('pengirim', $request->input('id'))->where('penerima', $request->input('id'));
        $delete = User::selectUser()->where('id', request('id'));

        $deleteKelasuser->delete();
        $deleteMateri->delete();
        $deletePengumuman->delete();
        $deleteKomentar->delete();
        $deleteLivestream->delete();
        $deleteObrolan->delete();
        $delete = User::deleteUser();
      return back()->with('success');
    }

// End Delete
}
