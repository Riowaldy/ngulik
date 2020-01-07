@extends('layouts.app')

@section('content')
<div style="margin-top:60px;"></div>
    @if(Auth::user()->status == 'admin')
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Halaman Kelas Admin</b>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-xs btn-default" data-toggle="modal" data-target="#buat_kelas">
                                    <b>Buat Kelas</b>
                                </button>
                            </div>
                        </div>
                        @foreach ($kelass as $kelas)
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <label for="nama">Nama Kelas&emsp;:</label>
                                            <label for="nama">{{ $kelas->nama }}</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="nama">Pengajar&emsp;&emsp;&nbsp;&nbsp;:</label>
                                            <label for="nama">{{ $kelas->user->nama }}</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="nama">Deskripsi&emsp;&emsp;&nbsp;:</label>
                                            <label for="nama">{{ $kelas->deskripsi }}</label>
                                        </div>
                                        <div class="col-md-12 text-center" style="margin-bottom: -20px;">
                                            <div class="col-xs-4 col-md-4 btn btn-sm btn-info" onclick="location.href='{{ route('detailKelas', $kelas) }}'" id="kelasdetail">
                                                <span class="before"><b><i class="fas fa-search-plus"></i></b></span>
                                                <span class="after"><b><i class="fas fa-search-plus"></i>Detail</b></span>
                                            </div>
                                            <div class="col-xs-4 col-md-4 btn btn-sm btn-warning" data-id="{{$kelas->id}}" data-nama="{{$kelas->nama}}" data-user_id="{{$kelas->user_id}}" data-deskripsi="{{$kelas->deskripsi}}" data-toggle="modal" data-target="#edit_kelas" id="kelasdetail">
                                                <span class="before"><b><i class="fas fa-edit"></i></b></span>
                                                <span class="after"><b><i class="fas fa-edit"></i>Ubah</b></span>
                                            </div>
                                            <div class="col-xs-4 col-md-4 btn btn-sm btn-danger" data-id="{{$kelas->id}}" data-toggle="modal" data-target="#hapus_kelas" id="kelasdetail">
                                                <span class="before"><b><i class="fas fa-trash-alt"></i></b></span>
                                                <span class="after"><b><i class="fas fa-trash-alt"></i>Hapus</b></span>
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
                                            <label for="nama">Nama Kelas&emsp;:</label>
                                            <label for="nama">{{ $kelas->nama }}</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="nama">Pengajar&emsp;&emsp;&nbsp;&nbsp;:</label>
                                            <label for="nama">{{ $kelas->user->nama }}</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="nama">Deskripsi&emsp;&emsp;&nbsp;:</label>
                                            <label for="nama">{{ $kelas->deskripsi }}</label>
                                        </div>
                                        <div class="col-md-12 text-center" style="margin-bottom: -20px;">
                                            <div class="col-xs-12 col-md-6 col-md-offset-3 btn btn-sm btn-info" onclick="location.href='{{ route('detailKelas', $kelas) }}'" id="kelasdetail">
                                                <span class="before"><b><i class="fas fa-search-plus"></i></b></span>
                                                <span class="after"><b><i class="fas fa-search-plus"></i>Detail</b></span>
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
                                            <label for="nama">Nama Kelas&emsp;:</label>
                                            <label for="nama">{{ $kelas->nama }}</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="nama">Pengajar&emsp;&emsp;&nbsp;&nbsp;:</label>
                                            <label for="nama">{{ $kelas->user->nama }}</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="nama">Deskripsi&emsp;&emsp;&nbsp;:</label>
                                            <label for="nama">{{ $kelas->deskripsi }}</label>
                                        </div>
                                        <div class="col-md-12 text-center" style="margin-bottom: -20px;">
                                            <div class="col-xs-12 col-md-6 col-md-offset-3 btn btn-sm btn-info" onclick="location.href='{{ route('detailKelas', $kelas) }}'" id="kelasdetail">
                                                <span class="before"><b><i class="fas fa-search-plus"></i></b></span>
                                                <span class="after"><b><i class="fas fa-search-plus"></i>Detail</b></span>
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
                                            <label for="nama">Nama Kelas&emsp;:</label>
                                            <label for="nama">{{ $kelas->nama }}</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="nama">Deskripsi&emsp;&emsp;&nbsp;:</label>
                                            <label for="nama">{{ $kelas->deskripsi }}</label>
                                        </div>
                                        <div class="col-md-12 text-center" style="margin-bottom: -20px;">
                                            <div class="col-xs-6 col-md-6 btn btn-sm btn-info" onclick="location.href='{{ route('detailKelas', $kelas->kelas_id) }}'" id="kelasdetail">
                                                <span class="before"><b><i class="fas fa-search-plus"></i></b></span>
                                                <span class="after"><b><i class="fas fa-search-plus"></i>Detail</b></span>
                                            </div>
                                            <div class="col-xs-6 col-md-6 btn btn-sm btn-danger" data-kelas_id="{{$kelas->id}}" data-user_id="{{Auth::id()}}" data-toggle="modal" data-target="#hapus_kelasuser" id="kelasdetail">
                                                <span class="before"><b><i class="fas fa-times-circle"></i></b></span>
                                                <span class="after"><b><i class="fas fa-times-circle"></i>Keluar</b></span>
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
                                            <label for="nama">Nama Kelas&emsp;:</label>
                                            <label for="nama">{{ $kelas->nama }}</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="nama">Deskripsi&emsp;&emsp;&nbsp;:</label>
                                            <label for="nama">{{ $kelas->deskripsi }}</label>
                                        </div>
                                        <div class="col-md-12 text-center" style="margin-bottom: -20px;">
                                            <div class="col-xs-12 col-md-6 col-md-offset-3 btn btn-sm btn-info" onclick="location.href='{{ route('detailKelas', $kelas->id) }}'" id="kelasdetail">
                                                <span class="before"><b><i class="fas fa-search-plus"></i></b></span>
                                                <span class="after"><b><i class="fas fa-search-plus"></i>Detail</b></span>
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
                <div class="modal-header text-center" style="background-color: #7997f7; color: white;">
                    <h4 class="modal-title" id="myModalLabel"><b>Buat Kelas</b></h4>
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
                            <div class="box-footer text-center">
                                <button type="submit" class="btn btn-primary">Buat</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal Create Kelas -->

    <!-- Modal Update-->
    <div class="modal fade" id="edit_kelas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center" style="background-color: #e8c83a; color: white;">
                    <h4 class="modal-title" id="myModalLabel"><b>Ubah Kelas</b></h4>
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
                            <select name="user_id" id="user_id" class="form-control">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}"> {{ $user->nama }} </option>
                                @endforeach
                            </select>
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
    <!-- Akhir Modal Update -->

    <!-- Modal Delete -->
    <div class="modal fade" id="hapus_kelas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center" style="background-color: #c94b20; color: white;">
                    <h4 class="modal-title" id="myModalLabel"><b>Hapus Kelas</b></h4>
                </div>
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
                            <div class="box-footer text-center">
                                <button type="submit" class="btn btn-danger">Hapus</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">&nbsp;Batal&nbsp;</button>
                            </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Delete Kelasuser-->
    <div class="modal fade" id="hapus_kelasuser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center" style="background-color: #c94b20; color: white;">
                    <h4 class="modal-title" id="myModalLabel"><b>Keluar Kelas</b></h4>
                </div>
                <div class="modal-body">
                          
    <!--Form Dalam Modal Delete Kelasuser-->
                    <form role="form" action="{{ route('hapusKelasuser') }}" enctype="multipart/form-data" method="post">
                        {{csrf_field()}}
                        {{ method_field('DELETE') }}
                            <div class="form-group">
                                <input type="hidden" name="id" id="id" class="form-control" value="" readonly>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="kelas_id" id="kelas_id" class="form-control" value="" readonly>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="user_id" id="user_id" class="form-control" value="" readonly>
                            </div>
                            <div class="modal-body">
                                <p class="text-center">Apakah anda yakin ingin keluar dari kelas ini?</p>
                            </div>
                            <div class="box-footer text-center">
                                <button type="submit" class="btn btn-danger">Keluar</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">&nbsp;Batal&nbsp;</button>
                            </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
<div class="col-sm-12 text-center">
  <p>&copy; 2019 | Riowaldy Indrawan</p>
</div>  
@endsection
