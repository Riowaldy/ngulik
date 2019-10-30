@extends('layouts.app')

@section('content')

    @if(Auth::user()->status == 'admin')
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Halaman Materi Admin</b>
                        </div>
                            
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-4">
                                            <div>
                                                <label for="nama">Materi Video 1</label>
                                                <div class="pull-right">
                                                    <a href="">
                                                        <input type="button" value="Detail" class="btn btn-xs btn-info" />
                                                    </a>
                                                </div>
                                            </div>
                                            <div>
                                                <label for="nama">Riowaldy Indrawan</label>
                                            </div>
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$url2}}"></iframe>
                                                <!-- <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/Um6f90guss4"></iframe> -->
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div>
                                                <label for="nama">Materi Video 2</label>
                                                <div class="pull-right">
                                                    <a href="">
                                                        <input type="button" value="Detail" class="btn btn-xs btn-info" />
                                                    </a>
                                                </div>
                                            </div>
                                            <div>
                                                <label for="nama">Riowaldy Indrawan</label>
                                            </div>
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$url2}}"></iframe>
                                                <!-- <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/Um6f90guss4"></iframe> -->
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div>
                                                <label for="nama">Materi Video 3</label>
                                                <div class="pull-right">
                                                    <a href="">
                                                        <input type="button" value="Detail" class="btn btn-xs btn-info" />
                                                    </a>
                                                </div>
                                            </div>
                                            <div>
                                                <label for="nama">Riowaldy Indrawan</label>
                                            </div>
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$url2}}"></iframe>
                                                <!-- <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/Um6f90guss4"></iframe> -->
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-4">
                                            <div>
                                                <label for="nama">Materi Video 1</label>
                                                <div class="pull-right">
                                                    <a href="">
                                                        <input type="button" value="Detail" class="btn btn-xs btn-info" />
                                                    </a>
                                                </div>
                                            </div>
                                            <div>
                                                <label for="nama">Riowaldy Indrawan</label>
                                            </div>
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$url2}}"></iframe>
                                                <!-- <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/Um6f90guss4"></iframe> -->
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div>
                                                <label for="nama">Materi Video 2</label>
                                                <div class="pull-right">
                                                    <a href="">
                                                        <input type="button" value="Detail" class="btn btn-xs btn-info" />
                                                    </a>
                                                </div>
                                            </div>
                                            <div>
                                                <label for="nama">Riowaldy Indrawan</label>
                                            </div>
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$url2}}"></iframe>
                                                <!-- <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/Um6f90guss4"></iframe> -->
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div>
                                                <label for="nama">Materi Video 3</label>
                                                <div class="pull-right">
                                                    <a href="">
                                                        <input type="button" value="Detail" class="btn btn-xs btn-info" />
                                                    </a>
                                                </div>
                                            </div>
                                            <div>
                                                <label for="nama">Riowaldy Indrawan</label>
                                            </div>
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$url2}}"></iframe>
                                                <!-- <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/Um6f90guss4"></iframe> -->
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                    </div>
                </div>
            </div>
        </div>
    @elseif(Auth::user()->status == 'moderator')
        
    @elseif(Auth::user()->status == 'pengajar')
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>Halaman Materi Pengajar</b>
                        </div>
                            
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-4">
                                            <div>
                                                <label for="nama">Materi Video 1</label>
                                                <div class="pull-right">
                                                    <a href="">
                                                        <input type="button" value="Detail" class="btn btn-xs btn-info" />
                                                    </a>
                                                </div>
                                            </div>
                                            <div>
                                                <label for="nama">Riowaldy Indrawan</label>
                                            </div>
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$url2}}"></iframe>
                                                <!-- <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/Um6f90guss4"></iframe> -->
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div>
                                                <label for="nama">Materi Video 2</label>
                                                <div class="pull-right">
                                                    <a href="">
                                                        <input type="button" value="Detail" class="btn btn-xs btn-info" />
                                                    </a>
                                                </div>
                                            </div>
                                            <div>
                                                <label for="nama">Riowaldy Indrawan</label>
                                            </div>
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$url2}}"></iframe>
                                                <!-- <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/Um6f90guss4"></iframe> -->
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div>
                                                <label for="nama">Materi Video 3</label>
                                                <div class="pull-right">
                                                    <a href="">
                                                        <input type="button" value="Detail" class="btn btn-xs btn-info" />
                                                    </a>
                                                </div>
                                            </div>
                                            <div>
                                                <label for="nama">Riowaldy Indrawan</label>
                                            </div>
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$url2}}"></iframe>
                                                <!-- <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/Um6f90guss4"></iframe> -->
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="panel-body">
                                        <div class="col-md-4">
                                            <div>
                                                <label for="nama">Materi Video 1</label>
                                                <div class="pull-right">
                                                    <a href="">
                                                        <input type="button" value="Detail" class="btn btn-xs btn-info" />
                                                    </a>
                                                </div>
                                            </div>
                                            <div>
                                                <label for="nama">Riowaldy Indrawan</label>
                                            </div>
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$url2}}"></iframe>
                                                <!-- <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/Um6f90guss4"></iframe> -->
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div>
                                                <label for="nama">Materi Video 2</label>
                                                <div class="pull-right">
                                                    <a href="">
                                                        <input type="button" value="Detail" class="btn btn-xs btn-info" />
                                                    </a>
                                                </div>
                                            </div>
                                            <div>
                                                <label for="nama">Riowaldy Indrawan</label>
                                            </div>
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$url2}}"></iframe>
                                                <!-- <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/Um6f90guss4"></iframe> -->
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div>
                                                <label for="nama">Materi Video 3</label>
                                                <div class="pull-right">
                                                    <a href="">
                                                        <input type="button" value="Detail" class="btn btn-xs btn-info" />
                                                    </a>
                                                </div>
                                            </div>
                                            <div>
                                                <label for="nama">Riowaldy Indrawan</label>
                                            </div>
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$url2}}"></iframe>
                                                <!-- <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/Um6f90guss4"></iframe> -->
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                    </div>
                </div>
            </div>
        </div>
    @else
        
    @endif

@endsection
