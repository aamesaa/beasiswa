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
		<th>Pinjaman</th>
		<th>Sisa Pinjaman</th>
	</tr>
	<?php

	//query menampilkan data

	$query1="SELECT * FROM beasiswa where kd_bsw like 'P%'";
	$sql1 = mysqli_query($koneksi,$query1);
	$data1 = mysqli_fetch_array($sql1);
	echo'
	<h3> '.$data1['nama_bsw'].'</h3> </br>
	<h3>Semester '.$data1['semt'].' </h3> </br>
	<h3>Tahun ajaran '.$data1['thn_ajar'].' </h3> </br>';


	$query="SELECT pendaftaran.kd_daftar, pendaftaran.nim, nama_mhs, pendaftaran.nominal_disetujui, sisa_pinjaman FROM pendaftaran NATURAL JOIN mahasiswa NATURAL JOIN beasiswa WHERE pendaftaran.kd_bsw like 'P%'AND nominal_disetujui is not null and isTampil = 1";
	$sql = mysqli_query($koneksi,$query);
	$no = 1;

	while($data = mysqli_fetch_array($sql)){
		echo '
		<tr>
			<td>'.$no.'</td>
			<td>'.$data['kd_daftar'].'</td>
			<td>'.$data['nim'].'</td>
			<td>'.$data['nama_mhs'].'</td>
			<td>'.$data['nominal_disetujui'].'</td>
      <td>'.$data['sisa_pinjaman'].'</td>
		</tr>
		';
		$no++;
	}
	?>
</table>
</html>
