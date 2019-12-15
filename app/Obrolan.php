<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obrolan extends Model
{
    protected $fillable = [
        'pengirim', 'penerima', 'isipesan',
    ];

    protected $table = 'obrolans';

	protected $dates = [
	    'created_at',
	    'updated_at',
	];

    public function user()
	{
	    return $this->belongsTo('App\User');
	}

	public static function selectObrolan()
	{
		return Obrolan::all();
	}

	public static function createPesan()
	{
		return 	Obrolan::create([
		            'pengirim' => request('pengirim'),
		            'penerima' =>request('penerima'),
		            'isipesan' => request('isipesan')
		        ]);
	}

}
