@extends('layouts.app')

@section('content')
<div style="margin-top:60px;"></div>
    @if(Auth::user()->status == 'admin')
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Pesan Masuk</b>
                        </div>
                            @foreach ($obrolans as $obrolan)
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        
                                        <div class="col-md-12">
                                            <div class="col-md-8">
                                                <label for="nama"><h5>{{ $obrolan->nama }}</h5></label>
                                            </div>
                                            <div class="col-md-4">
                                                <label><h5>{{ \Carbon\Carbon::parse($obrolan->created_at)->diffForHumans() }}</h5></label>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="nama">{{ $obrolan->isipesan }}</label>
                                                <!-- <button type="submit" class="btn btn-xs btn-info" data-pengirim="{{$obrolan->pengirim}}" data-toggle="modal" data-target="#obrolan" onclick="showDiv()"><b>Lihat Obrolan</b></button> -->
                                                <!-- <button type="submit" class="btn btn-xs btn-info" data-id="{{$obrolan->id}}" data-pengirim="{{$obrolan->pengirim}}" data-isipesan="{{$obrolan->isipesan}}" data-toggle="modal" data-target="#obrolan"><b>Detail Pesan</b></button> -->

                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-xs btn-default" data-toggle="modal" data-penerima="{{$obrolan->pengirim}}" data-pengirim="{{Auth::id()}}" data-target="#buat_pesan"><b>Balas</b></button>
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
                            <b>Pesan Terkirim</b>
                        </div>
                            @foreach ($obrolans2 as $obrolan)
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        
                                        <div class="col-md-12">
                                            <div class="col-md-8">
                                                <label for="nama"><h5>Kepada: {{ $obrolan->nama }}</h5></label>
                                            </div>
                                            <div class="col-md-4">
                                                <label><h5>{{ \Carbon\Carbon::parse($obrolan->created_at)->diffForHumans() }}</h5></label>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="nama">{{ $obrolan->isipesan }}</label>
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
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Pesan Masuk</b>
                        </div>
                            @foreach ($obrolans as $obrolan)
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        
                                        <div class="col-md-12">
                                            <div class="col-md-8">
                                                <label for="nama"><h5>{{ $obrolan->nama }}</h5></label>
                                            </div>
                                            <div class="col-md-4">
                                                <label><h5>{{ \Carbon\Carbon::parse($obrolan->created_at)->diffForHumans() }}</h5></label>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="nama">{{ $obrolan->isipesan }}</label>
                                                <!-- <button type="submit" class="btn btn-xs btn-info" data-pengirim="{{$obrolan->pengirim}}" data-toggle="modal" data-target="#obrolan" onclick="showDiv()"><b>Lihat Obrolan</b></button> -->
                                                <!-- <button type="submit" class="btn btn-xs btn-info" data-id="{{$obrolan->id}}" data-pengirim="{{$obrolan->pengirim}}" data-isipesan="{{$obrolan->isipesan}}" data-toggle="modal" data-target="#obrolan"><b>Detail Pesan</b></button> -->

                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-xs btn-default" data-toggle="modal" data-penerima="{{$obrolan->pengirim}}" data-pengirim="{{Auth::id()}}" data-target="#buat_pesan"><b>Balas</b></button>
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
                            <b>Pesan Terkirim</b>
                        </div>
                            @foreach ($obrolans2 as $obrolan)
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        
                                        <div class="col-md-12">
                                            <div class="col-md-8">
                                                <label for="nama"><h5>Kepada: {{ $obrolan->nama }}</h5></label>
                                            </div>
                                            <div class="col-md-4">
                                                <label><h5>{{ \Carbon\Carbon::parse($obrolan->created_at)->diffForHumans() }}</h5></label>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="nama">{{ $obrolan->isipesan }}</label>
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
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Pesan Masuk</b>
                        </div>
                            @foreach ($obrolans as $obrolan)
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        
                                        <div class="col-md-12">
                                            <div class="col-md-8">
                                                <label for="nama"><h5>Kepada: {{ $obrolan->nama }}</h5></label>
                                            </div>
                                            <div class="col-md-4">
                                                <label><h5>{{ \Carbon\Carbon::parse($obrolan->created_at)->diffForHumans() }}</h5></label>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="nama">{{ $obrolan->isipesan }}</label>
                                                <!-- <button type="submit" class="btn btn-xs btn-info" data-pengirim="{{$obrolan->pengirim}}" data-toggle="modal" data-target="#obrolan" onclick="showDiv()"><b>Lihat Obrolan</b></button> -->
                                                <!-- <button type="submit" class="btn btn-xs btn-info" data-id="{{$obrolan->id}}" data-pengirim="{{$obrolan->pengirim}}" data-isipesan="{{$obrolan->isipesan}}" data-toggle="modal" data-target="#obrolan"><b>Detail Pesan</b></button> -->

                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-xs btn-default" data-toggle="modal" data-penerima="{{$obrolan->pengirim}}" data-pengirim="{{Auth::id()}}" data-target="#buat_pesan"><b>Balas</b></button>
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
                            <b>Pesan Terkirim</b>
                        </div>
                            @foreach ($obrolans2 as $obrolan)
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        
                                        <div class="col-md-12">
                                            <div class="col-md-8">
                                                <label for="nama"><h5>{{ $obrolan->nama }}</h5></label>
                                            </div>
                                            <div class="col-md-4">
                                                <label><h5>{{ \Carbon\Carbon::parse($obrolan->created_at)->diffForHumans() }}</h5></label>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="nama">{{ $obrolan->isipesan }}</label>
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
                            <b>Pesan Masuk</b>
                        </div>
                            @foreach ($obrolans as $obrolan)
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        
                                        <div class="col-md-12">
                                            <div class="col-md-8">
                                                <label for="nama"><h5>{{ $obrolan->nama }}</h5></label>
                                            </div>
                                            <div class="col-md-4">
                                                <label><h5>{{ \Carbon\Carbon::parse($obrolan->created_at)->diffForHumans() }}</h5></label>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="nama">{{ $obrolan->isipesan }}</label>
                                                <!-- <button type="submit" class="btn btn-xs btn-info" data-pengirim="{{$obrolan->pengirim}}" data-toggle="modal" data-target="#obrolan" onclick="showDiv()"><b>Lihat Obrolan</b></button> -->
                                                <!-- <button type="submit" class="btn btn-xs btn-info" data-id="{{$obrolan->id}}" data-pengirim="{{$obrolan->pengirim}}" data-isipesan="{{$obrolan->isipesan}}" data-toggle="modal" data-target="#obrolan"><b>Detail Pesan</b></button> -->

                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-xs btn-default" data-toggle="modal" data-penerima="{{$obrolan->pengirim}}" data-pengirim="{{Auth::id()}}" data-target="#buat_pesan"><b>Balas</b></button>
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
                            <b>Pesan Terkirim</b>
                        </div>
                            @foreach ($obrolans2 as $obrolan)
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        
                                        <div class="col-md-12">
                                            <div class="col-md-8">
                                                <label for="nama"><h5>Kepada: {{ $obrolan->nama }}</h5></label>
                                            </div>
                                            <div class="col-md-4">
                                                <label><h5>{{ \Carbon\Carbon::parse($obrolan->created_at)->diffForHumans() }}</h5></label>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="nama">{{ $obrolan->isipesan }}</label>
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


<!-- Modal Detail Obrolan-->
    <div class="modal fade" id="obrolan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Detail Pesan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                          
    <!--Form Dalam Modal Detail Obrolan -->

                    <form role="form" action="" enctype="multipart/form-data" method="post">{{csrf_field()}}
                        <div class="box-body">
                            <div class="form-group">
                                <input type="hidden" name="id" id="id" class="form-control" value="" readonly>
                            </div>
                            <div class="form-group">
                                <input type="text" name="pengirim" id="pengirim" class="form-control" value="" readonly>
                            </div>
                            <div class="box-footer text-center">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                    <div class="panel panel-primary">
                        @foreach ($obrolans3 as $obrolan)
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="panel-body">
                                    @if($obrolan->penerima == Auth::id())
                                    <div class="col-md-6">
                                        <label for="nama">{{ $obrolan->isipesan }}</label>
                                    </div>
                                    @else
                                    <div class="col-md-6 col-md-offset-6">
                                        <label for="nama">{{ $obrolan->isipesan }}</label>
                                    </div>
                                    @endif
                                </div>
                            </li>
                        </ul>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Akhir Modal Detail Obrolan -->

<!-- Modal Create Pesan-->
    <div class="modal fade" id="buat_pesan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Balas Pesan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                          
    <!--Form Dalam Modal Create Pesan -->
                    <form role="form" action="{{route('pesanStore')}}" enctype="multipart/form-data" method="post">{{csrf_field()}}
                        <div class="box-body">
                            <div class="form-group">
                                <input type="hidden" name="id" id="id" class="form-control" value="" readonly>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="pengirim" id="pengirim" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="penerima" id="penerima" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <label for="input_nama">Isi Pesan</label>
                                <textarea name="isipesan" id="isipesan" rows="5" class="form-control" placeholder="Tulis Isi Pesan"></textarea>
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
<!-- Akhir Modal Create Pesan -->
@endsection


