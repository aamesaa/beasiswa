<?php
include("../function/koneksi.php");
?>
<html>
<head>
  <title>SIMBA</title>
  <!--CSS-->

  <!DOCTYPE HTML>
  <html>
  <head>
    <title>SIMBA</title>
    <!--CSS-->
    <!-- Bootstrap core CSS -->
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
          <li class="menuItem"><a href="Cicilan.php">Pengembalian </a></li>
          <li class="menuItem dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Admin<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="../user_admin/daftar_user.php">System User</a></li>
              <li><a href="function/logout.php">Logout</a></li>
            </ul>
          </li>

        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    <br/><br/><br/>
      <a href="index.php"> <span class="glyphicon glyphicon-chevron-left"></span>Back to Home</a>
    </br>
    <h3>Create User</h3>

    <br/><br/>


    <form class="form-horizontal" action="create_user.php" method="POST">
      <div class="form-group">
        <label class="control-label col-sm-2" for="user_id">User Id :</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" id="user_id" name="user_id">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="password">Password:</label>
        <div class=" col-sm-5">
          <input type="password" class="form-control" id="password" name="password">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="role">Role:</label>
        <div class="col-sm-4">
          <select name="role" class="form-control" id="role">
            <option value="9" >Wakil Rektor 3</option>
            <option value="2" >Wakil Dekan 3</option>
            <option value="1" >Admin</option>
            <option value="0" >Mahasiswa</option>
          </select>
        </div>
      </div>
      <div class="col-md-4"></div>
        <div class="col-md-4">
      <input type="submit" class="btn btn-primary" value="submit">
      </div>
    </form>
  </div>
  <br/><br/>
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
