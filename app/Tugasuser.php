<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tugasuser extends Model
{
    protected $fillable = [
        'tugas_id', 'user_id', 'link','nilai'
    ];

    public function user()
	{
	    return $this->belongsToMany('App\User');
	}

	public function tugas()
	{
	    return $this->belongsToMany('App\Tugas');
	}

	public static function selectTugasuser()
    {
        return Tugasuser::all();
    }
}
