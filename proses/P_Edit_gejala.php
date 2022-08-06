<?php
include '../controller/co_Gejala.php';

$id_gejala = $_POST['id_gejala'];
$nama = $_POST['nama'];

$update = new Gejala;
$update->EditGejala($id_gejala, $nama);
header('location: ../staff/Data_gejala.php');
