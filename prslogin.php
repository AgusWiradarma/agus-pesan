<?php
session_start(); 
include "koneksi.php";

$user = $_POST['username'];
$pass = $_POST['password'];
$waktu = date("y-m-d h:i:s");
date_default_timezone_set('Asia/Jakarta');

$login = mysqli_query($koneksi, "SELECT * FROM tbuser WHERE Username='$user' and Password='$pass'");
$register = mysqli_query($koneksi, "UPDATE tbuser SET registered = '$waktu' WHERE username = '$user'");
$hasil = mysqli_fetch_array($login);

if(isset($hasil))
{
	echo "<script>
	alert('Login Berhasil');
	location.href='pesan.php';
	</script>";
	$_SESSION['username'] = $hasil[0];
}
else if(empty($hasil))
{
	echo "<script>
	alert('Gagal');
	location.href='login.php';
	</script>";
}
else
{
	echo "<script>
	alert('Login Gagal);
	location.href='login.php';
	</script>";
}
?>