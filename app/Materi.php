<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

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

	public static function selectMateri()
	{
		return Materi::all();
	}

	public static function createMateriVideo()
	{	
		$dataExplode = explode("=" , request('link'));
        $dataEnd = end($dataExplode);
		return 	Materi::create([
		            'user_id' => request('user_id'),
		            'kelas_id' => request('kelas_id'),
		            'nama' => request('nama'),
		            'jenis' => request('jenis'),
		            'status' => request('status'),
		            'deskripsi' => request('deskripsi'),
		            'link' => $dataEnd
		        ]);
	}

	public static function createMateriAudio()
	{	
		$dataExplode = explode("/" , request('link'));
        $dataEnd = $dataExplode[5];
		return 	Materi::create([
			        'user_id' => request('user_id'),
			        'kelas_id' => request('kelas_id'),
			        'nama' => request('nama'),
			        'jenis' => request('jenis'),
			        'status' => request('status'),
			        'deskripsi' => request('deskripsi'),
			        'link' => $dataEnd
			    ]);
	}

	public static function createMateriTekstual()
	{	
		$dataExplode = explode("/" , request('link'));
        $dataEnd = $dataExplode[5];
		return 	Materi::create([
		            'user_id' => request('user_id'),
		            'kelas_id' => request('kelas_id'),
		            'nama' => request('nama'),
		            'jenis' => request('jenis'),
		            'status' => request('status'),
		            'deskripsi' => request('deskripsi'),
		            'link' => $dataEnd
		        ]);
	}

	public static function createMateriGithub()
	{	
		
		return 	Materi::create([
			        'user_id' => request('user_id'),
			        'kelas_id' => request('kelas_id'),
			        'nama' => request('nama'),
			        'jenis' => request('jenis'),
			        'status' => request('status'),
			        'deskripsi' => request('deskripsi'),
			        'link' => request('link1').'/'.request('link2')
			    ]);
	}

	public static function updateMateri()
	{
		return 	Materi::whereId(request('id'))->update([
				'nama' => request('nama'),
		        'deskripsi' => request('deskripsi')
				]);
	}

	public static function updateStatusMateri()
	{
		return 	Materi::whereId(request('id'))->update([
		        'status' => request('status')
				]);
	}

	public static function deleteMateri()
	{
		return 	Materi::whereId(request('id'))->delete();
	}


}
