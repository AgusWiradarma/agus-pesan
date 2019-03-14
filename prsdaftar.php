<?php 
require_once "koneksi.php";

$username = $_POST['user'];
$password = $_POST['pass'];
$email = $_POST['email'];
$foto = $_FILES['fileToUpload']['name'];
$waktu = date("y-m-d h:i:s");
date_default_timezone_set('Asia/Jakarta');

$sql = mysqli_query ($koneksi, "INSERT INTO tbuser (username,password,email,foto,registered) 
VALUES ('$username','$password','$email','$foto','$waktu')");
$target_dir = "gambar/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);


if ($sql) {
	echo "<script>
	alert('Daftar Berhasil');
	location.href='login.php';
	</script>";
}
else {
	echo "<script>
	alert('Daftar Gagal');
	location.href='daftar.php';
	</script>";
}
?>