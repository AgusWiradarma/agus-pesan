<?php
session_start();
include "koneksi.php";

session_destroy();
{

$waktu = !empty($waktu) ? "'$waktu'" : "NULL";

$register = mysqli_query($koneksi, "UPDATE tbuser SET registered = '$waktu'");

	echo "<script>alert('Anda berhasil Logout');location.href='login.php';</script>";
}
?>