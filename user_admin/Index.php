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
  <div class="container">
    <div class="row">
      <br/>  <br/><br/>
      <h2 class="text-center">Daftar Beasiswa</h2>
      <br/>
      <a href="form_create_beasiswa.php" class="btn btn-info pull-right">Tambah </a>
      <table class="table-striped table table-condensed">
        <thead class="text-center">
          <th>Kode</th>
          <th>Nama beasiswa</th>
          <th>Semester</th>
          <th>Thn Ajaran</th>
          <th>Tgl Buka</th>
          <th>Tgl Tutup</th>
          <th>Kuota</th>
          <th class="text-center">Ditampilkan</th>
          <th class="text-center">Action</th>
        </thead>
        <tbody>
          <?php
          while ($rowBsw= mysqli_fetch_array($getDataBsw)){
            $ketTampil="Tidak";
            $warna="#34495e";
            if($rowBsw['isTampil']==1){
              $ketTampil="Ya";
              $warna="red";
            }


            $isSemtGenap ="";
            $isSemtGanjil="";
            if($rowBsw['semt']=="Genap"){
                $isSemtGenap="selected";
            }elseif($rowBsw['semt']=="Ganjil"){
                $isSemtGanjil="selected";
            }
            $isTampilvalue="";
            $isNotTampilvalue="";
            if($rowBsw['isTampil'])
            {
                $isTampilvalue="checked";
            }else{
                $isNotTampilvalue="checked";
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
            <td class="text-center" style="color:'.$warna.'">'.$ketTampil.'</td>
            <td>
            <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-embossed btn-info btn-xs" style="padding-right:-20"data-toggle="modal" data-target="#myModal'.$rowBsw['kd_bsw'].'"> &nbsp &nbsp <span class="	glyphicon glyphicon-edit"></span></button>
            &nbsp
            <a href="detail_pendaftar.php?kd_bsw='.$rowBsw['kd_bsw'].'" class="btn btn-success btn-embossed btn-xs" style="text-decoration: none">&nbsp &nbsp<span class="glyphicon glyphicon-list"></span></a>
            &nbsp
            <a href="delete_beasiswa.php" action="delete_beasiswa.php" class="btn btn-danger btn-embossed btn-xs" style="text-decoration: none">&nbsp &nbsp <span class="glyphicon glyphicon-trash"></span></a>

            <!-- Modal -->
            <div class="modal fade" id="myModal'.$rowBsw['kd_bsw'].'" role="dialog">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" style="color:#34495e;">&times;</button>
                    <h4 class="modal-title">Edit Beasiswa</h4>
                  </div>
                  <div class="modal-body">
                  <div class="container">

                    <form class="form-horizontal" action="edit_beasiswa.php" method="POST">
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="kd_bsw">Kode Beasiswa :</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="kd_bsw" name="kd_bsw" value="'.$rowBsw['kd_bsw'].'">
                    </div>
                  </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="namabsw">Nama Beasiswa :</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" id="namabsw" name="namabsw" value="'.$rowBsw['nama_bsw'].'">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="semt">Semester:</label>
                      <div class="col-sm-4">
                         <select name="semester" class="form-control" id="semt">
                          <option value="Genap"'.$isSemtGenap.' >Genap</option>
                          <option value="Ganjil"'.$isSemtGanjil.'>Ganjil</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="thn_ajar">Th. Ajar:</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" id="thn_ajar" name="thn_ajar" value="'.$rowBsw['thn_ajar'].'">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="mulai">Tgl. Mulai:</label>
                      <div class="col-sm-6">
                        <input type="date" class="form-control" id="mulai" name="mulai" value="'.$rowBsw['tgl_buka'].'">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="tutup">Tgl. Tutup:</label>
                      <div class="col-sm-6">
                        <input type="date" class="form-control" id="tutup" name="tutup" value="'.$rowBsw['tgl_tutup'].'">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="kuota">Kuota:</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" id="kuota" name="kuota" value="'.$rowBsw['kuota'].'">
                      </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="tampil">Ditampilkan:</label>
                        <div class=" col-sm-4">
                          <label ><input type="radio" name="tampil" value="1"'.$isTampilvalue.'>&nbsp Ya &nbsp &nbsp </label>
                          <label ><input type="radio" name="tampil" value="0"'.$isNotTampilvalue.'>&nbsp Tidak</label>
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="ket">Keterangan:</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" id="ket" name="ket" value="'.$rowBsw['Keterangan'].'">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="ket">Syarat:</label>
                      <div class="col-sm-7">
                      <div class="col-sm-offset-1 col-sm-7">
                          <label><input type="checkbox"> Scan KTM</label>
                          <br>
                          <label><input type="checkbox"> Nominal yang diminta</label>
                          <br>
                          <label><input type="checkbox"> IPK</label>
                          <br>
                          <label><input type="checkbox"> Scan slip gaji</label>
                          <br>
                          <label><input type="checkbox"> Scan surat keterangan tidak mampu</label>
                          <br>
                          <label><input type="checkbox"> Scan KHS</label>
                          <br>
                          <label><input type="checkbox"> Jumlah sks yang diambil</label>
                      </div>
                      </div>
                    </div>
                    <div class="form-group">

                    </div>

                  </div>
                  </div>
                  <div class="modal-footer">
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-embossed btn-info" value="submit">Submit</button>
                    </div>
                  </div>
                </form>
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
