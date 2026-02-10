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
$datasaran=mysqli_query($sambung,"select * from saran where kode='$id'");
?>

<html>
<head>
	<title>Data Saran</title>
	<link rel="stylesheet" href="tbh.css">
</head>
<body>

<form method="post">
<div align="center">
    Apakah anda ingin menghapus data ini?
	<br>
	
	<br>
	<a href="tampil_saran.php">TIDAK</a>
	<button name="ya">YA</button>
</div>
</form>

<?php
if(isset($_POST["ya"]))
{
		$query_hapus=
		mysqli_query
		($sambung,"delete from saran where kode='$id'");
		
		echo"
		Data Berhasil Dihapus
		<br>
		<a href='tampil_saran.php'>kembali</a>
		";
}
?>

</body>

</html>