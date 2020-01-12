<html style="background-color:white;">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('fa/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style2.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <style>
        #tampil
        {
            background-color:#e34141;
            color:white;position:
            fixed;right:0px;
            top:0px;
            font-family: monospace;
            padding:10px;
            margin:10px;
            border-radius:10px
            transition:all 0.5s;
            opacity:0;
        }   
        #hovertampil:hover #tampil
        {
            opacity:1;
            display:block;
        }
    </style>
</head>
<body onload="Onload()" style="margin:0px; background-color:white;">
    <div id="app">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else

                        @if(Auth::user()->status == 'admin')

                            <li><a href="{{ route('kelas') }}">Kelas</a></li>
                            <li><a href="{{ route('livecode') }}">Live Coding</a></li>
                            <li><a href="{{ route('laporan') }}">Laporan</a></li>
                            <li><a href="{{ route('obrolan') }}">Pesan</a></li>
                            <li><a href="{{ route('pengguna') }}">Pengguna</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->nama }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('profil') }}">Profil</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Keluar
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>

                        @elseif(Auth::user()->status == 'moderator')

                            <li><a href="{{ route('kelas') }}">Kelas</a></li>
                            <li><a href="{{ route('livecode') }}">Live Coding</a></li>
                            <li><a href="{{ route('obrolan') }}">Pesan</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->nama }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('profil') }}">Profil</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Keluar
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>

                        @elseif(Auth::user()->status == 'pengajar')

                            <li><a href="{{ route('kelas') }}">Kelas</a></li>
                            <li><a href="{{ route('livecode') }}">Live Coding</a></li>
                            <li><a href="{{ route('obrolan') }}">Pesan</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->nama }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('profil') }}">Profil</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Keluar
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>

                        @else

                            <li><a href="{{ route('kelas') }}">Kelas</a></li>
                            <li><a href="{{ route('livecode') }}">Live Coding</a></li>
                            <li><a href="{{ route('obrolan') }}">Pesan</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->nama }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('profil') }}">Profil</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Keluar
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>

                        @endif

                            
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div style="margin-top: 50px;"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <b>Halaman Live Coding</b>
                    </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="panel-body">
                                    <div class="col-md-12">
                                        <div id="hasil" style="overflow:scroll;  height: 30%;">
                                        
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <b>Tulis Source Code Di sini</b>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-xs btn-default" id="hovertampil" onclick="saveitonLocal()">
                                <span>Simpan Data</span>
                            </button>
                        </div>
                    </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="panel-body">
                                    <div class="col-md-12">
                                        <div style="overflow:scroll; background-color:#111; height: 30%;">
                                            <div class="col-md-1" style="background-color: grey;">
                                                <span style="width:100%; padding-top:5px ;line-height:40px; display:inline-block;background-color:grey; height:100%; color:white; text-align:center; font-family: monospace; font-size:15px; padding-top:5px;" id="no">
                                                    1
                                                </span>
                                            </div>
                                            <div class="col-md-11">
                                                <textarea style="border-width:0px; line-height:40px; font-family:monospace; font-size:15px; width:100%; min-height:100%; height:auto; background-color:#111; color:yellow; overflow:hidden; outline:none;" wrap="off" id="text" onKeyPress="enterpressalert(event, this)">
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                </div>
            </div>
        </div>
    </div>
    <div style="position:fixed; top:10px; left:-400px; background-color:#111; padding:10px; color:white; font-family:monospace; transition:all 2s; width:auto; overflow:hidden; margin-top: 40px;" id="gagalsimpan">
        Gagal menyimpan.
    </div>
<div class="col-sm-12 text-center">
  <p>&copy; 2019 | Riowaldy Indrawan</p>
</div>
   
<script>
    function Onload(){
        document.getElementById("text").value = localStorage.getItem("htmlcode");
        setInterval(function(){
            var text = document.getElementById("text").value;
            
            document.getElementById("hasil").innerHTML = text;
        
            
        } , 200);
       
    }
        
        
    function enterpressalert(e, textarea){
        var code = (e.keyCode ? e.keyCode : e.which);

        if(code == 13) { 
        //Enter keycode
        var lines=textarea.value.match(/\n/g).length + 1;
        document.getElementById("no").innerHTML= "1";
        var numberoflines = 0;

            for ( numberoflines = 2; numberoflines < lines+1; numberoflines++) { 
                document.getElementById("no").innerHTML= document.getElementById("no").innerHTML +"<br>"+ numberoflines;
            }
        }

        if(code == 8) { 
        //Enter keycode
        var lines=textarea.value.match(/\n/g).length + 1;
        document.getElementById("no").innerHTML= "1";
        var numberoflines = 0;

            for ( numberoflines = 2; numberoflines < lines+1; numberoflines++) { 
                document.getElementById("no").innerHTML= document.getElementById("no").innerHTML +"<br>"+ numberoflines;
            }
        }

    }
   
    function saveitonLocal(){
        var text = document.getElementById("text").value;
        
        if (typeof(Storage) !== "undefined") {
            // Store
            localStorage.setItem("htmlcode",text );
            // Retrieve
            document.getElementById("text").value = localStorage.getItem("htmlcode");
            document.getElementById("gagalsimpan").innerHTML = "Berhasil menyimpan data anda.";
            document.getElementById("gagalsimpan").style.left = "0px";
            setTimeout(function(){document.getElementById("gagalsimpan").style.left = "-400px";} , 2000);
        } else {
            document.getElementById("gagalsimpan").innerHTML = "Gagal menyimpan data anda.";
            document.getElementById("gagalsimpan").style.left = "0px";
        }        
    }
        
</script>
</body>
</html>