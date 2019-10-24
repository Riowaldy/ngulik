<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
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
                            <li><a href="">Pesan</a></li>
                            <li><a href="{{ route('pengguna') }}">Pengguna</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->nama }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('profil') }}">Edit Profile</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>

                        @elseif(Auth::user()->status == 'moderator')

                            <li><a href="{{ route('kelas') }}">Kelas</a></li>
                            <li><a href="">Pesan</a></li>
                            <li><a href="">Notifikasi</a></li>
                            <li><a href="">Live Stream</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->nama }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="">Edit Profile</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>

                        @elseif(Auth::user()->status == 'pengajar')

                            <li><a href="{{ route('kelas') }}">Kelas</a></li>
                            <li><a href="">Pesan</a></li>
                            <li><a href="">Notifikasi</a></li>
                            <li><a href="">Live Stream</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->nama }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="">Edit Profile</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>

                        @else

                            <li><a href="{{ route('kelas') }}">Kelas</a></li>
                            <li><a href="">Pesan</a></li>
                            <li><a href="">Notifikasi</a></li>
                            <li><a href="">Live Stream</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->nama }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('profil') }}">Edit Profile</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
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

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <script>
        $('#edit_profil').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id') 
          var nama = button.data('nama') 
          var email = button.data('email')
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
          modal.find('.modal-body #nama').val(nama);
          modal.find('.modal-body #email').val(email);
        })

        $('#edit_status').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id') 
          var nama = button.data('nama') 
          var status = button.data('status')
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
          modal.find('.modal-body #nama').val(nama);
          modal.find('.modal-body #status').val(status);
        })

        $('#edit_kelas').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id') 
          var nama = button.data('nama')
          var user_id = button.data('user_id') 
          var deskripsi = button.data('deskripsi') 
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
          modal.find('.modal-body #nama').val(nama);
          modal.find('.modal-body #user_id').val(user_id);
          modal.find('.modal-body #deskripsi').val(deskripsi);
        })
        $('#hapus_kelas').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id') 
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
        })
    </script>
</body>
</html>
