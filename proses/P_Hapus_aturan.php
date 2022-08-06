<?php
include "../controller/co_Aturan.php";

$hapus = new BasisP;

$id_aturan = $_GET['id_aturan'];
if (!empty($id_aturan)) {
    $hapus->HapusBasis($id_aturan);
    header('location: ../staff/Data_aturan.php');
} else {
    header('location: ../staff/Data_aturan.php');
}
