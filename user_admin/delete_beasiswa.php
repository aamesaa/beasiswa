<?php
include("../function/koneksi.php");

$kd_bsw=$_POST['kd_bsw'];
$sql="DELETE FROM beasiswa WHERE kd_bsw='$kd_bsw'";
$hasil = mysqli_query($koneksi,$sql);
echo $sql;
if($hasil){
  echo'<div class="alert alert-succes">Berhasil dihapus</div>';

}else{

  echo'<div class="alert alert-danger">Gagal dihapus</div>';

}
 ?>
