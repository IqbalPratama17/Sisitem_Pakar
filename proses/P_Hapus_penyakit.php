<?php
include "../controller/co_Penyakit.php";

$hapus = new Penyakit;

$id_penyakit = $_GET['id_penyakit'];
if (!empty($id_penyakit)) {
    $hapus->HapusPenyakit($id_penyakit);
    header('location: ../staff/Data_penyakit.php');
} else {
    header('location: ../staff/Data_penyakit.php');
}
