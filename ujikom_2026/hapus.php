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
$databasenya="gudang";
$id=$_GET["kodehapus"];
$sambung=mysqli_connect($servernya,$usernamenya,$passwordnya,$databasenya);
$datapengaduan=mysqli_query($sambung,"select * from pengaduan where kode='$id'");
?>

<html>
<head>
	<title>Aplikasi Pengaduan Sarana Sekolah</title>
	<link rel="stylesheet" href="tbh.css">
</head>
<body>

<form method="post">
<div align="center">
    Apakah anda ingin menghapus data ini?
	<br>
	
	<br>
	<a href="tampil_data.php">TIDAK</a>
	<button name="ya">YA</button>
</div>
</form>

<?php
if(isset($_POST["ya"]))
{
		$query_hapus=
		mysqli_query
		($sambung,"delete from pengaduan where kode='$id'");
		
		echo"
		Data Berhasil Dihapus
		<br>
		<a href='tampil_data.php'>kembali</a>
		";
}
?>

</body>

</html>