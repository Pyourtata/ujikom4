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
$saranya=mysqli_query($sambung,"select * from saran where kode=$id");

$tampilkan=mysqli_fetch_array($saranya);
?>

<html>
<head>
	<title>Edit</title>
	<link rel="stylesheet" href="tbh.css">
</head>
<body>
<div class="if">
<div align="center">
<h1>FORM SARAN<h1>
</div>
</div>

<button>
<a href="tampil_saran.php">Kembali</a>
</button>

<form method="post">
	<table align="center" border="1">
		<tr>
			<td>Kode</td>
			<td>:</td>
			<td><?php echo"$tampilkan[kode]";?></td>
		</tr>
		<tr>
			<td>Judul</td>
			<td>:</td>
			<td>
				<input type="text" name="judul" value="<?php echo"$tampilkan[judul_saran]"; ?>">
			</td>
		</tr>
		<tr>
			<td>Pengaduan</td>
			<td>:</td>
		<td>
				<input type="text" name="isi" value="<?php echo"$tampilkan[isi_saran]"; ?>">
			</td>
		</tr>
		<tr>
			<td>Tanggal</td>
			<td>:</td>
		<td>
				<input type="date" name="tanggal" value="<?php echo"$tampilkan[tgl_saran]"; ?>">
			</td>
		</tr>
		<tr>
			<td colspan="100%">
				<button name="ubs">Perbarui Data</button>
		</td>
		</tr>
	</table>
</form>

<?php
if(isset($_POST["ubs"]))
{
	$judul=$_POST["judul"];
	$isi=$_POST["isinya"];
	$tanggal=$_POST["tglnya"];
	
	$ubsdata=mysqli_query($sambung, "update saran set judul_saran='$judul',
	isi_saran='$isi',
	tgl_saran='$tanggal' where kode='$id'
	");
	
	echo"Berhasil Di Perbarui";
}
?>

</body>

</html>