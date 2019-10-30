<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obrolan extends Model
{
    protected $fillable = [
        'pengirim', 'penerima', 'isipesan',
    ];

    protected $table = 'obrolans';

    public function user()
	{
	    return $this->belongsTo('App\User');
	}

}
