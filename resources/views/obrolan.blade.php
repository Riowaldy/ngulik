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
                            @foreach ($obrolans as $obrolan)
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
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
                            @foreach ($obrolans as $obrolan)
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
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
                            @foreach ($obrolans as $obrolan)
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
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
                            @foreach ($obrolans as $obrolan)
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
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


