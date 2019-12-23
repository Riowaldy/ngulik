<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
	protected $fillable = [
        'user_id', 'kelas_id', 'nama', 'deskripsi',
    ];

    public $table = 'pengumumans';


    public function user()
	{
	    return $this->belongsTo('App\User');
	}

	public function kelas()
	{
	    return $this->belongsTo('App\Kelas');
	}

	public static function selectPengumuman()
	{
		return Pengumuman::all();
	}

	public static function createPengumuman()
	{
		return 	Pengumuman::create([
		            'user_id' => request('user_id'),
		            'kelas_id' => request('kelas_id'),
		            'nama' => request('nama'),
		            'deskripsi' => request('deskripsi')
		        ]);
	}

	public static function updatePengumuman()
	{
		return 	Pengumuman::whereId(request('id'))->update([
				'nama' => request('nama'),
		        'deskripsi' => request('deskripsi')
				]);
	}

	public static function deletePengumuman()
	{
		return 	Pengumuman::whereId(request('id'))->delete();
	}
}
