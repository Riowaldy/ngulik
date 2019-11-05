@extends('layouts.app')

@section('content')

    @if(Auth::user()->status == 'admin')
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Halaman Kelas Admin</b>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-xs btn-default" data-toggle="modal" data-target="#buat_kelas"><b>Buat Kelas</b></button>
                            </div>
                        </div>
                        @foreach ($kelass as $kelas)
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-2">
                                                <label for="nama">Nama Kelas</label>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nama">: {{ $kelas->nama }}</label>
                                            </div>
                                            <div class="col-md-4">
                                                <button type="submit" class="btn btn-xs btn-warning" data-id="{{$kelas->id}}" data-nama="{{$kelas->nama}}" data-user_id="{{$kelas->user_id}}" data-deskripsi="{{$kelas->deskripsi}}" data-toggle="modal" data-target="#edit_kelas">&nbsp;&nbsp;&nbsp;Edit&nbsp;&nbsp;&nbsp;</button> &nbsp;
                                                <!-- <button class="btn btn-xs btn-warning">Edit</button> -->
                                                <button type="submit" class="btn btn-xs btn-danger" data-id="{{$kelas->id}}" data-toggle="modal" data-target="#hapus_kelas">Hapus</button> &nbsp;
                                                <!-- <button class="btn btn-xs btn-danger">Delete</button> -->
                                                <a href="{{ route('detailKelas', $kelas) }}">
                                                    <input type="button" value="Detail" class="btn btn-xs btn-info" />
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-2">
                                                <label for="nama">Pengajar</label>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nama">: {{ $kelas->user->nama }}</label>
                                            </div>
                                            <div class="col-md-4">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-2">
                                                <label for="nama">Deskripsi</label>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nama">: {{ $kelas->deskripsi }}</label>
                                            </div>
                                            <div class="col-md-4">
                                                
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
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Halaman Kelas Moderator</b>
                        </div>
                        @foreach ($kelass as $kelas)
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-2">
                                                <label for="nama">Nama Kelas</label>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nama">: {{ $kelas->nama }}</label>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="{{ route('detailKelas', $kelas) }}">
                                                    <input type="button" value="Detail" class="btn btn-xs btn-info" />
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-2">
                                                <label for="nama">Pengajar</label>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nama">: {{ $kelas->user->nama }}</label>
                                            </div>
                                            <div class="col-md-4">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-2">
                                                <label for="nama">Deskripsi</label>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nama">: {{ $kelas->deskripsi }}</label>
                                            </div>
                                            <div class="col-md-4">
                                                
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
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Halaman Kelas Pengajar</b>
                        </div>
                        @foreach ($kelass2 as $kelas)
                            
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-2">
                                                <label for="nama">Nama Kelas</label>
                                            </div>
                                            <div class="col-md-8">
                                                <label for="nama">{{ $kelas->nama }}</label>
                                            </div>
                                            <div class="col-md-2">
                                                <a href="{{ route('detailKelas', $kelas) }}">
                                                    <input type="button" value="Detail" class="btn btn-xs btn-info" />
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-2">
                                                <label for="nama">Pengajar</label>
                                            </div>
                                            <div class="col-md-8">
                                                <label for="nama">{{ $kelas->user->nama }}</label>
                                            </div>
                                            <div class="col-md-2">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-2">
                                                <label for="nama">Deskripsi</label>
                                            </div>
                                            <div class="col-md-8">
                                                <label for="nama">{{ $kelas->deskripsi }}</label>
                                            </div>
                                            <div class="col-md-2">
                                                
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
    @else
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Daftar Kelas Yang Saya Ikuti</b>
                        </div>
                        @foreach ($kelasusers as $kelas)
                            
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-2">
                                                <label for="nama">Kelas</label>
                                            </div>
                                            <div class="col-md-8">
                                                <label for="nama">{{ $kelas->nama }}</label>
                                            </div>
                                            <div class="col-md-2">
                                                <a href="{{ route('detailKelas', $kelas->kelas_id) }}">
                                                    <input type="button" value="Detail" class="btn btn-xs btn-info" />
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-2">
                                                <label for="nama">Deskripsi</label>
                                            </div>
                                            <div class="col-md-8">
                                                <label for="nama">{{ $kelas->deskripsi }}</label>
                                            </div>
                                            <div class="col-md-2">
                                                
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
                            <b>Daftar Seluruh Kelas</b>
                        </div>
                        @foreach ($kelass as $kelas)
                            
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-2">
                                                <label for="nama">Kelas</label>
                                            </div>
                                            <div class="col-md-8">
                                                <label for="nama">{{ $kelas->nama }}</label>
                                            </div>
                                            <div class="col-md-2">
                                                @if($kelas->user_id == Auth::id())
                                                    <a href="{{ route('detailKelas', $kelas->kelas_id) }}">
                                                        <input type="button" value="Detail" class="btn btn-xs btn-info" />
                                                    </a>
                                                @else
                                                    <button type="submit" class="btn btn-xs btn-info" data-toggle="modal" data-target="#gabung_kelas"><b>Gabung Kelas</b></button>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-2">
                                                <label for="nama">Deskripsi</label>
                                            </div>
                                            <div class="col-md-8">
                                                <label for="nama">{{ $kelas->deskripsi }}</label>
                                            </div>
                                            <div class="col-md-2">
                                                
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

    <!-- Modal Create Kelas-->
    <div class="modal fade" id="buat_kelas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Buat Kelas</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                          
    <!--Form Dalam Modal Create Kelas -->
                    <form role="form" action="{{route('kelasStore')}}" enctype="multipart/form-data" method="post">{{csrf_field()}}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="">Nama Kelas</label>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Tulis Nama Kelas">
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
                                <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control" placeholder="Tulis Deskripsi Kelas"></textarea>
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
    <!-- Akhir Modal Create Kelas -->

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
                                <label for="">ID Kelas</label>
                                <input type="text" name="kelas_id" id="kelas_id" class="form-control" value="{{ $kelas->id }}">
                            </div>
                            <div class="form-group">
                                <label for="">ID User</label>
                                <input type="text" name="user_id" id="user_id" class="form-control" value="{{ Auth::user()->id }}">
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

    <!-- Modal Update-->
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
                          
    <!--Form Dalam Modal Update-->
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
                            <input type="text" name="deskripsi" id="deskripsi" class="form-control" value="">
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
    <!-- Akhir Modal Update -->

    <!-- Modal Delete -->
    <div class="modal fade" id="hapus_kelas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                
                <div class="modal-body">
                          
    <!--Form Dalam Modal Delete -->
                    <form role="form" action="{{ route('hapusKelas') }}" enctype="multipart/form-data" method="post">
                        {{csrf_field()}}
                        {{ method_field('DELETE') }}
                            <div class="form-group">
                                <input type="hidden" name="id" id="id" class="form-control" value="" readonly>
                            </div>
                            <div class="modal-body">
                                <p class="text-center">Apakah anda yakin ingin menghapus kelas ini?</p>
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
@endsection
