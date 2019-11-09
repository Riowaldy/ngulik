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

class UserController extends Controller
{

// View

	public function profil(){
        $profil = Auth::user();
        return view('profil', compact('profil'));
    }
    public function pengguna(){
        $users = DB::table('users')->whereIn('status', ['moderator','pengajar','murid'])->get();
        // $users = User::all();
        return view('pengguna', compact('users'));
    }

// End View

// Update

    public function editProfil(Request $request){
      	$edit = \DB::table('users')->select('id')->where('id', $request->input('id'));
      	$edit->update(['nama' => $request->input('nama')]);
      	$edit->update(['email' => $request->input('email')]);
      return back()->with('success');
    }
    public function editStatus(Request $request){
        $edit = \DB::table('users')->select('id')->where('id', $request->input('id'));
        $edit->update(['nama' => $request->input('nama')]);
        $edit->update(['status' => $request->input('status')]);
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

}
