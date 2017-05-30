<?php
Include("../function/koneksi.php");
Include ("../function/coba.php");
Include ("../function/create_modal.php");
//Include_once ("../function/statusMessage.php");
//$msg = new statusMessage();
//Include_once ("../function/login.php");
class statusMessages
{
    private $msg;
    public function getMsg()
    {
        return $this->msg;
    }

    public function setMsg( $msg)
    {
        $this->msg = $msg;

        return $this;
    }

}
//$msgs = new statusMessage();
$msg = new statusMessages();
?>
<!DOCTYPE HTML>
<html>
<head>
    <link rel="shortcut icon" href="../img/simba.png">
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

<body >
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
              <li><a href="../function/logout.php">Logout</a></li>
            </ul>
          </li>

        </ul>
      </div>
    </div>
  </nav>
<br/><br/>

  <div class="container">

      <h2 class="text-center">Daftar Pinjaman</h2>
      <br/>
      <br/>
      <div class="row">
          <div class="col-md-12">
      <form class="form-inline" action="Cicilan.php" method="get">
          <div class="form-group ">
              <label class="control-label" for="prodi">Prodi &nbsp;: &nbsp;</label>

                  <select name="prodi" class="form-control" id="prodi" style="height: ;: auto">
                      <option  >All</option>
                      <option value="01" >Theologi S1</option>
                      <option value="11" >Manajemen</option>
                      <option value="12" >Akuntansi</option>
                      <option value="31" >Bioteknologi</option>
                      <option value="41" >Kedokteran</option>
                      <option value="61" >Arsitek</option>
                      <option value="62" >Desain Produk</option>
                      <option value="71" >Teknik Informastika</option>
                      <option value="72" >Sistem Informasi</option>
                  </select>
          </div>
          <input type="submit" class="btn btn-info" value="OK">
          <?php
          if(isset($_GET['prodi'])) {
              echo '<a href="export1.php?kd='.$_GET['prodi'].'" class="btn btn-primary pull-right">Download</a>';
          }else{
              echo '<a href="export1.php?" class="btn btn-primary pull-right">Download</a>';
          }
          ?>
          </form>





      <br/>
              <?php
              if(isset($_GET['prodi'])){
                  $kd_prodi= intval ($_GET['prodi']);
                  switch ($kd_prodi) {
                      case 01:
                          echo "<p>Menampilkan daftar pinjaman <strong>Prodi Theologi</strong></p>";
                          break;
                      case 11:
                          echo "<p>Menampilkan daftar pinjaman <strong>Prodi Manaajemen</strong></p>";
                          break;
                      case 12:
                          echo "<p>Menampilkan daftar pinjaman <strong>Prodi Akuntansi</strong></p>";
                          break;
                      case 31:
                          echo "<p>Menampilkan daftar pinjaman <strong>Prodi Bioteknologi</strong></p>";
                          break;
                      case 41:
                          echo "<p>Menampilkan daftar pinjaman <strong>Prodi Kedokteran</strong></p>";
                          break;
                      case 61:
                          echo "<p>Menampilkan daftar pinjaman <strong>Prodi Arsitek</strong></p>";
                          break;
                      case 62:
                          echo "<p>Menampilkan daftar pinjaman <strong>Prodi Desain Produk</strong></p>";
                          break;
                      case 71:
                          echo "<p>Menampilkan daftar pinjaman <strong>Prodi Teknik Informatika</strong></p>";
                          break;
                      case 72:
                          echo "<p>Menampilkan daftar pinjaman <strong>Prodi Sistem Informasi</strong></p>";
                          break;
                  }
              }
              ?>
          </div>
      </div>
      <?php
        //Include_once ("add_cicilan.php");?>

      <div class="row">
          <div class="col-md-12">
              <?php
              if (isset($_GET['status'])=="s"){
                  echo '<div class="alert alert-info alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Berhasil ditambahkan</div>';
              }else if(isset($_GET['status'])=="f"){
                  echo '<div class="alert alert-danger alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Gagal ditambahkan</div>';
              }
              ?>
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

                  if(isset($_GET['prodi'])) {
                      $GLOBALS["q"] = "SELECT pendaftaran.kd_daftar, pendaftaran.nim, nama_mhs, pendaftaran.nominal_disetujui, sisa_pinjaman FROM pendaftaran NATURAL JOIN mahasiswa NATURAL JOIN beasiswa WHERE pendaftaran.kd_bsw like 'P%'AND nominal_disetujui is not null and isTampil = 1 AND kd_prodi='" . $_GET['prodi'] . "'";
                  }else {
                      $GLOBALS["q"]="SELECT pendaftaran.kd_daftar, pendaftaran.nim, nama_mhs, pendaftaran.nominal_disetujui, sisa_pinjaman FROM pendaftaran NATURAL JOIN mahasiswa NATURAL JOIN beasiswa WHERE pendaftaran.kd_bsw like 'P%'AND nominal_disetujui is not null and isTampil = 1";
                  }
                  if(isset($_GET['prodi'])AND $_GET['prodi']=="All") {
                      $GLOBALS["q"] = "SELECT pendaftaran.kd_daftar, pendaftaran.nim, nama_mhs, pendaftaran.nominal_disetujui, sisa_pinjaman FROM pendaftaran NATURAL JOIN mahasiswa NATURAL JOIN beasiswa WHERE pendaftaran.kd_bsw like 'P%'AND nominal_disetujui is not null and isTampil = 1";
                  }


                  $getDataPinjaman=mysqli_query($koneksi,$GLOBALS["q"]);// ambil data pendaftar yang pinjaman
                  while ($rowPjm =  mysqli_fetch_array($getDataPinjaman)){

                      $sisa=(string)$rowPjm[4];
                      if ($sisa<=0){
                          $sisa = "<strong style='color: #68bacd'>Lunas</strong>";
                        }else{
                          $sisa=(string) number_format($rowPjm[4]);
                        }

                      $getKodeDftr= $rowPjm['kd_daftar'];

                      echo'

                          <tr>
                              <td>'.$rowPjm['kd_daftar'].'</td>
                              <td>'.$rowPjm['nim'].'</td>
                              <td>'.$rowPjm['nama_mhs'].'</td>
                              <td style="text-align:right">' .number_format($rowPjm['nominal_disetujui']).'</td>

                              <td style="text-align:right">'.$sisa.'</td>
                                <td >
                              <div style="margin-left:25px">';
                      if ($sisa<=0){
                          echo'
                            
                                <button type="button" class="btn btn-info btn-xs" style="margin-left:20px;"data-toggle="modal" data-target="#myModal'.$rowPjm['kd_daftar'].'"><span class="glyphicon glyphicon-list-alt " style="margin:0 0 0 0; padding:0"></span></button>
                                
                              ';
                      }else{
                          echo'
                              
                                <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal'.$rowPjm['kd_daftar'].'"><span class="glyphicon glyphicon-list-alt " style="margin:0 0 0 0; padding:0"></span></button>
                                <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addModal'.$rowPjm['kd_daftar'].'"><span class="glyphicon glyphicon-plus" style="margin:0 0 0 0; padding:0"></span></button>
                              ';
                      }
                     echo'
                                </div>
                                    <!-- Modal DETAIL -->
                                    <div id="myModal'.$rowPjm['kd_daftar'].'" class="modal fade" role="dialog">
                                      <div class="modal-dialog modal-lg">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Detail Cicilan pinjaman</h4>
                                          </div>
                                          <div class="modal-body">
                                            <table>
                                          <tr >
                                            <td style:"text-algin:left;">Kode Daftar</td>
                                            <td>: </td>
                                            <td style:"text-algin:left;">'.$rowPjm['kd_daftar'].'</td>
                                          </tr>
                                           <tr>
                                            <td style:"text-algin:left;">NIM</td>
                                            <td>: </td>
                                            <td>'.$rowPjm['nim'].'</td>
                                          </tr>
                                          <tr>
                                            <td>Nama</td>
                                            <td>: </td>
                                            <td>'.$rowPjm['nama_mhs'].'</td>
                                          </tr>
                                          <tr>
                                            <td>Sisa Pinjaman</td>
                                            <td>: </td>
                                            <td>'.$sisa.'</td>
                                          </tr>
                                          </table>
                                           '.getDetailCicilan($rowPjm['kd_daftar']).'
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                          </div>
                                        </div>

                                      </div>
                                    </div>

                                    <!-- Modal ADD -->
                                    <div id="addModal'.$rowPjm['kd_daftar'].'" class="modal fade" role="dialog">
                                      <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Pembayaran Pinjaman</h4>
                                          </div>
                                          <div class="modal-body">
                                          <table>
                                          <tr >
                                            <td style:"text-algin:left;">Kode Daftar</td>
                                            <td>: </td>
                                            <td style:"text-algin:left;">'.$rowPjm['kd_daftar'].'</td>
                                          </tr>
                                           <tr>
                                            <td style:"text-algin:left;">NIM</td>
                                            <td>: </td>
                                            <td>'.$rowPjm['nim'].'</td>
                                          </tr>
                                          <tr>
                                            <td>Nama</td>
                                            <td>: </td>
                                            <td>'.$rowPjm['nama_mhs'].'</td>
                                          </tr>
                                          <tr>
                                            <td>Sisa Pinjaman</td>
                                            <td>: </td>
                                            <td>'.$sisa.'</td>
                                          </tr>
                                          
                                          <form method="POST" action="add_cicilan.php" class="form-horizontal">

                                            <div class="form-group">
                                            <tr>
                                            <td>
                                              <label class="control-label " for="thn_ajar">Nominal</label></td>
                                              <td>: </td>
                                              <td>
                                              
                                                <input type="number" min="0 "class="form-control" id="nominal" name="nominal" placeholder="1.000.000" required > 
                                                 <input type="hidden" min="0 "class="form-control" id="kd_daftar" name="kd_daftar" value="'.$rowPjm['kd_daftar'].'">
                                             
                                              </td>
                                              </tr>
                                            </div>
                                            </table>

                                          </div>
                                          <div class="modal-footer">
                                           <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                              <button type="submit" class="btn btn-embossed btn-info" name="submit" id="submit" value="submit">Submit</button>
                                            </div>
                                          </div>
                                          </div>
                                        </div>

                                      </div>
                                    </div>
                                    </form>


                       ';

                      //$modalId= "MyModal".$rowPjm['kd_daftar'];
                      //echo createModal($modalId,"Detail Pinjaman",getDetailCicilan($rowPjm['kd_daftar']),"<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>");

                  }
                  ?>
              </table>


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
