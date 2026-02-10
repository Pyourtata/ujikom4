<?php
session_start();
if(!isset($_SESSION['user']))
{
	header("location: login.php");
	exit();
}

$id=$_GET["kodeedit"];
$servernya="localhost";
$usernamenya="root";
$passwordnya="";
$databasenya="ujikom_2026";
$sambung=mysqli_connect($servernya,$usernamenya,$passwordnya,$databasenya);
$pengaduanya=mysqli_query($sambung,"select * from pengaduan where kode=$id");


$tampil=mysqli_fetch_array($pengaduanya);
?>

<html>
<head>
	<title>Edit</title>
	<link rel="stylesheet" href="tbh.css">
</head>
<body>
<div class="if">
<div align="center">
<h1>FORM PENGADUAN<h1>
</div>
</div>

<button>
<a href="tampil_data.php">Kembali</a>
</button>

<form method="post">
	<table align="center" border="1">
		<tr>
			<td>Kode</td>
			<td>:</td>
			<td><?php echo"$tampil[kode]";?></td>
		</tr>
		<tr>
			<td>Judul</td>
			<td>:</td>
			<td>
				<input type="text" name="judul" value="<?php echo"$tampil[judul_laporan]"; ?>">
			</td>
		</tr>
		<tr>
			<td>Pengaduan</td>
			<td>:</td>
		<td>
				<input type="text" name="isi" value="<?php echo"$tampil[isi_laporan]"; ?>">
			</td>
		</tr>
		<tr>
			<td>Tanggal</td>
			<td>:</td>
		<td>
				<input type="date" name="tanggal" value="<?php echo"$tampil[tgl_kejadian]"; ?>">
			</td>
		</tr>
		<tr>
			<td colspan="100%">
				<button name="ubah">Perbarui Data</button>
		</td>
		</tr>
	</table>
</form>

<?php
if(isset($_POST["ubah"]))
{
	$jdl=$_POST["judul"];
	$isinya=$_POST["isi"];
	$tgl=$_POST["tanggal"];
	
	$ubahdata=mysqli_query($sambung, "update pengaduan set judul_laporan='$jdl',
	isi_laporan='$isinya',
	tgl_kejadian='$tgl' where kode='$id'
	");
	
	echo"Berhasil Di Perbarui";
}
?>

</body>

</html>