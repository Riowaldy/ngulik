<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
