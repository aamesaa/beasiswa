<?php
/**
 * Created by PhpStorm.
 * User: amesa
 * Date: 4/12/17
 * Time: 11:54 AM
 */

/*
Include("function/koneksi.php");
include ("function/login.php");

$kd_daftar="";
$nim =$_SESSION['session_id'];
$kd_bsw=$_POST['kd_bsw'];
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
if (1==1)
    */




?>
<!DOCTYPE html>
<html>
<body>

<form action="daftar_beasiswa.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>
<a href='download.php?file=baru'>download</a>
<a href='uploads/baru.pdf' target="_blank">downlod</a>
</body>
</html>
