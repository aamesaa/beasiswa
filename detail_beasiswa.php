<?php
Include("function/koneksi.php");
//include('function/session.php');
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
  <?php echo $login_session; ?>
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

  <div class="container">

    <div class="row">
      <br>
      <a href="index.php#infoBeasiswa">Back to Home</a>
        <h2 class="text-center"> Detail Beasiswa</h2>


    <?php

    $kode_bsw= $_GET['id'];
    $getBswSql="SELECT nama_bsw,tgl_buka,tgl_tutup,Keterangan,kuota from beasiswa where kd_bsw='$kode_bsw'";

    $getBeasiswa=mysqli_query($koneksi,$getBswSql);

    $rowBsw=mysqli_fetch_array($getBeasiswa);
    ?>
    <br>
    <div class="col-md-1 col-lg-1"></div>
    <div class="col-md-10">
      <div class="alert alert-info" id="ringkasanBsw">

        <table>
          <tr>
            <td> Nama Beasiswa</td>
            <td>&nbsp:&nbsp</td>
            <td><?php echo $rowBsw['nama_bsw'];?></td>
          </tr>
          <tr>
            <td> Tanggal mulai pendaftaran </td>
            <td>&nbsp:&nbsp</td>
            <td><?php echo $rowBsw['tgl_buka'];?></td>
          </tr>
          <tr>
            <td> Tanggal akhir pendaftaran </td>
            <td> &nbsp:&nbsp</td>
            <td> <?php echo $rowBsw['tgl_tutup'];?></td>
          </tr>
          <tr>
            <td> Keterangan</td>
            <td> &nbsp:&nbsp</td>
            <td><?php echo $rowBsw['Keterangan'];?></td>
          </tr>
        </table>
      </div>
      <?php
      $getSyrSql="SELECT nama_syarat FROM ref_syarat rs NATURAL JOIN syarat_bsw sb NATURAL JOIN beasiswa b WHERE b.kd_bsw='$kode_bsw'";
      $getSyrBeasiswa=mysqli_query($koneksi,$getSyrSql);
      ?>
      <div class="alert alert-info" id="syaratBsw">
        <h4> Syarat</h4>
        <ul style="list-style-type:disc">
        <?php
        while ($rowSyrBsw=mysqli_fetch_array($getSyrBeasiswa)){
          echo"<li> - &nbsp";
          echo $rowSyrBsw['nama_syarat'];
          echo "</li>";
        }

         ?>
       </ul>
      </div>
      <a href="daftar_beasiswa.php" class="btn wow tada btn-embossed btn-primary pull-right animated animated">Daftar</a>
  </div>




</div>
</div>
  </html>
