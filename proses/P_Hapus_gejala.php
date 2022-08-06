<?php
include '../controller/co_Gejala.php';

$hapus = new Gejala;

$id_gejala = $_GET['id_gejala'];
if (!empty($id_gejala)) {
    $hapus->HapusGejala($id_gejala);
    header('location: ../staff/Data_gejala.php');
} else {
    header('location: ../staff/Data_gejala.php');
}
