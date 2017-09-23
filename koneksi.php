<?php
	$namahost     = "localhost";
	$namaPengguna = "root";
	$katasandi    = "";
	$nama_dbase   = "db_beasiswa";
	$koneksi      = mysqli_connect($namahost,$namaPengguna,$katasandi);
	$database     = mysqli_select_db($koneksi,$nama_dbase);
	//cek koneksi
	if(!$koneksi)
		echo '<div class="alert alert-danger" role="alert">Koneksi Gagal</div>';
	if(!$database)
		echo '<div class="alert alert-success" role="alert">Database tidak ditemukan</div>'
?>
