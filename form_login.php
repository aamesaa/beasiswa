<?php
include_once('function/login.php'); // Memasuk-kan skrip Login

?>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="Masuk SIMBA ">
  <meta name="author" content="">
  <title>Login SIMBA</title>

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
  <!--[if IE 9]>
  <script src="js/PIE_IE9.js"></script>
  <![endif]-->
  <!--[if lt IE 9]>
  <script src="js/PIE_IE678.js"></script>
  <![endif]-->

  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <![endif]-->
</head>
<nav class="navbar-default" role="navigation">
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
      <img src="img/logo2.png" height="45px" style="margin-top:8px" id="logo"/>
    </a>
  </div>
</nav>


<body id="home">
  <form action="" method="post">
    <div id="contact" class="content-section-ss">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3 text-center wrap_title">
            <h2>Login</h2>
            <p class="lead" style="margin-top:0">SIMBA</p>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <form role="form" action="" method="post" >
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
              <form class="form-horizontal">

                <div class="form-group">
                  <label for="InputEmail">Your User Name</label>
                  <div class="input-group">
                    <input type="text" class="form-control" id="user" name="user" placeholder="Enter User Name" required  >
                    <span class="input-group-addon"><!--<i class="glyphicon glyphicon-ok form-control-feedback"></i>--></span>
                  </div>
                </div>

                <div class="form-group">
                  <label for="InputMessage">Password</label>
                  <div class="input-group">
                    <input type="password" name="password" id="password" class="form-control" required placeholder="Enter Password"></input>
                    <span class="input-group-addon"><!--<i class="glyphicon glyphicon-ok form-control-feedback"></i>--></span>
                  </div>

                </br>
                <input type="submit" name="submit" id="submit" value="Login" class="btn wow tada btn-embossed btn-primary text-center pull-right" style="margin-right: 42.5%">
              </div>
            </form>
          </div>
          <div class="col-md-3">
          </div>
        </div>
      </div>
    </br>
  </br>
</form>
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
