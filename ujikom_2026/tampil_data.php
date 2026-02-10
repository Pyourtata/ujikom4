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
$pengaduanya=mysqli_query($sambung,"select * from pengaduan");
?>

<html>
<head>
	<title>Laporan Siswa</title>
	<link rel="stylesheet" href="tampil.css">
</head>
<body>

<div class="if">
<div align="center">
<h1>DATA PENGADUAN SISWA<h1>
</div>
</div>

<button>
<a href="halaman_adm.php">Kembali</a>
</button>

<table align="center" border="1">
<tr>
	<th>Kode</th>
	<th class="ig">Judul</th>
	<th>Pengaduan</th>
	<th>Tanggal Kejadian</th>
	<th>ACTION</th>
</tr>

<?php
while($pengaduan=mysqli_fetch_array($pengaduanya))
{
echo"
<tr>
	<td>$pengaduan[kode]</td>
	<td>$pengaduan[judul_laporan]</td>
	<td>$pengaduan[isi_laporan]</td>
	<td>$pengaduan[tgl_kejadian]</td>
	
	<td>
		<a href='edit_p.php?kodeedit=$pengaduan[kode]'> Edit</a>
		<a href='hapus.php?kodehapus=$pengaduan[kode]'>Hapus</a>
	</td>
</tr>
";
}
?>
</table>
</body>

</html>