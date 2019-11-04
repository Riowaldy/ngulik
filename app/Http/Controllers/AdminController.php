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

        // SELECT kelass.* FROM kelass INNER JOIN kelasusers ON kelass.id = kelasusers.kelas_id WHERE kelasusers.user_id = 2

        $kelasusers = DB::table('kelass')
                    ->join('kelasusers', function($join){
                        $join->on('kelass.id', '=', 'kelasusers.kelas_id')
                        ->where('kelasusers.user_id', '=', Auth::id());
                    })
                    ->get();

        $kelasusers2 = DB::table('kelass')
                    ->join('kelasusers', function($join){
                        $join->on('kelass.id', '=', 'kelasusers.kelas_id')
                        ->where('kelasusers.user_id', '!=', Auth::id());
                    })
                    ->get();
        
        $users = DB::table('users')->where('status', 'pengajar')->get();
        // $users = User::all();
        return view('kelas', compact('kelass','kelass2','users','kelasusers','kelasusers2'));
    }
    public function materi(Kelas $kelas){

        $materis = Materi::all()->where('kelas_id', $kelas->id);
        $url2 = $this->embed();
        $urlyt = $this->embedyt();
        $urldrive = $this->embeddrive();
        return view('materi', compact('kelas','materis','url2','urldrive','urlyt'));
    }
    public function detailMateri(Materi $materi)
    {   
        $url2 = $this->embed();
        $urlyt = $this->embedyt();
        $urldrive = $this->embeddrive();
        return view('detailMateri', compact('materi','url2','urldrive','urlyt'));
    }
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
    public function detailKelas(Kelas $kelas)
    {   
        $pengumumans = Pengumuman::all()->where('kelas_id', $kelas->id);
        $users = DB::table('users')->where('status', 'pengajar')->get();

        // SELECT users.nama FROM users INNER JOIN kelasusers ON users.id = kelasusers.user_id WHERE kelasusers.kelas_id = 2
        $users2 = DB::table('users')
                ->select('users.*', 'kelasusers.user_id', 'kelasusers.kelas_id')
                ->join('kelasusers','kelasusers.user_id', '=', 'users.id')
                ->where('kelasusers.kelas_id', '=', $kelas->id)
                ->where('users.id', '!=', Auth::id())
                ->get();

        $users3 = DB::table('users')
                ->select('users.*', 'kelasusers.user_id', 'kelasusers.kelas_id')
                ->join('kelasusers','kelasusers.user_id', '=', 'users.id')
                ->where('kelasusers.kelas_id', '=', $kelas->id)
                ->where('users.id', '=', Auth::id())
                ->get();

        $url2 = $this->embed();
        $urlyt = $this->embedyt();
        $urldrive = $this->embeddrive();
        return view('detailKelas', compact('kelas','url2','urldrive','urlyt','pengumumans','users','users2','users3'));
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
// Akhir Embed Youtube Trim

// Embed Trim Manual
    public function embedyt()
    {   
        $url = "https://www.youtube.com/watch?v=Um6f90guss4";
        $trim = ltrim($url,"https://www.youtube.com/watch?v=");
        // request('link')
        // ltrim(request('link'),"https://www.youtube.com/watch?v=")
        return $trim;
    }
    public function embeddrive()
    {   
        $url = "https://drive.google.com/file/d/1Vb5knf3ccX69gmie9CHRMHX68Hd2e6XC/view?usp=sharing";
        $trim = rtrim($url,"view?usp=sharing");
        // request('link')
        // rtrim(request('link'),"view?usp=sharing")
        return $trim;
    }
// Akhir Embed Trim Manual



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
    public function kelasuserStore()
    {
        $this->validate(request(), [
            'kelas_id' => 'required',
            'user_id' => 'required'
        ]);

        Kelasuser::create([
            'kelas_id' => request('kelas_id'),
            'user_id' => request('user_id')
        ]);

        return redirect() -> route('kelas')->with('success');
    }
    public function pengumumanStore()
    {
        $this->validate(request(), [
            'nama' => 'required',
            'deskripsi' => 'required'
        ]);

        Pengumuman::create([
            'user_id' => request('user_id'),
            'kelas_id' => request('kelas_id'),
            'nama' => request('nama'),
            'deskripsi' => request('deskripsi')
        ]);

        return back()->with('success');
    }

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

    public function materiStore()
    {
        $dataExplode = explode("=" , request('link'));
        $dataEnd = end($dataExplode);
        $this->validate(request(), [
            'nama' => 'required',
            'deskripsi' => 'required',
            'link' => 'required'
        ]);

        Materi::create([
            'user_id' => request('user_id'),
            'kelas_id' => request('kelas_id'),
            'nama' => request('nama'),
            'jenis' => request('jenis'),
            'status' => request('status'),
            'deskripsi' => request('deskripsi'),
            'link' => $dataEnd
        ]);

        return back()->with('success');
    }

    public function hapusKelas(Request $request)
    {
      $delete = \DB::table('kelass')->select('id')->where('id', $request->input('id'));

      $delete->delete();
      return back()->with('success');
    }
}
