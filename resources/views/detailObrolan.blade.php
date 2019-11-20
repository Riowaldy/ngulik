@extends('layouts.app')

@section('content')
<div style="margin-top:60px;"></div>
    @if(Auth::user()->status == 'admin')
        <div class="container">
            <div class="row">  
                <div class="col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Pesan Masuk</b>
                        </div>
                            @foreach ($obrolans3 as $obrolan)
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12" style="margin-top: -20px; margin-bottom: -22px;">
                                                <label for="nama"><h5>{{ $obrolan->nama }}</h5></label>
                                                <div class="pull-right" style="margin-top: 5px;">
                                                    <a href="{{ route('detailObrolan', [$obrolan->id]) }}">
                                                        <input type="button" value="Lihat Pesan" class="btn btn-xs btn-info" />
                                                    </a> 
                                                </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            @endforeach
                    </div>
                </div>              
                <div class="col-md-8">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Obrolan</b>
                        </div>

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                            @foreach ($reverse as $obrolan)
                                    <div class="panel-body">
                                        @if($obrolan->pengirim !== Auth::id())
                                        <div class="col-xs-6 col-md-6" style="margin-top: -20px;">
                                            <div class="col-md-12">
                                                <label for="nama">{{ $obrolan->nama }}</label>
                                            </div>
                                            <div class="col-md-12" style="background-color: #e1e8e7; border-radius: 7px; margin-top: -5px; margin-left: 15px; padding: 10px 5px;">
                                                <label for="nama">{{ $obrolan->isipesan }}</label>
                                            </div>
                                        </div>
                                        
                                        @else
                                        <div class="col-xs-6 col-xs-offset-6 col-md-6 col-md-offset-6" style="margin-top: -20px;">
                                            <div class="col-md-12 text-right" style="margin-left: 15px;">
                                                <label for="nama">{{ $obrolan->nama }}</label>
                                            </div>
                                            <div class="col-md-12" style="background-color: #66add9; border-radius: 7px; margin-top: -5px;  padding: 10px 5px; color: white;">
                                                <label for="nama">{{ $obrolan->isipesan }}</label>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                
                            @endforeach
                                </li>
                            </ul>
                            
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item" style="margin-top: -20px;">
                                    <div class="panel-body">
                                        @foreach ($obrolans2 as $obrolan)
                                        <div class="col-xs-12 col-md-12 btn btn-sm btn-info" data-toggle="modal" data-penerima="{{$obrolan->pengirim}}" data-pengirim="{{Auth::id()}}" value="{{$obrolan->pengirim}}" name="pengirim" data-target="#buat_pesan" style="margin-top: -10px; margin-bottom: -5px;">
                                            <a style="color: white;"><b>Balas Pesan</b></a>
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
                <div class="col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Pesan Masuk</b>
                        </div>
                            @foreach ($obrolans3 as $obrolan)
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12" style="margin-top: -20px; margin-bottom: -22px;">
                                                <label for="nama"><h5>{{ $obrolan->nama }}</h5></label>
                                                <div class="pull-right" style="margin-top: 5px;">
                                                    <a href="{{ route('detailObrolan', [$obrolan->id]) }}">
                                                        <input type="button" value="Lihat Pesan" class="btn btn-xs btn-info" />
                                                    </a> 
                                                </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            @endforeach
                    </div>
                </div>              
                <div class="col-md-8">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Obrolan</b>
                        </div>

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                            @foreach ($reverse as $obrolan)
                                    <div class="panel-body">
                                        @if($obrolan->pengirim !== Auth::id())
                                        <div class="col-xs-6 col-md-6" style="margin-top: -20px;">
                                            <div class="col-md-12">
                                                <label for="nama">{{ $obrolan->nama }}</label>
                                            </div>
                                            <div class="col-md-12" style="background-color: #e1e8e7; border-radius: 7px; margin-top: -5px; margin-left: 15px; padding: 10px 5px;">
                                                <label for="nama">{{ $obrolan->isipesan }}</label>
                                            </div>
                                        </div>
                                        
                                        @else
                                        <div class="col-xs-6 col-xs-offset-6 col-md-6 col-md-offset-6" style="margin-top: -20px;">
                                            <div class="col-md-12 text-right" style="margin-left: 15px;">
                                                <label for="nama">{{ $obrolan->nama }}</label>
                                            </div>
                                            <div class="col-md-12" style="background-color: #66add9; border-radius: 7px; margin-top: -5px;  padding: 10px 5px; color: white;">
                                                <label for="nama">{{ $obrolan->isipesan }}</label>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                
                            @endforeach
                                </li>
                            </ul>
                            
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item" style="margin-top: -20px;">
                                    <div class="panel-body">
                                        @foreach ($obrolans2 as $obrolan)
                                        <div class="col-xs-12 col-md-12 btn btn-sm btn-info" data-toggle="modal" data-penerima="{{$obrolan->pengirim}}" data-pengirim="{{Auth::id()}}" value="{{$obrolan->pengirim}}" name="pengirim" data-target="#buat_pesan" style="margin-top: -10px; margin-bottom: -5px;">
                                            <a style="color: white;"><b>Balas Pesan</b></a>
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
                <div class="col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Pesan Masuk</b>
                        </div>
                            @foreach ($obrolans3 as $obrolan)
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12" style="margin-top: -20px; margin-bottom: -22px;">
                                                <label for="nama"><h5>{{ $obrolan->nama }}</h5></label>
                                                <div class="pull-right" style="margin-top: 5px;">
                                                    <a href="{{ route('detailObrolan', [$obrolan->id]) }}">
                                                        <input type="button" value="Lihat Pesan" class="btn btn-xs btn-info" />
                                                    </a> 
                                                </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            @endforeach
                    </div>
                </div>              
                <div class="col-md-8">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Obrolan</b>
                        </div>

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                            @foreach ($reverse as $obrolan)
                                    <div class="panel-body">
                                        @if($obrolan->pengirim !== Auth::id())
                                        <div class="col-xs-6 col-md-6" style="margin-top: -20px;">
                                            <div class="col-md-12">
                                                <label for="nama">{{ $obrolan->nama }}</label>
                                            </div>
                                            <div class="col-md-12" style="background-color: #e1e8e7; border-radius: 7px; margin-top: -5px; margin-left: 15px; padding: 10px 5px;">
                                                <label for="nama">{{ $obrolan->isipesan }}</label>
                                            </div>
                                        </div>
                                        
                                        @else
                                        <div class="col-xs-6 col-xs-offset-6 col-md-6 col-md-offset-6" style="margin-top: -20px;">
                                            <div class="col-md-12 text-right" style="margin-left: 15px;">
                                                <label for="nama">{{ $obrolan->nama }}</label>
                                            </div>
                                            <div class="col-md-12" style="background-color: #66add9; border-radius: 7px; margin-top: -5px;  padding: 10px 5px; color: white;">
                                                <label for="nama">{{ $obrolan->isipesan }}</label>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                
                            @endforeach
                                </li>
                            </ul>
                            
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item" style="margin-top: -20px;">
                                    <div class="panel-body">
                                        @foreach ($obrolans2 as $obrolan)
                                        <div class="col-xs-12 col-md-12 btn btn-sm btn-info" data-toggle="modal" data-penerima="{{$obrolan->pengirim}}" data-pengirim="{{Auth::id()}}" value="{{$obrolan->pengirim}}" name="pengirim" data-target="#buat_pesan" style="margin-top: -10px; margin-bottom: -5px;">
                                            <a style="color: white;"><b>Balas Pesan</b></a>
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
                <div class="col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Pesan Masuk</b>
                        </div>
                            @foreach ($obrolans3 as $obrolan)
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12" style="margin-top: -20px; margin-bottom: -22px;">
                                                <label for="nama"><h5>{{ $obrolan->nama }}</h5></label>
                                                <div class="pull-right" style="margin-top: 5px;">
                                                    <a href="{{ route('detailObrolan', [$obrolan->id]) }}">
                                                        <input type="button" value="Lihat Pesan" class="btn btn-xs btn-info" />
                                                    </a> 
                                                </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            @endforeach
                    </div>
                </div>              
                <div class="col-md-8">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Obrolan</b>
                        </div>

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                            @foreach ($reverse as $obrolan)
                                    <div class="panel-body">
                                        @if($obrolan->pengirim !== Auth::id())
                                        <div class="col-xs-6 col-md-6" style="margin-top: -20px;">
                                            <div class="col-md-12">
                                                <label for="nama">{{ $obrolan->nama }}</label>
                                            </div>
                                            <div class="col-md-12" style="background-color: #e1e8e7; border-radius: 7px; margin-top: -5px; margin-left: 15px; padding: 10px 5px;">
                                                <label for="nama">{{ $obrolan->isipesan }}</label>
                                            </div>
                                        </div>
                                        
                                        @else
                                        <div class="col-xs-6 col-xs-offset-6 col-md-6 col-md-offset-6" style="margin-top: -20px;">
                                            <div class="col-md-12 text-right" style="margin-left: 15px;">
                                                <label for="nama">{{ $obrolan->nama }}</label>
                                            </div>
                                            <div class="col-md-12" style="background-color: #66add9; border-radius: 7px; margin-top: -5px;  padding: 10px 5px; color: white;">
                                                <label for="nama">{{ $obrolan->isipesan }}</label>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                
                            @endforeach
                                </li>
                            </ul>
                            
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item" style="margin-top: -20px;">
                                    <div class="panel-body">
                                        @foreach ($obrolans2 as $obrolan)
                                        <div class="col-xs-12 col-md-12 btn btn-sm btn-info" data-toggle="modal" data-penerima="{{$obrolan->pengirim}}" data-pengirim="{{Auth::id()}}" value="{{$obrolan->pengirim}}" name="pengirim" data-target="#buat_pesan" style="margin-top: -10px; margin-bottom: -5px;">
                                            <a style="color: white;"><b>Balas Pesan</b></a>
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
<div class="col-sm-12 text-center">
  <p>&copy; 2019 | Riowaldy Indrawan</p>
</div>

<!-- Modal Create Pesan-->
    <div class="modal fade" id="buat_pesan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center" style="background-color: #7997f7; color: white;">
                    <h4 class="modal-title" id="myModalLabel"><b>Balas Pesan</b></h4>
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
                                <label for="input_nama">Tulis Pesan</label>
                                <textarea name="isipesan" id="isipesan" rows="5" class="form-control" placeholder="Tulis Isi Pesan"></textarea>
                            </div> 
                            <div class="box-footer text-center">
                                <button type="submit" class="btn btn-primary">Kirim</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- Akhir Modal Create Pesan -->
@endsection


