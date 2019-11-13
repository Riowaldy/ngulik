@extends('layouts.app')

@section('content')
<div style="margin-top:60px;"></div>
    @if(Auth::user()->status == 'admin')
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Informasi Kelas</b>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-xs btn-default" data-id="{{$kelas->id}}" data-nama="{{$kelas->nama}}" data-user_id="{{$kelas->user_id}}" data-deskripsi="{{$kelas->deskripsi}}" data-toggle="modal" data-target="#edit_kelas">&nbsp;&nbsp;&nbsp;Edit&nbsp;&nbsp;&nbsp;</button>
                            </div>
                        </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <label for="nama">Nama Kelas&emsp;:</label>
                                            <label for="nama">{{ $kelas->nama }}</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="nama">Kode Kelas&emsp;&nbsp;:</label>
                                            <label for="nama">NGULIK{{ $kelas->id }}</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="nama">Pengajar&emsp;&emsp;&nbsp;&nbsp;:</label>
                                            <label for="nama">{{ $kelas->user->nama }}</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="nama">Deskripsi&emsp;&emsp;&nbsp;:</label>
                                            <label for="nama">{{ $kelas->deskripsi }}</label>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Pengumuman Kelas</b>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-xs btn-default" data-toggle="modal" data-target="#buat_pengumuman"><b>Tambah Pengumuman</b></button>
                            </div>
                        </div>
                        @foreach ($pengumumans as $pengumuman)
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                <div>
                                                    <label for="nama">{{ $pengumuman->nama }}</label>
                                                </div>
                                                <div>
                                                    <label for="nama">{{ $pengumuman->deskripsi }}</label>
                                                </div>
                                                <div class="text-center" style="margin-bottom: -20px;">
                                                 @if($pengumuman->user_id == Auth::id())
                                                    <div class="col-md-4 btn btn-sm btn-info" data-id="{{$pengumuman->id}}" data-user_id="{{$pengumuman->user->nama}}" data-nama="{{$pengumuman->nama}}" data-deskripsi="{{$pengumuman->deskripsi}}" data-toggle="modal" data-target="#detail_pengumuman">
                                                        <a style="color: white;"><b>Detail</b></a>
                                                    </div>
                                                    <div class="col-md-4 btn btn-sm btn-warning" data-id="{{$pengumuman->id}}" data-nama="{{$pengumuman->nama}}" data-deskripsi="{{$pengumuman->deskripsi}}" data-toggle="modal" data-target="#edit_pengumuman">
                                                        <a style="color: white;"><b>Ubah</b></a>
                                                    </div>
                                                    <div class="col-md-4 btn btn-sm btn-danger" data-id="{{$pengumuman->id}}" data-toggle="modal" data-target="#hapus_pengumuman">
                                                        <a style="color: white;"><b>Hapus</b></a>
                                                    </div>
                                                @else
                                                    <div class="col-md-12 btn btn-sm btn-info" data-id="{{$pengumuman->id}}" data-user_id="{{$pengumuman->user->nama}}" data-nama="{{$pengumuman->nama}}" data-deskripsi="{{$pengumuman->deskripsi}}" data-toggle="modal" data-target="#detail_pengumuman">
                                                        <a style="color: white;"><b>Detail</b></a>
                                                    </div>
                                                @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        @endforeach
                        <div class="text-center">
                            {{$pengumumans->appends(['mv' => $materivid->currentPage(), 'mv' => $materivid->currentPage(), 'ma' => $materiaud->currentPage(), 'mt' => $materiteks->currentPage()])->links()}} 
                        </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Informasi Anggota Kelas</b>
                        </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        
                                        @foreach ($users2 as $user)
                                        <div class="col-md-12">
                                            <div class="col-md-7">
                                                <label for="nama">{{ $user->nama }}</label>
                                            </div>
                                            <div class="col-md-5">
                                                <button type="submit" class="btn btn-xs btn-default" data-toggle="modal" data-penerima="{{$user->id}}" data-penerima2="{{$user->nama}}" data-nama="{{$user->nama}}" data-target="#buat_pesan"><b>Kirim Pesan</b></button>
                                                <button type="submit" class="btn btn-xs btn-info" data-id="{{$user->id}}" data-nama="{{$user->nama}}" data-email="{{$user->email}}" data-toggle="modal" data-target="#detail_user"><b>Detail</b></button>
                                            </div>
                                        </div>
                                        @endforeach
                                        
                                    </div>
                                </li>
                            </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Materi Kelas Terbaik</b>
                        </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                <label for="nama">Materi Video</label>
                                                <div class="pull-right">
                                                    <a href="{{ route('materiVideo', $kelas) }}">
                                                    <input type="button" value="Lihat Semua" class="btn btn-xs btn-info" />
                                                </a>
                                                </div>
                                            </div>
                                            @foreach($materivid as $materi)
                                            <div class="col-md-12">
                                                <div class="col-md-12 btn btn-sm btn-info" onclick="location.href='{{ route('detailMateri',[$kelas, $materi]) }}'">
                                                    <a style="color: white;"><b>Detail</b></a>
                                                </div>
                                            </div>
                                            <div class="col-md-12" style="margin-top: 10px;">
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$materi->link}}"></iframe>
                                                </div>
                                            </div>
                                            @endforeach
                                            <div class="text-center">
                                                {{$materivid->appends(['p' => $pengumumans->currentPage(), 'ma' => $materiaud->currentPage(), 'mt' => $materiteks->currentPage()])->links()}} 
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                <label for="nama">Materi Audio</label>
                                                <div class="pull-right">
                                                    <a href="{{ route('materiAudio', $kelas) }}">
                                                    <input type="button" value="Lihat Semua" class="btn btn-xs btn-info" />
                                                </a>
                                                </div>
                                            </div>
                                            @foreach($materiaud as $materi)
                                            <div class="col-md-12">
                                                <div class="col-md-12 btn btn-sm btn-info" onclick="location.href='{{ route('detailMateri',[$kelas, $materi]) }}'">
                                                    <a style="color: white;"><b>Detail</b></a>
                                                </div>
                                            </div>
                                            <div class="col-md-12" style="margin-top: 10px;">
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="https://drive.google.com/file/d/{{$materi->link}}/preview" height="200"></iframe>
                                                </div>
                                            </div>
                                            @endforeach
                                            <div class="text-center">
                                                {{$materiaud->appends(['p' => $pengumumans->currentPage(), 'mv' => $materivid->currentPage(), 'mt' => $materiteks->currentPage()])->links()}} 
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                <label for="nama">Materi Tekstual</label>
                                                <div class="pull-right">
                                                    <a href="{{ route('materiTekstual', $kelas) }}">
                                                        <input type="button" value="Lihat Semua" class="btn btn-xs btn-info" />
                                                    </a>
                                                </div>
                                            </div>
                                            @foreach($materiteks as $materi)
                                            <div class="col-md-12">
                                                <div class="col-md-12 btn btn-sm btn-info" onclick="location.href='{{ route('detailMateri',[$kelas, $materi]) }}'">
                                                    <a style="color: white;"><b>Detail</b></a>
                                                </div>
                                            </div>
                                            <div class="col-md-12" style="margin-top: 10px;">
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="https://drive.google.com/file/d/{{$materi->link}}/preview" height="200"></iframe>
                                                </div>
                                                <div style="margin-bottom: 5px;"></div>
                                            </div>
                                            @endforeach
                                            <div class="text-center">
                                                {{$materiteks->appends(['p' => $pengumumans->currentPage(), 'mv' => $materivid->currentPage(), 'ma' => $materiaud->currentPage()])->links()}} 
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                    </div>
                </div>
            </div>
        </div>
    @elseif(Auth::user()->status == 'moderator')
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Informasi Kelas</b>
                        </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <label for="nama">Nama Kelas&emsp;:</label>
                                            <label for="nama">{{ $kelas->nama }}</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="nama">Kode Kelas&emsp;&nbsp;:</label>
                                            <label for="nama">NGULIK{{ $kelas->id }}</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="nama">Pengajar&emsp;&emsp;&nbsp;&nbsp;:</label>
                                            <label for="nama">{{ $kelas->user->nama }}</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="nama">Deskripsi&emsp;&emsp;&nbsp;:</label>
                                            <label for="nama">{{ $kelas->deskripsi }}</label>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Pengumuman Kelas</b>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-xs btn-default" data-toggle="modal" data-target="#buat_pengumuman"><b>Tambah Pengumuman</b></button>
                            </div>
                        </div>
                        @foreach ($pengumumans as $pengumuman)
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                <div>
                                                    <label for="nama">{{ $pengumuman->nama }}</label>
                                                </div>
                                                <div>
                                                    <label for="nama">{{ $pengumuman->deskripsi }}</label>
                                                </div>
                                                <div class="text-center" style="margin-bottom: -20px;">
                                                 @if($pengumuman->user_id == Auth::id())
                                                    <div class="col-md-4 btn btn-sm btn-info" data-id="{{$pengumuman->id}}" data-user_id="{{$pengumuman->user->nama}}" data-nama="{{$pengumuman->nama}}" data-deskripsi="{{$pengumuman->deskripsi}}" data-toggle="modal" data-target="#detail_pengumuman">
                                                        <a style="color: white;"><b>Detail</b></a>
                                                    </div>
                                                    <div class="col-md-4 btn btn-sm btn-warning" data-id="{{$pengumuman->id}}" data-nama="{{$pengumuman->nama}}" data-deskripsi="{{$pengumuman->deskripsi}}" data-toggle="modal" data-target="#edit_pengumuman">
                                                        <a style="color: white;"><b>Ubah</b></a>
                                                    </div>
                                                    <div class="col-md-4 btn btn-sm btn-danger" data-id="{{$pengumuman->id}}" data-toggle="modal" data-target="#hapus_pengumuman">
                                                        <a style="color: white;"><b>Hapus</b></a>
                                                    </div>
                                                @else
                                                    <div class="col-md-12 btn btn-sm btn-info" data-id="{{$pengumuman->id}}" data-user_id="{{$pengumuman->user->nama}}" data-nama="{{$pengumuman->nama}}" data-deskripsi="{{$pengumuman->deskripsi}}" data-toggle="modal" data-target="#detail_pengumuman">
                                                        <a style="color: white;"><b>Detail</b></a>
                                                    </div>
                                                @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        @endforeach
                        <div class="text-center">
                            {{$pengumumans->appends(['mv' => $materivid->currentPage(), 'mv' => $materivid->currentPage(), 'ma' => $materiaud->currentPage(), 'mt' => $materiteks->currentPage()])->links()}} 
                        </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Informasi Anggota Kelas</b>
                        </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        @foreach ($users2 as $user)
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <label for="nama">{{ $user->nama }}</label>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="submit" class="btn btn-xs btn-default" data-toggle="modal" data-penerima="{{$user->id}}" data-penerima2="{{$user->nama}}" data-target="#buat_pesan"><b>Kirim Pesan</b></button>
                                                <button type="submit" class="btn btn-xs btn-info" data-id="{{$user->id}}" data-nama="{{$user->nama}}" data-email="{{$user->email}}" data-toggle="modal" data-target="#detail_user"><b>Detail User</b></button>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </li>
                            </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Materi Kelas Terbaik</b>
                        </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                <label for="nama">Materi Video</label>
                                                <div class="pull-right">
                                                    <a href="{{ route('materiVideo', $kelas) }}">
                                                    <input type="button" value="Lihat Semua" class="btn btn-xs btn-info" />
                                                </a>
                                                </div>
                                            </div>
                                            @foreach($materivid as $materi)
                                            <div class="col-md-12">
                                                <div class="col-md-12 btn btn-sm btn-info" onclick="location.href='{{ route('detailMateri',[$kelas, $materi]) }}'">
                                                    <a style="color: white;"><b>Detail</b></a>
                                                </div>
                                            </div>
                                            <div class="col-md-12" style="margin-top: 10px;">
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$materi->link}}"></iframe>
                                                </div>
                                            </div>
                                            @endforeach
                                            <div class="text-center">
                                                {{$materivid->appends(['p' => $pengumumans->currentPage(), 'ma' => $materiaud->currentPage(), 'mt' => $materiteks->currentPage()])->links()}} 
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                <label for="nama">Materi Audio</label>
                                                <div class="pull-right">
                                                    <a href="{{ route('materiAudio', $kelas) }}">
                                                    <input type="button" value="Lihat Semua" class="btn btn-xs btn-info" />
                                                </a>
                                                </div>
                                            </div>
                                            @foreach($materiaud as $materi)
                                            <div class="col-md-12">
                                                <div class="col-md-12 btn btn-sm btn-info" onclick="location.href='{{ route('detailMateri',[$kelas, $materi]) }}'">
                                                    <a style="color: white;"><b>Detail</b></a>
                                                </div>
                                            </div>
                                            <div class="col-md-12" style="margin-top: 10px;">
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="https://drive.google.com/file/d/{{$materi->link}}/preview" height="200"></iframe>
                                                </div>
                                            </div>
                                            @endforeach
                                            <div class="text-center">
                                                {{$materiaud->appends(['p' => $pengumumans->currentPage(), 'mv' => $materivid->currentPage(), 'mt' => $materiteks->currentPage()])->links()}} 
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                <label for="nama">Materi Tekstual</label>
                                                <div class="pull-right">
                                                    <a href="{{ route('materiTekstual', $kelas) }}">
                                                        <input type="button" value="Lihat Semua" class="btn btn-xs btn-info" />
                                                    </a>
                                                </div>
                                            </div>
                                            @foreach($materiteks as $materi)
                                            <div class="col-md-12">
                                                <div class="col-md-12 btn btn-sm btn-info" onclick="location.href='{{ route('detailMateri',[$kelas, $materi]) }}'">
                                                    <a style="color: white;"><b>Detail</b></a>
                                                </div>
                                            </div>
                                            <div class="col-md-12" style="margin-top: 10px;">
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="https://drive.google.com/file/d/{{$materi->link}}/preview" height="200"></iframe>
                                                </div>
                                                <div style="margin-bottom: 5px;"></div>
                                            </div>
                                            @endforeach
                                            <div class="text-center">
                                                {{$materiteks->appends(['p' => $pengumumans->currentPage(), 'mv' => $materivid->currentPage(), 'ma' => $materiaud->currentPage()])->links()}} 
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                    </div>
                </div>
            </div>
        </div>
    @elseif(Auth::user()->status == 'pengajar')
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Informasi Kelas</b>
                        </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <label for="nama">Nama Kelas&emsp;:</label>
                                            <label for="nama">{{ $kelas->nama }}</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="nama">Kode Kelas&emsp;&nbsp;:</label>
                                            <label for="nama">NGULIK{{ $kelas->id }}</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="nama">Pengajar&emsp;&emsp;&nbsp;&nbsp;:</label>
                                            <label for="nama">{{ $kelas->user->nama }}</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="nama">Deskripsi&emsp;&emsp;&nbsp;:</label>
                                            <label for="nama">{{ $kelas->deskripsi }}</label>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Pengumuman Kelas</b>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-xs btn-default" data-toggle="modal" data-target="#buat_pengumuman"><b>Tambah Pengumuman</b></button>
                            </div>
                        </div>
                        @foreach ($pengumumans as $pengumuman)
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                <div>
                                                    <label for="nama">{{ $pengumuman->nama }}</label>
                                                </div>
                                                <div>
                                                    <label for="nama">{{ $pengumuman->deskripsi }}</label>
                                                </div>
                                                <div class="text-center" style="margin-bottom: -20px;">
                                                 @if($pengumuman->user_id == Auth::id())
                                                    <div class="col-md-4 btn btn-sm btn-info" data-id="{{$pengumuman->id}}" data-user_id="{{$pengumuman->user->nama}}" data-nama="{{$pengumuman->nama}}" data-deskripsi="{{$pengumuman->deskripsi}}" data-toggle="modal" data-target="#detail_pengumuman">
                                                        <a style="color: white;"><b>Detail</b></a>
                                                    </div>
                                                    <div class="col-md-4 btn btn-sm btn-warning" data-id="{{$pengumuman->id}}" data-nama="{{$pengumuman->nama}}" data-deskripsi="{{$pengumuman->deskripsi}}" data-toggle="modal" data-target="#edit_pengumuman">
                                                        <a style="color: white;"><b>Ubah</b></a>
                                                    </div>
                                                    <div class="col-md-4 btn btn-sm btn-danger" data-id="{{$pengumuman->id}}" data-toggle="modal" data-target="#hapus_pengumuman">
                                                        <a style="color: white;"><b>Hapus</b></a>
                                                    </div>
                                                @else
                                                    <div class="col-md-12 btn btn-sm btn-info" data-id="{{$pengumuman->id}}" data-user_id="{{$pengumuman->user->nama}}" data-nama="{{$pengumuman->nama}}" data-deskripsi="{{$pengumuman->deskripsi}}" data-toggle="modal" data-target="#detail_pengumuman">
                                                        <a style="color: white;"><b>Detail</b></a>
                                                    </div>
                                                @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        @endforeach
                        <div class="text-center">
                            {{$pengumumans->appends(['mv' => $materivid->currentPage(), 'mv' => $materivid->currentPage(), 'ma' => $materiaud->currentPage(), 'mt' => $materiteks->currentPage()])->links()}} 
                        </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Informasi Anggota Kelas</b>
                        </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        @foreach ($users2 as $user)
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <label for="nama">{{ $user->nama }}</label>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="submit" class="btn btn-xs btn-default" data-toggle="modal" data-penerima="{{$user->id}}" data-penerima2="{{$user->nama}}" data-target="#buat_pesan"><b>Kirim Pesan</b></button>
                                                <button type="submit" class="btn btn-xs btn-info" data-id="{{$user->id}}" data-nama="{{$user->nama}}" data-email="{{$user->email}}" data-toggle="modal" data-target="#detail_user"><b>Detail User</b></button>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </li>
                            </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Materi Kelas Terbaik</b>
                        </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                <label for="nama">Materi Video</label>
                                                <div class="pull-right">
                                                    <a href="{{ route('materiVideo', $kelas) }}">
                                                    <input type="button" value="Lihat Semua" class="btn btn-xs btn-info" />
                                                </a>
                                                </div>
                                            </div>
                                            @foreach($materivid as $materi)
                                            <div class="col-md-12">
                                                <div class="col-md-12 btn btn-sm btn-info" onclick="location.href='{{ route('detailMateri',[$kelas, $materi]) }}'">
                                                    <a style="color: white;"><b>Detail</b></a>
                                                </div>
                                            </div>
                                            <div class="col-md-12" style="margin-top: 10px;">
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$materi->link}}"></iframe>
                                                </div>
                                            </div>
                                            @endforeach
                                            <div class="text-center">
                                                {{$materivid->appends(['p' => $pengumumans->currentPage(), 'ma' => $materiaud->currentPage(), 'mt' => $materiteks->currentPage()])->links()}} 
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                <label for="nama">Materi Audio</label>
                                                <div class="pull-right">
                                                    <a href="{{ route('materiAudio', $kelas) }}">
                                                    <input type="button" value="Lihat Semua" class="btn btn-xs btn-info" />
                                                </a>
                                                </div>
                                            </div>
                                            @foreach($materiaud as $materi)
                                            <div class="col-md-12">
                                                <div class="col-md-12 btn btn-sm btn-info" onclick="location.href='{{ route('detailMateri',[$kelas, $materi]) }}'">
                                                    <a style="color: white;"><b>Detail</b></a>
                                                </div>
                                            </div>
                                            <div class="col-md-12" style="margin-top: 10px;">
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="https://drive.google.com/file/d/{{$materi->link}}/preview" height="200"></iframe>
                                                </div>
                                            </div>
                                            @endforeach
                                            <div class="text-center">
                                                {{$materiaud->appends(['p' => $pengumumans->currentPage(), 'mv' => $materivid->currentPage(), 'mt' => $materiteks->currentPage()])->links()}} 
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                <label for="nama">Materi Tekstual</label>
                                                <div class="pull-right">
                                                    <a href="{{ route('materiTekstual', $kelas) }}">
                                                        <input type="button" value="Lihat Semua" class="btn btn-xs btn-info" />
                                                    </a>
                                                </div>
                                            </div>
                                            @foreach($materiteks as $materi)
                                            <div class="col-md-12">
                                                <div class="col-md-12 btn btn-sm btn-info" onclick="location.href='{{ route('detailMateri',[$kelas, $materi]) }}'">
                                                    <a style="color: white;"><b>Detail</b></a>
                                                </div>
                                            </div>
                                            <div class="col-md-12" style="margin-top: 10px;">
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="https://drive.google.com/file/d/{{$materi->link}}/preview" height="200"></iframe>
                                                </div>
                                                <div style="margin-bottom: 5px;"></div>
                                            </div>
                                            @endforeach
                                            <div class="text-center">
                                                {{$materiteks->appends(['p' => $pengumumans->currentPage(), 'mv' => $materivid->currentPage(), 'ma' => $materiaud->currentPage()])->links()}} 
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                    </div>
                </div>
            </div>
        </div>
    @else

        @forelse($kelasusers as $reply)
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <b>Informasi Kelas</b>
                            </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <div class="panel-body">
                                            <div class="col-md-12">
                                                <label for="nama">Nama Kelas&emsp;:</label>
                                                <label for="nama">{{ $kelas->nama }}</label>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="nama">Kode Kelas&emsp;&nbsp;:</label>
                                                <label for="nama">NGULIK{{ $kelas->id }}</label>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="nama">Pengajar&emsp;&emsp;&nbsp;&nbsp;:</label>
                                                <label for="nama">{{ $kelas->user->nama }}</label>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="nama">Deskripsi&emsp;&emsp;&nbsp;:</label>
                                                <label for="nama">{{ $kelas->deskripsi }}</label>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                        </div>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <b>Pengumuman Kelas</b>
                            </div>
                            @foreach ($pengumumans as $pengumuman)
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <div class="panel-body">
                                            <div class="col-md-12">
                                                <div>
                                                    <label for="nama">{{ $pengumuman->nama }}</label>
                                                </div>
                                                <div>
                                                    <label for="nama">{{ $pengumuman->deskripsi }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            @endforeach
                            <div class="text-center">
                                {{$pengumumans->appends(['mv' => $materivid->currentPage(), 'mv' => $materivid->currentPage(), 'ma' => $materiaud->currentPage(), 'mt' => $materiteks->currentPage()])->links()}} 
                            </div>
                        </div>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <b>Informasi Anggota Kelas</b>
                            </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <div class="panel-body">
                                            @foreach ($users3 as $user)
                                            <div class="col-md-12">
                                                <div class="col-md-6">
                                                    <label for="nama">{{ $user->nama }}</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <button type="submit" class="btn btn-xs btn-info" data-id="{{$user->id}}" data-nama="{{$user->nama}}" data-email="{{$user->email}}" data-toggle="modal" data-target="#detail_user"><b>Detail User</b></button>
                                                </div>
                                            </div>
                                            @endforeach
                                            @foreach ($users2 as $user)
                                            <div class="col-md-12">
                                                <div class="col-md-6">
                                                    <label for="nama">{{ $user->nama }}</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <button type="submit" class="btn btn-xs btn-info" data-id="{{$user->id}}" data-nama="{{$user->nama}}" data-email="{{$user->email}}" data-toggle="modal" data-target="#detail_user"><b>Detail User</b></button>
                                                    <button type="submit" class="btn btn-xs btn-default" data-toggle="modal" data-pengirim="{{Auth::id()}}" data-penerima="{{$user->id}}" data-nama="{{$user->nama}}" data-target="#buat_pesan"><b>Kirim Pesan</b></button>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </li>
                                </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <b>Materi Kelas Terbaik</b>
                            </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <div class="panel-body">
                                            <div class="col-md-12">
                                                <div class="col-md-12">
                                                    <label for="nama">Materi Video</label>
                                                    <div class="pull-right">
                                                        <a href="{{ route('materiVideo', $kelas) }}">
                                                        <input type="button" value="Lihat Semua" class="btn btn-xs btn-info" />
                                                    </a>
                                                    </div>
                                                </div>
                                                @foreach($materivid as $materi)
                                                <div class="col-md-12">
                                                    <div class="col-md-12 btn btn-sm btn-info" onclick="location.href='{{ route('detailMateri',[$kelas, $materi]) }}'">
                                                        <a href="" style="color: white;"><b>Detail</b></a>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="margin-top: 10px;">
                                                    <div class="embed-responsive embed-responsive-16by9">
                                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$materi->link}}"></iframe>
                                                    </div>
                                                </div>
                                                @endforeach
                                                <div class="text-center">
                                                    {{$materivid->appends(['p' => $pengumumans->currentPage(), 'ma' => $materiaud->currentPage(), 'mt' => $materiteks->currentPage()])->links()}} 
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="panel-body">
                                            <div class="col-md-12">
                                                <div class="col-md-12">
                                                    <label for="nama">Materi Audio</label>
                                                    <div class="pull-right">
                                                        <a href="{{ route('materiAudio', $kelas) }}">
                                                        <input type="button" value="Lihat Semua" class="btn btn-xs btn-info" />
                                                    </a>
                                                    </div>
                                                </div>
                                                @foreach($materiaud as $materi)
                                                <div class="col-md-12">
                                                    <div class="col-md-12 btn btn-sm btn-info" onclick="location.href='{{ route('detailMateri',[$kelas, $materi]) }}'">
                                                        <a href="" style="color: white;"><b>Detail</b></a>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="margin-top: 10px;">
                                                    <div class="embed-responsive embed-responsive-16by9">
                                                        <iframe class="embed-responsive-item" src="https://drive.google.com/file/d/{{$materi->link}}/preview" height="200"></iframe>
                                                    </div>
                                                </div>
                                                @endforeach
                                                <div class="text-center">
                                                    {{$materiaud->appends(['p' => $pengumumans->currentPage(), 'mv' => $materivid->currentPage(), 'mt' => $materiteks->currentPage()])->links()}} 
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="panel-body">
                                            <div class="col-md-12">
                                                <div class="col-md-12">
                                                    <label for="nama">Materi Tekstual</label>
                                                    <div class="pull-right">
                                                        <a href="{{ route('materiTekstual', $kelas) }}">
                                                            <input type="button" value="Lihat Semua" class="btn btn-xs btn-info" />
                                                        </a>
                                                    </div>
                                                </div>
                                                @foreach($materiteks as $materi)
                                                <div class="col-md-12">
                                                    <div class="col-md-12 btn btn-sm btn-info" onclick="location.href='{{ route('detailMateri',[$kelas, $materi]) }}'">
                                                        <a href="" style="color: white;"><b>Detail</b></a>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="margin-top: 10px;">
                                                    <div class="embed-responsive embed-responsive-16by9">
                                                        <iframe class="embed-responsive-item" src="https://drive.google.com/file/d/{{$materi->link}}/preview" height="200"></iframe>
                                                    </div>
                                                    <div style="margin-bottom: 5px;"></div>
                                                </div>
                                                @endforeach
                                                <div class="text-center">
                                                    {{$materiteks->appends(['p' => $pengumumans->currentPage(), 'mv' => $materivid->currentPage(), 'ma' => $materiaud->currentPage()])->links()}} 
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <b>Informasi Kelas</b>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12 text-center">
                                            <h3>Anda belum terdaftar dalam kelas.</h3>
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="btn btn-md btn-info" data-kelas_id="{{$kelas->id}}" data-toggle="modal" data-target="#gabung_kelas"><b>Gabung Kelas</b></button>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endforelse
    @endif

<!-- Modal Create Pengumuman-->
    <div class="modal fade" id="buat_pengumuman" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Tambah Pengumuman</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                          
    <!--Form Dalam Modal Create Pengumuman -->
                    <form role="form" action="{{route('pengumumanStore')}}" enctype="multipart/form-data" method="post">{{csrf_field()}}
                        <div class="box-body">
                            <div class="form-group">
                                <input type="hidden" name="id" id="id" class="form-control" value="" readonly>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="user_id" id="user_id" class="form-control" value="{{ Auth::id() }}">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="kelas_id" id="kelas_id" class="form-control" value="{{ $kelas->id }}">
                            </div> 
                            <div class="form-group">
                                <label for="">Judul Pengumuman</label>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Tulis Judul Pengumuman">
                            </div>
                            <div class="form-group">
                                <label for="input_nama">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control" placeholder="Tulis Deskripsi Pengumuman"></textarea>
                            </div> 
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- Akhir Modal Create Pengumuman -->

<!-- Modal Create Pesan-->
    <div class="modal fade" id="buat_pesan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Kirim Pesan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                          
    <!--Form Dalam Modal Create Pesan -->
                    <form role="form" action="{{route('pesanStore')}}" enctype="multipart/form-data" method="post">{{csrf_field()}}
                        <div class="box-body">
                            <div class="form-group">
                                <input type="hidden" name="id" id="id" class="form-control" value="" readonly>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="pengirim" id="pengirim" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="penerima" id="penerima" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <label for="input_nama">Kirim Pesan Kepada</label>
                                <input type="text" name="nama" id="nama" class="form-control" value="" readonly>
                            </div> 
                            <div class="form-group">
                                <label for="input_nama">Isi Pesan</label>
                                <textarea name="isipesan" id="isipesan" rows="5" class="form-control" placeholder="Tulis Isi Pesan"></textarea>
                            </div> 
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Kirim</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- Akhir Modal Create Pesan -->

<!-- Modal Detail User-->
    <div class="modal fade" id="detail_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Detail User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                          
    <!--Form Dalam Modal Detail User -->
                    <form role="form" action="" enctype="multipart/form-data" method="post">{{csrf_field()}}
                        <div class="box-body">
                            <div class="form-group">
                                <input type="hidden" name="id" id="id" class="form-control" value="" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" value="" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" id="email" class="form-control" value="" readonly>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- Akhir Modal Detail User -->

<!-- Modal Update Kelas-->
    <div class="modal fade" id="edit_kelas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Kelas</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                          
    <!--Form Dalam Modal Update Kelas-->
                <form role="form" action="{{route('editKelas')}}" enctype="multipart/form-data" method="post">{{csrf_field()}}
                    <div class="box-body">
                        <div class="form-group">
                            <input type="hidden" name="id" id="id" class="form-control" value="" readonly>
                        </div>
                        <div class="form-group">
                            <label for="input_nama">Nama Kelas</label>
                            <input type="text" name="nama" id="nama" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label for="">Pilih Pengajar</label>
                            <select name="user_id" id="" class="form-control">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}"> {{ $user->nama }} </option>
                                @endforeach
                            </select>
                        </div>   
                        <div class="form-group">
                            <label for="input_nama">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control" placeholder="Tulis Deskripsi"></textarea>
                        </div>  
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
<!-- Akhir Modal Update Kelas -->

<!-- Modal Gabung Kelas-->
    <div class="modal fade" id="gabung_kelas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Gabung Kelas</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                          
    <!--Form Dalam Modal Gabung Kelas -->
                    <form role="form" action="{{route('kelasuserStore')}}" enctype="multipart/form-data" method="post">{{csrf_field()}}
                        <div class="box-body">
                            <div class="form-group">
                                <input type="hidden" name="kelas_id" id="kelas_id" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="user_id" id="user_id" class="form-control" value="{{ Auth::user()->id }}">
                            </div>
                            <div class="form-group text-center">
                                <label for="input_nama">Apakah anda ingin bergabung ke dalam kelas ini?</label>
                            </div>     
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- Akhir Modal Gabung Kelas -->

<!-- Modal Detail Pengumuman-->
    <div class="modal fade" id="detail_pengumuman" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Detail Pengumuman</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                          
    <!--Form Dalam Modal Detail Pengumuman -->
                    <form role="form" action="" enctype="multipart/form-data" method="post">{{csrf_field()}}
                        <div class="box-body">
                            <div class="form-group">
                                <input type="hidden" name="id" id="id" class="form-control" value="" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Pengirim</label>
                                <input type="text" name="user_id" id="user_id" class="form-control" value="" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Judul</label>
                                <input type="text" name="nama" id="nama" class="form-control" value="" readonly>
                            </div>
                            <div class="form-group">
                                <label for="input_nama">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control" placeholder="Tulis Deskripsi" readonly=""></textarea>
                            </div>  
                            <div class="box-footer text-center">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- Akhir Modal Detail Pengumuman -->

<!-- Modal Update Kelas-->
    <div class="modal fade" id="edit_pengumuman" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Ubah Pengumuman</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                          
    <!--Form Dalam Modal Update Kelas-->
                <form role="form" action="{{route('editPengumuman')}}" enctype="multipart/form-data" method="post">{{csrf_field()}}
                    <div class="box-body">
                        <div class="form-group">
                            <input type="hidden" name="id" id="id" class="form-control" value="" readonly>
                        </div>
                        <div class="form-group">
                            <label for="input_nama">Judul Pengumuman</label>
                            <input type="text" name="nama" id="nama" class="form-control" value="">
                        </div> 
                        <div class="form-group">
                            <label for="input_nama">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control" placeholder="Tulis Deskripsi"></textarea>
                        </div>  
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
<!-- Akhir Modal Update Kelas -->

<!-- Modal Delete Pengumuman -->
    <div class="modal fade" id="hapus_pengumuman" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                
                <div class="modal-body">
                          
    <!--Form Dalam Modal Delete Pengumuman -->
                    <form role="form" action="{{ route('hapusPengumuman') }}" enctype="multipart/form-data" method="post">
                        {{csrf_field()}}
                        {{ method_field('DELETE') }}
                            <div class="form-group">
                                <input type="hidden" name="id" id="id" class="form-control" value="" readonly>
                            </div>
                            <div class="modal-body">
                                <p class="text-center">Apakah anda yakin ingin menghapus pengumuman ini?</p>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Delete</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- Akhir Modal Delete Pengumuman -->
<div class="col-sm-12 text-center">
  <p>&copy; 2019 | Riowaldy Indrawan</p>
</div>
@endsection
