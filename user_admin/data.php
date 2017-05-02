<?php
Include("../function/koneksi.php");


?>
<html>
<table border="1">
	<tr>
		<th>NO.</th>
		<th>NIM</th>
	</tr>
	<?php

	//query menampilkan data
    $query="SELECT * FROM pendaftaran where kd_bsw='".$_GET['kd_bsw']."' and nominal_disetujui is not null ";
	$sql = mysqli_query($koneksi,$query);

	$no = 1;
	while($data = mysqli_fetch_array($sql)){
		echo '
		<tr>
			<td>'.$no.'</td>
			<td>'.$data['nim'].'</td>
		</tr>
		';
		$no++;
	}
	?>
</table>
</html>
