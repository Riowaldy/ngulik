<!DOCTYPE html>
<html lang="en" id="home">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    

    <title>NGULIK | Sistem Informasi</title>

    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

      <!-- navbar -->
        <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a href="#home" class="navbar-brand page-scroll">NGULIK</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li><a href="#about" class="page-scroll">Tentang</a></li>
                <li><a href="#portfolio" class="page-scroll">Kegiatan</a></li>
                <li><a href="#contact" class="page-scroll">Kontak</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li class="page-scroll">
                @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/kelas') }}">Kembali</a>
                        @else
                            <a href="{{ route('login') }}">Login</a>
                        @endauth
                @endif
                </li>
              </ul>
            </div>
          </div>
        </nav>
      <!-- akhir navbar -->


   
    <!-- jumbotron -->
    <div class="jumbotron text-center page-scroll">
      <img src="img/himasifo.png">
      <h1>NGULIK SISTEM INFORMASI</h1>

      <p>Platform Pembelajaran Non Formal</p>
    </div>
    <!-- akhir jumbotron -->

    <!-- about -->
      <section class="about" id="about">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 text-center">
              <h2>Tentang</h2>
              <hr>
            </div> 
          </div>
          <div class="row">
            <div class="col-sm-4 col-sm-offset-2 ">
              <p class="pKiri text-justify">Himpunan Mahasiswa Sistem Informasi Universitas Pembangunan Nasional “Veteran” Jawa Timur mengadakan pembelajaran non formal di luar jam aktif perkuliahan sebelum Ujian Tengah Semester atau Ujian Akhir Semester berlangsung yang ditujukan untuk mengulas pembelajaran saat perkuliahan. Pembelajaran ini merupakan program kerja departemen penelitian dan pengembangan. Pembelajaran non formal ini biasa disebut dengan Ngulik SI yang dihadiri oleh mahasiswa dan diajar oleh mahasiswa yang telah menguasai materi mata kuliah tersebut.</p>
            </div>
            <div class="col-sm-4">
              <p class="pKanan text-justify">Departemen Penelitian dan Pengembangan bergerak di bidang akademik yaitu pengembangan kemampuan dan penalaran mahasiswa jurusan Sistem Informasi. Dengan adanya departemen ini, diharapkan dapat meningkatkan kualitas mahasiswa Sistem Informasi sehingga tercipta lingkungan akademik yang kompeten dan dinamis.</p>
            </div>
          </div>
        </div>
      </section>
    <!-- akhir about -->

    <!-- portfolio -->
      <section class="portfolio" id="portfolio">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 text-center">
              <h2>Kegiatan</h2>
              <hr>
            </div>
          </div>
        </div>
        <div class="container">
            <div class="row text-center">
                <div class="col-sm-12">
                    <div class="col-xs-8 col-xs-offset-2 col-md-4 col-md-offset-1 thumbnail">
                        <img src="img/1.jpg">
                    </div>
                    <div class="col-xs-12 col-md-5 col-md-offset-1 colpkanan text-justify">
                        <p>Kegiatan Pembelajaran Non Formal Ngulik Sistem Informasi di Ruang 108 Gedung FIK2. Kegiatan ini berlangsung pada hari Rabu, 4 Desember 2019 dengan materi Logika dan Algoritma yang diikuti oleh mahasiswa angkatan 2019 dan pengajar mahasiswa angkatan 2018. Kegiatan berlangsung kondusif dimulai dari pukul 16:00 - 17:30 WIB.</p>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="col-xs-8 col-xs-offset-2 col-md-4 col-md-offset-1 thumbnail">
                        <img src="img/2.jpg">
                    </div>
                    <div class="col-xs-12 col-md-5 col-md-offset-1 colpkanan text-justify">
                        <p>Kegiatan Pembelajaran Non Formal Ngulik Sistem Informasi di Ruang 108 Gedung FIK2. Kegiatan ini berlangsung pada hari Selasa, 3 Desember 2019 dengan materi Structured Query Language yang diikuti oleh mahasiswa angkatan 2018 dan pengajar mahasiswa angkatan 2017. Kegiatan berlangsung kondusif dimulai dari pukul 16:00 - 17:30 WIB.</p>
                    </div>
                </div>
            </div>
        </div>
        
      </section>
    <!-- akhir portfolio -->

    <!-- contact -->
      <section class="contact" id="contact">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 text-center">
              <h2>Kontak</h2>
              <hr>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-6 col-md-3 text-center" style="margin-bottom: 20px;">
              <img src="img/upn.png">
            </div>
            <div class="col-xs-6 col-md-3 text-center" style="margin-bottom: 20px;">
                <img src="img/himasifo.png">
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="list-group">
                  <a class="list-group-item active text-center">
                    Ngulik | Sistem Informasi
                  </a>
                  <a class="list-group-item">Departemen Penelitian dan Pengembangan</a>
                  <a class="list-group-item">Jurusan Sistem Informasi</a>
                  <a class="list-group-item">Fakultas Ilmu Komputer</a>
                  <a class="list-group-item">Universitas Pembangunan Nasional "Veteran" Jawa Timur</a>
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-8 col-sm-offset-2 find text-center">
                <h2>Ikuti Kami</h2>
                <hr>
                <div class="col-xs-3 col-md-3 text-center" style="margin-bottom: 50px;">
                  <a href="https://www.facebook.com/himasifoupnvjatim"><img src="img/facebook.png"></a>
                </div>
                <div class="col-xs-3 col-md-3 text-center" style="margin-bottom: 50px;">
                  <a href="https://www.instagram.com/himasifo_upnvjatim/"><img src="img/instagram.png"></a>
                </div>
                <div class="col-xs-3 col-md-3 text-center" style="margin-bottom: 50px;">
                  <a href="https://www.youtube.com/channel/UComN7Zo6fWi9NSw6uXTzjhQ"><img src="img/youtube.png"></a>
                </div>
                <div class="col-xs-3 col-md-3 text-center" style="margin-bottom: 50px;">
                  <a href="http://www.himasifo-upnjatim.com/"><img src="img/website.png"></a>
                </div>
            </div>
          </div>
        </div>
        
      </section>
      <div class="col-sm-12 text-center">
          <p>&copy; 2019 | Riowaldy Indrawan</p>
      </div>
    <!-- akhir contact -->

    <!-- footer -->
    
    
      
    <!-- Akhir footer -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('/js/jquery-3.3.1.min.js') }}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
  </body>
</html>