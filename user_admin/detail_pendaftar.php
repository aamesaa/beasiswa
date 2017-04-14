<?php
/**
 * Created by PhpStorm.
 * User: amesa
 * Date: 4/14/17
 * Time: 9:47 AM
 */
Include("../function/koneksi.php");
$kode_bsw = $_GET['kd_bsw'];
$sqlDaftar = "SELECT kd_daftar, nim, nama_mhs,tgl_daftar, nominal_pengajuan, nominal_disetujui from pendaftaran p NATURAL JOIN mahasiswa m  where kd_bsw='$kode_bsw'";
$daftarExc = mysqli_query($koneksi,$sqlDaftar);

$sqlBsw = "SELECT * from beasiswa where kd_bsw='$kode_bsw'";
$bswExc= mysqli_query($koneksi,$sqlBsw);
$rowBsw = mysqli_fetch_array($bswExc);
?>
<!DOCTYPE HTML>
<HTML>
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
                    <li class="menuItem"><a href="../index.php#infoBeasiswa">Info Beasiswa </a></li>
                    <li class="menuItem"><a href="../index.php#hasilSeleksi">Hasil Seleksi </a></li>
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
        <div class="row">
            <br/><br/><br/><br/><br/><br/>
            <h2 class="text-center">Detail Pendaftar</h2>
            <br/>
            <table>
                <tr>
                    <td>Nama Beasiswa &nbsp; </td>
                    <td>:&nbsp;</td>
                    <td><?php echo $rowBsw[0];?> </td>
                </tr>
                <tr>
                    <td>Semester</td>
                    <td>:&nbsp;</td>
                    <td><?php echo $rowBsw[1];?></td>
                </tr>
                <tr>
                    <td> Thn Ajaran </td>
                    <td>:&nbsp;</td>
                    <td> <?php echo $rowBsw[2];?><br/> </td>
                </tr>

            </table>
            <table class="table table-bordered">
                <tr>
                    <th>No Pendaftaran</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Tgl Daftar</th>

                    <?php
                        $sqlNamaBsw= "SELECT nama_syarat FROM syarat_bsw NATURAL JOIN ref_syarat WHERE kd_bsw='$kode_bsw'";
                    echo"sql namabsw = ".$sqlNamaBsw."<br/>";
                        $exc = mysqli_query($koneksi,$sqlNamaBsw);
                        while($row =mysqli_fetch_array($exc)){

                            echo '<th>'.$row[0].'</th>';
                        }
                    ?>
                    <th>Action</th>

                </tr>
                <?php
                $sql1="SELECT kd_syarat_bsw, nama_syarat FROM syarat_bsw NATURAL JOIN ref_syarat WHERE kd_bsw='$kode_bsw'";
                echo"sql 1 = ".$sql1."<br/>";
                $row1=mysqli_query($koneksi,$sql1);
                //ambil semua data
                while($hasil0 = mysqli_fetch_array($daftarExc)){

                    echo'
                    <tr>
                    <td>'.$hasil0[0].'</td>
                    <td>'.$hasil0[1].'</td>
                    <td>'.$hasil0[2].'</td>
                    <td>'.$hasil0[3].'</td>
                    
                    ';
                    //ambil syarat
                    while($hasil1=mysqli_fetch_array($row1)){
                        
                        $sql2="SELECT isi_syarat FROM syarat_daftar WHERE kd_syarat_bsw = '$hasil1[0]' AND kd_daftar='$hasil0[0]'";
                        echo 'sql 2 :'.$sql2."<br>";
                        $row2 = mysqli_query($koneksi,$sql2);
                        if(!$row2){
                            while($hasil3=mysqli_fetch_array($sql2)){
                                echo '<td>'.$row2[0].'</td>';
                            }
                        }else{
                            echo '<td>'.$hasil1[1].' &nbsp; : kosong</td>';
                        }

                    }
                    echo'
                        <td>
                            <a><span class="glyphicon glyphicon-list-alt btn btn-sm btn-info btn-embossed"></span></a>
                            <a><span class="glyphicon glyphicon-list-alt btn btn-sm btn-primary btn-embossed"></span></a>
                        </td>
                    </tr>
                    ';
                }

                ?>



            </table>
        <?php ?>
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
</HTML>

