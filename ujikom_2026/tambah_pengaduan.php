<?php
$servernya="localhost";
$usernamenya="root";
$passwordnya="";
$databasenya="ujikom_2026";
$sambung=mysqli_connect($servernya,$usernamenya,$passwordnya,$databasenya);
?>

<html>
<head>
	<title>Tambah Pengaduan</title>
	<link rel="stylesheet" href="tbh.css">
</head>
<body>

<div class="if">
<div align="center">
<h1>FORM PENGADUAN<h1>
</div>
</div>

<button>
<a href="index.php">Kembali</a>
</button>

<form method="post">
	<table align="center" border="1">
	<tr>
		<td>Kode</td>
		<td>-</td>
	</tr>
	<tr>
		<td>Judul Laporan</td>
		<td><input type="text" name="jdl"></td>
	</tr>
	<tr>
		<td>Isi Pengaduan</td>
		<td>
			<textarea name="isi">
			</textarea>
		</td>
	</tr>
	<tr>
		<td>Tanggal Pengaduan</td>
		<td><input type="date" name="tgl"></td>
	</tr>
	<tr>
		<td colspan="100%" align="center">
		<button name="simpan">SIMPAN</button>
		</td>
	</tr>
	</table>
</form>

<?php
if(isset($_POST["simpan"]))
{
	$judul=$_POST["jdl"];
	$isi=$_POST["isi"];
	$tanggal=$_POST["tgl"];	
	
	$masukan=mysqli_query($sambung, "insert into pengaduan values('','$judul','$isi','$tanggal')");
	
	if($masukan)
	{
		echo"Pengaduan Berhasil Dikirim";
	}
	else
	{
		echo"GAGAL !";
	}
}
?>

</body>

</html>