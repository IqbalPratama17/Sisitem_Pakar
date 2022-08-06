<?php
session_start();
include "../koneksi.php";

if (!isset($_SESSION['username'])) {
    header('location:../view/New_login.php');
} else {
    $username = $_SESSION["username"];
    $id_admin = $_SESSION['id_admin'];
}
require_once('../koneksi.php');
$hasil = mysqli_query($con, "select * from tbl_admin where username='$username'");
$row = mysqli_fetch_array($hasil);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assetsA/assets/images/otak2.png">
    <title>Psikolog | Sistem Pakar</title>
    <!-- Custom CSS -->
    <link href="../assetsA/dist/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assetsA/assets/libs/datatable/dataTables.bootstrap.min.css">

    <script type="text/javascript">
        //fungsi ini akan dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik
        function tampilkanwaktu() {
            var waktu = new Date(); //membuat object date berdasarkan waktu saat 
            //memunculkan nilai jam, //tambahan script + "" supaya variable sh bertipe string sehingga bisa dihitung panjangnya : sh.length //ambil nilai menit
            var sh = waktu.getHours() + "";
            var sm = waktu.getMinutes() + ""; //memunculkan nilai detik
            //memunculkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
            var ss = waktu.getSeconds() + "";
            document.getElementById("clock").innerHTML = (sh.length == 1 ? "0" + sh : sh) + ":" + (sm.length == 1 ? "0" + sm : sm) + ":" + (ss.length == 1 ? "0" + ss : ss);
        }
    </script>
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
    <!-- <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div> -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- Logo -->
                    <a class="navbar-brand" href="">
                        <b class="logo-icon">
                            <!-- Dark Logo icon -->
                            <img src="../assetsA/assets/images/zone.png" width="75px" alt="homepage" class="dark-logo" />
                        </b>
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="../assetsA/assets/images/Logo-texts2.png" width="150px" alt="homepage" class="dark-logo" />
                            <!-- Light Logo text -->
                            <img src="../assetsA/assets/images/Logo-texts2.png" width="150px" class="light-logo" alt="homepage" />
                        </span>
                    </a>
                    <!-- End Logo -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav float-left mr-auto"></ul>
                    <ul class="navbar-nav float-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bars" aria-hidden="true"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <a class="dropdown-item" href="../index.php"><i class="mdi mdi-view-dashboard"></i> Beranda</a>
                                <a class="dropdown-item" href="../logout.php"><i class="mdi mdi-logout-variant"></i> Keluar</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li>
                            <!-- User Profile-->
                            <div class="user-profile d-flex no-block dropdown m-t-20">
                                <div class="user-pic">
                                    <img src="../assetsA/assets/images/users/icon_dokter.webp" alt="users" class="rounded-circle" width="47" />
                                </div>
                                <div class="user-content hide-menu m-l-10">
                                    <style>
                                        .user-content {
                                            padding-left: 10px;
                                        }
                                    </style>
                                    <h5 class="m-b-0 user-name font-medium"><?php echo $row['nama']; ?> <i class="fa fa-angle-down"></i></h5>
                                    <span class="op-5 user-email"><?php echo $row['email']; ?></span>
                                </div>
                            </div>
                            <!-- End User Profile-->
                        </li>
                        <!-- Data Pasien -->
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="pasien.php" aria-expanded="false">
                                <i class="mdi mdi-account-multiple"></i>
                                <span class="hide-menu">Hasil Diagnosa Pasien</span>
                            </a>
                        </li>
                        <!-- Profil -->
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="profil.php" aria-expanded="false">
                                <i class="mdi mdi-settings"></i>
                                <span class="hide-menu">Pengaturan</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>