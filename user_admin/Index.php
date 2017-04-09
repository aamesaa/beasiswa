<?php

Include("../function/koneksi.php");
//Include_once ("../function/login.php");
$getDataBsw=mysqli_query($koneksi,"SELECT * FROM beasiswa");

?>

<!DOCTYPE HTML>
<html>
<head>
  <title>SIMBA</title>
  <!--CSS-->
  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/..css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/..../js/bootstrap.min.js"></script>

  <!-- Custom Google Web Font -->
  <link href="../css/font-awesome.min.css" rel="stylesheet">
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
  <div class="container">
    <div class="row">
      <br/>  <br/><br/>
      <h2 class="text-center">Daftar Beasiswa</h2>
      <br/>
      <table class="table-striped table table-bordered">
        <thead class="text-center">
          <th>Kode</th>
          <th>Nama beasiswa</th>
          <th>Semester</th>
          <th>Thn Ajaran</th>
          <th>Tgl Buka</th>
          <th>Tgl Tutup</th>
          <th>Kuota</th>
          <th>Ditampilkan</th>
          <th>Action</th>
        </thead>
        <tbody>
          <?php
          while ($rowBsw= mysqli_fetch_array($getDataBsw)){
            $ketTampil="Tidak";
            if($rowBsw['isTampil']==1){
              $ketTampil="Ya";
            }
            echo'
            <tr>
            <td>'.$rowBsw['kd_bsw'].'</td>
            <td>'.$rowBsw['nama_bsw'].'</td>
            <td>'.$rowBsw['semt'].'</td>
            <td>'.$rowBsw['thn_ajar'].'</td>
            <td>'.$rowBsw['tgl_buka'].'</td>
            <td>'.$rowBsw['tgl_tutup'].'</td>
            <td>'.$rowBsw['kuota'].'</td>
            <td>'.$ketTampil.'</td>
            <td>
            <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-info btn-xs" style="padding-right:-20"data-toggle="modal" data-target="#myModal'.$rowBsw['kd_bsw'].'"> &nbsp &nbsp <span class="	glyphicon glyphicon-edit"></span></button>
            &nbsp
            <a href="detail_pendaftar.php?kd_bsw='.$rowBsw['kd_bsw'].'">Pendaftar</a>
            &nbsp

            <!-- Modal -->
            <div class="modal fade" id="myModal'.$rowBsw['kd_bsw'].'" role="dialog">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Beasiswa</h4>
                  </div>
                  <div class="modal-body">
                    <p>'.$rowBsw['nama_bsw'].'</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>


            </tr>

            ';


          }
          ?>
          <td>

          </div>
        </td>
      </tr>
    </tbody>
  </table>
</div>
</div>




<!-- JavaScript -->
<script src="../js/jquery-1.10.2.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/owl.carousel.js"></script>
<script src="../js/script.js"></script>
<!-- StikyMenu -->
<script src="../js/stickUp.min.js"></script>
<script type="text/javascript">
jQuery(function($) {
  $(document).ready( function() {
    $('.navbar-default').stickUp();

  });
});

</script>
<!-- Smoothscroll -->
<script type="text/javascript" src="../js/jquery.corner.js"></script>
<script src="../js/wow.min.js"></script>
<script>
new WOW().init();
</script>
<script src="../js/classie.js"></script>
<script src="../js/uiMorphingButton_inflow.js"></script>
<!-- Magnific Popup core JS file -->
<script src="../js/jquery.magnific-popup.js"></script>

</body>
</html>
