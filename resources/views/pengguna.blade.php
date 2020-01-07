@extends('layouts.app')

@section('content')
<div style="margin-top:60px;"></div>
    @if(Auth::user()->status == 'admin')
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-primary">
                        <div class="panel-heading"><b>Halaman Pengguna Admin</b></div>
                        @foreach ($users as $user)
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-xs-7 col-md-7">
                                                <label for="nama">Nama</label>
                                                <label for="nama">: {{ $user->nama }}</label>
                                            </div>
                                            <div class="col-xs-3 col-md-3">
                                                <button type="button" class="btn btn-xs btn-primary" data-id="{{$user->id}}" data-nama="{{$user->nama}}" data-status="{{$user->status}}" data-toggle="modal" data-target="#edit_status" ><b>{{ $user->status }}</b></button>
                                            </div>
                                            <div class="col-xs-2 col-md-2">
                                                @if($user->status == 'murid')
                                                <button type="button" class="btn btn-xs btn-danger" data-id="{{$user->id}}" data-toggle="modal" data-target="#hapus_pengguna" ><b>Hapus</b></button>
                                                @else
                                                @endif
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

    @elseif(Auth::user()->status == 'pengajar')

    @else

    @endif

<!-- Modal -->
<div class="modal fade" id="edit_status" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center" style="background-color: #7997f7; color: white;">
                <h4 class="modal-title text-center" id="myModalLabel"><b>Ubah Status</b></h4>
            </div>
            <div class="modal-body">
                      
<!--Form Dalam Modal -->
                <form role="form" action="{{route('editStatus')}}" enctype="multipart/form-data" method="post">{{csrf_field()}}
                    <div class="box-body">
                        <div class="form-group">
                            <input type="hidden" name="id" id="id" class="form-control" value="">
                        </div>
                        <div class="form-group row">
                            <label for="inputNama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="nama" name="nama" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputStatus" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select name="status" id="status" class="form-control">
                                    <option value="moderator">moderator</option>
                                    <option value="pengajar">pengajar</option>
                                    <option value="murid">murid</option>
                                </select>
                              <!-- <input type="text" class="form-control" id="status" name="status"> -->
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">
                                    Ubah
                                </button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                    Batal
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Akhir Modal -->

<!-- Modal Delete -->
    <div class="modal fade" id="hapus_pengguna" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center" style="background-color: #c94b20; color: white;">
                    <h4 class="modal-title" id="myModalLabel"><b>Hapus Pengguna</b></h4>
                </div>
                <div class="modal-body">
                          
    <!--Form Dalam Modal Delete -->
                    <form role="form" action="{{ route('hapusPengguna') }}" enctype="multipart/form-data" method="post">
                        {{csrf_field()}}
                        {{ method_field('DELETE') }}
                            <div class="form-group">
                                <input type="hidden" name="id" id="id" class="form-control" value="" readonly>
                            </div>
                            <div class="modal-body">
                                <p class="text-center">Apakah anda yakin ingin menghapus pengguna ini?</p>
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
<div class="col-sm-12 text-center">
  <p>&copy; 2019 | Riowaldy Indrawan</p>
</div>
@endsection
