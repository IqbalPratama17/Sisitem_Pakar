<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['id_admin']);
unset($_SESSION['jabatan']);
header('location: index.php');
session_destroy();
