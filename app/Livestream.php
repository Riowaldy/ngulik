<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livestream extends Model
{
	protected $fillable = [
        'user_id', 'kelas_id', 'link',
    ];

    public $table = 'livestreams';

    public function user()
	{
	    return $this->belongsTo('App\User');
	}

	public function kelas()
	{
	    return $this->belongsTo('App\Kelas');
	}

	public static function selectLivestream()
	{
		return Livestream::all();
	}

	public static function createLivestream()
	{	
		$dataExplode = explode("/" , request('link'));
    	$dataEnd = $dataExplode[4];
    	$dataExplode2 = explode("?" , $dataEnd);
    	$dataEnd2 = $dataExplode2[0];
		return 	Livestream::create([
		            'user_id' => request('user_id'),
		            'kelas_id' => request('kelas_id'),
		            'link' => $dataEnd2
		        ]);
	}

	public static function updateLivestream()
	{
		$dataExplode = explode("/" , request('link'));
        $dataEnd = $dataExplode[4];
        $dataExplode2 = explode("?" , $dataEnd);
        $dataEnd2 = $dataExplode2[0];
		return 	Livestream::whereId(request('id'))->update([
				'link' => $dataEnd2
				]);
	}

	public static function deleteLivestream()
	{
		return 	Livestream::whereId(request('id'))->delete();
	}
}
