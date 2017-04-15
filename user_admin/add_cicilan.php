<?php
include("../function/koneksi.php");

$kd_daftar=$_POST['kd_daftar'];
$nominal=$_POST['nominal'];

$sql="INSERT INTO pengembalian(kd_daftar, nominal_bayar) VALUES ('$kd_daftar','$nominal')";
$hasil = mysqli_query($koneksi,$sql);
echo $sql;
if($hasil){
    echo'<div class="alert alert-succes">Berhasil ditambahkan</div>';

}else{

    echo'<div class="alert alert-danger">Gagal ditambahkan</div>';

}
header("location: cicilan.php");

?>
