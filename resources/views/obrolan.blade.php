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

@endsection


