<?php
// date_default_timezone_get('Asia/Jakarta');
$con = mysqli_connect("localhost", "root", "", "pakar_mental");

//Cek Koneksi
if (mysqli_connect_errno($con)) {
	echo "Koneksi Gagal : " . mysqli_connect_errno();
	mysqli_close($con);
} else {
	echo "";
}


// NEW KONEKSI
// $host_name = "localhost";
// $user_name = "root";
// $password = "";
// $database = "pakar_mental";

// $connect_db = mysqli_connect($host_name, $user_name, $password);
// $find_db = mysqli_select_db();

// if ($find_db) {
// 	echo "Database Ada";
// 	mysqli_close($connect_db);
// } else {
// 	echo "Database Tidak Ada";
// 	mysqli_close($connect_db);
// }
