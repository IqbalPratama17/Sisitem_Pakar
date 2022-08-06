<?php
include '../controller/co_Aturan.php';

$id_aturan = $_POST['id_aturan'];
$id_penyakit = $_POST['id_penyakit'];
$id_gejala = $_POST['id_gejala'];
$bobot = $_POST['bobot'];

$update = new BasisP;
$update->EditBasis($id_aturan, $id_penyakit, $id_gejala, $bobot);
header('location: ../staff/Data_aturan.php');
