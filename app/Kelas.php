<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Kelas extends Model
{
	protected $fillable = [
        'nama', 'user_id', 'deskripsi',
    ];

    public $table = "kelass";

    public function user()
	{
	    return $this->belongsTo('App\User');
	}

	public static function selectKelas()
	{
		return Kelas::all();
	}

	public static function createKelas()
	{
		return 	Kelas::create([
		        'nama' => request('nama'),
		        'user_id' => request('user_id'),
		        'deskripsi' => request('deskripsi')
		    	]);
	}

	public static function updateKelas()
	{
		return 	Kelas::whereId(request('id'))->update([
				'nama' => request('nama'),
		        'user_id' => request('user_id'),
		        'deskripsi' => request('deskripsi')
				]);
	}

	public static function deleteKelas()
	{
		return 	Kelas::whereId(request('id'))->delete();
	}
}
