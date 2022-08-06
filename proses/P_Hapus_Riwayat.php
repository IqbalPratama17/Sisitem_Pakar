<?php
include "../controller/co_Riwayat.php";

$hapus = new Riwayat;

$id_hasil_diagnosa = $_GET['id_hasil_diagnosa'];
if (!empty($id_hasil_diagnosa)) {
    $hapus->Hapus($id_hasil_diagnosa);
    header('location: ../staff/Data_diagnosa.php');
} else {
    header('location: ../staff/Data_diagnosa.php');
}
