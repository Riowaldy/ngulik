<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelasuser extends Model
{
    public function user()
	{
	    return $this->hasMany('App\User');
	}
	public function kelas()
	{
	    return $this->hasMany('App\Kelas');
	}
}
