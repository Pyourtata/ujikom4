<?php
session_start();
if(!isset($_SESSION['user']))
{
	header("location: login.php");
	exit();
}
$servernya="localhost";
$usernamenya="root";
$passwordnya="";
$databasenya="ujikom_2026";
$sambung=mysqli_connect($servernya,$usernamenya,$passwordnya,$databasenya);
$saranya=mysqli_query($sambung,"select * from saran");
?>

<html>
<head>
	<title>Data Saran</title>
	<link rel="stylesheet" href="tampil.css">
</head>
<body>

<div class="if">
<div align="center">
<h1>DATA SARAN<h1>
</div>
</div>

<button>
<a href="halaman_adm.php">Kembali</a>
</button>

<table align="center" border="1">
<tr>
	<th>Kode</th>
	<th width="200">Judul</th>
	<th>Saran</th>
	<th>Tanggal Saran</th>
	<th>ACTION</th>
</tr>

<?php
while($saran=mysqli_fetch_array($saranya))
{
echo"
<tr>
	<td>$saran[kode]</td>
	<td>$saran[judul_saran]</td>
	<td>$saran[isi_saran]</td>
	<td>$saran[tgl_saran]</td>
	
	<td>
		<a href='edit_s.php?kodeedit=$saran[kode]'> Edit</a>
		<a href='hapus.php?kodehapus=$saran[kode]'>Hapus</a>
	</td>
</tr>
";
}
?>
</body>

</html>