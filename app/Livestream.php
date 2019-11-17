<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livestream extends Model
{
	protected $fillable = [
        'user_id', 'kelas_id', 'link',
    ];

    protected $table = 'livestreams';

    public function user()
	{
	    return $this->belongsTo('App\User');
	}
	public function kelas()
	{
	    return $this->belongsTo('App\Kelas');
	}
}
