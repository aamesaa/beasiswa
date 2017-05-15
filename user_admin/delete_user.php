<?php
include("../function/koneksi.php");

$user_id=$_GET['user_id'];
$sql="DELETE FROM system_usr WHERE user_id='$user_id'";
$hasil = mysqli_query($koneksi,$sql);
echo $sql;
if(!mysqli_query($koneksi,$sql)){

    echo("Error description: " . mysqli_error($koneksi));
}else{
    echo'<div class="alert alert-succes">Berhasil dihapus</div>';
}
header("location: daftar_user.php");
 ?>
