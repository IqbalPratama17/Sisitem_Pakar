<?php
include '../controller/co_Penyakit.php';

$id_penyakit = $_POST['id_penyakit'];
$nama = $_POST['nama'];
$kett = $_POST['kett'];
$solusi = $_POST['solusi'];

$update = new Penyakit;
$update->EditDataPenyakit($id_penyakit, $nama, $kett, $solusi);

header('location: ../staff/Data_penyakit.php');
