<?php
include("../function/koneksi.php");

$user_id=$_POST['user_id'];
$password=$_POST['password'];
$role=$_POST['role'];
$sql="INSERT INTO system_usr VALUES('$user_id', '$password', '$role')";
$hasil = mysqli_query($koneksi,$sql);
if($hasil !=null){
    header("location: daftar_user.php?status=s");
    $pesan = '<div class="alert alert-info" style="margin-top: 25%">Berhasil ditambahkan</div>';
    echo '<div class="alert alert-info alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Berhasil ditambahkan</div>';
    //$msg->setMsg($pesan);

}else{
    header("location: daftar_user.php?status=f");
    $pesan = '<div class="alert alert-danger">Gagal ditambahkan</div>';
    $msg->setMsg($pesan);
    echo '<div class="alert alert-danger">Gagal ditambahkan</div>';
}
 ?>
