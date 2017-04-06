<?php
// include function & css

include("function/koneksi.php");
//include("session.php");
//include("login.php");

  $d=4;
session_start();
if($_SESSION['login_user']!=null)
{
  //echo"blm login";
  echo "<font color='#FF0000'>Username atau Password belum terdaftar</font>";
  //$_SESSION["isLogin"]=false;
$_SESSION['isLogin']=1;
  echo ($_SESSION['login_user']);
}
  else {
    echo"blm loginz";
    echo (parse_str($_SESSION['login_user']));
    $_SESSION['isLogin']=0;
  }

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
    <a href="index.php">Sistem Beasiswa</a>
    <a href="#infoBeasiswa">Info Beasiswa </a>
    <a href="#hasilSeleksi">Hasil Seleksi </a>
<?php
    //TODO: check login apa blm
    //====LOGIC HERE====
    //BLM LOGIN
    //GANTI WARNA CONTENT SECTION B
    //$isLogin->$rows;
    /*if($isLogin>1){
      echo'<a href="login.php">Login</a>';
    }echo $login_session;*/
    echo($_SESSION['isLogin']);
    ?>
    <a href="form_login.php">Login</a>



    <div id="home" class="content-section-b" style="border-top: 0">
      <!--INSERT PICT HERE-->
    </div>
    <div id="infoBeasiswa" class="content-section-a" style="border-top: 0">
      <div class='container'>
        <p> ini info</p>
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
