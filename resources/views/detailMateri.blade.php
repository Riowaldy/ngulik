@extends('layouts.app')

@section('content')

    @if(Auth::user()->status == 'admin')
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Halaman Detail Materi</b>
                        </div>
                        @if($materi->jenis == 'Youtube')
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$materi->link}}"></iframe>
                                                </div>      
                                                <div style="margin-bottom: 30px;"></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="text-center">
                                                    <label for="nama"><h2>{{ $materi->nama }}</h2></label>
                                                </div>
                                                <div class="text-justify">
                                                    <label for="nama">Pengirim : {{ $materi->user->nama }}</label>
                                                </div>
                                                <div class="text-justify">
                                                    <label for="nama">Deskripsi : {{ $materi->deskripsi }}</label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="text-center">
                                                <label><h3>Komentar</h3></label>
                                            </div>
                                            @foreach($komentars as $komentar)
                                            <div class="col-md-10">
                                                <div>
                                                    <label>{{ $komentar->user->nama }}</label>
                                                </div>
                                                <div>
                                                    <label><h5>{{ $komentar->isikomentar }}</h5></label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div>
                                                    <label></label>
                                                </div>
                                                <div>
                                                    <label><h5>{{ $komentar->created_at->diffForHumans() }}</h5></label>
                                                </div>
                                            </div>
                                            @endforeach
                                            <form role="form" action="{{route('komentarStore')}}" enctype="multipart/form-data" method="post">{{csrf_field()}}
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <input type="hidden" name="id" id="id" class="form-control" value="" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="hidden" name="kelas_id" id="kelas_id" class="form-control" value="{{ $kelas->id }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="hidden" name="materi_id" id="materi_id" class="form-control" value="{{ $materi->id }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="hidden" name="user_id" id="user_id" class="form-control" value="{{ Auth::id() }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="isikomentar" id="isikomentar" rows="5" class="form-control" placeholder="Tulis komentar"></textarea>
                                                    </div> 
                                                    <div class="box-footer">
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        @else
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="https://drive.google.com/file/d/{{$materi->link}}/preview"></iframe>
                                                </div>      
                                                <div style="margin-bottom: 30px;"></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="text-center">
                                                    <label for="nama"><h2>{{ $materi->nama }}</h2></label>
                                                </div>
                                                <div class="text-justify">
                                                    <label for="nama">Pengirim : {{ $materi->user->nama }}</label>
                                                </div>
                                                <div class="text-justify">
                                                    <label for="nama">Deskripsi : {{ $materi->deskripsi }}</label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="text-center">
                                                <label><h3>Komentar</h3></label>
                                            </div>
                                            @foreach($komentars as $komentar)
                                            <div class="col-md-10">
                                                <div>
                                                    <label>{{ $komentar->user->nama }}</label>
                                                </div>
                                                <div>
                                                    <label><h5>{{ $komentar->isikomentar }}</h5></label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div>
                                                    <label></label>
                                                </div>
                                                <div>
                                                    <label><h5>{{ $komentar->created_at->diffForHumans() }}</h5></label>
                                                </div>
                                            </div>
                                            @endforeach
                                            <form role="form" action="{{route('komentarStore')}}" enctype="multipart/form-data" method="post">{{csrf_field()}}
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <input type="hidden" name="id" id="id" class="form-control" value="" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="hidden" name="kelas_id" id="kelas_id" class="form-control" value="{{ $kelas->id }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="hidden" name="materi_id" id="materi_id" class="form-control" value="{{ $materi->id }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="hidden" name="user_id" id="user_id" class="form-control" value="{{ Auth::id() }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="isikomentar" id="isikomentar" rows="5" class="form-control" placeholder="Tulis komentar"></textarea>
                                                    </div> 
                                                    <div class="box-footer">
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        @endif
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
                            <b>Halaman Detail Materi</b>
                        </div>
                        @if($materi->jenis == 'Youtube')
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$materi->link}}"></iframe>
                                                </div>      
                                                <div style="margin-bottom: 30px;"></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="text-center">
                                                    <label for="nama"><h2>{{ $materi->nama }}</h2></label>
                                                    @if($materi->user_id == Auth::id())
                                                        <div class="pull-right" style="margin-top: 25px;">
                                                            <button type="submit" class="btn btn-sm btn-info" data-id="{{$materi->id}}" data-nama="{{$materi->nama}}" data-deskripsi="{{$materi->deskripsi}}" data-toggle="modal" data-target="#edit_materi">Edit</button>
                                                        </div>
                                                    @else
                                                        <div class="pull-right" style="margin-top: 25px;">
                                                            
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="text-justify">
                                                    <label for="nama">Pengirim : {{ $materi->user->nama }}</label>
                                                </div>
                                                <div class="text-justify">
                                                    <label for="nama">Deskripsi : {{ $materi->deskripsi }}</label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="text-center">
                                                <label><h3>Komentar</h3></label>
                                            </div>
                                            @foreach($komentars as $komentar)
                                            <div class="col-md-10">
                                                <div>
                                                    <label>{{ $komentar->user->nama }}</label>
                                                </div>
                                                <div>
                                                    <label><h5>{{ $komentar->isikomentar }}</h5></label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div>
                                                    <label></label>
                                                </div>
                                                <div>
                                                    <label><h5>{{ $komentar->created_at->diffForHumans() }}</h5></label>
                                                </div>
                                            </div>
                                            @endforeach
                                            <form role="form" action="{{route('komentarStore')}}" enctype="multipart/form-data" method="post">{{csrf_field()}}
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <input type="hidden" name="id" id="id" class="form-control" value="" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="hidden" name="kelas_id" id="kelas_id" class="form-control" value="{{ $kelas->id }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="hidden" name="materi_id" id="materi_id" class="form-control" value="{{ $materi->id }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="hidden" name="user_id" id="user_id" class="form-control" value="{{ Auth::id() }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="isikomentar" id="isikomentar" rows="5" class="form-control" placeholder="Tulis komentar"></textarea>
                                                    </div> 
                                                    <div class="box-footer">
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        @else
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="https://drive.google.com/file/d/{{$materi->link}}/preview"></iframe>
                                                </div>      
                                                <div style="margin-bottom: 30px;"></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="text-center">
                                                    <label for="nama"><h2>{{ $materi->nama }}</h2></label>
                                                    @if($materi->user_id == Auth::id())
                                                        <div class="pull-right" style="margin-top: 25px;">
                                                            <button type="submit" class="btn btn-sm btn-info" data-id="{{$materi->id}}" data-nama="{{$materi->nama}}" data-deskripsi="{{$materi->deskripsi}}" data-toggle="modal" data-target="#edit_materi">Edit</button>
                                                        </div>
                                                    @else
                                                        <div class="pull-right" style="margin-top: 25px;">
                                                            
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="text-justify">
                                                    <label for="nama">Pengirim : {{ $materi->user->nama }}</label>
                                                </div>
                                                <div class="text-justify">
                                                    <label for="nama">Deskripsi : {{ $materi->deskripsi }}</label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="text-center">
                                                <label><h3>Komentar</h3></label>
                                            </div>
                                            @foreach($komentars as $komentar)
                                            <div class="col-md-10">
                                                <div>
                                                    <label>{{ $komentar->user->nama }}</label>
                                                </div>
                                                <div>
                                                    <label><h5>{{ $komentar->isikomentar }}</h5></label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div>
                                                    <label></label>
                                                </div>
                                                <div>
                                                    <label><h5>{{ $komentar->created_at->diffForHumans() }}</h5></label>
                                                </div>
                                            </div>
                                            @endforeach
                                            <form role="form" action="{{route('komentarStore')}}" enctype="multipart/form-data" method="post">{{csrf_field()}}
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <input type="hidden" name="id" id="id" class="form-control" value="" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="hidden" name="kelas_id" id="kelas_id" class="form-control" value="{{ $kelas->id }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="hidden" name="materi_id" id="materi_id" class="form-control" value="{{ $materi->id }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="hidden" name="user_id" id="user_id" class="form-control" value="{{ Auth::id() }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="isikomentar" id="isikomentar" rows="5" class="form-control" placeholder="Tulis komentar"></textarea>
                                                    </div> 
                                                    <div class="box-footer">
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        @endif
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
                            <b>Halaman Detail Materi</b>
                        </div>
                        @if($materi->jenis == 'Youtube')
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$materi->link}}"></iframe>
                                                </div>      
                                                <div style="margin-bottom: 30px;"></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="text-center">
                                                    <label for="nama"><h2>{{ $materi->nama }}</h2></label>
                                                    @if($materi->user_id == Auth::id())
                                                        <div class="pull-right" style="margin-top: 25px;">
                                                            <button type="submit" class="btn btn-sm btn-info" data-id="{{$materi->id}}" data-nama="{{$materi->nama}}" data-deskripsi="{{$materi->deskripsi}}" data-toggle="modal" data-target="#edit_materi">Edit</button>
                                                        </div>
                                                    @else
                                                        <div class="pull-right" style="margin-top: 25px;">
                                                            
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="text-justify">
                                                    <label for="nama">Pengirim : {{ $materi->user->nama }}</label>
                                                </div>
                                                <div class="text-justify">
                                                    <label for="nama">Deskripsi : {{ $materi->deskripsi }}</label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="text-center">
                                                <label><h3>Komentar</h3></label>
                                            </div>
                                            @foreach($komentars as $komentar)
                                            <div class="col-md-10">
                                                <div>
                                                    <label>{{ $komentar->user->nama }}</label>
                                                </div>
                                                <div>
                                                    <label><h5>{{ $komentar->isikomentar }}</h5></label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div>
                                                    <label></label>
                                                </div>
                                                <div>
                                                    <label><h5>{{ $komentar->created_at->diffForHumans() }}</h5></label>
                                                </div>
                                            </div>
                                            @endforeach
                                            <form role="form" action="{{route('komentarStore')}}" enctype="multipart/form-data" method="post">{{csrf_field()}}
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <input type="hidden" name="id" id="id" class="form-control" value="" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="hidden" name="kelas_id" id="kelas_id" class="form-control" value="{{ $kelas->id }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="hidden" name="materi_id" id="materi_id" class="form-control" value="{{ $materi->id }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="hidden" name="user_id" id="user_id" class="form-control" value="{{ Auth::id() }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="isikomentar" id="isikomentar" rows="5" class="form-control" placeholder="Tulis komentar"></textarea>
                                                    </div> 
                                                    <div class="box-footer">
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        @else
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="https://drive.google.com/file/d/{{$materi->link}}/preview"></iframe>
                                                </div>      
                                                <div style="margin-bottom: 30px;"></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="text-center">
                                                    <label for="nama"><h2>{{ $materi->nama }}</h2></label>
                                                    @if($materi->user_id == Auth::id())
                                                        <div class="pull-right" style="margin-top: 25px;">
                                                            <button type="submit" class="btn btn-sm btn-info" data-id="{{$materi->id}}" data-nama="{{$materi->nama}}" data-deskripsi="{{$materi->deskripsi}}" data-toggle="modal" data-target="#edit_materi">Edit</button>
                                                        </div>
                                                    @else
                                                        <div class="pull-right" style="margin-top: 25px;">
                                                            
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="text-justify">
                                                    <label for="nama">Pengirim : {{ $materi->user->nama }}</label>
                                                </div>
                                                <div class="text-justify">
                                                    <label for="nama">Deskripsi : {{ $materi->deskripsi }}</label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="text-center">
                                                <label><h3>Komentar</h3></label>
                                            </div>
                                            @foreach($komentars as $komentar)
                                            <div class="col-md-10">
                                                <div>
                                                    <label>{{ $komentar->user->nama }}</label>
                                                </div>
                                                <div>
                                                    <label><h5>{{ $komentar->isikomentar }}</h5></label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div>
                                                    <label></label>
                                                </div>
                                                <div>
                                                    <label><h5>{{ $komentar->created_at->diffForHumans() }}</h5></label>
                                                </div>
                                            </div>
                                            @endforeach
                                            <form role="form" action="{{route('komentarStore')}}" enctype="multipart/form-data" method="post">{{csrf_field()}}
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <input type="hidden" name="id" id="id" class="form-control" value="" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="hidden" name="kelas_id" id="kelas_id" class="form-control" value="{{ $kelas->id }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="hidden" name="materi_id" id="materi_id" class="form-control" value="{{ $materi->id }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="hidden" name="user_id" id="user_id" class="form-control" value="{{ Auth::id() }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="isikomentar" id="isikomentar" rows="5" class="form-control" placeholder="Tulis komentar"></textarea>
                                                    </div> 
                                                    <div class="box-footer">
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        @endif
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
                            <b>Halaman Detail Materi</b>
                        </div>
                        @if($materi->jenis == 'Youtube')
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$materi->link}}"></iframe>
                                                </div>      
                                                <div style="margin-bottom: 30px;"></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="text-center">
                                                    <label for="nama"><h2>{{ $materi->nama }}</h2></label>
                                                    @if($materi->user_id == Auth::id())
                                                        <div class="pull-right" style="margin-top: 25px;">
                                                            <button type="submit" class="btn btn-sm btn-info" data-id="{{$materi->id}}" data-nama="{{$materi->nama}}" data-deskripsi="{{$materi->deskripsi}}" data-toggle="modal" data-target="#edit_materi">Edit</button>
                                                        </div>
                                                    @else
                                                        <div class="pull-right" style="margin-top: 25px;">

                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="text-justify">
                                                    <label for="nama">Pengirim : {{ $materi->user->nama }}</label>
                                                </div>
                                                <div class="text-justify">
                                                    <label for="nama">Deskripsi : {{ $materi->deskripsi }}</label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="text-center">
                                                <label><h3>Komentar</h3></label>
                                            </div>
                                            @foreach($komentars as $komentar)
                                            <div class="col-md-10">
                                                <div>
                                                    <label>{{ $komentar->user->nama }}</label>
                                                </div>
                                                <div>
                                                    <label><h5>{{ $komentar->isikomentar }}</h5></label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div>
                                                    <label></label>
                                                </div>
                                                <div>
                                                    <label><h5>{{ $komentar->created_at->diffForHumans() }}</h5></label>
                                                </div>
                                            </div>
                                            @endforeach
                                            <form role="form" action="{{route('komentarStore')}}" enctype="multipart/form-data" method="post">{{csrf_field()}}
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <input type="hidden" name="id" id="id" class="form-control" value="" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="hidden" name="kelas_id" id="kelas_id" class="form-control" value="{{ $kelas->id }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="hidden" name="materi_id" id="materi_id" class="form-control" value="{{ $materi->id }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="hidden" name="user_id" id="user_id" class="form-control" value="{{ Auth::id() }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="isikomentar" id="isikomentar" rows="5" class="form-control" placeholder="Tulis komentar"></textarea>
                                                    </div> 
                                                    <div class="box-footer">
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        @else
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="https://drive.google.com/file/d/{{$materi->link}}/preview"></iframe>
                                                </div>      
                                                <div style="margin-bottom: 30px;"></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="text-center">
                                                    <label for="nama"><h2>{{ $materi->nama }}</h2></label>
                                                    @if($materi->user_id == Auth::id())
                                                        <div class="pull-right" style="margin-top: 25px;">
                                                            <button type="submit" class="btn btn-sm btn-info" data-id="{{$materi->id}}" data-nama="{{$materi->nama}}" data-deskripsi="{{$materi->deskripsi}}" data-toggle="modal" data-target="#edit_materi">Edit</button>
                                                        </div>
                                                    @else
                                                        <div class="pull-right" style="margin-top: 25px;">
                                                            
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="text-justify">
                                                    <label for="nama">Pengirim : {{ $materi->user->nama }}</label>
                                                </div>
                                                <div class="text-justify">
                                                    <label for="nama">Deskripsi : {{ $materi->deskripsi }}</label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="text-center">
                                                <label><h3>Komentar</h3></label>
                                            </div>
                                            @foreach($komentars as $komentar)
                                            <div class="col-md-10">
                                                <div>
                                                    <label>{{ $komentar->user->nama }}</label>
                                                </div>
                                                <div>
                                                    <label><h5>{{ $komentar->isikomentar }}</h5></label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div>
                                                    <label></label>
                                                </div>
                                                <div>
                                                    <label><h5>{{ $komentar->created_at->diffForHumans() }}</h5></label>
                                                </div>
                                            </div>
                                            @endforeach
                                            <form role="form" action="{{route('komentarStore')}}" enctype="multipart/form-data" method="post">{{csrf_field()}}
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <input type="hidden" name="id" id="id" class="form-control" value="" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="hidden" name="kelas_id" id="kelas_id" class="form-control" value="{{ $kelas->id }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="hidden" name="materi_id" id="materi_id" class="form-control" value="{{ $materi->id }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="hidden" name="user_id" id="user_id" class="form-control" value="{{ Auth::id() }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="isikomentar" id="isikomentar" rows="5" class="form-control" placeholder="Tulis komentar"></textarea>
                                                    </div> 
                                                    <div class="box-footer">
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif
<!-- Modal Edit Materi-->
    <div class="modal fade" id="edit_materi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Ubah Materi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                          
    <!--Form Dalam Modal Edit Materi-->
                <form role="form" action="{{route('editMateri')}}" enctype="multipart/form-data" method="post">{{csrf_field()}}
                    <div class="box-body">
                        <div class="form-group">
                            <input type="hidden" name="id" id="id" class="form-control" value="" readonly>
                        </div>
                        <div class="form-group">
                            <label for="input_nama">Judul Materi</label>
                            <input type="text" name="nama" id="nama" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label for="input_nama">Deskripsi</label>
                            <input type="text" name="deskripsi" id="deskripsi" class="form-control" value="">
                        </div>
                        <div class="box-footer text-center">
                            <button type="submit" class="btn btn-primary">Ubah</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
<!-- Akhir Modal Edit Materi -->
@endsection
