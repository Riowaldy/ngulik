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
                                                <label for="nama">: {{ $kelas->nama }}</label>
                                            </div>
                                            <div class="col-md-3">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <label for="nama">Kode Kelas</label>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nama">: NGULIK{{ $kelas->id }}</label>
                                            </div>
                                            <div class="col-md-3">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <label for="nama">Pengajar</label>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nama">: {{ $kelas->user->nama }}</label>
                                            </div>
                                            <div class="col-md-3">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <label for="nama">Deskripsi</label>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nama">: {{ $kelas->deskripsi }}</label>
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
                                                <button type="button" class="btn btn-xs btn-info">kirim pesan</button>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <label for="nama">USER023</label>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="button" class="btn btn-xs btn-info">kirim pesan</button>
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
                                            <div class="col-md-12 text-center">
                                                <label for="nama">Materi Video</label>
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/Um6f90guss4"></iframe>
                                                </div>
                                                <label for="nama">Dikirim Oleh : USER001</label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-12 text-center">
                                                <label for="nama">Materi Audio</label>
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="https://drive.google.com/file/d/1Vb5knf3ccX69gmie9CHRMHX68Hd2e6XC/preview" height="200"></iframe>
                                                </div>
                                                <label for="nama">Dikirim Oleh : USER001</label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-12 text-center">
                                                <label for="nama">Materi Tekstual</label>
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="https://drive.google.com/embeddedfolderview?id=1kkCZJMovjmvoa8LFydzlbB-4HIYAWh74"></iframe>
                                                </div>
                                                <label for="nama">Dikirim Oleh : USER001</label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-12 text-center">
                                                <label for="nama">Materi Coding</label>
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <script src="https://gist-it.appspot.com/github/robertkrimen/gist-it-example/blob/master/example.js"></script>
                                                </div>
                                                <label for="nama">Dikirim Oleh : USER001</label>
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
                                                <label for="nama">: {{ $kelas->nama }}</label>
                                            </div>
                                            <div class="col-md-3">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <label for="nama">Kode Kelas</label>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nama">: NGULIK{{ $kelas->id }}</label>
                                            </div>
                                            <div class="col-md-3">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <label for="nama">Pengajar</label>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nama">: {{ $kelas->user->nama }}</label>
                                            </div>
                                            <div class="col-md-3">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <label for="nama">Deskripsi</label>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nama">: {{ $kelas->deskripsi }}</label>
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
                                                <button type="button" class="btn btn-xs btn-info">kirim pesan</button>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <label for="nama">USER023</label>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="button" class="btn btn-xs btn-info">kirim pesan</button>
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
                                            <div class="col-md-12 text-center">
                                                <label for="nama">Materi Video</label>
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$url2}}"></iframe>
                                                    <!-- <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/Um6f90guss4"></iframe> -->
                                                </div>
                                                <label for="nama">Dikirim Oleh : USER001</label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-12 text-center">
                                                <label for="nama">Materi Audio</label>
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="https://drive.google.com/file/d/1Vb5knf3ccX69gmie9CHRMHX68Hd2e6XC/preview" height="200"></iframe>
                                                </div>
                                                <label for="nama">Dikirim Oleh : USER001</label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-12 text-center">
                                                <label for="nama">Materi Tekstual</label>
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="https://drive.google.com/file/d/1fqVo9F3kp9bzCuzRjjj58wdFoetQS9HN/preview"></iframe>
                                                </div>
                                                <label for="nama">Dikirim Oleh : USER001</label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-12 text-center">
                                                <label for="nama">Materi Coding</label>
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <script src="https://gist-it.appspot.com/github.com/Riowaldy/coba/blob/master/coba.js"></script>
                                                </div>
                                                <label for="nama">Dikirim Oleh : USER001</label>
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
        
    @endif

@endsection
