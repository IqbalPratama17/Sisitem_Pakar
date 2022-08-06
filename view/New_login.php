<?php
session_start();
include "../koneksi.php";
if (!isset($_SESSION['username'])) {
} else {
    if (@$_SESSION["jabatan"] == "pakar") {
        $username = $_SESSION["username"];
        //$id_admin = $_SESSION['id_admin'];
        header('location: ../pakar/pasien.php');
    }
    if (@$_SESSION['jabatan'] == "admin") {
        $username = $_SESSION["username"];
        header('location: ../staff/Data_penyakit.php');
        // header('location: ../staff/Dashboard.php');
    }
}
require_once('../koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assetsB/img/apple-icon.png">
    <!-- <link rel="icon" type="image/png" href="../assetsB/img/favicon.png"> -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assetsA/assets/images/pakar.png" />
    <title>
        Login Sistem Pakar
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="../assetsB/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assetsB/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="../assetsB/css/material-dashboard.css?v=3.0.4" rel="stylesheet" />
</head>

<body class="bg-gray-200">
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                    <h3 class="text-white font-weight-bolder text-center mt-2 mb-0">SIGN IN</h3>
                                    <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">WELCOM ADMIN</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <form role="form" class="text-start" method="POST" action="../bahan/p_login.php">
                                    <div class="input-group input-group-outline my-2">
                                        <label class="form-label">Username</label>
                                        <input type="text" class="form-control" name="username" required autocomplete="off">
                                    </div>
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" required>
                                    </div>
                                    <div class="flex-sb-m w-full p-b-30">
                                        <?php
                                        if (isset($_SESSION["error"])) {
                                            $error = $_SESSION["error"];
                                            echo "<p style='color: red'>$error</p>";
                                        }
                                        ?>
                                        <div class="contact100-form-checkbox">

                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Sign in</button>
                                    </div>
                                    <p class="mt-4 text-sm text-center">
                                        <a href="../index.php" class="text-primary text-gradient font-weight-bold">Beranda</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="footer position-absolute bottom-2 py-2 w-100">
                <div class="container">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-12 col-md-6 my-auto">
                            <div class="copyright text-center text-sm text-white text-lg-start">
                                © <script>
                                    document.write(new Date().getFullYear())
                                </script>,
                                made with <i class="fa fa-heart" aria-hidden="true"></i> by Aslan
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                                <li class="nav-item">
                                    <a href="#" class="nav-link text-white" target="_blank">Creative Tim</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link text-white" target="_blank">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link text-white" target="_blank">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link pe-0 text-white" target="_blank">License</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </main>
    <!--   Core JS Files   -->
    <script src="../assetsB/js/core/popper.min.js"></script>
    <script src="../assetsB/js/core/bootstrap.min.js"></script>
    <script src="../assetsB/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assetsB/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assetsB/js/material-dashboard.min.js?v=3.0.4"></script>
</body>

</html>
<?php unset($_SESSION["error"]); ?>