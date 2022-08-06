<?php
include '../controller/co_Riwayat.php';
include '../controller/co_Gejala.php';

$id_pasien = $_POST['id_pasien'];
$tanggal = $_POST['tanggal'];
$id_gejala = $_POST['gejala'];
// $id_penyakit = $_POST['id_penyakit'];
// $nilai_kepastian = $_POST['persentase'];

$diagnosa = new Riwayat;
$id_diagnosa = $diagnosa->IdDiagnosa();
$diagnosa->SimpanDiagnosa($id_diagnosa, $id_pasien, $tanggal);
// $diagnosa->InsertHasilDiagnosa($id_diagnosa, $id_pasien);
// $diagnosa = $c_gejala->InsertHasilDiagnosa($id_diagnosa, $id_pasien, $gejala->$id_penyakit, $nilai_kepastian);



// var_dump(count($id_gejala));
$c_gejala = new Gejala;
for ($i = 0; $i < count($id_gejala); $i++) {
    $gejala = $c_gejala->TampilSatuGejala($id_gejala[$i]);
    $insert = $c_gejala->InsertDetailDiagnosa($id_diagnosa, $gejala->id_gejala, $gejala->id_penyakit, $gejala->bobot);
}
// die();

header("location: ../view/Hasil_Diagnosa_dev_3.php?id_diagnosa=$id_diagnosa");
