<?php
//memanggil file koneksi.php
include "../koneksi.php";
session_start(); //memulai fungsi session
//membuat variable dengan nilai dari form
$username = $_POST['username'];
$password = $_POST['password'];
$error = "Periksa kembali username dan password anda";
//proses login
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($con, "select * from tbl_admin where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
// cek apakah username dan password di temukan pada database
if ($cek > 0) {
    $data = mysqli_fetch_assoc($login);
    // cek jika user login sebagai admin
    if ($data['jabatan'] == "admin") {
        $_SESSION['username'] = $username;
        $_SESSION['jabatan'] = "admin";
        //jika berhasil login, maka masuk ke file yang dituju
        header("location: ../staff/Data_penyakit.php");
    } elseif ($data['jabatan'] == "pakar") {
        $_SESSION['username'] = $username;
        $_SESSION['jabatan'] = "pakar";
        $_SESSION['id_admin'] = $data['id_admin'];
        //jika berhasil login, maka masuk ke file yang dituju
        header('location:../pakar/pasien.php');
    } else {
        $_SESSION["error"] = $error;
        header("location: ../view/New_login.php");
    }
} else {
    $_SESSION["error"] = $error;
    header("location: ../view/New_login.php");
}
