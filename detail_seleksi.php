<?php
// include function & css

include("function/koneksi.php");
//include("session.php");
//include("login.php");
session_start();
date_default_timezone_set('Asia/Jakarta');

// connection
?>
<html>
<head>
  <title>Pengumuman Hasil Seleksi Beasiswa</title>
  <!--CSS-->
    <link rel="shortcut icon" href="img/simba.png">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <!--script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
<body class="content-section-a">
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
          <li class="menuItem"><a href="index.php#infoBeasiswa">Info Beasiswa </a></li>
          <li class="menuItem"><a href="index.php#hasilSeleksi">Hasil Seleksi </a></li>
          <?php
          if(isset($_SESSION['login_user'])){//sudah login
            $username= $_SESSION['login_user'];
            echo'
            <li class="menuItem dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">'.$username.'<span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><a href="function/logout.php">Logout</a></li>
            </ul>
            </li>';

          } else {//blm login
            echo'<li class="menuItem"><a href="form_login.php">Login</a></li>';
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>
  <div id="infoBeasiswa" class="content-section-a" style="border-top: 0; margin-top:-50;">
    <div class='container'>
      <div class="row">
        <a href="index.php#hasilSeleksi">Back to Home</a>
        <H2 class="text-center">Pengumuman Hasil Seleksi</H2>
        <br>
        <br>

        <div class="col-md-1"></div>
        <div class="col-md-10">

        <table class="table table-striped table-responsive table-condensed">

          <?php
            $kode_slk = $_GET['id'];
            $q0 = "SELECT * from beasiswa where kd_bsw='$kode_slk'";
            $squery = mysqli_query($koneksi,$q0);
            $row1 = mysqli_fetch_array($squery);
            echo'<h4>'.$row1['nama_bsw'].'</h4>';
          ?>

          <thead style="text-center">
            <tr>
              <th class="text-center"style="width:200">NIM</th>
              <th class="text-center"style="width:700">Nama</th>
              <th class="text-center"style="width:300">Nominal Pinjaman</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $q1 = "SELECT * from pendaftaran natural join mahasiswa where nominal_disetujui is not null and kd_bsw='$kode_slk'";
            $squery = mysqli_query($koneksi,$q1);
            while($row = mysqli_fetch_array($squery))
            {
            echo '
            <tr>
              <td class="text-center">'.$row['nim'].'</td>
              <td>'.$row['nama_mhs'].'</td>
              <td class="text-right">'.$row['nominal_disetujui'].'</td>
            </tr>';
            }
            ?>
          </tbody>
        </table>
        </div>

      </div>
    </div>
  </div>

<!-- JavaScript -->
  <script src="js/jquery-1.10.2.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/owl.carousel.js"></script>
  <script src="js/script.js"></script>
  <!-- StikyMenu -->
  <script src="js/stickUp.min.js"></script>
  <script type="text/javascript">
  jQuery(function($) {
    $(document).ready( function() {
      $('.navbar-default').stickUp();

    });
  });

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
