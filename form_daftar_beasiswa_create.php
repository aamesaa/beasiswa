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

}

$kd_daftar="11111111";

/**ADD DATA DI DETAIL**/
$getSyrSql="SELECT kd_syarat, nama_syarat, tipe_syarat, kd_syarat_bsw FROM ref_syarat rs NATURAL JOIN syarat_bsw sb NATURAL JOIN beasiswa b WHERE b.kd_bsw='$kd_bsw'";
$getSyrBeasiswa=mysqli_query($koneksi,$getSyrSql);

while($hasil=mysqli_fetch_array($getSyrBeasiswa)){
   $kd_syarat_bsw= $hasil['kd_syarat_bsw'];
   $kd_syarat=$hasil[0];
   if ($hasil[2]!=9) {

       $isiSyarat = $_POST[$kd_syarat];

       $sql = "INSERT INTO syarat_daftar(kd_daftar, kd_syarat_bsw,isi_syarat) VALUES ('$kd_daftar', '$kd_syarat_bsw','$_POST[$kd_syarat]')";
       $hasil = mysqli_query($koneksi,$sql);
   }

}