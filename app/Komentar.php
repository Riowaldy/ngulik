<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
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
}
