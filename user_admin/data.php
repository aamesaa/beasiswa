<?php
Include("../function/koneksi.php");
?>
<html>
<table border="1">
	<tr>
		<th>NO.</th>
		<th>NIM</th>
		<th>Nama</th>
		<th>Prodi</th>
    <th>Nama Beasiswa</th>
    <th>Nominal Diajukan</th>
    <th>Nominal Disetujui</th>
	</tr>
	<?php
	//query menampilkan data
	$sql = mysql_query("SELECT * FROM siswa ORDER BY id ASC");
	$no = 1;
	while($data = mysql_fetch_assoc($sql)){
		echo '
		<tr>
			<td>'.$no.'</td>
			<td>'.$data['nim'].'</td>
			<td>'.$data['nama_mhs'].'</td>
			<td>'.$data['jurusan'].'</td>
      <td>'.$data['kelas'].'</td>
			<td>'.$data['jurusan'].'</td>
		</tr>
		';
		$no++;
	}
	?>
</table>
</html>
