<?php
include('koneksi.php');

session_start();// Memulai Session
// Menyimpan Session
$user_check=$_SESSION['login_user'];
echo($_SESSION['login_user']);
$_SESSION["isLogin"]=true;
// Ambil nama karyawan dberdasarkan username karyawan dengan mysql_fetch_assoc
$sesion_sql = mysqli_query($koneksi,"select nim from mahasiswa where nim='$user_check'");
$row = mysqli_fetch_assoc($sesion_sql);
$login_session =$row['email'];
if(!isset($login_session)){
	mysqli_close($koneksi); // Menutup koneksi
	header('Location: index.php'); // Mengarahkan ke Home Page
}
?>
