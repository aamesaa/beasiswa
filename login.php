

<?php
include('function/koneksi.php');
session_start(); // Memulai Session
$error=''; // Variabel untuk menyimpan pesan error
if (isset($_POST['submit'])) { // cek dah klik submit blm

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


  //Cek user sudah terdaftar blm
  $query = mysqli_query($koneksi,"select * from system_usr where password='$password' AND user_id='$user'");
  $rows = mysqli_num_rows($query);

  if ($rows == 1){//jika ada
    //cek role
    $row = mysqli_fetch_array($query);

    $userRole= $row['role'];
    if ($userRole=='0') {
      $_SESSION['login_user']=$user;
      header("location: index.php");
    } else if($userRole=='1'){
      $_SESSION['login_admin']=$user;
      header("location: user_admin/index.php");
    }else if($userRole=='9'){
      $_SESSION['login_admin']=$user;
      header("location: user_wd3/index.php");
    }
  }else{ //jika tidak ada
    echo "<script type='text/javascript'>alert('Username atau Password belum terdaftar');</script>";
  }
  mysqli_close($koneksi); // Menutup koneksi
}

?>
