<?php
session_start();
include "../koneksi.php";

if (!isset($_SESSION['username'])) {
    header('location:../view/New_login.php');
} else {
    $username = $_SESSION["username"];
}
require_once('../koneksi.php');
$hasil = mysqli_query($con, "select * from tbl_admin WHERE username='$username'");
$row = mysqli_fetch_array($hasil);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin - Sistem Pakar</title>
    <!-- Page Icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assetsA/assets/images/otak2.png">
    <!-- Bootsrap 4 -->
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css" integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous"> -->
    <!-- Custom CSS -->
    <link href="../assetsA/dist/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assetsA/assets/libs/datatable/dataTables.bootstrap.min.css">

    <!-- NEW -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- Boostrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <!-- Time -->
    <script type="text/javascript">
        function tampilkanwaktu() {
            var waktu = new Date(); //membuat object date berdasarkan waktu saat 
            var sh = waktu.getHours() + ""; //memunculkan nilai jam, //tambahan script + "" supaya variable sh bertipe string sehingga bisa dihitung panjangnya : sh.length    //ambil nilai menit
            var sm = waktu.getMinutes() + ""; //memunculkan nilai detik
            var ss = waktu.getSeconds() + ""; //memunculkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
            document.getElementById("clock").innerHTML = (sh.length == 1 ? "0" + sh : sh) + ":" + (sm.length == 1 ? "0" + sm : sm) + ":" + (ss.length == 1 ? "0" + ss : ss);
        }
    </script>
    <!-- CSS Inline -->
    <style>
        .alert {
            padding: 20px;
            background-color: #f44336;
            color: white;
            opacity: 1;
            transition: opacity 0.6s;
            margin-bottom: 15px;
        }

        .alert.success {
            background-color: #36bea6;
        }

        .alert.warning {
            background-color: #336699;
        }

        .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        .closebtn:hover {
            color: black;
        }
    </style>
</head>

<body>
    <!-- Start - Main Wrapper -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6">
        <!-- Start Topbar - Header -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- Logo -->
                    <div class="navbar-brand" href="">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="../assetsA/assets/images/zone.png" width="75px" alt="homepage" class="dark-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- Light Logo text -->
                            <img src="../assetsA/assets/images/Logo-texts2.png" width="150px" class="light-logo" alt="homepage" />
                        </span>
                    </div>
                    <!-- End Logo -->
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav float-left mr-auto"></ul>
                    <!-- Right side toggle and nav items -->
                    <ul class="navbar-nav float-right">
                        <!-- User profile and search -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bars" aria-hidden="true"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <a class="dropdown-item" href="../index.php"><i class="mdi mdi-view-dashboard"></i> Beranda</a>
                                <a class="dropdown-item" href="../logout.php"><i class="mdi mdi-logout-variant"></i> Keluar</a>
                            </div>
                        </li> <!-- User profile and search -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- End Topbar - Header -->

        <!-- Start Left Sidebar -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li>
                            <div class="user-profile d-flex no-block dropdown m-t-20">
                                <div class="user-pic">
                                    <img src="../assetsA/assets/images/users/usericon.png" alt="users" class="rounded-circle" width="45" />
                                </div>
                                <div class="user-content hide-menu m-l-10">
                                    <style>
                                        .user-content {
                                            padding-left: 20px;
                                        }
                                    </style>
                                    <h5 class="m-b-0 user-name font-medium"><?php echo $row['nama']; ?></h5>
                                    <span class="op-5 user-email">
                                        <?php echo $row['email']; ?>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <!-- End User Profile-->
                        <!-- Penyakit -->
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="Data_penyakit.php" aria-expanded="false">
                                <i class="mdi mdi-hospital-building"></i>
                                <span class="hide-menu">Daftar Penyakit</span>
                            </a>
                        </li>
                        <!-- Gejala -->
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="Data_gejala.php" aria-expanded="false">
                                <i class="mdi mdi-needle"></i>
                                <span class="hide-menu">Daftar Gejala</span>
                            </a>
                        </li>
                        <!-- Basis Pengetahuan -->
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="Data_aturan.php" aria-expanded="false">
                                <i class="mdi mdi-book-open-page-variant"></i>
                                <span class="hide-menu">Daftar Aturan</span>
                            </a>
                        </li>
                        <!-- Riwayat Diagnosa -->
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="Data_diagnosa.php" aria-expanded="false">
                                <i class="mdi mdi-history"></i>
                                <span class="hide-menu">Daftar Riwayat</span>
                            </a>
                        </li>
                        <!-- Data Pasien -->
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="Data_pakar.php" aria-expanded="false">
                                <i class="mdi mdi-account-multiple"></i>
                                <span class="hide-menu">Data Pakar</span>
                            </a>
                        </li>
                        <!-- Profil -->
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="Data_profil.php" aria-expanded="false">
                                <i class="mdi mdi-settings"></i>
                                <span class="hide-menu">Profil</span>
                            </a>
                        </li>
                    </ul>
                </nav><!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>