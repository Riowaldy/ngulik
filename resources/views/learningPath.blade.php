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
                        @foreach ($tugass as $tugas)
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
            </div>
        </div>
    @endif

<div class="col-sm-12 text-center">
  <p>&copy; 2019 | Riowaldy Indrawan</p>
</div>
@endsection
