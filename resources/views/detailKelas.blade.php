@extends('layouts.app')

@section('content')

    @if(Auth::user()->status == 'admin')
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
                                            <div class="col-md-3">
                                                <label for="nama">Nama Kelas</label>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nama">{{ $kelas->nama }}</label>
                                            </div>
                                            <div class="col-md-3">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <label for="nama">Kode Kelas</label>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nama">NGULIK{{ $kelas->id }}</label>
                                            </div>
                                            <div class="col-md-3">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <label for="nama">Pengajar</label>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nama">{{ $kelas->user->nama }}</label>
                                            </div>
                                            <div class="col-md-3">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <label for="nama">Deskripsi</label>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nama">{{ $kelas->deskripsi }}</label>
                                            </div>
                                            <div class="col-md-3">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Pengumuman Kelas</b>
                        </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-4">
                                                <label for="nama">Latihan 1</label>
                                            </div>
                                            <div class="col-md-8">
                                                <label for="nama">Latihan Acara Ngulik Pra UTS.</label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-4">
                                                <label for="nama">Live Streaming</label>
                                            </div>
                                            <div class="col-md-8">
                                                <label for="nama">Ngulik Pra UTS Livestreaming. Waktu : Senin, 01-01-01, 16.00 WIB.</label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-4">
                                                <label for="nama">Latihan 2</label>
                                            </div>
                                            <div class="col-md-8">
                                                <label for="nama">Latihan Acara Ngulik Pra UTS.</label>
                                            </div>
                                        </div>
                                    </div>
                                </li>   
                            </ul>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Informasi Anggota Kelas</b>
                        </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <label for="nama">Nama</label>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nama">Aksi</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <label for="nama">USER001</label>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="button" class="btn btn-xs btn-info">Kirim pesan</button>
                                                <button type="button" class="btn btn-xs btn-info">Detail user</button>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <label for="nama">USER023</label>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="button" class="btn btn-xs btn-info">Kirim pesan</button>
                                                <button type="button" class="btn btn-xs btn-info">Detail user</button>
                                            </div>
                                        </div>
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
                                                    <a href="">
                                                        <input type="button" value="Detail" class="btn btn-xs btn-info" />
                                                    </a>
                                                    <a href="{{ route('materi') }}">
                                                        <input type="button" value="Lihat Semua Video" class="btn btn-xs btn-info" />
                                                    </a>
                                                </div>
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$url2}}"></iframe>
                                                    <!-- <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/Um6f90guss4"></iframe> -->
                                                </div>
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
                                                    <button type="submit" class="btn btn-xs btn-default"><b>Lihat Semua Audio</b></button>
                                                </div>
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="https://drive.google.com/file/d/1Vb5knf3ccX69gmie9CHRMHX68Hd2e6XC/preview" height="200"></iframe>
                                                </div>
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
                                                    <button type="submit" class="btn btn-xs btn-default"><b>Lihat Semua Tekstual</b></button>
                                                </div>
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="https://drive.google.com/file/d/1fqVo9F3kp9bzCuzRjjj58wdFoetQS9HN/preview"></iframe>
                                                </div>
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
                                            <div class="col-md-3">
                                                <label for="nama">Nama Kelas</label>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nama">{{ $kelas->nama }}</label>
                                            </div>
                                            <div class="col-md-3">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <label for="nama">Kode Kelas</label>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nama">NGULIK{{ $kelas->id }}</label>
                                            </div>
                                            <div class="col-md-3">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <label for="nama">Pengajar</label>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nama">{{ $kelas->user->nama }}</label>
                                            </div>
                                            <div class="col-md-3">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <label for="nama">Deskripsi</label>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nama">{{ $kelas->deskripsi }}</label>
                                            </div>
                                            <div class="col-md-3">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Pengumuman Kelas</b>
                        </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-4">
                                                <label for="nama">Latihan 1</label>
                                            </div>
                                            <div class="col-md-8">
                                                <label for="nama">Latihan Acara Ngulik Pra UTS.</label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-4">
                                                <label for="nama">Live Streaming</label>
                                            </div>
                                            <div class="col-md-8">
                                                <label for="nama">Ngulik Pra UTS Livestreaming. Waktu : Senin, 01-01-01, 16.00 WIB.</label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-4">
                                                <label for="nama">Latihan 2</label>
                                            </div>
                                            <div class="col-md-8">
                                                <label for="nama">Latihan Acara Ngulik Pra UTS.</label>
                                            </div>
                                        </div>
                                    </div>
                                </li>   
                            </ul>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Informasi Anggota Kelas</b>
                        </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <label for="nama">Nama</label>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nama">Aksi</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <label for="nama">USER001</label>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="button" class="btn btn-xs btn-info">Kirim pesan</button>
                                                <button type="button" class="btn btn-xs btn-info">Detail user</button>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <label for="nama">USER023</label>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="button" class="btn btn-xs btn-info">Kirim pesan</button>
                                                <button type="button" class="btn btn-xs btn-info">Detail user</button>
                                            </div>
                                        </div>
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
                                                    <a href="">
                                                        <input type="button" value="Detail" class="btn btn-xs btn-info" />
                                                    </a>
                                                    <a href="{{ route('materi') }}">
                                                        <input type="button" value="Lihat Semua Video" class="btn btn-xs btn-info" />
                                                    </a>
                                                </div>
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$url2}}"></iframe>
                                                    <!-- <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/Um6f90guss4"></iframe> -->
                                                </div>
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
                                                    <button type="submit" class="btn btn-xs btn-default"><b>Lihat Semua Audio</b></button>
                                                </div>
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="https://drive.google.com/file/d/1Vb5knf3ccX69gmie9CHRMHX68Hd2e6XC/preview" height="200"></iframe>
                                                </div>
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
                                                    <button type="submit" class="btn btn-xs btn-default"><b>Lihat Semua Tekstual</b></button>
                                                </div>
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="https://drive.google.com/file/d/1fqVo9F3kp9bzCuzRjjj58wdFoetQS9HN/preview"></iframe>
                                                </div>
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
                                            <div class="col-md-3">
                                                <label for="nama">Nama Kelas</label>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nama">{{ $kelas->nama }}</label>
                                            </div>
                                            <div class="col-md-3">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <label for="nama">Kode Kelas</label>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nama">NGULIK{{ $kelas->id }}</label>
                                            </div>
                                            <div class="col-md-3">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <label for="nama">Pengajar</label>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nama">{{ $kelas->user->nama }}</label>
                                            </div>
                                            <div class="col-md-3">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <label for="nama">Deskripsi</label>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nama">{{ $kelas->deskripsi }}</label>
                                            </div>
                                            <div class="col-md-3">
                                                
                                            </div>
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
                                            <div class="col-md-3">
                                                <label for="nama">Judul</label>
                                            </div>
                                            <div class="col-md-9">
                                                <label for="nama">{{ $pengumuman->nama }}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <label for="nama">Deskripsi</label>
                                            </div>
                                            <div class="col-md-9">
                                                <label for="nama">{{ $pengumuman->deskripsi }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        @endforeach
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Informasi Anggota Kelas</b>
                        </div>
                        @foreach ($users2 as $user)
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <label for="nama">Nama</label>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nama">Aksi</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <label for="nama">{{ $user->nama }}</label>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="button" class="btn btn-xs btn-info">Kirim pesan</button>
                                                <button type="submit" class="btn btn-xs btn-info" data-id="{{$user->id}}" data-nama="{{$user->nama}}" data-email="{{$user->email}}" data-toggle="modal" data-target="#detail_user"><b>Detail User</b></button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        @endforeach
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
                                                    <a href="">
                                                        <input type="button" value="Detail" class="btn btn-xs btn-info" />
                                                    </a>
                                                    <a href="{{ route('materi') }}">
                                                        <input type="button" value="Lihat Semua Video" class="btn btn-xs btn-info" />
                                                    </a>
                                                </div>
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$url2}}"></iframe>
                                                    <!-- <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/Um6f90guss4"></iframe> -->
                                                </div>
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
                                                    <button type="submit" class="btn btn-xs btn-default"><b>Lihat Semua Audio</b></button>
                                                </div>
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="https://drive.google.com/file/d/1Vb5knf3ccX69gmie9CHRMHX68Hd2e6XC/preview" height="200"></iframe>
                                                </div>
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
                                                    <button type="submit" class="btn btn-xs btn-default"><b>Lihat Semua Tekstual</b></button>
                                                </div>
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="https://drive.google.com/file/d/1fqVo9F3kp9bzCuzRjjj58wdFoetQS9HN/preview"></iframe>
                                                </div>
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
                                            <div class="col-md-3">
                                                <label for="nama">Nama Kelas</label>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nama">{{ $kelas->nama }}</label>
                                            </div>
                                            <div class="col-md-3">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <label for="nama">Kode Kelas</label>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nama">NGULIK{{ $kelas->id }}</label>
                                            </div>
                                            <div class="col-md-3">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <label for="nama">Pengajar</label>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nama">{{ $kelas->user->nama }}</label>
                                            </div>
                                            <div class="col-md-3">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <label for="nama">Deskripsi</label>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nama">{{ $kelas->deskripsi }}</label>
                                            </div>
                                            <div class="col-md-3">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Pengumuman Kelas</b>
                        </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-4">
                                                <label for="nama">Latihan 1</label>
                                            </div>
                                            <div class="col-md-8">
                                                <label for="nama">Latihan Acara Ngulik Pra UTS.</label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-4">
                                                <label for="nama">Live Streaming</label>
                                            </div>
                                            <div class="col-md-8">
                                                <label for="nama">Ngulik Pra UTS Livestreaming. Waktu : Senin, 01-01-01, 16.00 WIB.</label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-4">
                                                <label for="nama">Latihan 2</label>
                                            </div>
                                            <div class="col-md-8">
                                                <label for="nama">Latihan Acara Ngulik Pra UTS.</label>
                                            </div>
                                        </div>
                                    </div>
                                </li>   
                            </ul>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Informasi Anggota Kelas</b>
                        </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <label for="nama">Nama</label>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nama">Aksi</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <label for="nama">USER001</label>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="button" class="btn btn-xs btn-info">Kirim pesan</button>
                                                <button type="button" class="btn btn-xs btn-info">Detail user</button>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <label for="nama">USER023</label>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="button" class="btn btn-xs btn-info">Kirim pesan</button>
                                                <button type="button" class="btn btn-xs btn-info">Detail user</button>
                                            </div>
                                        </div>
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
                                                    <a href="">
                                                        <input type="button" value="Detail" class="btn btn-xs btn-info" />
                                                    </a>
                                                    <a href="{{ route('materi') }}">
                                                        <input type="button" value="Lihat Semua Video" class="btn btn-xs btn-info" />
                                                    </a>
                                                </div>
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$url2}}"></iframe>
                                                    <!-- <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/Um6f90guss4"></iframe> -->
                                                </div>
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
                                                    <button type="submit" class="btn btn-xs btn-default"><b>Lihat Semua Audio</b></button>
                                                </div>
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="https://drive.google.com/file/d/1Vb5knf3ccX69gmie9CHRMHX68Hd2e6XC/preview" height="200"></iframe>
                                                </div>
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
                                                    <button type="submit" class="btn btn-xs btn-default"><b>Lihat Semua Tekstual</b></button>
                                                </div>
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="https://drive.google.com/file/d/1fqVo9F3kp9bzCuzRjjj58wdFoetQS9HN/preview"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                    </div>
                </div>
            </div>
        </div>
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
                                <label for="">User ID</label>
                                <input type="text" name="user_id" id="user_id" class="form-control" value="{{ Auth::id() }}">
                            </div>
                            <div class="form-group">
                                <label for="">Kelas ID</label>
                                <input type="text" name="kelas_id" id="kelas_id" class="form-control" value="{{ $kelas->id }}">
                            </div> 
                            <div class="form-group">
                                <label for="">Judul Pengumuman</label>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Tulis Judul Pengumuman">
                            </div>
                            <div class="form-group">
                                <label for="input_nama">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control" placeholder="Tulis Deskripsi Pengumuman"></textarea>s
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
@endsection
