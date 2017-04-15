<?php
/**
 * Created by PhpStorm.
 * User: amesa
 * Date: 4/15/17
 * Time: 10:16 AM
 */


Include("../function/koneksi.php");
$kd_dftr =$_GET['kd_dftar'];
$sqlDetail = "SELECT * FROM pengembalian WHERE kd_daftar = '$kd_dftr'";
$excSqlDetail = mysqli_query($koneksi, $sqlDetail);

$sqlMaster  = "SELECT * FROM pendaftaran NATURAL  JOIN mahasiswa WHERE kd_daftar = '$kd_dftr'";
$excSqlMaster = mysqli_query($koneksi, $sqlMaster);
$rowMaster=mysqli_fetch_array($excSqlMaster);



?>
<!DOCTYPE html>
<html lang="en">
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
                <li class="menuItem"><a href="Cicilan.php">Pengembalian </a></li>
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
<br/><br/><br/>

<div class="container">
    <a href="detail_cicilan.php">Back to Daftar Pembayaran</a>
    <h2 class="text-center">Detail Pembayaran Cicilan</h2>
    <br/>
    <table>
        <tr>
            <td>Kode daftar</td>
            <td> &nbsp; : &nbsp; </td>
            <td><?php echo $rowMaster['kd_daftar']?> </td>
        </tr>
        <tr>
            <td>NIM</td>
            <td> &nbsp; : &nbsp; </td>
            <td><?php echo $rowMaster['nim']?> </td>
        </tr>
        <tr>
            <td>Kode daftar</td>
            <td> &nbsp; : &nbsp; </td>
            <td><?php echo  $rowMaster['nama_mhs']?> </td>
        </tr>
        <tr>
            <td>Jumlah Pinjaman</td>
            <td> &nbsp; : &nbsp; </td>
            <td><?php echo  $rowMaster['nominal_disetujui']?> </td>
        </tr>
        <tr>
            <td>Sisa Pinjaman</td>
            <td> &nbsp; : &nbsp; </td>
            <td><?php echo  $rowMaster['sisa_pinjaman']?> </td>

        </tr>
    </table>
    <br/>
    <div class="col-md-2"></div>
    <div class="col-md-8">
    <table class="table table-bordered table-striped">
        <tr>
            <th>Tgl Bayar</th>
            <th>Nominal</th>
        </tr>

    <?php
    $hasil='';
    while($row = mysqli_fetch_array($excSqlDetail)){
        echo'
        <tr>
            <td>'.$row['tgl_bayar'].'</td>
            <td>'.$row['nominal_bayar'].'</td>
        </tr>
        
        ';


    }
    ?>

    </table>
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

