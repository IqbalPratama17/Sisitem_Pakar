<?php
include "../controller/co_Pasien.php";
$ps = new Pasien;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="16x16" href="../assetsA/assets/images/pakar.png">
    <title>Sistem Pakar - Penyakit Mental</title>
    <!-- SEO -->
    <meta name="keywords" content="Sistem Pakar, Diagnosa Penyakit Mental">
    <!-- Bootstrap core CSS -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../assets/css/business-casual.min.css" rel="stylesheet">

    <!-- Bootsrap Umur -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

    <!-- Script Untuk Umur Pasien -->
    <script>
        $(function() {
            $("#datepicker").datepicker();
        });

        window.onload = function() {
            $('#datepicker').on('change', function() {
                var dob = new Date(this.value);
                var today = new Date();
                var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
                $('#umur').val(age);
            });
        }
    </script>

    <style>
        #myBtn {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 30px;
            z-index: 99;
            font-size: 18px;
            border: none;
            outline: none;
            background-color: red;
            color: white;
            cursor: pointer;
            padding: 15px;
            border-radius: 4px;
        }

        #myBtn:hover {
            background-color: #555;
        }

        form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-gap: 10px;
        }

        .form-control-new {
            display: block;
            width: 203.5%;
            height: calc(2.25rem + 2px);
            padding: .375rem .75rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        select:invalid {
            color: gray;
        }
    </style>

    <script type="text/javascript">
        //fungsi ini akan dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik
        function tampilkanwaktu() {
            var waktu = new Date(); //membuat object date berdasarkan waktu saat 
            //memunculkan nilai jam, //tambahan script + "" supaya variable sh bertipe string sehingga bisa dihitung panjangnya : sh.length    //ambil nilai menit
            var sh = waktu.getHours() + "";
            var sm = waktu.getMinutes() + ""; //memunculkan nilai detik
            //memunculkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
            var ss = waktu.getSeconds() + "";
            document.getElementById("clock").innerHTML = (sh.length == 1 ? "0" + sh : sh) + ":" + (sm.length == 1 ? "0" + sm : sm) + ":" + (ss.length == 1 ? "0" + ss : ss);
        }
    </script>
</head>

<body style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
    <h1 class="site-heading text-center d-none d-lg-block">
        <span class="site-heading-upper text-primary mb-3">Diagnosa Penyakit Kesehatan Mental
        </span>
    </h1>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
        <div class="container">
            <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#" target="_blank" rel="noopener">Sistem Pakar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item px-lg-4">
                        <a class="nav-link text-uppercase text-expanded" href="../index.php">Beranda
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item active px-lg-3">
                        <a class="nav-link text-uppercase text-expanded" href="Data_Pasien.php">Diagnosa</a>
                    </li>
                    <li class="nav-item px-lg-4">
                        <a class="nav-link text-uppercase text-expanded" href="panduan.php">Panduan</a>
                    </li>
                    <li class="nav-item px-lg-4">
                        <a class="nav-link text-uppercase text-expanded" href="New_login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navigation -->

    <!-- Section 1 -->
    <section class="page-section about-heading">
        <div class="container-fluid" style="margin-top: 3%;">
            <div class="col-xl-8 col-lg-8 mx-auto">
                <div class="form-group">
                    <center>
                        <h3 style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">ISI DATA DIRI PASIEN</h3>
                    </center>
                    <hr><br>
                    <form method="POST" class="row" action="../proses/P_Tambah_pasien.php">
                        <div class="col-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="nama" required placeholder="Nama Lengkap Pasien">
                            </div>
                            <div class="form-group">
                                <input type="text" name="no_telp" class="form-control" placeholder="No.Telp">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <!-- <input type="date" class="form-control" name="tgl_lahir" id=""> -->
                                <input placeholder="Tanggal Lahir" class="form-control" type="text" onfocus="(this.type='date')" id="datepicker" name="tgl_lahir">
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="usia" id="umur">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <select class="form-control" name="jenis_kelamin">
                                    <option value="" disabled selected hidden>Jenis Kelamin</option>
                                    <option>Laki-Laki</option>
                                    <option>Wanita</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" name="alamat" class="form-control" placeholder="Alamat Lengkap">
                            </div><br>
                            <center>
                                <button class="btn btn-success" type="submit" onclick="getAge();">Tambah Data</button>
                            </center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section><br><!-- End Section 1 -->

    <footer class="footer text-faded text-center py-1">
        <div class="container">
            <p style="font-family: 'Courier New', Courier, monospace;">Copyright &copy;2022</p>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <script type="text/javascript">
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("myBtn").style.display = "block";
            } else {
                document.getElementById("myBtn").style.display = "none";
            }
        }
        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
</body>

</html>