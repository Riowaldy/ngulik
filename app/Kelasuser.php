<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelasuser extends Model
{
	protected $fillable = [
        'kelas_id', 'user_id',
    ];
    public function user()
	{
	    return $this->belongsToMany('App\User');
	}
	public function kelas()
	{
	    return $this->belongsToMany('App\Kelas');
	}
}
