<?php
include("../function/koneksi.php");

$kd_bsw=$_POST['kd_bsw'];
$nama_bsw=$_POST['namabsw'];
$thn_ajar=$_POST['thn_ajar'];
$tgl_mulai=$_POST['mulai'];
$tgl_selesai=$_POST['tutup'];
$tampil=$_POST['tampil'];
$ket=$_POST['ket'];
$kuota=$_POST['kuota'];
$sql="UPDATE  beasiswa SET nama_bsw ='$nama_bsw', thn_ajar = '$thn_ajar', tgl_buka = '$tgl_mulai',
      tgl_tutup = '$tgl_selesai', kuota = '$kuota', isTampil = '$tampil', Keterangan = '$ket'
      WHERE kd_bsw = '$kd_bsw' ";
$hasil = mysqli_query($koneksi,$sql);
echo $sql;
if($hasil){
  echo'<div class="alert alert-succes">Berhasil diubah</div>';

}else{

  echo'<div class="alert alert-danger">Gagal diubah</div>';

}
 ?>
