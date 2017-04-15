<?php
// include function & css

include("function/koneksi.php");
//include("function/session.php");
include("function/login.php");
//session_start();
date_default_timezone_set('Asia/Jakarta');

// connection
?>
<!DOCTYPE HTML>
<html>
<head>
  <title>SIMBA</title>
  <!--CSS-->
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
            </li>
            ';
          } else {//blm login
            echo'<li class="menuItem"><a href="form_login.php">Login</a></li>';
          }

          ?>
        </ul>
      </div>
    </div>
  </nav>

  </br>
  <div id="home" class="content-section-ss intro-header" style="border-top: 0">

  </div>

  <div id="infoBeasiswa" class="content-section-a" style="border-top: 0">
    <div class='container'>
      <H2 class="text-center">Daftar Informasi Beasiswa</H2>
      <br><br>

      <?php
        $sql=mysqli_query($GLOBALS["koneksi"],"SELECT * FROM beasiswa where isTampil='1'");
        while ($row= mysqli_fetch_array($sql))
        {
          //Cek bisa daftar ga
          $isAvailable=1;
          $availableMsg="";
          if ($row['tgl_tutup'] > date("Y-m-d"))
          {
            $availableMsg='<font style="color:green">Pendaftaran dibuka</font> <br>';
          } else
          $availableMsg='<font style="color:red">Pendaftaran ditutup</font> <br>';

          echo'
          <div class="col-lg-6">
            <div class="panel panel-info">
              <div class="panel-heading" style="height:63px;">
                <h3 class="panel-title text-center">
                  <a href="detail_beasiswa.php?id='.$row['kd_bsw'].'">'.$row['nama_bsw'].'</a>
                </h3>
              </div>
              <div class="panel-body hitam" style="height: 70px;">'.
              $row['Keterangan'].'
              </div>

              <div class="panel-footer hitam" style="text-align: left">
                Periode Pendaftaran: '.$row['tgl_buka'] .' s.d. '. $row['tgl_tutup'].' <br>
                Status Pendaftaran : '.$availableMsg.

                'Penerima Beasiswa : '.$row['kuota'].'
              </div>

            </div>
          </div>
          ';


        }
       ?>


    </div>
  </div>
  <!--Hasil Seleksi-->
  <div id="hasilSeleksi" class="content-section-b" style="border-top:0;margin-top:-10000;">
    <div class="container">
    <H2 class="text-center">Hasil Seleksi</H2>
    <br><br>

    <?php
    $squery = mysqli_query($GLOBALS['koneksi'], "select * from beasiswa where isPublish = '1'");
    while($row = mysqli_fetch_array($squery))
    {
    echo '
    <div class="col-md-12">
      <div class="panel panel-info">
        <div class="panel-body " style="height: 150px;">
          <div class="col-md-10">
          <a href="detail_seleksi.php?id='.$row['kd_bsw'].'"> <h4> '.
          $row['nama_bsw'].
          ' </h4></a>
          <p>Semester &nbsp &nbsp &nbsp &nbsp : &nbsp'.$row['semt'].'<br/>Tahun ajaran :&nbsp
          '.$row['thn_ajar'].'</p>
          </div>
          <div class="col-md-2">
            <br>
            <a href="detail_seleksi.php?id='.$row['kd_bsw'].'"id="submit" class="btn btn-embossed btn-primary" style="margin-right: 42.5%; padding-top: 10000">Detail</a>
          </div>
        </div>
      </div>
    </div>';
  }
    ?>
  </div>
</div>

<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-7">
        <h3 class="footer-title">SIMBA</h3>
        <p>SIMBA - Sistem Informasi Beasiswa<br/>
          Merupakan sistem informasi beasiswa internal UKDW.<br/>
          Mahasiswa dapat mendapatkan informasi mengenai beasiswa beserta detai pendaftarannya
          serta melakukan pendaftaran<br/><br/>
          Developed by
          <a rel="cc:attributionURL" href="http://www.github.com/aamesaa"
           property="dc:title">Azhalia Amesa </a> and
           <a rel="dc:creator" href="http://www.github.com/charolinesepta97"
           property="cc:attributionName">Charoline Septa</a> <br/>
           for Pemrograman Terintegrasi Terapan's project
       </p>



      </div> <!-- /col-xs-7 -->

      <div class="col-md-5">
        <div class="footer-banner">
          <h3 class="footer-title">Biro Kemahasiswaan dan Alumni</h3>
          <ul>
            <li>Gd Filia,&nbsp Jln Dr. Wahidin Sudirohusodo No 5-25</li>
            <li>Gondokusuman, Yogyakarta 66224</li>
            <li>0274 786157</li>

          </ul>
          Go to: <a href="http://www.ukdw.ac.id" target="_blank">www.ukdw.ac.id</a>
        </div>
      </div>
    </div>
  </div>
</footer>

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
