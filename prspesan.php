<?php 
include "koneksi.php";

$content = $_POST['pesan'];
$sender = $_POST['from'];
$receiver = $_POST['to'];
$created = date("y-m-d h:i:s");
date_default_timezone_set('Asia/Jakarta');

$sql = mysqli_query ($koneksi, "INSERT INTO tbpesan (content,created,sender,receiver) 
VALUES ('$content','$created','$sender','$receiver')");


if ($sql) {
echo "<meta http-equiv='refresh' content='0; url=pesan.php'>";
}
else {
	echo "<script>
	alert('Kirim Gagal');
	location.href='pesan.php';
	</script>";
}
?>