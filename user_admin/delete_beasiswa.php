<?php
$kode_beasiswa = $_GET['kode_bsw'];
$q0 = "DELETE from beasiswa where kd_bsw='$kode_beasiswa'";
$squery = mysqli_query($koneksi,$q0);
$row1 = mysqli_fetch_array($squery);
?>
