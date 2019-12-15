<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
	protected $fillable = [
        'kelas_id', 'materi_id', 'user_id', 'isikomentar',
    ];

    protected $table = 'komentars';

    public function user()
	{
	    return $this->belongsTo('App\User');
	}

	public function kelas()
	{
	    return $this->belongsTo('App\Kelas');
	}

	public function materi()
	{
	    return $this->belongsTo('App\Materi');
	}

	public static function selectKomentar()
	{
		return Komentar::all();
	}

	public static function createKomentar()
	{
		return 	Komentar::create([
		            'kelas_id' => request('kelas_id'),
		            'materi_id' => request('materi_id'),
		            'user_id' => request('user_id'),
		            'isikomentar' => request('isikomentar')
		        ]);
	}
}
