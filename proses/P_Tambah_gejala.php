<?php
include '../controller/co_Gejala.php';

$id_penyakit = $_POST['id_penyakit'];
$nama = $_POST['nama'];

$gejala = new Gejala;
for ($i = 0; $i < count($nama); $i++) {
    $id_gejala = $gejala->IdGejala();
    $gejala->InsertGejala($id_gejala, $id_penyakit[$i], $nama[$i]);
    $gejala->InsertAturan($id_penyakit[$i], $id_gejala);
}
header('location: ../staff/Data_gejala.php');
