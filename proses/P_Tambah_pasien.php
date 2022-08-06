<?php
include '../controller/co_Pasien.php';

$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$no_telp = $_POST['no_telp'];
$tgl_lahir = $_POST['tgl_lahir'];
$usia = $_POST['usia'];
$alamat = $_POST['alamat'];


$pasien = new Pasien;
$id_pasien = $pasien->IdPasien();
$pasien->TambahPasien($id_pasien, $nama, $jenis_kelamin, $no_telp, $tgl_lahir, $usia, $alamat);
header("location: ../view/Daftar_Gejala.php?id_pasien=$id_pasien");
