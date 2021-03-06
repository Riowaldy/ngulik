@extends('layouts.app')

@section('content')
<div style="margin-top:60px;"></div>
    @if(Auth::user()->status == 'admin')
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <a href="{{ route('detailKelas', $kelas) }}">
                                <span><b><i class="fas fa-arrow-circle-left" style="margin-right: 20px; color: white;"></i></b></span>
                            </a>
                            <b>Daftar Tugas</b>
                            <div class="pull-right">
                                <a href="{{ route('chartTugas',[$kelas,$tugas]) }}">
                                    <button type="submit" class="btn btn-xs btn-danger">
                                        <b>Lihat Data Statistik</b>
                                    </button>
                                </a>
                            </div>
                        </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12 text-center">
                                            <div class="col-xs-4 col-md-4">
                                                <label for="nama">Nama Pengirim</label>
                                            </div>
                                            <div class="col-xs-4 col-md-4">
                                                <label for="nama">Link</label>
                                            </div>
                                            <div class="col-xs-4 col-md-4">
                                                <label for="nama">Nilai</label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        @foreach ($tugass as $tugas)
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12 text-center">
                                            <div class="col-xs-4 col-md-4">
                                                <label for="nama">{{ $tugas->nama }}</label>
                                            </div>
                                            <div class="col-xs-4 col-md-4">
                                                <button class="btn btn-sm btn-primary" onclick="location.href='{{ route('detailTugasuser',[$tugas->kelas_id, $tugas->id, $tugas->idtgs]) }}'">Lihat Tugas</button>
                                            </div>
                                            <div class="col-xs-4 col-md-4">
                                                <label for="nama">{{ $tugas->nilai }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @elseif(Auth::user()->status == 'moderator')
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <a href="{{ route('detailKelas', $kelas) }}">
                                <span><b><i class="fas fa-arrow-circle-left" style="margin-right: 20px; color: white;"></i></b></span>
                            </a>
                            <b>Daftar Tugas</b>
                        </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12 text-center">
                                            <div class="col-xs-4 col-md-4">
                                                <label for="nama">Nama Pengirim</label>
                                            </div>
                                            <div class="col-xs-4 col-md-4">
                                                <label for="nama">Link</label>
                                            </div>
                                            <div class="col-xs-4 col-md-4">
                                                <label for="nama">Nilai</label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        @foreach ($tugass as $tugas)
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12 text-center">
                                            <div class="col-xs-4 col-md-4">
                                                <label for="nama">{{ $tugas->nama }}</label>
                                            </div>
                                            <div class="col-xs-4 col-md-4">
                                                <button class="btn btn-sm btn-primary" onclick="location.href='{{ route('detailTugasuser',[$tugas->kelas_id, $tugas->id, $tugas->idtgs]) }}'">Lihat Tugas</button>
                                            </div>
                                            <div class="col-xs-4 col-md-4">
                                                <label for="nama">{{ $tugas->nilai }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @elseif(Auth::user()->status == 'pengajar')
        
    @else
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <a href="{{ route('detailKelas', $kelas) }}">
                                <span><b><i class="fas fa-arrow-circle-left" style="margin-right: 20px; color: white;"></i></b></span>
                            </a>
                            <b>Daftar Tugas</b>
                        </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12 text-center">
                                            <div class="col-xs-4 col-md-4">
                                                <label for="nama">Nama Pengirim</label>
                                            </div>
                                            <div class="col-xs-4 col-md-4">
                                                <label for="nama">Link</label>
                                            </div>
                                            <div class="col-xs-4 col-md-4">
                                                <label for="nama">Nilai</label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        @foreach ($tugass as $tugas)
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12 text-center">
                                            <div class="col-xs-4 col-md-4">
                                                <label for="nama">{{ $tugas->nama }}</label>
                                            </div>
                                            <div class="col-xs-4 col-md-4">
                                                <button class="btn btn-sm btn-primary" onclick="location.href='{{ route('detailTugasuser',[$tugas->kelas_id, $tugas->id, $tugas->idtgs]) }}'">Lihat Tugas</button>
                                            </div>
                                            <div class="col-xs-4 col-md-4">
                                                <label for="nama">{{ $tugas->nilai }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
<div class="col-sm-12 text-center">
  <p>&copy; 2019 | Riowaldy Indrawan</p>
</div>
@endsection
