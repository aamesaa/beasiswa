<?php
Include("../function/koneksi.php");


?>
<html>
<table border="1">
	<tr>
		<th>NO.</th>
		<th>Kode Daftar</th>
		<th>NIM.</th>
		<th>Nama</th>
		<th>Tanggal Daftar</th>
		<th>Nominal Pengajuan</th>
		<th>Nominal Disetujui</th>
	</tr>
	<?php

	//query menampilkan data

	$query1="SELECT * FROM beasiswa";
	$sql1 = mysqli_query($koneksi,$query1);
	$data1 = mysqli_fetch_array($sql1);
	echo'
	<h3> '.$data1['nama_bsw'].'</h3> </br>
	<h3>Semester '.$data1['semt'].' </h3> </br>
	<h3>Tahun ajaran '.$data1['thn_ajar'].' </h3> </br>';


	$query="SELECT kd_daftar, nim, nama_mhs,tgl_daftar, nominal_pengajuan, nominal_disetujui from pendaftaran p NATURAL JOIN mahasiswa m  where kd_bsw='".$_GET['kd_bsw']."' and nominal_disetujui is not null";
	$sql = mysqli_query($koneksi,$query);
	$no = 1;

	while($data = mysqli_fetch_array($sql)){
		echo '
		<tr>
			<td>'.$no.'</td>
			<td>'.$data['kd_daftar'].'</td>
			<td>'.$data['nim'].'</td>
			<td>'.$data['nama_mhs'].'</td>
			<td>'.$data['tgl_daftar'].'</td>
			<td>'.$data['nominal_pengajuan'].'</td>
			<td>'.$data['nominal_disetujui'].'</td>
		</tr>
		';
		$no++;
	}
	?>
</table>
</html>
