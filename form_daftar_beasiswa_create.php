<?php
/**
 * Created by PhpStorm.
 * User: amesa
 * Date: 5/14/17
 * Time: 10:41 PM
 */
include("function/koneksi.php");


$kd_bsw =$_POST["kd_bsw"];
$nim =$_POST["nim"];

$success =true;
if(isset($_POST["S03"])){
    $nominal =$_POST["S03"];
    $sql="INSERT INTO pendaftaran(kd_bsw, nim,nominal_pengajuan) VALUES('$kd_bsw', '$nim', '$nominal')";
}else{
    $sql="INSERT INTO pendaftaran(kd_bsw, nim) VALUES('$kd_bsw','$nim')";
}


echo $sql;
$hasil = mysqli_query($koneksi,$sql);

if($hasil){
    echo'<div class="alert alert-succes">Berhasil ditambahkan</div>';

}else{

    echo'<div class="alert alert-danger">Gagal ditambahkan</div>';
    $success =false;
}
$getKd= "SELECT kd_daftar FROM pendaftaran ORDER BY kd_daftar DESC LIMIT 1";

$kd_daftar_eksekusi=mysqli_query($koneksi, $getKd);
$kd_daftar_arr=mysqli_fetch_array($kd_daftar_eksekusi);
$kd_daftar = $kd_daftar_arr["kd_daftar"];

$errorMsg="";
/**ADD DATA DI DETAIL**/
$getSyrSql="SELECT kd_syarat, nama_syarat, tipe_syarat, kd_syarat_bsw FROM ref_syarat rs NATURAL JOIN syarat_bsw sb NATURAL JOIN beasiswa b WHERE b.kd_bsw='$kd_bsw'";
$getSyrBeasiswa=mysqli_query($koneksi,$getSyrSql);
if(!$getSyrBeasiswa){
     echo "Failed".mysqli_error($koneksi);
    $success = false;
}
while($hasil=mysqli_fetch_array($getSyrBeasiswa)) {
    $kd_syarat_bsw = $hasil['kd_syarat_bsw'];
    $kd_syarat = $hasil[0];
    if ($hasil[2] != 9) {

        $isiSyarat = $_POST[$kd_syarat];

        $sql = "INSERT INTO syarat_daftar(kd_daftar, kd_syarat_bsw,isi_syarat) VALUES ('$kd_daftar', '$kd_syarat_bsw','$_POST[$kd_syarat]')";
        $hasil = mysqli_query($koneksi, $sql);
        if(!$hasil){
            $success =false;
        }

    } else {
        $fileName = $kd_daftar . "_" . $kd_syarat . ".pdf";
        $sql = "INSERT INTO syarat_daftar(kd_daftar, kd_syarat_bsw,isi_syarat) VALUES ('$kd_daftar', '$kd_syarat_bsw','$fileName')";
        echo $sql;
        $hasil = mysqli_query($koneksi, $sql);

        $target_dir = "uploads/";

        $target_file = $target_dir . $fileName;

        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);


        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
            $success =false;

        }

        // Allow certain file formats
        if ($imageFileType != "pdf") {
            echo "Sorry, only PDF files are allowed.";
            $uploadOk = 0;
            $success =false;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES[$kd_syarat]["tmp_name"], $target_file)) {
                echo "The file " . basename($_FILES[$kd_syarat]["name"]) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
                $success =false;
            }
        }

    }
 if ($success) {
        header("location: daftar_succes.php?id=" . $kd_bsw);
    }else{
        header("location: daftar_gagal.php?id=" . $kd_bsw);
    }

}