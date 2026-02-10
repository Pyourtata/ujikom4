<?php
session_start();
if(!isset($_SESSION['user']))
{
	header("location: login.php");
	exit();
}
?>

<html>
<head>
	<title>Halaman Admin</title>
	<link rel="stylesheet" href="adm.css">
</head>
<body>

<div class="header">
	<div align="center">
		<h1>Halaman Admin<h1>
	</div>
</div>

	<div class="navbar">
		<a href="index.php">Halaman Utama</a>
		<a href="tampil_data.php">Data Pengaduan</a>
		<a href="tampil_saran.php">Data Saran</a>
		<a href="logout.php">Logout</a>
	<div>

</body>

</html>