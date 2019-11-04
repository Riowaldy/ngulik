@extends('layouts.app')

@section('content')

    @if(Auth::user()->status == 'admin')
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Halaman Materi Admin</b>
                            <div class="pull-right">
                                <div class="dropdown">
                                    <button class="btn btn-xs btn-default dropdown-toggle" type="button" data-toggle="dropdown">Tambahkan Materi
                                    <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#" data-toggle="modal" data-target="#buat_video"><h6>Materi Tekstual (GDrive)</h6></a></li>
                                    </ul>
                                </div>
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
                            <b>Halaman Materi Moderator</b>
                            <div class="pull-right">
                                <div class="dropdown">
                                    <button class="btn btn-xs btn-default dropdown-toggle" type="button" data-toggle="dropdown">Tambahkan Materi
                                    <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#" data-toggle="modal" data-target="#buat_video"><h6>Materi Tekstual (GDrive)</h6></a></li>
                                    </ul>
                                </div>
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
                            <b>Halaman Materi Pengajar</b>
                            <div class="pull-right">
                                <div class="dropdown">
                                    <button class="btn btn-xs btn-default dropdown-toggle" type="button" data-toggle="dropdown">Tambahkan Materi
                                    <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#" data-toggle="modal" data-target="#buat_video"><h6>Materi Tekstual (GDrive)</h6></a></li>
                                    </ul>
                                </div>
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
                            <b>Halaman Materi Murid</b>
                            <div class="pull-right">
                                <div class="dropdown">
                                    <button class="btn btn-xs btn-default dropdown-toggle" type="button" data-toggle="dropdown">Tambahkan Materi
                                    <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#" data-toggle="modal" data-target="#buat_video"><h6>Materi Tekstual (GDrive)</h6></a></li>
                                    </ul>
                                </div>
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
                                </li>
                            </ul>
                            
                    </div>
                </div>
            </div>
        </div>
    @endif

<!-- Modal Create Audio-->
    <div class="modal fade" id="buat_video" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Tambah Materi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                          
    <!--Form Dalam Modal Create Audio -->
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
<!-- Akhir Modal Create Audio -->
@endsection
