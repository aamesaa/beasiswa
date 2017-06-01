<?php
include("../function/koneksi.php");

$user_id=$_POST['user_id'];
$password=$_POST['password'];
$role=$_POST['role'];
$sql="UPDATE system_usr SET password='$password' , role='$role' WHERE user_id='$user_id'";
$hasil = mysqli_query($koneksi,$sql);
if($hasil !=null){
    header("location: daftar_user.php?statuss=s");
    //$msg->setMsg($pesan);
}else{
    header("location: daftar_user.php?statuss=f");
}
 ?>
