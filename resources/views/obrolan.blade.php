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
                            
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <label for="nama">Pengirim</label>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="nama">Penerima</label>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nama">Isi Pesan</label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        @foreach ($obrolans as $obrolan)
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <label for="nama">{{ $obrolan->nama }}</label>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="nama">{{ Auth::user()->nama }}</label>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nama">{{ $obrolan->isipesan }}</label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </li>
                            </ul>
                        
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Pesan Terkirim</b>
                        </div>
                            
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <label for="nama">Pengirim</label>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="nama">Penerima</label>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nama">Isi Pesan</label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        @foreach ($obrolans2 as $obrolan)
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <label for="nama">{{ Auth::user()->nama }}</label>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="nama">{{ $obrolan->nama }}</label>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nama">{{ $obrolan->isipesan }}</label>
                                            </div>
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
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Pesan Masuk</b>
                        </div>
                            
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <label for="nama">Pengirim</label>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="nama">Penerima</label>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nama">Isi Pesan</label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        @foreach ($obrolans as $obrolan)
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <label for="nama">{{ $obrolan->nama }}</label>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="nama">{{ Auth::user()->nama }}</label>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nama">{{ $obrolan->isipesan }}</label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </li>
                            </ul>
                        
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Pesan Terkirim</b>
                        </div>
                            
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <label for="nama">Pengirim</label>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="nama">Penerima</label>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nama">Isi Pesan</label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        @foreach ($obrolans2 as $obrolan)
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <label for="nama">{{ Auth::user()->nama }}</label>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="nama">{{ $obrolan->nama }}</label>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nama">{{ $obrolan->isipesan }}</label>
                                            </div>
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
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Pesan Masuk</b>
                        </div>
                            
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <label for="nama">Pengirim</label>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="nama">Penerima</label>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nama">Isi Pesan</label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        @foreach ($obrolans as $obrolan)
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <label for="nama">{{ $obrolan->nama }}</label>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="nama">{{ Auth::user()->nama }}</label>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nama">{{ $obrolan->isipesan }}</label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </li>
                            </ul>
                        
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Pesan Terkirim</b>
                        </div>
                            
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <label for="nama">Pengirim</label>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="nama">Penerima</label>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nama">Isi Pesan</label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        @foreach ($obrolans2 as $obrolan)
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <label for="nama">{{ Auth::user()->nama }}</label>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="nama">{{ $obrolan->nama }}</label>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nama">{{ $obrolan->isipesan }}</label>
                                            </div>
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
                            @foreach ($obrolans as $obrolan)
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <label for="nama">{{ $obrolan->nama }}</label>
                                                <button type="submit" class="btn btn-xs btn-info" data-pengirim="{{$obrolan->pengirim}}" data-toggle="modal" data-target="#obrolan" onclick="showDiv()"><b>Lihat Obrolan</b></button>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </li>
                            </ul>
                            @endforeach
                    </div>
                </div>
                <div class="col-md-8">
                    <div id="1"  style="display:none;" class="answer_list" > @include('detailObrolan') </div>
                    <script type="text/javascript">
                        function showDiv() {
                           document.getElementById('1').style.display = "block";
                        }
                    </script>
                </div>
            </div>
        </div>
    @endif
<div class="col-sm-12 text-center">
  <p>&copy; 2019 | Riowaldy Indrawan</p>
</div>
@endsection
