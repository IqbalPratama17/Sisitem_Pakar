<?php
// date_default_timezone_get('Asia/Jakarta');
$con = mysqli_connect("localhost", "root", "", "pakar_mental");

//Cek Koneksi
if (mysqli_connect_errno($con)) {
	echo "Koneksi Gagal : " . mysqli_connect_errno();
}

// NEW KONEKSI
// $servername = "localhost";
// $username = "root";
// $password = "";
// $database = "pakar_mental";

// // untuk tulisan bercetak tebal silakan sesuaikan dengan detail database Anda
// // membuat koneksi
// $con = mysqli_connect($servername, $username, $password, $database);
// // mengecek koneksi
// if (!$con) {
// 	die("Koneksi gagal: " . mysqli_connect_error());
// }
mysqli_close($con);

$base_url = "http://localhost/Sistem_Pakar/";
