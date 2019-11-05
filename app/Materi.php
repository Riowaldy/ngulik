<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
	protected $fillable = [
		'user_id', 'kelas_id', 'nama', 'jenis', 'status', 'deskripsi', 'link',
    ];

    public $table = "materis";
    
    public function user()
	{
	    return $this->belongsTo('App\User');
	}
	public function kelas()
	{
	    return $this->belongsTo('App\Kelas');
	}
}
