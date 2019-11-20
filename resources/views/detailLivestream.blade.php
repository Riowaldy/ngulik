@extends('layouts.app')

@section('content')
<div style="margin-top:60px;"></div>
    @if(Auth::user()->status == 'admin')
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Halaman Live Stream</b>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="panel-body text-center">
                                    <div>
                                        <div class="col-md-2">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">
                                                    <div class="panel-body">
                                                        <div class="text-center">
                                                            <label>User Online</label>
                                                        </div>
                                                        @foreach($users as $user)
                                                            @if(Cache::has('user-is-online-' . $user->id))
                                                                <div class="text-left">
                                                                    <label>{{ $user->nama }} </label>
                                                                    <span class="dot" 
                                                                    style="height: 10px;
                                                                      width: 10px;
                                                                      background-color: yellow;
                                                                      border-radius: 50%;
                                                                      display: inline-block;"></span>
                                                                        </div>
                                                            @else
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe width="560" height="315" src="https://www.youtube.com/embed/live_stream?channel={{$livestream->link}}"frameborder="0" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <div class="panel-body">
                                                    <div class="text-center">
                                                        <label>User Offline</label>
                                                    </div>
                                                    @foreach($users as $user)
                                                        @if(Cache::has('user-is-online-' . $user->id))
                                                        @else
                                                            <div class="text-left">
                                                                <label>{{ $user->nama }} </label>
                                                                <span class="dot" 
                                                                style="height: 10px;
                                                                  width: 10px;
                                                                  background-color: red;
                                                                  border-radius: 50%;
                                                                  display: inline-block;"></span>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
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
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Halaman Live Stream</b>
                            @if($livestream->user_id == Auth::id())
                            <div class="pull-right">
                                <button type="submit" class="btn btn-xs btn-warning" data-id="{{$livestream->id}}" data-link="https://www.youtube.com/channel/{{$livestream->link}}?view_as=subscriber" data-toggle="modal" data-target="#edit_livestream">&nbsp;&nbsp;&nbsp;Ubah&nbsp;&nbsp;&nbsp;&nbsp;</button>
                                <button type="submit" class="btn btn-xs btn-danger" data-id="{{$livestream->id}}" data-kelas_id="{{$livestream->kelas_id}}" data-toggle="modal" data-target="#hapus_livestream">&nbsp;Hapus&nbsp;</button> 
                            </div>
                            @else
                            <div class="pull-right">
                                <button type="submit" class="btn btn-xs btn-danger" data-id="{{$livestream->id}}" data-kelas_id="{{$livestream->kelas_id}}" data-toggle="modal" data-target="#hapus_livestream">&nbsp;Akhiri Lives Stream&nbsp;</button>
                            </div>
                            @endif
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="panel-body text-center">
                                    <div>
                                        <div class="col-md-2">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">
                                                    <div class="panel-body">
                                                        <div class="text-center">
                                                            <label>User Online</label>
                                                        </div>
                                                        @foreach($users as $user)
                                                            @if(Cache::has('user-is-online-' . $user->id))
                                                                <div class="text-left">
                                                                    <label>{{ $user->nama }} </label>
                                                                    <span class="dot" 
                                                                    style="height: 10px;
                                                                      width: 10px;
                                                                      background-color: yellow;
                                                                      border-radius: 50%;
                                                                      display: inline-block;"></span>
                                                                        </div>
                                                            @else
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe width="560" height="315" src="https://www.youtube.com/embed/live_stream?channel={{$livestream->link}}"frameborder="0" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <div class="panel-body">
                                                    <div class="text-center">
                                                        <label>User Offline</label>
                                                    </div>
                                                    @foreach($users as $user)
                                                        @if(Cache::has('user-is-online-' . $user->id))
                                                        @else
                                                            <div class="text-left">
                                                                <label>{{ $user->nama }} </label>
                                                                <span class="dot" 
                                                                style="height: 10px;
                                                                  width: 10px;
                                                                  background-color: red;
                                                                  border-radius: 50%;
                                                                  display: inline-block;"></span>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
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
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Halaman Live Stream</b>
                            @if($livestream->user_id == Auth::id())
                            <div class="pull-right">
                                <button type="submit" class="btn btn-xs btn-warning" data-id="{{$livestream->id}}" data-link="https://www.youtube.com/channel/{{$livestream->link}}?view_as=subscriber" data-toggle="modal" data-target="#edit_livestream">&nbsp;&nbsp;&nbsp;Ubah&nbsp;&nbsp;&nbsp;&nbsp;</button>
                                <button type="submit" class="btn btn-xs btn-danger" data-id="{{$livestream->id}}" data-kelas_id="{{$livestream->kelas_id}}" data-toggle="modal" data-target="#hapus_livestream">&nbsp;Akhiri Lives Strea&nbsp;</button> 
                            </div>
                            @else
                            <div class="pull-right">
                                <button type="submit" class="btn btn-xs btn-danger" data-id="{{$livestream->id}}" data-kelas_id="{{$livestream->kelas_id}}" data-toggle="modal" data-target="#hapus_livestream">&nbsp;Akhiri Lives Stream&nbsp;</button>
                            </div>
                            @endif
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="panel-body text-center">
                                    <div>
                                        <div class="col-md-2">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">
                                                    <div class="panel-body">
                                                        <div class="text-center">
                                                            <label>User Online</label>
                                                        </div>
                                                        @foreach($users as $user)
                                                            @if(Cache::has('user-is-online-' . $user->id))
                                                                <div class="text-left">
                                                                    <label>{{ $user->nama }} </label>
                                                                    <span class="dot" 
                                                                    style="height: 10px;
                                                                      width: 10px;
                                                                      background-color: yellow;
                                                                      border-radius: 50%;
                                                                      display: inline-block;"></span>
                                                                        </div>
                                                            @else
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe width="560" height="315" src="https://www.youtube.com/embed/live_stream?channel={{$livestream->link}}"frameborder="0" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <div class="panel-body">
                                                    <div class="text-center">
                                                        <label>User Offline</label>
                                                    </div>
                                                    @foreach($users as $user)
                                                        @if(Cache::has('user-is-online-' . $user->id))
                                                        @else
                                                            <div class="text-left">
                                                                <label>{{ $user->nama }} </label>
                                                                <span class="dot" 
                                                                style="height: 10px;
                                                                  width: 10px;
                                                                  background-color: red;
                                                                  border-radius: 50%;
                                                                  display: inline-block;"></span>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
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
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Halaman Live Stream</b>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="panel-body text-center">
                                    <div>
                                        <div class="col-md-2">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">
                                                    <div class="panel-body">
                                                        <div class="text-center">
                                                            <label>User Online</label>
                                                        </div>
                                                        @foreach($users as $user)
                                                            @if(Cache::has('user-is-online-' . $user->id))
                                                                <div class="text-left">
                                                                    <label>{{ $user->nama }} </label>
                                                                    <span class="dot" 
                                                                    style="height: 10px;
                                                                      width: 10px;
                                                                      background-color: yellow;
                                                                      border-radius: 50%;
                                                                      display: inline-block;"></span>
                                                                        </div>
                                                            @else
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe width="560" height="315" src="https://www.youtube.com/embed/live_stream?channel={{$livestream->link}}"frameborder="0" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <div class="panel-body">
                                                    <div class="text-center">
                                                        <label>User Offline</label>
                                                    </div>
                                                    @foreach($users as $user)
                                                        @if(Cache::has('user-is-online-' . $user->id))
                                                        @else
                                                            <div class="text-left">
                                                                <label>{{ $user->nama }} </label>
                                                                <span class="dot" 
                                                                style="height: 10px;
                                                                  width: 10px;
                                                                  background-color: red;
                                                                  border-radius: 50%;
                                                                  display: inline-block;"></span>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    @endif
<!-- Modal Edit Livestream-->
    <div class="modal fade" id="edit_livestream" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center" style="background-color: #e8c83a; color: white;">
                    <h4 class="modal-title" id="myModalLabel"><b>Ubah Data Live Stream</b></h4>
                </div>
                <div class="modal-body">
                          
    <!--Form Dalam Modal Edit Livestream-->
                <form role="form" action="{{route('editLivestream')}}" enctype="multipart/form-data" method="post">{{csrf_field()}}
                    <div class="box-body">
                        <div class="form-group">
                            <input type="hidden" name="id" id="id" class="form-control" value="" readonly>
                        </div>
                        <div class="form-group">
                            <label for="input_nama">Link</label>
                            <input type="text" name="link" id="link" class="form-control" value="">
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
<!-- Akhir Modal Edit Livestream -->

<!-- Modal Delete -->
    <div class="modal fade" id="hapus_livestream" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center" style="background-color: #c94b20; color: white;">
                    <h4 class="modal-title" id="myModalLabel"><b>Akhiri Live Stream</b></h4>
                </div>
                <div class="modal-body">
                          
    <!--Form Dalam Modal Delete -->
                    <form role="form" action="{{ route('hapusLivestream') }}" enctype="multipart/form-data" method="post">
                        {{csrf_field()}}
                        {{ method_field('DELETE') }}
                            <div class="form-group">
                                <input type="hidden" name="id" id="id" class="form-control" value="" readonly>
                                <input type="hidden" name="kelas_id" id="kelas_id" class="form-control" value="" readonly>
                            </div>
                            <div class="modal-body">
                                <p class="text-center">Apakah anda yakin ingin mengakhiri live stream ini?</p>
                            </div>
                            <div class="box-footer text-center">
                                <button type="submit" class="btn btn-primary">Ya</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                            </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- Akhir Modal Delete -->

<div class="col-sm-12 text-center">
  <p>&copy; 2019 | Riowaldy Indrawan</p>
</div>
@endsection
