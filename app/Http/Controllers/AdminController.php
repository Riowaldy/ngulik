<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Kelas;
use DB;

class AdminController extends Controller
{
	public function profil(){
        $profil = Auth::user();
        return view('profil', compact('profil'));
    }
    public function pengguna(){
        $users = DB::table('users')->whereIn('status', ['moderator','pengajar','murid'])->get();
        // $users = User::all();
        return view('pengguna', compact('users'));
    }
    public function kelas(){

        $kelass = Kelas::all();
        $kelass2 = Kelas::all()->where('user_id', Auth::id());
        
        $users = DB::table('users')->where('status', 'pengajar')->get();
        // $users = User::all();
        return view('kelas', compact('kelass','users','kelass2'));
    }

// Embed Youtube Trim
    public function embed()
    {   
        $url = "https://www.youtube.com/watch?v=Um6f90guss4";
        if(strlen($url) > 11)
        {
            if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match))
            {
                return $match[1];
            }
            else
                return false;
        }
        return $url;
    }
    public function detailKelas(Kelas $kelas)
    {   
        $url2 = $this->embed();
        return view('detailKelas', compact('kelas','url2'));
    }
// Akhir Embed Youtube Trim

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
    public function editKelas(Request $request){
        $edit = \DB::table('kelass')->select('id')->where('id', $request->input('id'));
        $edit->update(['nama' => $request->input('nama')]);
        $edit->update(['user_id' => $request->input('user_id')]);
        $edit->update(['deskripsi' => $request->input('deskripsi')]);
      return back()->with('success');
    }

// Change Password
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
// Akhir Change Password
    
    public function kelasStore()
    {
        $this->validate(request(), [
            'nama' => 'required',
            'deskripsi' => 'required'
        ]);

        Kelas::create([
            'nama' => request('nama'),
            'user_id' => request('user_id'),
            'deskripsi' => request('deskripsi')
        ]);

        return redirect() -> route('kelas')->with('success');
    }

    public function hapusKelas(Request $request)
    {
      $delete = \DB::table('kelass')->select('id')->where('id', $request->input('id'));

      $delete->delete();
      return back()->with('success');
    }
}
