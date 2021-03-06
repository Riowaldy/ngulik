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
                            <b>Halaman Materi Admin</b>
                        </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            @foreach ($materis as $materi)
                                            <div class="col-md-4">
                                                <div>
                                                    <label for="nama">{{ $materi->nama }}</label>
                                                    <div class="pull-right">
                                                        <a href="{{ route('detailMateri',[$kelas, $materi]) }}">
                                                            <input type="button" value="Detail" class="btn btn-xs btn-info" />
                                                        </a>
                                                    </div>
                                                </div>
                                                <div>
                                                    <label for="nama">{{ $materi->user->nama }}</label>
                                                </div>
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="https://drive.google.com/file/d/{{$materi->link}}/preview"></iframe>
                                                </div>
                                                <div style="margin-bottom: 30px;"></div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="col-md-12">
                                            <div class="text-center">
                                                {!! $materis->render() !!}
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
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <a href="{{ route('detailKelas', $kelas) }}">
                                <span><b><i class="fas fa-arrow-circle-left" style="margin-right: 20px; color: white;"></i></b></span>
                            </a>
                            <b>Halaman Materi Moderator</b>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-xs btn-default" data-toggle="modal" data-target="#buat_video">Tambah Materi Tekstual (GDrive)</button>
                            </div>
                        </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        @foreach ($materis as $materi)
                                        <div class="col-md-4">
                                            <div>
                                                <label for="nama">{{ $materi->nama }}</label>
                                                <div class="pull-right">
                                                    <a href="{{ route('detailMateri',[$kelas, $materi]) }}">
                                                        <input type="button" value="Detail" class="btn btn-xs btn-info" />
                                                    </a>
                                                    @if($materi->status == 'Biasa')
                                                        <button type="submit" class="btn btn-xs btn-default" data-id="{{$materi->id}}" data-toggle="modal" data-target="#edit_statusMateri">Tampilkan</button>
                                                    @else
                                                        <button type="submit" class="btn btn-xs btn-info" data-id="{{$materi->id}}" data-toggle="modal" data-target="#edit_statusMateri2">Ditampilkan</button>
                                                    @endif
                                                </div>
                                            </div>
                                            <div>
                                                <label for="nama">{{ $materi->user->nama }}</label>
                                            </div>
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe class="embed-responsive-item" src="https://drive.google.com/file/d/{{$materi->link}}/preview"></iframe>
                                            </div>
                                            <div style="margin-bottom: 30px;"></div>
                                        </div>
                                        @endforeach
                                        <div class="text-center">
                                            {!! $materis->render() !!}
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
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <a href="{{ route('detailKelas', $kelas) }}">
                                <span><b><i class="fas fa-arrow-circle-left" style="margin-right: 20px; color: white;"></i></b></span>
                            </a>
                            <b>Halaman Materi Pengajar</b>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-xs btn-default" data-toggle="modal" data-target="#buat_video">Tambah Materi Tekstual (GDrive)</button>
                            </div>
                        </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            @foreach ($materis as $materi)
                                            <div class="col-md-4">
                                                <div>
                                                    <label for="nama">{{ $materi->nama }}</label>
                                                    <div class="pull-right">
                                                        <a href="{{ route('detailMateri',[$kelas, $materi]) }}">
                                                            <input type="button" value="Detail" class="btn btn-xs btn-info" />
                                                        </a>
                                                    </div>
                                                </div>
                                                <div>
                                                    <label for="nama">{{ $materi->user->nama }}</label>
                                                </div>
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="https://drive.google.com/file/d/{{$materi->link}}/preview"></iframe>
                                                </div>
                                                <div style="margin-bottom: 30px;"></div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="col-md-12">
                                            <div class="text-center">
                                                {!! $materis->render() !!}
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
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <a href="{{ route('detailKelas', $kelas) }}">
                                <span><b><i class="fas fa-arrow-circle-left" style="margin-right: 20px; color: white;"></i></b></span>
                            </a>
                            <b>Halaman Materi Murid</b>
                        </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            @foreach ($materis as $materi)
                                            <div class="col-md-4">
                                                <div>
                                                    <label for="nama">{{ $materi->nama }}</label>
                                                    <div class="pull-right">
                                                        <a href="{{ route('detailMateri',[$kelas, $materi]) }}">
                                                            <input type="button" value="Detail" class="btn btn-xs btn-info" />
                                                        </a>
                                                    </div>
                                                </div>
                                                <div>
                                                    <label for="nama">{{ $materi->user->nama }}</label>
                                                </div>
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="https://drive.google.com/file/d/{{$materi->link}}/preview"></iframe>
                                                </div>
                                                <div style="margin-bottom: 30px;"></div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="col-md-12">
                                            <div class="text-center">
                                                {!! $materis->render() !!}
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

<!-- Modal Create Tekstual-->
    <div class="modal fade" id="buat_video" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center" style="background-color: #7997f7; color: white;">
                    <h4 class="modal-title" id="myModalLabel"><b>Tambah Materi</b></h4>
                </div>
                <div class="modal-body">
                          
    <!--Form Dalam Modal Create Tekstual -->
                    <form role="form" action="{{route('materiTekstualStore')}}" enctype="multipart/form-data" method="post">{{csrf_field()}}
                        <div class="box-body">
                            <div class="form-group">
                                <input type="hidden" name="id" id="id" class="form-control" value="" readonly>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="user_id" id="user_id" class="form-control" value="{{ Auth::id() }}">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="kelas_id" id="kelas_id" class="form-control" value="{{$kelas->id}}">
                            </div>
                            <div class="form-group">
                                <label for="input_nama">Judul Materi</label>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Tulis Judul Materi">
                            </div> 
                            <div class="form-group">
                                <input type="hidden" name="jenis" id="jenis" class="form-control" value="Tekstual">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="status" id="status" class="form-control" value="Biasa">
                            </div>
                            <div class="form-group">
                                <label for="input_nama">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control" placeholder="Tulis Deskripsi Materi"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="input_nama">Link</label>
                                <input type="text" name="link" id="link" class="form-control" placeholder="Tulis Link Materi">
                                <label>Contoh link : https://drive.google.com/file/d/123ABCDE/view?usp=sharing</label>
                                <label>Contoh link 2 : https://drive.google.com/file/d/123ABCDE/view?usp=drive_open</label>
                            </div>
                            <div class="box-footer text-center">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- Akhir Modal Create Tekstual -->

<!-- Modal Edit Status Materi-->
    <div class="modal fade" id="edit_statusMateri" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center" style="background-color: #e8c83a; color: white;">
                    <h4 class="modal-title" id="myModalLabel"><b>Ubah Status Materi</b></h4>
                </div>
                <div class="modal-body">
                          
    <!--Form Dalam Modal Edit Status Materi-->
                <form role="form" action="{{route('editStatusMateri')}}" enctype="multipart/form-data" method="post">{{csrf_field()}}
                    <div class="box-body">
                        <div class="form-group">
                            <input type="hidden" name="id" id="id" class="form-control" value="" readonly>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="status" id="status" class="form-control" value="Terverifikasi">
                        </div>
                        <div class="form-group text-center">
                            <label for="input_nama">Apakah anda ingin merubah status kelas menjadi terverifikasi?</label>
                        </div> 
                        <div class="box-footer text-center">
                            <button type="submit" class="btn btn-warning">Ubah</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
<!-- Akhir Modal Edit Status Materi -->

<!-- Modal Edit Status Materi-->
    <div class="modal fade" id="edit_statusMateri2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center" style="background-color: #e8c83a; color: white;">
                    <h4 class="modal-title" id="myModalLabel"><b>Ubah Status Materi</b></h4>
                </div>
                <div class="modal-body">
                          
    <!--Form Dalam Modal Edit Status Materi-->
                <form role="form" action="{{route('editStatusMateri')}}" enctype="multipart/form-data" method="post">{{csrf_field()}}
                    <div class="box-body">
                        <div class="form-group">
                            <input type="hidden" name="id" id="id" class="form-control" value="" readonly>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="status" id="status" class="form-control" value="Biasa">
                        </div>
                        <div class="form-group text-center">
                            <label for="input_nama">Apakah anda ingin merubah status kelas menjadi Tidak Terverifikasi?</label>
                        </div> 
                        <div class="box-footer text-center">
                            <button type="submit" class="btn btn-warning">Ubah</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
<!-- Akhir Modal Edit Status Materi -->
<div class="col-sm-12 text-center">
  <p>&copy; 2019 | Riowaldy Indrawan</p>
</div>
@endsection
