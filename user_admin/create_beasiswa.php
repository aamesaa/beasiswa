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
echo $sql;
if($hasil){
  echo'<div class="alert alert-succes">Berhasil ditambahkan</div>';

}else{

  echo'<div class="alert alert-danger">Gagal ditambahkan</div>';

}
 ?>
