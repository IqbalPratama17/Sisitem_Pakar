<?php
include '../controller/co_Riwayat.php';
$dg = new Riwayat;

include "../controller/co_Gejala.php";
$pt = new Gejala;

include "../controller/co_Pasien.php";
$p = new Pasien;

include "../controller/co_Penyakit.php";
$pny = new Penyakit;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistem Pakar Diagnosa Penyakit Kesehatan Mental">
    <meta name="author" content="My Coding">
    <link rel="icon" type="image/png" sizes="16x16" href="../assetsA/assets/images/pakar.png">

    <title>Sistem Pakar - Penyakit Mental</title>
    <!-- SEO -->
    <meta name="keywords" content="Sistem Pakar, Diagnosa Penyakit Mental">
    <!-- Bootstrap core CSS -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../assets/css/business-casual.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        /* The container */
        .container {
            position: relative;
            padding-left: 35px;
            margin-bottom: 10px;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        /* Hide the browser's default checkbox */
        .container input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        /* Create a custom checkbox */
        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 25px;
            width: 25px;
            background-color: #eee;
        }

        /* On mouse-over, add a grey background color */
        .container:hover input~.checkmark {
            background-color: #ccc;
        }

        /* When the checkbox is checked, add a blue background */
        .container input:checked~.checkmark {
            background-color: #2196F3;
        }

        /* Create the checkmark/indicator (hidden when not checked) */
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the checkmark when checked */
        .container input:checked~.checkmark:after {
            display: block;
        }

        /* Style the checkmark/indicator */
        .container .checkmark:after {
            left: 9px;
            top: 5px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 3px 3px 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
        }

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

<body>
    <h1 class="site-heading text-center d-none d-lg-block" style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
        <span class="site-heading-upper text-primary mb-3">Diagnosa Penyakit Kesehatan Mental</span>
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
                    <li class="nav-item active px-lg-4">
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
    </nav> <!-- End Navigation -->
    <!-- Section 2 -->
    <section class="page-section about-heading">
        <div class="container-fluid">
            <div class="col-xl-10 col-lg-8 mx-auto">
                <div class="form-group">
                    <center>
                        <h3 style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">SILAHKAN PILIH GEJALA YANG PASIEN RASAKAN</h3>
                    </center>
                    <hr><br>
                    <form method="POST" action="../proses/P_Tambah_diagnosa.php">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8 text-center">
                                <div class="grid-container" style="text-align: center; font-family:Verdana, Geneva, Tahoma, sans-serif;">
                                    <?php
                                    $data = $pt->TampilSemuaWeb();
                                    $data2 = $pny->TampilSemua();
                                    foreach ($data2 as $penyakit) { ?>
                                        <!-- <h5><?php print $penyakit['nama'] ?></h5> -->
                                        <?php foreach ($data as $d) {
                                            if ($penyakit['id_penyakit'] == $d['id_penyakit']) {  ?>
                                                <label class="container"><?php print $d['nama'] ?>
                                                    <input type="checkbox" name='gejala[]' value='<?php print $d['id_gejala'] ?>'>
                                                    <span class="checkmark"></span>
                                                </label>
                                            <?php  } ?>
                                        <?php } ?>
                                    <?php } ?>
                                </div><br>
                                <div class="form-group">
                                    <input type="hidden" name="id_pasien" class="form-control" value="<?= $_GET['id_pasien'] ?>">
                                </div>
                                <center>
                                    <button type="submit" value="Diagnosa Penyakit" class="btn btn-success">DIAGNOSA</button>
                                </center>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div><br>
    </section>

    <footer class="footer text-faded text-center py-1">
        <div class="container">
            <p style="font-family: 'Courier New', Courier, monospace;">Copyright &copy;2022</p>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
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