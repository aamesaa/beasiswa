<!doctype html>
<!--<link href="coba.css" rel="stylesheet" type="text/css">
<?php
include('function/koneksi.php');
session_start(); // Memulai Session
$error=''; // Variabel untuk menyimpan pesan error
if (isset($_POST['submit'])) {
	if (empty($_POST['user']) || empty($_POST['password'])) {
			$error = "Username or Password is invalid";
	}
	else{

		// Variabel username dan password
		$user=$_POST['user'];
		$password=$_POST['password'];
    //$user="admin";
    //$password="admin";

		// Mencegah MySQL injection
		$user = stripslashes($user);
		$password = stripslashes($password);
		$user = mysqli_real_escape_string($koneksi,$user);
		$password = mysqli_real_escape_string($koneksi,$password);
		// SQL query untuk memeriksa apakah karyawan terdapat di database?
		$query = mysqli_query($koneksi,"select * from system_usr where password='$password' AND user_id='$user'");
		$query_role_admin = mysqli_query($koneksi,"select * from system_usr where password='$password' AND user_id='$user' AND role='1'");
		$rows = mysqli_num_rows($query);
		$rows_role_admin = mysqli_num_rows($query_role_admin);
			if ($rows == 1 && $rows_role_admin == 0) {
				$_SESSION['login_user']=$user; // Membuat Sesi/session
				header("location: index.php"); // Mengarahkan ke halaman profil
				//echo "<h1>Login Berhasil !</h1>";
				}
				else if($rows == 1 && $rows_role_admin == 1)
				{
				 $_SESSION['login_admin']=$user; // Membuat Sesi/session
				header("location: isLogin.php");
				}
				else
				{
        $_SESSION['login_user']="";
				//echo "Login gagal!";
				echo "<font color='#FF0000'>Username atau Password belum terdaftar</font>";
				}
				mysqli_close($koneksi); // Menutup koneksi
	}
}
?>
</html>
