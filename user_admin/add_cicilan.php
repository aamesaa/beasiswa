<?php
include("../function/koneksi.php");

Include ("../function/statusMessage.php");
//$msg=new statusMessages();




    //$msg->getMsg();
    $kd_daftar=$_POST['kd_daftar'];
    $nominal=$_POST['nominal'];

    $sql="INSERT INTO pengembalian(kd_daftar, nominal_bayar) VALUES ('$kd_daftar','$nominal')";
    $hasil = mysqli_query($koneksi,$sql);
//echo $sql;
    if($hasil !=null){
        header("location: cicilan.php?status=s");
        $pesan = '<div class="alert alert-info" style="margin-top: 25%">Berhasil ditambahkan</div>';
        echo '<div class="alert alert-info alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Berhasil ditambahkan</div>';
        //$msg->setMsg($pesan);

    }else{
        header("location: cicilan.php?status=f");
        $pesan = '<div class="alert alert-danger">Gagal ditambahkan</div>';
        $msg->setMsg($pesan);
        echo '<div class="alert alert-danger">Gagal ditambahkan</div>';
    }



//echo  $msg->getMsg();
//header("location: cicilan.php");

?>
