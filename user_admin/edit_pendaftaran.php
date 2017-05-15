<?php
include("../function/koneksi.php");
$kd_daftar=$_POST['kd_daftar'];
$nominal_disetujui=$_POST['nominal_disetujui'];
$sql="UPDATE  pendaftaran SET nominal_disetujui ='$nominal_disetujui'
      WHERE kd_daftar = '$kd_daftar'";
if(!mysqli_query($koneksi,$sql)){

    echo("Error description: " . mysqli_error($koneksi));
}else{
    echo'<div class="alert alert-succes">Berhasil dihapus</div>';
}
header("location: index.php");
?>
