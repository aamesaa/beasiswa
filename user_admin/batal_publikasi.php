<?php
include("../function/koneksi.php");
$kd_bsw=$_GET['kd_bsw'];
$sql="UPDATE  beasiswa SET isPublish = 0
      WHERE kd_bsw = '$kd_bsw'";
echo $sql;

if(!mysqli_query($koneksi,$sql)){

    echo("Error description: " . mysqli_error($koneksi));
}else{
    echo'<div class="alert alert-succes">Berhasil dihapus</div>';
}
header("location: index.php");
?>
