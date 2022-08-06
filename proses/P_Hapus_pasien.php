<?php
include '../controller/co_Pasien.php';

$hapus = new Pasien;

$id_pasien = $_GET['id_pasien'];
if (!empty($id_pasien)) {
    $hapus->Hapus($id_pasien);
    header('location: ../pakar/pasien.php');
} else {
    header('location: ../pakar/pasien.php');
}
