<?php
$servernya="localhost";
$usernamenya="root";
$passwordnya="";
$databasenya="ujikom_2026";
$sambung=mysqli_connect($servernya,$usernamenya,$passwordnya,$databasenya);
?>

<html>
<head>
	<title>Tambah Saran</title>
	<link rel="stylesheet" href="tbh.css">
</head>
<body>

<button>
<a href="index.php">Kembali</a>
</button>

	<div align="center">
		<h2>SILAHKAN MASUKAN SARAN ANDA <h2>
		<h3>Gunakan kalimat yang baik dan sopan<h3>
		<hr>
	</div>
	
	<form method="post">
	<table align="center" border="1">
	<tr>
		<td>Kode</td>
		<td>-</td>
	</tr>
	<tr>
		<td>Judul Saran</td>
		<td><input type="text" name="judul"></td>
	</tr>
	<tr>
		<td>Isi Saran</td>
		<td>
			<textarea name="isinya">
			</textarea>
		</td>
	</tr>
	<tr>
		<td>Tanggal Saran</td>
		<td><input type="date" name="tglnya"></td>
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
	$judul=$_POST["judul"];
	$isi=$_POST["isinya"];
	$tanggal=$_POST["tglnya"];	
	
	$masukan=mysqli_query($sambung, "insert into saran values('','$judul','$isi','$tanggal')");
	
	if($masukan)
	{
		echo"Pengaduan Saran Berhasil Dikirim";
	}
	else
	{
		echo"GAGAL !";
	}
}
?>
	
</body>

</html>