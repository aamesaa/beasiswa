<?php
/**
 * Created by PhpStorm.
 * User: amesa
 * Date: 4/12/17
 * Time: 11:54 AM
 */


Include("function/koneksi.php");
include ("function/login.php");

$kd_daftar="";
$nim =$_SESSION['session_id'];
$kd_bsw=$_POST['kd_bsw'];
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
if (1==1)

    


?>