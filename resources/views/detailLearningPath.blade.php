@extends('layouts.app')

@section('content')
<div style="margin-top:60px;"></div>
    @if(Auth::user()->status == 'admin')
        
    @elseif(Auth::user()->status == 'moderator')

    @elseif(Auth::user()->status == 'pengajar')
        
    @else
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading"><b>Learning Path Tugas</b></div>
                        <?php $n=1;?>
                        @foreach ($tugass1 as $tugas)
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="panel-body">
                                    <div class="col-md-3 text-center">
                                        <label style="font-size:50px;">{{$n++}}</label>
                                    </div>
                                    <div class="col-md-9">
                                        <div>
                                            <label>{{$tugas->judul}} ({{$tugas->jenis}})</label>    
                                        </div>
                                        <div>
                                            <label>{{$tugas->isitugas}}</label>    
                                        </div>
                                        <div>
                                            <a href="{{ route('detailLearningPath', [$kelas->id, $tugas->id]) }}">
                                                <input type="button" value="Lihat Detail" class="btn btn-xs btn-info" style="width: 100%;" />
                                            </a> 
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
                        <div class="panel-heading"><b>Learning Path Tugas</b></div>
                        @forelse($tugass2 as $tugas)
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="text-center" style="height: 200px; background-color: #6ff794;">
                                                <label style="margin-top: 80px; font-size: 30px;">Tugas Telah Dikerjakan</label>    
                                            </div>
                                            <div style="margin-top: 20px;">
                                                @if($tugas->jenis == 'Video')
                                                    <div class="col-xs-12 col-md-12 btn btn-sm btn-primary" onclick="location.href='{{ route('detailTugas',[$kelas->id, $tugas->tugas_id]) }}'" id="kelasdetail">
                                                        <span class="before"><b><i class="fas fa-search-plus"></i></b></span>
                                                        <span class="after"><b><i class="fas fa-search-plus"></i>Lihat Data Tugas</b></span>
                                                    </div>
                                                @else
                                                    <div class="col-xs-12 col-md-12 btn btn-sm btn-primary" onclick="location.href='{{ route('detailTugas',[$kelas->id, $tugas->tugas_id]) }}'" id="kelasdetail">
                                                        <span class="before"><b><i class="fas fa-search-plus"></i></b></span>
                                                        <span class="after"><b><i class="fas fa-search-plus"></i>Lihat Data Tugas</b></span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        @empty
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="text-center" style="height: 200px; background-color: #ff5842;">
                                                <label style="margin-top: 80px; font-size: 30px; color: white;">Tugas Belum Dikerjakan</label>    
                                            </div>
                                            <div style="margin-top: 20px;">
                                                @if($tugas->jenis == 'Video')
                                                    <div class="col-xs-12 col-md-12 btn btn-sm btn-primary" data-tugas_id="{{$tugas->id}}" data-jenis="{{$tugas->jenis}}" data-toggle="modal" data-target="#kirim_tugas_vid" id="kelasdetail">
                                                        <span class="before"><b><i class="fas fa-paper-plane"></i></b></span>
                                                        <span class="after"><b><i class="fas fa-paper-plane"></i>Kirim Tugas</b></span>
                                                    </div>
                                                @else
                                                    <div class="col-xs-12 col-md-12 btn btn-sm btn-primary" data-tugas_id="{{$tugas->id}}" data-jenis="{{$tugas->jenis}}" data-toggle="modal" data-target="#kirim_tugas_doc" id="kelasdetail">
                                                        <span class="before"><b><i class="fas fa-paper-plane"></i></b></span>
                                                        <span class="after"><b><i class="fas fa-paper-plane"></i>Kirim Tugas</b></span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    @endif

<!-- Modal Kirim Tugas Vid-->
    <div class="modal fade" id="kirim_tugas_vid" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center" style="background-color: #7997f7; color: white;">
                    <h4 class="modal-title" id="myModalLabel"><b>Kirim Tugas</b></h4>
                </div>
                <div class="modal-body">
                          
    <!--Form Dalam Modal Kirim Tugas Vid -->
                    <form role="form" action="{{route('tugasuserStore')}}" enctype="multipart/form-data" method="post">{{csrf_field()}}
                        <div class="box-body">
                            <div class="form-group">
                                <input type="hidden" name="tugas_id" id="tugas_id" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="jenis" id="jenis" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="user_id" id="user_id" class="form-control" value="{{ Auth::user()->id }}">
                            </div>
                            <div class="form-group">
                                <input type="text" name="link" id="link" class="form-control" value="" placeholder="Masukkan Link Tugas">
                                <label>Contoh link : https://www.youtube.com/watch?v=ABCDEFGHIJK</label>
                            </div>
                            <div class="box-footer text-center">
                                <button type="submit" class="btn btn-primary">Kirim</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">&nbsp;&nbsp;&nbsp;Batal&nbsp;&nbsp;&nbsp;</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- Akhir Modal Kirim Tugas Vid -->

<!-- Modal Kirim Tugas Doc-->
    <div class="modal fade" id="kirim_tugas_doc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center" style="background-color: #7997f7; color: white;">
                    <h4 class="modal-title" id="myModalLabel"><b>Kirim Tugas</b></h4>
                </div>
                <div class="modal-body">
                          
    <!--Form Dalam Modal Kirim Tugas Doc -->
                    <form role="form" action="{{route('tugasuserStore')}}" enctype="multipart/form-data" method="post">{{csrf_field()}}
                        <div class="box-body">
                            <div class="form-group">
                                <input type="hidden" name="tugas_id" id="tugas_id" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="jenis" id="jenis" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="user_id" id="user_id" class="form-control" value="{{ Auth::user()->id }}">
                            </div>
                            <div class="form-group">
                                <input type="text" name="link" id="link" class="form-control" value="" placeholder="Masukkan Link Tugas">
                                <label>Contoh link : https://drive.google.com/file/d/123ABCDE/view?usp=sharing</label>
                                <label>Contoh link 2 : https://drive.google.com/file/d/123ABCDE/view?usp=drive_open</label>
                            </div>
                            <div class="box-footer text-center">
                                <button type="submit" class="btn btn-primary">Kirim</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">&nbsp;&nbsp;&nbsp;Batal&nbsp;&nbsp;&nbsp;</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- Akhir Modal Kirim Tugas Doc -->

<div class="col-sm-12 text-center">
  <p>&copy; 2019 | Riowaldy Indrawan</p>
</div>
@endsection
