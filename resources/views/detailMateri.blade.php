@extends('layouts.app')

@section('content')
<div style="margin-top:60px;"></div>
    @if(Auth::user()->status == 'admin')
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Halaman Detail Materi</b>
                        </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                @if($materi->jenis == 'Youtube')
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="http://www.youtube.com/embed/{{$materi->link}}"></iframe>
                                                </div>
                                                @elseif($materi->jenis == 'Github')
                                                <div class="github-card" data-github="{{$materi->link}}" data-width="350" data-height="" data-theme="default"></div>
                                                <script src="//cdn.jsdelivr.net/github-cards/latest/widget.js"></script>
                                                @else
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="http://drive.google.com/file/d/{{$materi->link}}/preview"></iframe>
                                                </div> 
                                                @endif   
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
                                            <div class="col-xs-8 col-md-10">
                                                <div>
                                                    <label>{{ $komentar->user->nama }}</label>
                                                </div>
                                                <div>
                                                    <label><h5>{{ $komentar->isikomentar }}</h5></label>
                                                </div>
                                            </div>
                                            <div class="col-xs-4 col-md-2">
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
                                                        <button type="submit" class="btn btn-primary">Komentar</button>
                                                    </div>
                                                </div>
                                            </form>
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
                            <b>Halaman Detail Materi</b>
                            @if($materi->user_id == Auth::id())
                            <div class="pull-right">
                                <button type="submit" class="btn btn-xs btn-warning" data-id="{{$materi->id}}" data-nama="{{$materi->nama}}" data-deskripsi="{{$materi->deskripsi}}" data-toggle="modal" data-target="#edit_materi">&nbsp;&nbsp;&nbsp;Edit&nbsp;&nbsp;&nbsp;&nbsp;</button>
                                <button type="submit" class="btn btn-xs btn-danger" data-id="{{$materi->id}}" data-kelas_id="{{$materi->kelas_id}}" data-toggle="modal" data-target="#hapus_materi">&nbsp;Hapus&nbsp;</button> 
                            </div>
                                    
                            @else
                            @endif
                        </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                @if($materi->jenis == 'Youtube')
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$materi->link}}"></iframe>
                                                </div>
                                                @elseif($materi->jenis == 'Github')
                                                <div class="github-card" data-github="{{$materi->link}}" data-width="350" data-height="" data-theme="default"></div>
                                                <script src="//cdn.jsdelivr.net/github-cards/latest/widget.js"></script>
                                                @else
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="https://drive.google.com/file/d/{{$materi->link}}/preview"></iframe>
                                                </div> 
                                                @endif     
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
                                            <div class="col-xs-8 col-md-10">
                                                <div>
                                                    <label>{{ $komentar->user->nama }}</label>
                                                </div>
                                                <div>
                                                    <label><h5>{{ $komentar->isikomentar }}</h5></label>
                                                </div>
                                            </div>
                                            <div class="col-xs-4 col-md-2">
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
                                                        <button type="submit" class="btn btn-primary">Komentar</button>
                                                    </div>
                                                </div>
                                            </form>
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
                            <b>Halaman Detail Materi</b>
                            @if($materi->user_id == Auth::id())
                            <div class="pull-right">
                                <button type="submit" class="btn btn-xs btn-warning" data-id="{{$materi->id}}" data-nama="{{$materi->nama}}" data-deskripsi="{{$materi->deskripsi}}" data-toggle="modal" data-target="#edit_materi">&nbsp;&nbsp;&nbsp;Edit&nbsp;&nbsp;&nbsp;&nbsp;</button>
                                <button type="submit" class="btn btn-xs btn-danger" data-id="{{$materi->id}}" data-kelas_id="{{$materi->kelas_id}}" data-toggle="modal" data-target="#hapus_materi">&nbsp;Hapus&nbsp;</button> 
                            </div>
                                    
                            @else
                            @endif
                        </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                @if($materi->jenis == 'Youtube')
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$materi->link}}"></iframe>
                                                </div>
                                                @elseif($materi->jenis == 'Github')
                                                <div class="github-card" data-github="{{$materi->link}}" data-width="350" data-height="" data-theme="default"></div>
                                                <script src="//cdn.jsdelivr.net/github-cards/latest/widget.js"></script>
                                                @else
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="https://drive.google.com/file/d/{{$materi->link}}/preview"></iframe>
                                                </div> 
                                                @endif     
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
                                            <div class="col-xs-8 col-md-10">
                                                <div>
                                                    <label>{{ $komentar->user->nama }}</label>
                                                </div>
                                                <div>
                                                    <label><h5>{{ $komentar->isikomentar }}</h5></label>
                                                </div>
                                            </div>
                                            <div class="col-xs-4 col-md-2">
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
                                                        <button type="submit" class="btn btn-primary">Komentar</button>
                                                    </div>
                                                </div>
                                            </form>
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
                            <b>Halaman Detail Materi</b>
                            @if($materi->user_id == Auth::id())
                            <div class="pull-right">
                                <button type="submit" class="btn btn-xs btn-warning" data-id="{{$materi->id}}" data-nama="{{$materi->nama}}" data-deskripsi="{{$materi->deskripsi}}" data-toggle="modal" data-target="#edit_materi">&nbsp;&nbsp;&nbsp;Edit&nbsp;&nbsp;&nbsp;&nbsp;</button>
                                <button type="submit" class="btn btn-xs btn-danger" data-id="{{$materi->id}}" data-kelas_id="{{$materi->kelas_id}}" data-toggle="modal" data-target="#hapus_materi">&nbsp;Hapus&nbsp;</button> 
                            </div>
                                    
                            @else
                            @endif
                        </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                @if($materi->jenis == 'Youtube')
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$materi->link}}"></iframe>
                                                </div>
                                                @elseif($materi->jenis == 'Github')
                                                <div class="github-card" data-github="{{$materi->link}}" data-width="350" data-height="" data-theme="default"></div>
                                                <script src="//cdn.jsdelivr.net/github-cards/latest/widget.js"></script>
                                                @else
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="https://drive.google.com/file/d/{{$materi->link}}/preview"></iframe>
                                                </div> 
                                                @endif    
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
                                            <div class="col-xs-8 col-md-10">
                                                <div>
                                                    <label>{{ $komentar->user->nama }}</label>
                                                </div>
                                                <div>
                                                    <label><h5>{{ $komentar->isikomentar }}</h5></label>
                                                </div>
                                            </div>
                                            <div class="col-xs-4 col-md-2">
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
                                                        <button type="submit" class="btn btn-primary">Komentar</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif
<!-- Modal Edit Materi-->
    <div class="modal fade" id="edit_materi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center" style="background-color: #e8c83a; color: white;">
                    <h4 class="modal-title" id="myModalLabel"><b>Ubah Materi</b></h4>
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
                            <button type="submit" class="btn btn-warning">Ubah</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
<!-- Akhir Modal Edit Materi -->

<!-- Modal Delete -->
    <div class="modal fade" id="hapus_materi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center" style="background-color: #c94b20; color: white;">
                    <h4 class="modal-title" id="myModalLabel"><b>Hapus Materi</b></h4>
                </div>
                <div class="modal-body">
                          
    <!--Form Dalam Modal Delete -->
                    <form role="form" action="{{ route('hapusMateri') }}" enctype="multipart/form-data" method="post">
                        {{csrf_field()}}
                        {{ method_field('DELETE') }}
                            <div class="form-group">
                                <input type="hidden" name="id" id="id" class="form-control" value="" readonly>
                                <input type="hidden" name="kelas_id" id="kelas_id" class="form-control" value="" readonly>
                            </div>
                            <div class="modal-body">
                                <p class="text-center">Apakah anda yakin ingin menghapus materi ini?</p>
                            </div>
                            <div class="box-footer text-center">
                                <button type="submit" class="btn btn-danger">Hapus</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">&nbsp;Batal&nbsp;</button>
                            </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- Akhir Modal Delete -->
<div class="col-sm-12 text-center">
  <p>&copy; 2019 | Riowaldy Indrawan</p>
</div>
@endsection
