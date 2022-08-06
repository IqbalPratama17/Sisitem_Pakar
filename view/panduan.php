<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dempster Shafer - Sistem Pakar</title>
  <!-- Gambar Icon Halaman -->
  <link rel="icon" type="image/png" sizes="16x16" href="../assetsA/assets/images/pakar.png">
  <!-- Bootstrap core CSS -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="../assets/css/business-casual.min.css" rel="stylesheet">
  <!-- CSS Indent -->
  <style type="text/css">
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
  </style>
</head>

<body>
  <h1 class="site-heading text-center d-none d-lg-block" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
    <span class="site-heading-upper text-primary mb-3">
      Diagnosa Penyakit Kesehatan Mental
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
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="Data_Pasien.php">Diagnosa</a>
          </li>
          <li class="nav-item active px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="panduan.php">Panduan</a>
          </li>
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="New_login.php">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <section class="page-section about-heading">
    <div class="container">
      <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="../assets/img/panduan.jpg" alt="">
      <div class="about-heading-content">
        <div class="row">
          <div class="col-xl-9 col-lg-10 mx-auto">
            <div class="bg-faded rounded p-5">
              <h2 class="section-heading mb-4" style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
                <center><span class="section-heading-lower">Panduan Tata Cara Diagnosa Penyakit</span></center>
              </h2>
              <p style="text-align: justify;">Sistem Pakar diagnosa penyakit mental merupakan sebuah sistem yang mampu melakukan diagnosa penyakit mental berdasarkan gejala yang dirasakan oleh pasien. untuk melakukan diagnosa penyakit, terdapat beberapa tatacara dan aturan yang harus dilakukan, adalah sebagai berikut :</p>
              <h3>
                <span class="section-heading-upper">BAGAIMANA CARA MELAKUKAN DIAGNOSA PENYAKIT?</span>
              </h3>
              <p class="mb-0" style="text-align: justify;">Diagnosa penyakit dapat dilakukan apabila telah menginput 2 gejala atau lebih, dikarenakan untuk mendiagnosa sebuah penyakit dibutuhkan minimal 2 buah gejala agar penyakit dapat didiagnosa.</p>
              <br>
              <h3>
                <span class="section-heading-upper">BAGAIMANA JIKA GEJALA YANG ANDA RASAKAN TIDAK TERDAPAT DI SISTEM?</span>
              </h3>
              <p class="mb-0" style="text-align: justify;">Pada saat ini hanya beberapa gejala dan tingkatan penyakit yang dapat didiagnosa oleh sistem, maka dari itu proses diagnosa penyakit hanya bisa dilakukan jika gejala dan penyakit sudah terdaftar pada sistem.</p>
              <br>
              <h3>
                <span class="section-heading-upper">APAKAH DIAGNOSA PENYAKIT PADA SISTEM SUDAH 100% BENAR?</span>
              </h3>
              <p class="mb-0" style="text-align: justify;">Diagnosa penyakit pada sistem dilakukan dengan perhitungan yang menggunakan metode <i>Dempster-Shafer</i> dengan nilai kepercayaan bersumber dari pakar/psikolog ahli mental, guna melakukan upaya penanganan dini terhadap penyakit tersebut. tetapi akan lebih baik jika melakukan konsultasi ulang bersama ahli mental, agar masalah yang anda hadapi dapat ditangani lebih baik.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

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