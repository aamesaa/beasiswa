<?php
Include("../function/koneksi.php");
//Include_once ("../function/login.php");
$q="SELECT pendaftaran.kd_daftar, pendaftaran.nim, nama_mhs, pendaftaran.nominal_disetujui, sisa_pinjaman FROM pendaftaran NATURAL JOIN mahasiswa NATURAL JOIN beasiswa WHERE pendaftaran.kd_bsw like 'P%'AND nominal_disetujui is not null and isTampil = 1";
$getDataPinjaman=mysqli_query($koneksi,$q);// ambil data pendaftar yang pinjaman
?>
<!DOCTYPE HTML>
<html>
<head>

    <title>SIMBA</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <!--script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Custom Google Web Font -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Arvo:400,700' rel='stylesheet' type='text/css'>

      <!-- Custom CSS-->
    <link href="../css/general.css" rel="stylesheet">
    <!-- Owl-Carousel -->
    <link href="../css/custom.css" rel="stylesheet">
    <link href="../css/owl.carousel.css" rel="stylesheet">
    <link href="../css/owl.theme.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
    <!-- Magnific Popup core CSS file -->
    <link rel="stylesheet" href="../css/magnific-popup.css">

    <script src="../js/modernizr-2.8.3.min.js"></script>  <!-- Modernizr /-->

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
        <img src="../img/logo2.png" height="45px" style="margin-top:8px; margin-left:0" id="logo"/>
      </a>
      <div class="collapse navbar-collapse navbar-right navbar-ex1-collapse stuckMenu">
        <ul class="nav navbar-nav">
          <li class="menuItem"><a href="../index.php#infoBeasiswa">Info Beasiswa </a></li>
          <li class="menuItem"><a href="../index.php#hasilSeleksi">Hasil Seleksi </a></li>
          <li class="menuItem dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Admin<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="function/logout.php">Logout</a></li>
            </ul>
          </li>

        </ul>
      </div>
    </div>
  </nav>
<br/><br/><br/><br/>

  <div class="container">

      <h2 class="text-center">Daftar Pinjaman</h2>
      <br/>
      <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10">
              <table class="table table-striped table-bordered">
                  <tr ">
                  <th class="text-center" width="13%">Kode Daftar</th>
                  <th class="text-center" width="5%">NIM</th>
                  <th class="text-center" width="35%">Nama</th>
                  <th class="text-center" width="13%">Pinjaman</th>
                  <th class="text-center" width="13%"> Sisa Pinjaman</th>
                  <th class="text-center" width="13%">Action</th>
                  </tr>

                  <?php
                  while ($rowPjm =  mysqli_fetch_array($getDataPinjaman)){

                      $sisa=(string)$rowPjm[4];
                      if ($sisa==0){
                          $sisa = "<strong style='color: #68bacd'>Lunas</strong>";
                      }


                      echo'
              <tr>
                  <td>'.$rowPjm['kd_daftar'].'</td>
                  <td>'.$rowPjm['nim'].'</td>
                  <td>'.$rowPjm['nama_mhs'].'</td>
                  <td style="text-align:right">'.$rowPjm['nominal_disetujui'].'</td>
                  <td style="text-align:right">'.$sisa.'</td>
                  <td class="text-center"> 
                    <button class="btn btn-xs btn-default btn-embossed">a</button>
                    <button class="btn btn-xs btn-info btn-embossed">i</button>
                    <button class="btn btn-xs btn-success btn-embossed">u</button>
                    </td>
              
              </tr>
              
              
              ';

                  }

                  ?>
              </table>
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
