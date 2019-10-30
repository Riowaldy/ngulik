<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
	protected $fillable = [
        'user_id', 'kelas_id', 'nama', 'deskripsi',
    ];

    protected $table = 'pengumumans';


    public function user()
	{
	    return $this->belongsTo('App\User');
	}
	public function kelas()
	{
	    return $this->belongsTo('App\Kelas');
	}
}
