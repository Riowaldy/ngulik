<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Cache;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 'email', 'status', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }

    public static function selectAuthUser()
    {
        return Auth::user();
    }

    public static function selectUser()
    {
        return User::all();
    }

    public static function selectUserLaporan()
    {
        return User::paginate(10);
    }

    public static function updateUser()
    {
        return  User::whereId(request('id'))->update([
                'nama' => request('nama'),
                'email' => request('email')
                ]);
    }

    public static function updateStatusUser()
    {
        return  User::whereId(request('id'))->update([
                'nama' => request('nama'),
                'status' => request('status')
                ]);
    }

    public static function deleteUser()
    {
        return  User::whereId(request('id'))->delete();
    }
}
