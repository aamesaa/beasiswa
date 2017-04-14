<?php
include("../function/koneksi.php");

$kd_bsw=$_POST['kd_bsw'];
$nama_bsw=$_POST['namabsw'];
$thnajar=$_POST['th_awal'].'/'.$_POST['th_akhir'];
$semt=$_POST['semt'];
$tgl_mulai=$_POST['mulai'];
$tgl_selesai=$_POST['tutup'];
$tampil=$_POST['tampil'];
$ket=$_POST['ket'];
$kuota=$_POST['kuota'];
$sql="INSERT INTO beasiswa VALUES('$kd_bsw', '$nama_bsw', '$semt','$thnajar', '$tgl_mulai', '$tgl_selesai', '$kuota', '$tampil','$ket')";
$hasil = mysqli_query($koneksi,$sql);

foreach($_POST['syarat_bsw'] as $check) {
   $insertSql = "INSERT INTO syarat_bsw(kd_syarat, kd_bsw) VALUES ('$check','$kd_bsw')";
   if(!mysqli_query($koneksi,$insertSql)){
       echo("Error description: " . mysqli_error($con));
   }

}
    header("location: index.php");

 ?>
