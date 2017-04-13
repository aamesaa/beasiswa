<?php
include("../function/koneksi.php");

$user_id=$_POST['user_id'];
$password=$_POST['password'];
$role=$_POST['role'];
$sql="INSERT INTO system_usr VALUES('$user_id', '$password', '$role')";
$hasil = mysqli_query($koneksi,$sql);
echo $sql;
if($hasil){
  echo'<div class="alert alert-succes">Berhasil ditambahkan</div>';

}else{

  echo'<div class="alert alert-danger">Gagal ditambahkan</div>';

} 
header("location: daftar_user.php");
 ?>
