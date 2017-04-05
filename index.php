<?php
include('koneksi.php');
?>
<html>
  <head>
    <title>Miradiva</title>

	<!-- Skrip CSS -->
   <link rel="stylesheet" href="style.css"/>

  </head>
  <body>
	<div class="container">
		<div class="main">
	     <h2>Miradiva</h2>
            <hr/>
            <a href="registrasi.php">Signup</a> &nbsp; &nbsp; <a href="form_login.php">Login</a>
            <br>
            <br>
            <br>
                <form action="" method="post">
    <input type="text" name = "cari_kota" placeholder="Cari Kota" style="width:250px;" />
    <input type="submit" name = "cari" value="Cari" style="padding:3px;" margin="6px;" width="50px;"  />
    </form>
    <br>
    <br>

<?php
$input_cari = @$_POST['cari_kota'];
$cari = @$_POST['cari'];

// jika tombol cari di klik
if($cari)
{

    // jika kotak pencarian tidak sama dengan kosong
    if($input_cari != "") {
    // cari berdasarkan nama tempat
    $sql = mysqli_query($koneksi, "SELECT * FROM tempat WHERE kota like '%$input_cari%' order by rate DESC") or die (mysqli_error());
	if(!$sql )
	{
  	die('Gagal ambil data: ' . mysqli_error());
	}
	while($row = mysqli_fetch_array($sql))
	{

    echo "Id Tempat :{$row['id_tempat']}  <br> ".
		 "Creator :{$row['email']}  <br> ".
         "Nama Tempat : {$row['nama_tempat']} <br> ".
		 "Kota : {$row['kota']} <br> ".
         "Alamat : {$row['alamat']} <br> ".
		 "Fasilitas : {$row['fasilitas']} <br> ".
		 "Rate :  ";
	$rating = $row['rate'];
	for($i=1; $i<=$rating; $i++)
	{
		echo "*";
	}
	echo "<br><br>";
	echo "Foto : ";
	$id_tempat = $row['id_tempat'];
	$ambil_foto = mysqli_query($koneksi,"SELECT * FROM tempat_foto WHERE id_tempat ='$id_tempat'");
	while($baris = mysqli_fetch_array($ambil_foto))
	{
		echo '<img src="data:image/jpeg;base64,'.base64_encode( $baris['foto'] ).'"/>';
	}
	echo "<br><a href=''>Tambahkan Ulasan</a>";
	echo "<br><hr /><br><br>";
	}
	}
	else
	{
    $ambildata = mysqli_query($koneksi,"SELECT * FROM tempat order by rate DESC");
	if(!$ambildata )
	{
  	die('Gagal ambil data: ' . mysqli_error());
	}
	while($row = mysqli_fetch_array($ambildata))
	{

   echo "Id Tempat :{$row['id_tempat']}  <br> ".
		 "Creator :{$row['email']}  <br> ".
         "Nama Tempat : {$row['nama_tempat']} <br> ".
         "Kota : {$row['kota']} <br> ".
		 "Alamat : {$row['alamat']} <br> ".
		 "Fasilitas : {$row['fasilitas']} <br> ".
		 "Rate :  ";
	$rating = $row['rate'];
	for($i=1; $i<=$rating; $i++)
	{
		echo "*";
	}
	echo "<br><br>";
	echo "Foto : ";
	$id_tempat = $row['id_tempat'];
	$ambil_foto = mysqli_query($koneksi,"SELECT * FROM tempat_foto WHERE id_tempat ='$id_tempat'");
	while($baris = mysqli_fetch_array($ambil_foto))
	{
		echo '<img src="data:image/jpeg;base64,'.base64_encode( $baris['foto'] ).'"/>';
	}
	echo "<br><a href=''>Tambahkan Ulasan</a>";
	echo "<br><hr /><br><br>";
	}
	}
}
else
{
	$ambildata = mysqli_query($koneksi,"SELECT * FROM tempat order by rate DESC");
	if(!$ambildata )
	{
  	die('Gagal ambil data: ' . mysqli_error());
	}
	while($row = mysqli_fetch_array($ambildata))
	{
	echo "Id Tempat :{$row['id_tempat']}  <br> ".
		 "Creator :{$row['email']}  <br> ".
         "Nama Tempat : {$row['nama_tempat']} <br> ".
		 "Kota : {$row['kota']} <br> ".
         "Alamat : {$row['alamat']} <br> ".
		 "Fasilitas : {$row['fasilitas']} <br> ".
		 "Rate :  ";
	$rating = $row['rate'];
	for($i=1; $i<=$rating; $i++)
	{
		echo "*";
	}
	echo "<br><br>";
	echo "Foto : ";
	$id_tempat = $row['id_tempat'];
	$ambil_foto = mysqli_query($koneksi,"SELECT * FROM tempat_foto WHERE id_tempat ='$id_tempat'");
	while($baris = mysqli_fetch_array($ambil_foto))
	{
		echo '<img src="data:image/jpeg;base64,'.base64_encode( $baris['foto'] ).'"/>';
	}
	echo "<br><a href=''>Tambahkan Ulasan</a>";
	echo "<br><hr /><br><br>";
	}
}



//echo "Berhasil ambil data\n";


//Untuk mengambil Foto perintah e dibawah !
//$kueri = mysqli_query($koneksi,"SELECT * FROM tempat_foto");
//        while ($baris = mysqli_fetch_array($kueri))
//        {
//		   echo $baris['id_tempat']."&nbsp;".$baris[0]."<br><br>";
//		   echo '<img src="data:image/jpeg;base64,'.base64_encode( $baris['foto'] ).'"/>';
//           echo"<br><br><hr>";
//         }
?>


		</div>
   </div>

  </body>
</html>
