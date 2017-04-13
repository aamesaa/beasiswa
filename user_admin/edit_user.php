<?php
include("../function/koneksi.php");

$user_id=$_POST['user_id'];
$password=$_POST['password'];
$role=$_POST['role'];
$sql="UPDATE system_usr SET password='$password' , role='$role' WHERE user_id='$user_id'";
$hasil = mysqli_query($koneksi,$sql);
echo $sql;
if($hasil){
  echo'<div class="alert alert-succes">Berhasil diubah</div>';

}else{

  echo'<div class="alert alert-danger">Gagal diubah</div>';
}
header("location: daftar_user.php");
 ?>
