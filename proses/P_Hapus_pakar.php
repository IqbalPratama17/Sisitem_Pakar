<?php
include '../controller/co_Admin.php';

$hapus = new Admin;

$id_admin = $_GET['id_admin'];
if (!empty($id_admin)) {
    $hapus->HapusPakar($id_admin);
    header('location: ../staff/Data_pakar.php');
} else {
    header('location: ../staff/Data_pakar.php');
}
