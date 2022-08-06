<?php
include '../controller/co_Admin.php';

$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$nohp = $_POST['nohp'];
$jabatan = $_POST['jabatan'];

$insert = new Admin;
$insert->TambahPakar($nama, $username, $password, $email, $nohp, $jabatan);
header('location: ../staff/Data_pakar.php');
