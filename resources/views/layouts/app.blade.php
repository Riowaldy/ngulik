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
    <link href="{{ asset('fa/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style2.css') }}" rel="stylesheet">
    
</head>
<body>
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

        @yield('content')
        @yield('footer')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('fa/js/all.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>

        $('#buat_pesan').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var penerima = button.data('penerima') 
          var pengirim = button.data('pengirim')
          var nama = button.data('nama') 
          var modal = $(this)
          modal.find('.modal-body #penerima').val(penerima);
          modal.find('.modal-body #pengirim').val(pengirim);
          modal.find('.modal-body #nama').val(nama);
          })

        $('#gabung_kelas').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var kelas_id = button.data('kelas_id')
          var modal = $(this)
          modal.find('.modal-body #kelas_id').val(kelas_id);
        })

        $('#kirim_tugas_vid').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var tugas_id = button.data('tugas_id')
          var jenis = button.data('jenis')
          var modal = $(this)
          modal.find('.modal-body #tugas_id').val(tugas_id);
          modal.find('.modal-body #jenis').val(jenis);
        })

        $('#kirim_tugas_doc').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var tugas_id = button.data('tugas_id')
          var jenis = button.data('jenis')
          var modal = $(this)
          modal.find('.modal-body #tugas_id').val(tugas_id);
          modal.find('.modal-body #jenis').val(jenis);
        })

        $('#detail_user').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id') 
          var nama = button.data('nama') 
          var email = button.data('email')
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
          modal.find('.modal-body #nama').val(nama);
          modal.find('.modal-body #email').val(email);
        })

        $('#detail_pengumuman').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id')
          var user_id = button.data('user_id') 
          var nama = button.data('nama')
          var deskripsi = button.data('deskripsi') 
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
          modal.find('.modal-body #user_id').val(user_id);
          modal.find('.modal-body #nama').val(nama);
          modal.find('.modal-body #deskripsi').val(deskripsi);
        })

        $('#obrolan').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var pengirim = button.data('pengirim')
          var isipesan = button.data('isipesan')
          var modal = $(this)
          modal.find('.modal-body #pengirim').val(pengirim);
          modal.find('.modal-body #isipesan').val(isipesan);
        })

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

        $('#edit_nilai').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id') 
          var nilai = button.data('nilai') 
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
          modal.find('.modal-body #nilai').val(nilai);
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

        $('#edit_statusMateri').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id')
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
        })

        $('#edit_statusMateri2').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id')
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
        })

        $('#edit_materi').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id')
          var nama = button.data('nama')
          var deskripsi = button.data('deskripsi')
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
          modal.find('.modal-body #nama').val(nama);
          modal.find('.modal-body #deskripsi').val(deskripsi);
        })

        $('#edit_pengumuman').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id') 
          var nama = button.data('nama')
          var deskripsi = button.data('deskripsi') 
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
          modal.find('.modal-body #nama').val(nama);
          modal.find('.modal-body #deskripsi').val(deskripsi);
        })

        $('#edit_livestream').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id')
          var link = button.data('link')
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
          modal.find('.modal-body #link').val(link);
        })

        $('#edit_tugas').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id')
          var judul = button.data('judul')
          var isitugas = button.data('isitugas')
          var jenis = button.data('jenis')
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
          modal.find('.modal-body #judul').val(judul);
          modal.find('.modal-body #isitugas').val(isitugas);
          modal.find('.modal-body #jenis').val(jenis);
        })

        $('#edit_komentar').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id')
          var isikomentar = button.data('isikomentar')
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
          modal.find('.modal-body #isikomentar').val(isikomentar);
        })

        $('#hapus_kelas').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id') 
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
        })
        $('#hapus_kelasuser').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var kelas_id = button.data('kelas_id')
          var user_id = button.data('user_id') 
          var modal = $(this)
          modal.find('.modal-body #kelas_id').val(kelas_id);
          modal.find('.modal-body #user_id').val(user_id);
        })

        $('#hapus_pengguna').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id') 
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
        })

        $('#hapus_materi').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id')
          var kelas_id = button.data('kelas_id') 
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
          modal.find('.modal-body #kelas_id').val(kelas_id);
        })

        $('#hapus_tugasuser').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id')
          var tugas_id = button.data('tugas_id')
          var kelas_id = button.data('kelas_id') 
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
          modal.find('.modal-body #tugas_id').val(tugas_id);
          modal.find('.modal-body #kelas_id').val(kelas_id);
        })

        $('#hapus_pengumuman').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id') 
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
        })

        $('#hapus_tugas').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id') 
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
        })

        $('#hapus_livestream').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id')
          var kelas_id = button.data('kelas_id') 
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
          modal.find('.modal-body #kelas_id').val(kelas_id);
        })

        $('#hapus_komentar').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id') 
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
        })

        $('#hapus_pesan').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id') 
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
        })



    </script>

</body>
</html>
