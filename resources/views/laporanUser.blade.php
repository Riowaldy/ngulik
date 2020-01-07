@extends('layouts.app')

@section('content')
<div style="margin-top:60px;"></div>
    @if(Auth::user()->status == 'admin')
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="panel panel-primary">
                        <div class="panel-heading"><b>Halaman Laporan Admin</b></div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="panel-body">
                                    <div class="col-xs-6 col-md-8">
                                        <label for="nama">Laporan User</label>
                                    </div>
                                    <div class="col-xs-6 col-md-4">
                                        <button class="btn btn-sm btn-info" onclick="location.href='{{ route('laporanUser') }}'">Lihat Laporan</button>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="panel-body">
                                    <div class="col-xs-6 col-md-8">
                                        <label for="nama">Laporan Kelas</label>
                                    </div>
                                    <div class="col-xs-6 col-md-4">
                                        <button class="btn btn-sm btn-info" onclick="location.href='{{ route('laporanKelas') }}'">Lihat Laporan</button>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="panel-body">
                                    <div class="col-xs-6 col-md-8">
                                        <label for="nama">Laporan Materi</label>
                                    </div>
                                    <div class="col-xs-6 col-md-4">
                                        <button class="btn btn-sm btn-info" onclick="location.href='{{ route('laporanMateri') }}'">Lihat Laporan</button>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="panel-body">
                                    <div class="col-xs-6 col-md-8">
                                        <label for="nama">Laporan Tugas</label>
                                    </div>
                                    <div class="col-xs-6 col-md-4">
                                        <button class="btn btn-sm btn-info" onclick="location.href='{{ route('laporanTugas') }}'">Lihat Laporan</button>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="panel-body">
                                    <div class="col-xs-6 col-md-8">
                                        <label for="nama">Laporan Pengumuman</label>
                                    </div>
                                    <div class="col-xs-6 col-md-4">
                                        <button class="btn btn-sm btn-info" onclick="location.href='{{ route('laporanPengumuman') }}'">Lihat Laporan</button>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="panel-body">
                                    <div class="col-xs-6 col-md-8">
                                        <label for="nama">Laporan Komentar</label>
                                    </div>
                                    <div class="col-xs-6 col-md-4">
                                        <button class="btn btn-sm btn-info" onclick="location.href='{{ route('laporanKomentar') }}'">Lihat Laporan</button>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Data Laporan</b>
                            <a href="{{ route('UserPDF') }}">
                                <button type="submit" class="btn btn-xs btn-danger pull-right">
                                    <b>Cetak Laporan</b>
                                </button>
                            </a>
                        </div>
                        
                        <ul class="list-group list-group-flush text-center">
                            <li class="list-group-item">
                                <div class="panel-body" style="margin-top: -10px; margin-bottom: -10px;">
                                    <div class="col-xs-12 col-md-12">
                                        <label for="nama">Jumlah User : {{$users2}}</label>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="panel-body" style="margin-top: -10px; margin-bottom: -10px;">
                                    <div class="col-xs-3 col-md-4">
                                        <label for="nama">Nama</label>
                                    </div>
                                    <div class="col-xs-4 col-md-4">
                                        <label for="nama">Status</label>
                                    </div>
                                    <div class="col-xs-5 col-md-4">
                                        <label for="nama">Email</label>
                                    </div>
                                </div>
                            </li>
                            @foreach($users as $user)
                            <li class="list-group-item">
                                <div class="panel-body" style="margin-top: -20px; margin-bottom: -20px;">
                                    <div class="col-xs-3 col-md-4">
                                        <label for="nama">{{$user->nama}}</label>
                                    </div>
                                    <div class="col-xs-4 col-md-4">
                                        <label for="nama">{{$user->status}}</label>
                                    </div>
                                    <div class="col-xs-5 col-md-4">
                                        <label for="nama">{{$user->email}}</label>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="text-center">
                            {!! $users->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @elseif(Auth::user()->status == 'moderator')

    @elseif(Auth::user()->status == 'pengajar')

    @else

    @endif

<div class="col-sm-12 text-center">
  <p>&copy; 2019 | Riowaldy Indrawan</p>
</div>
@endsection
