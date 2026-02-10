<?php
$servernya="localhost";
$usernamenya="root";
$passwordnya="";
$databasenya="ujikom_2026";
$sambung=mysqli_connect($servernya,$usernamenya,$passwordnya,$databasenya);
?>

<html>
<head>
	<title>Halaman Login</title>
	<link rel="stylesheet" href="login.css">
</head>

<body>
<form method="post">
<table align="center">
		<tr>
			<td>username</td>
			<td><input type="text" name="form_username"></td>
		</tr>
		<tr>
			<td>password</td>
			<td><input type="password" name="form_password"></td>
		</tr>
		<tr>
			<td colspan="100%" align="center">
			<button name="masuk">LOGIN</button>
			</td>
		</tr>
</table>
</form>

<?php
if(isset($_POST["masuk"]))
{
	$username=$_POST["form_username"];
	$psw=md5($_POST["form_password"]);
	$datauser=mysqli_query($sambung,
	"select * from akun where username='$username' and password='$psw'");
	
	$hasil=mysqli_num_rows($datauser);
	
	if($hasil>0)
	{
		session_start();
		$_SESSION['user']=$username;
		$_SESSION['password']=$psw;
		header("location: halaman_adm.php");
		exit();
	}
	else
	{
		echo"<br> LOGIN GAGAL";
	}
}
?>

</body>

</html>