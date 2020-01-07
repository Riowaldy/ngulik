@extends('layouts.app')

@section('content')
<div style="margin-top:60px;"></div>
    @if(Auth::user()->status == 'admin')

    @elseif(Auth::user()->status == 'moderator')
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <a href="{{ route('detailTugas', [$kelas, $tugas]) }}">
                                <span><b><i class="fas fa-arrow-circle-left" style="margin-right: 20px; color: white;"></i></b></span>
                            </a>
                            <b>Detail Tugas</b>
                        </div>
                        @foreach ($tugass as $tugas)
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12 text-center">
                                            <div class="col-xs-12 col-md-12">
                                                <button class="btn btn-sm btn-warning" data-id="{{$tugas->id}}" data-kelas_id="{{$tugas->kelas_id}}" data-tugas_id="{{$tugasuser->tugas_id}}" data-nilai="{{$tugas->nilai}}" data-toggle="modal" data-target="#edit_nilai">Ubah Nilai</button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12 text-center">
                                            <div>
                                                <label>Dikirim pada : {{$tugas->created_at}}</label>
                                            </div>
                                            @if($tugas->jenis == 'Video')
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$tugas->link}}" allowfullscreen></iframe>
                                            </div>
                                            @else
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe class="embed-responsive-item" src="https://drive.google.com/file/d/{{$tugas->link}}/preview"></iframe>
                                            </div>
                                            @endif
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
                            <a href="{{ route('detailTugas', [$kelas, $tugas]) }}">
                                <span><b><i class="fas fa-arrow-circle-left" style="margin-right: 20px; color: white;"></i></b></span>
                            </a>
                            <b>Detail Tugas</b>
                            @if($tugasuser->user_id == Auth::id())
                            <div class="pull-right">
                                <button type="submit" class="btn btn-xs btn-danger" data-id="{{$tugasuser->id}}" data-tugas_id="{{$tugasuser->tugas_id}}" data-kelas_id="{{$tugas->kelas_id}}" data-toggle="modal" data-target="#hapus_tugasuser">&nbsp;Hapus&nbsp;</button> 
                            </div>
                            @else
                            @endif
                        </div>
                        @foreach ($tugass as $tugas)
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12 text-center">
                                            <div>
                                                <label>Dikirim pada : {{$tugas->created_at}}</label>
                                            </div>
                                            @if($tugas->jenis == 'Video')
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$tugas->link}}" allowfullscreen></iframe>
                                            </div>
                                            @else
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe class="embed-responsive-item" src="https://drive.google.com/file/d/{{$tugas->link}}/preview"></iframe>
                                            </div>
                                            @endif
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

<!-- Modal Update Nilai-->
    <div class="modal fade" id="edit_nilai" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center" style="background-color: #e8c83a; color: white;">
                    <h4 class="modal-title" id="myModalLabel"><b>Berikan Nilai</b></h4>
                </div>
                <div class="modal-body">
                          
    <!--Form Dalam Modal Update Nilai-->
                <form role="form" action="{{route('editNilai')}}" enctype="multipart/form-data" method="post">{{csrf_field()}}
                    <div class="box-body">
                        <div class="form-group">
                            <input type="hidden" name="id" id="id" class="form-control" value="" readonly>
                            <input type="hidden" name="kelas_id" id="kelas_id" class="form-control" value="" readonly>
                            <input type="hidden" name="tugas_id" id="tugas_id" class="form-control" value="" readonly>
                        </div>
                        <div class="form-group">
                            <label for="input_nama">Nilai</label>
                            <input type="text" name="nilai" id="nilai" class="form-control" value="">
                        </div> 
                        <div class="box-footer text-center">
                            <button type="submit" class="btn btn-warning">Simpan</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
<!-- Akhir Modal Update Nilai -->

<!-- Modal Delete Tugasuser-->
    <div class="modal fade" id="hapus_tugasuser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center" style="background-color: #c94b20; color: white;">
                    <h4 class="modal-title" id="myModalLabel"><b>Hapus Tugas</b></h4>
                </div>
                <div class="modal-body">
                          
    <!--Form Dalam Modal Delete Tugasuser-->
                    <form role="form" action="{{ route('hapusTugasuser') }}" enctype="multipart/form-data" method="post">
                        {{csrf_field()}}
                        {{ method_field('DELETE') }}
                            <div class="form-group">
                                <input type="hidden" name="id" id="id" class="form-control" value="" readonly>
                                <input type="hidden" name="kelas_id" id="kelas_id" class="form-control" value="" readonly>
                                <input type="hidden" name="tugas_id" id="tugas_id" class="form-control" value="" readonly>
                            </div>
                            <div class="modal-body">
                                <p class="text-center">Apakah anda yakin ingin menghapus Tugas ini?</p>
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
<!-- Akhir Modal Delete Tugasuser-->
@endsection
