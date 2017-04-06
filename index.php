<?php
// include function & css

include("function/koneksi.php");
//include("session.php");
//include("login.php");
session_start();
date_default_timezone_set('Asia/Jakarta');

// connection
?>
<!DOCTYPE HTML>
<html>
<head>
  <!--CSS-->
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom Google Web Font -->
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Arvo:400,700' rel='stylesheet' type='text/css'>

  <!-- Custom CSS-->
  <link href="css/general.css" rel="stylesheet">

  <!-- Owl-Carousel -->
  <link href="css/custom.css" rel="stylesheet">
  <link href="css/owl.carousel.css" rel="stylesheet">
  <link href="css/owl.theme.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/animate.css" rel="stylesheet">

  <!-- Magnific Popup core CSS file -->
  <link rel="stylesheet" href="css/magnific-popup.css">

  <script src="js/modernizr-2.8.3.min.js"></script>  <!-- Modernizr /-->

</head>
<body>
  <nav class="navbar-default" role="navigation" style="position: fixed; top: 0px;">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <a class="" href="index.php">
        <img src="img/logo2.png" height="45px" style="margin-top:8px; margin-left:0" id="logo"/>
      </a>
      <div class="collapse navbar-collapse navbar-right navbar-ex1-collapse stuckMenu">
        <ul class="nav navbar-nav">
          <li class="menuItem"><a href="#infoBeasiswa">Info Beasiswa </a></li>
          <li class="menuItem"><a href="#hasilSeleksi">Hasil Seleksi </a></li>
          <?php
          if(isset($_SESSION['login_user'])){//sudah login
            $username= $_SESSION['login_user'];
            echo'
            <li class="menuItem dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">'.$username.'<span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><a href="logout.php">Logout</a></li>
            </ul>
            </li>';
            //echo '<li class="menuItem"><a href="logout.php">Logout</a></li>';
          } else {//blm login
            echo'<li class="menuItem"><a href="form_login.php">Login</a></li>';

          }

          ?>
        </ul>
      </div>
    </div>
  </nav>


  <div id="home" class="content-section-ss intro-header" style="border-top: 0">
  </div>
  <div id="infoBeasiswa" class="content-section-a" style="border-top: 0">
    <div class='container'>
      <div class="col-lg-4">
        <div class="panel panel-success">
          <div class="panel-heading" style="height:63px;">
            <h3 class="panel-title judul"><a href=/web/../apps/informasirolependaftar/index?idPaket=189>Beasiswa Pendidikan Peningkatan Prestasi Akademik (Beasiswa PPA) tahun 2017</a></h3>
          </div>
          <div class="panel-body hitam" style="height: 70px;">
            Beasiswa Pendidikan Peningkatan Prestasi Akademik (Beasiswa PPA) tahun 2017
          </div>
          <div class="panel-footer hitam" style="text-align: left">
            Periode Pendaftaran: 30/03/17 s.d. 17/04/17 <br>
            Status Pendaftaran : <font style='color:green'>Pendaftaran dibuka</font> <br>
            Penerima Beasiswa : 1708
          </div>
        </div>
        </div>
          <div class="col-lg-4">
            <div class="panel panel-success">
              <div class="panel-heading" style="height:63px;">
                <h3 class="panel-title judul"><a href=/web/../apps/informasirolependaftar/index?idPaket=188>AUN – China Scholarship Tahun 2017/2018</a></h3>
              </div>
              <div class="panel-body hitam" style="height: 70px;">
                AUN – China Scholarship Tahun 2017/2018                                </div>
                <div class="panel-footer hitam" style="text-align: left">
                  Periode Pendaftaran: 28/02/17 s.d. 07/04/17 <br>
                  Status Pendaftaran : <font style='color:green'>Pendaftaran dibuka</font> <br>
                  Penerima Beasiswa : 50                                </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="panel panel-success">
                  <div class="panel-heading" style="height:63px;">
                    <h3 class="panel-title judul"><a href=/web/../apps/informasirolependaftar/index?idPaket=185>Yayasan Karya Salemba Empat Tahun Akademik 2017/2018</a></h3>
                  </div>
                  <div class="panel-body hitam" style="height: 70px;">
                    Yayasan Karya Salemba Empat Tahun Akademik 2017/2018                                </div>
                    <div class="panel-footer hitam" style="text-align: left">
                      Periode Pendaftaran: 15/02/17 s.d. 10/03/17 <br>
                      Status Pendaftaran : <font style='color:red'>Pendaftaran telah ditutup</font> <br>
                      Penerima Beasiswa : 150                                </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="panel panel-success">
                      <div class="panel-heading" style="height:63px;">
                        <h3 class="panel-title judul"><a href=/web/../apps/informasirolependaftar/index?idPaket=187>Women’s InternationaI Club (WIC) Tahun 2017</a></h3>
                      </div>
                      <div class="panel-body hitam" style="height: 70px;">
                        Women’s InternationaI Club (WIC) Tahun 2017                                </div>
                        <div class="panel-footer hitam" style="text-align: left">
                          Periode Pendaftaran: 17/02/17 s.d. 01/03/17 <br>
                          Status Pendaftaran : <font style='color:red'>Pendaftaran telah ditutup</font> <br>
                          Penerima Beasiswa : 15                                </div>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="panel panel-success">
                          <div class="panel-heading" style="height:63px;">
                            <h3 class="panel-title judul"><a href=/web/../apps/informasirolependaftar/index?idPaket=186>Beasiswa Unggulan Bank Indonesia Th. 2017</a></h3>
                          </div>
                          <div class="panel-body hitam" style="height: 70px;">
                            Beasiswa Unggulan Bank Indonesia Th. 2017                                </div>
                            <div class="panel-footer hitam" style="text-align: left">
                              Periode Pendaftaran: 16/02/17 s.d. 01/03/17 <br>
                              Status Pendaftaran : <font style='color:red'>Pendaftaran telah ditutup</font> <br>
                              Penerima Beasiswa : 5                                </div>
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div class="panel panel-success">
                              <div class="panel-heading" style="height:63px;">
                                <h3 class="panel-title judul"><a href=/web/../apps/informasirolependaftar/index?idPaket=184>Beasiswa UI - SYLFF Tahun Akademik 2017/2018</a></h3>
                              </div>
                              <div class="panel-body hitam" style="height: 70px;">
                                Beasiswa UI - SYLFF Tahun Akademik 2017/2018                                </div>
                                <div class="panel-footer hitam" style="text-align: left">
                                  Periode Pendaftaran: 09/01/17 s.d. 27/02/17 <br>
                                  Status Pendaftaran : <font style='color:red'>Pendaftaran telah ditutup</font> <br>
                                  Penerima Beasiswa : 0                                </div>
                                </div>
                              </div>
                            </div>

                          </div>
                          <div id="hasilSeleksi" class="content-section-b" style="border-top: 0">
                          </div>

                        </script>
                        <!-- Smoothscroll -->
                        <script type="text/javascript" src="js/jquery.corner.js"></script>
                        <script src="js/wow.min.js"></script>
                        <script>
                        new WOW().init();
                        </script>
                        <script src="js/classie.js"></script>
                        <script src="js/uiMorphingButton_inflow.js"></script>
                        <!-- Magnific Popup core JS file -->
                        <script src="js/jquery.magnific-popup.js"></script>

                      </body>
                      </html>
