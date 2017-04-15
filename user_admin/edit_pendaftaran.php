<?php
include("../function/koneksi.php");
$kd_daftar=$_POST['kd_daftar'];
$nominal_disetujui=$_POST['nominal_disetujui'];
$sql="UPDATE  pendaftaran SET nominal_disetujui ='$nominal_disetujui'
      WHERE kd_daftar = '$kd_daftar'";
$hasil = mysqli_query($koneksi,$sql);
echo $sql;

 ?>

 </div>
