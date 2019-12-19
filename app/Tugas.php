<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Tugas extends Model
{
    protected $fillable = [
        'kelas_id', 'user_id', 'judul', 'isitugas', 'jenis'
    ];

    public $table = "tugass";

    public function user()
	{
	    return $this->belongsTo('App\User');
	}

	public function kelas()
	{
	    return $this->belongsTo('App\Kelas');
	}

	public static function selectTugas()
	{
		return Tugas::all();
	}

	public static function createTugas()
	{
		return 	Tugas::create([
		        'kelas_id' => request('kelas_id'),
		        'user_id' => request('user_id'),
		        'judul' => request('judul'),
		        'isitugas' => request('isitugas'),
		        'jenis' => request('jenis')

		    	]);
	}

	public static function updateTugas()
	{
		return 	Tugas::whereId(request('id'))->update([
				'judul' => request('judul'),
		        'isitugas' => request('isitugas'),
		        'jenis' => request('jenis')
				]);
	}

	public static function deleteTugas()
	{
		return 	Tugas::whereId(request('id'))->delete();
	}
}
