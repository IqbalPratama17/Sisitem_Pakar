<?php
include "../controller/co_Penyakit.php";

$nama = $_POST['nama'];
$kett = $_POST['kett'];
$solusi = $_POST['solusi'];

$penyakit = new Penyakit;
for ($i = 0; $i < count($nama); $i++) {
    $id_penyakit = $penyakit->IdPenyakit();
    $penyakit->InsertPenyakit($id_penyakit, $nama[$i], $kett[$i], $solusi[$i]);
}
header('location: ../staff/Data_penyakit.php');
