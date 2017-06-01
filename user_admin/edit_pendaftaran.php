<?php
include("../function/koneksi.php");
$kd_bsw=$_POST['kd_bsw'];
$kd_daftar=$_POST['kd_daftar'];
$nominal_disetujui=$_POST['nominal_disetujui'];
$sql="UPDATE  pendaftaran SET nominal_disetujui ='$nominal_disetujui', sisa_pinjaman = '$nominal_disetujui'
      WHERE kd_daftar = '$kd_daftar'";
//TODO: update sisa pinjaman
if(!mysqli_query($koneksi,$sql)){

    echo("Error description: " . mysqli_error($koneksi));
}else{
    echo'<div class="alert alert-succes">Berhasil dihapus</div>';
}
header("location: detail_pendaftar.php?kd_bsw=".$kd_bsw);
?>
