<?php
Include("function/koneksi.php");
include ("function/login.php");
Include("function/inc_f_object.php");
$kode_bsw_dipilih = $_GET['kd_bsw'];
$nim =  $_SESSION['session_id'];

$getDataBsw=mysqli_query($koneksi,"SELECT * FROM beasiswa where kd_bsw= '$kode_bsw_dipilih'");
$rowBsw= mysqli_fetch_array($getDataBsw);

$getDataMhs=mysqli_query($koneksi,"SELECT * FROM mahasiswa natural join ref_prodi where nim= $nim");
$rowMhs= mysqli_fetch_array($getDataMhs);

$getDataBsw=mysqli_query($koneksi,"SELECT * FROM beasiswa where kd_bsw= '$kode_bsw_dipilih'");
$rowBsw= mysqli_fetch_array($getDataBsw);

$getSyrSql="SELECT nama_syarat, tipe_syarat FROM ref_syarat rs NATURAL JOIN syarat_bsw sb NATURAL JOIN beasiswa b WHERE b.kd_bsw='$kode_bsw_dipilih'";
$getSyrBeasiswa=mysqli_query($koneksi,$getSyrSql);
//echo $kode_bsw_dipilih ;
//echo $nim;
?>
<!DOCTYPE HTML>
<html>
<head>
  <title>SIMBA</title>
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
  <body>
  <!--NAVBAR-->
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
              echo'<li class="menuItem"><a>'.$username.'</a></li>';
              echo '<li class="menuItem"><a href="function/logout.php">Logout</a></li>';
              //echo'<li class="menuItem"><a>Session '.$_SESSION['session_id'].'</a></li>';

            } else {//blm login
              echo'<li class="menuItem"><a href="form_login.php">Login</a></li>';
              //echo'<li class="menuItem"><a>Session '.$_SESSION['session_id'].'</a></li>';

            }

            ?>
          </ul>
        </div>
      </div>
    </nav>
  <!--Content-->
    <div class="container">
      <br/><br/><br/>
      <h3 class="text-center">Form Pendaftaran Beasiswa</h3>
      <br/> <br/>
      <div class="col-lg-1 col-md-1"></div>
      <div class="col-md-10 col-lg-10">
        <form action="create_daftar_beasiswa.php" class="form-inline " method="POST" enctype="multipart/form-data">
          <table>
            <tr>
                <td> Nama Beasiswa </td>
                <td> &nbsp : &nbsp</td>
                <td><?php echo $rowBsw['nama_bsw']; ?></td>
            </tr>
            <tr>
                <td> Semester </td>
                <td> &nbsp : &nbsp</td>
                <td><?php echo $rowBsw['semt']; ?></td>
            </tr>
            <tr>
                <td> Semester </td>
                <td> &nbsp : &nbsp</td>
                <td><?php echo $rowBsw['thn_ajar']; ?><br/></td>
            </tr>
            <tr>
              <td>&nbsp</td>
              <td>&nbsp</td>
              <td>&nbsp</td>
            </tr>
            <tr>
                <td> NIM</td>
                <td> &nbsp : &nbsp</td>
                <td><?php echo $rowMhs['NIM']; ?></td>
            </tr>
            <tr>
                <td> Nama </td>
                <td> &nbsp : &nbsp</td>
                <td><?php echo $rowMhs['nama_mhs']; ?></td>
            </tr>
            <tr>
                <td>Prodi </td>
                <td> &nbsp : &nbsp</td>
                <td><?php echo $rowMhs['nama_prodi']; ?></td>
            </tr>
            <tr>
              <td>&nbsp</td>
              <td>&nbsp</td>
              <td>&nbsp</td>
            </tr>

            <?php
            while ($rowSyrBsw=mysqli_fetch_array($getSyrBeasiswa)){
              $input =_myobject($rowSyrBsw['tipe_syarat'],$rowSyrBsw['nama_syarat'],"form-control","nm","","","","","","","required",$rowSyrBsw['nama_syarat'],"");
              echo '
              <tr>
              <div class="form-group">
                <td>
                  <label for="'.$rowSyrBsw['nama_syarat'].'">'.$rowSyrBsw['nama_syarat'].' </label>
                </td>
                <td> &nbsp : &nbsp</td>
                <td>
                '.$input.'
                </td>
              </div>
              </tr>
            ';

            }
            ?>

            </table>




        </form>
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
