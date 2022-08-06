<?php include "../koneksi.php";
include "../controller/co_Riwayat.php";
$diagnosa = new Riwayat;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16" href="../assetsA/assets/images/pakar.png">
    <title>Perhitungan</title>
    <!-- Bootstrap core CSS -->
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

    <?php
    function hitung_densitas($m1_pasti, $m2_pasti)
    {
        $m1_tidak_pasti = 1 - $m1_pasti;
        $m2_tidak_pasti = 1 - $m2_pasti;
        $hitung_densitas = ($m1_pasti * $m2_pasti) + ($m1_tidak_pasti * $m2_pasti) + ($m1_pasti * $m2_tidak_pasti);
        return $hitung_densitas;
    }
    // ----------------------
    $id_diagnosa = $_GET['id_diagnosa'];
    $query_detail_diagnosa = mysqli_query($con, "SELECT * FROM tbl_detail_diagnosa JOIN tbl_gejala WHERE tbl_gejala.id_gejala=tbl_detail_diagnosa.id_gejala AND tbl_detail_diagnosa.id_diagnosa = '$id_diagnosa' ORDER BY id_detail_diagnosa") or die(mysqli_error($con));
    while ($row_detail_diagnosa = mysqli_fetch_assoc($query_detail_diagnosa)) {
        $data_detail_diagnosa[] = $row_detail_diagnosa;
    }
    // var_dump($data_detail_diagnosa_limit_2);
    // die();
    $query_detail_diagnosa_grup_by = mysqli_query($con, "SELECT * FROM tbl_detail_diagnosa JOIN tbl_gejala WHERE tbl_gejala.id_gejala=tbl_detail_diagnosa.id_gejala AND tbl_detail_diagnosa.id_diagnosa = '$id_diagnosa' GROUP BY tbl_detail_diagnosa.id_penyakit ORDER BY id_detail_diagnosa") or die(mysqli_error($con));
    while ($row_detail_diagnosa_grup_by = mysqli_fetch_assoc($query_detail_diagnosa_grup_by)) {
        $data_detail_diagnosa_grup_by[] = $row_detail_diagnosa_grup_by;
    }
    $query_penyakit = mysqli_query($con, "SELECT * FROM tbl_penyakit") or die(mysqli_error($con));
    while ($row_penyakit = mysqli_fetch_assoc($query_penyakit)) {
        $data_penyakit[] = $row_penyakit;
    }
    // --------------------------
    ?>
</head>

<body style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
    <h1 class="site-heading text-center d-none d-lg-block">
        <span class="site-heading-upper text-warning mb-3" style="text-decoration: underline; line-height: 70px;">Hasil Diagnosa Penyakit Kesehatan Mental</span>
    </h1>
    <!-- Section Start -->
    <section class="page-section about-heading">
        <div class="container">
            <div class="about-heading-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-8 mx-auto">
                        <div class="bg-faded rounded p-3">
                            <?php
                            foreach ($data_penyakit as $penyakit) {
                                // query detail diagnosa where id_penyakit trus count
                                $id_penyakit = $penyakit['id_penyakit'];
                                $query_num_row =  mysqli_query($con, "SELECT count(*) AS jumlah_gejala FROM tbl_detail_diagnosa WHERE id_penyakit='$id_penyakit' AND id_diagnosa='$id_diagnosa'")->fetch_object();
                                // echo $query_num_row->jumlah_gejala; 
                            ?>
                                <?php if ($query_num_row->jumlah_gejala >= '2') { ?>
                                    <div class="card">
                                        <div class="card-header" style="background-color: #79ccd4; font-weight: bold;">
                                            <?= $penyakit['nama'] ?>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-sm table-striped text-center">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Id Gejala</th>
                                                        <th>Nama Gejala</th>
                                                        <th>Belief</th>
                                                        <th>Plausibility</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if ($query_num_row->jumlah_gejala == '2') { ?>
                                                        <?php $no = 1; ?>
                                                        <?php foreach ($data_detail_diagnosa as $detail) { ?>
                                                            <?php if ($detail['id_penyakit'] == $id_penyakit) { ?>
                                                                <tr>
                                                                    <td><?= $no++; ?></td>
                                                                    <td><?= $detail['id_gejala'] ?></td>
                                                                    <td><?= $detail['nama'] ?></td>
                                                                    <?php $single_kepastian[$id_penyakit][] = $detail['bobot'] ?>
                                                                    <td><?= $detail['bobot'] ?></td>
                                                                    <td><?= 1 - $detail['bobot'] ?></td>
                                                                </tr>
                                                            <?php } ?>

                                                        <?php } ?>
                                                    <?php  } elseif ($query_num_row->jumlah_gejala > '2') {
                                                        $query_detail_diagnosa_limit_2 = mysqli_query($con, "SELECT * FROM tbl_detail_diagnosa JOIN tbl_gejala ON tbl_gejala.id_gejala=tbl_detail_diagnosa.id_gejala AND tbl_detail_diagnosa.id_diagnosa = '$id_diagnosa' AND tbl_detail_diagnosa.id_penyakit = '$id_penyakit' ORDER BY id_detail_diagnosa limit 2") or die(mysqli_error($con));
                                                        while ($row_detail_diagnosa_limit_2 = mysqli_fetch_assoc($query_detail_diagnosa_limit_2)) {
                                                            $data_detail_diagnosa_limit_2[] = $row_detail_diagnosa_limit_2;
                                                        }
                                                    ?>
                                                        <?php $no = 1; ?>
                                                        <?php $index = 1; ?>
                                                        <?php $awl = 0; ?>
                                                        <?php foreach ($data_detail_diagnosa_limit_2 as $detail_limit_2) { ?>
                                                            <?php if ($detail_limit_2['id_penyakit'] == $id_penyakit) { ?>
                                                                <tr>
                                                                    <td><?= $no++; ?></td>
                                                                    <td><?= $detail_limit_2['id_gejala'] ?></td>
                                                                    <td><?= $detail_limit_2['nama'] ?></td>
                                                                    <?php $kepastian_awal[$id_penyakit][] = $detail_limit_2['bobot']; ?>
                                                                    <td><?= $detail_limit_2['bobot'] ?></td>
                                                                    <td><?= 1 - $detail_limit_2['bobot'] ?></td>
                                                                </tr>
                                                            <?php } ?>
                                                        <?php }
                                                        // rumus densitas m1 simpan ke array nilai_densitas index 0
                                                        // var_dump($id_penyakit);
                                                        // echo "<br>";
                                                        // var_dump($kepastian_awal);
                                                        echo "<br>";
                                                        $nilai_densitas[] = hitung_densitas($kepastian_awal[$penyakit['id_penyakit']][0], $kepastian_awal[$penyakit['id_penyakit']][1]);
                                                        // $m1_pasti = $kepastian_awal[$penyakit['id_penyakit']][0];
                                                        // $m2_pasti = $kepastian_awal[$penyakit['id_penyakit']][1];
                                                        // $m1_tidak_pasti = 1 - $m1_pasti;
                                                        // $m2_tidak_pasti = 1 - $m2_pasti;
                                                        // $hitung_densitas = ($m1_pasti * $m2_pasti) + ($m1_tidak_pasti * $m2_pasti) + ($m1_pasti * $m2_tidak_pasti);
                                                        // echo "M pasti : " . $m1_pasti . "<br>";
                                                        // echo "M pasti : " . $m2_pasti . "<br>";
                                                        // echo "M hasil perkalian 1 : " . ($m1_pasti * $m2_pasti) . "<br>";
                                                        // echo "M hasil perkalian 2 : " . ($m1_tidak_pasti * $m2_pasti) . "<br>";
                                                        // echo "M hasil perkalian 3 : " . ($m1_pasti * $m2_tidak_pasti) . "<br>";
                                                        // echo "M hasil penjumlahan perkalian : " . $hitung_densitas . "<br>";
                                                        // echo "M hasil penjumlahan perkalian : " . var_dump(end($nilai_densitas)) . "<br>";
                                                        // echo "M tidak pasti : " . $m1_tidak_pasti . "<br>";
                                                        // echo "M tidak pasti : " . $m2_tidak_pasti . "<br>";
                                                        // echo "Nilai Densitas M : " . $hitung_densitas . "<br>";
                                                        ?>
                                                        <!-- no di sinih tandinya bernilai 3 saya ubah jadi 1 penyakit 5 nonya jadi urut 1,2,3 tapi di penyakit 1 no 3-nya ilang -->
                                                        <!-- kalo $no = 3 di penyakit 1 ada no 3-nya, tapi di penyakit 5 jadi 3,4,5 no-nya  -->
                                                        <?php $no = 3; ?>
                                                        <?php $i = 1; ?>
                                                        <?php
                                                        $query_detail_diagnosa_offset_2 = mysqli_query($con, "SELECT * FROM tbl_detail_diagnosa JOIN tbl_gejala ON tbl_gejala.id_gejala=tbl_detail_diagnosa.id_gejala WHERE tbl_detail_diagnosa.id_diagnosa = '$id_diagnosa' AND tbl_detail_diagnosa.id_penyakit = '$id_penyakit' ORDER BY id_detail_diagnosa LIMIT 100 OFFSET 2") or die(mysqli_error($con));
                                                        while ($row_detail_diagnosa_offset_2 = mysqli_fetch_assoc($query_detail_diagnosa_offset_2)) {
                                                            $data_detail_diagnosa_offset_2[] = $row_detail_diagnosa_offset_2;
                                                        }
                                                        ?>
                                                        <?php foreach ($data_detail_diagnosa_offset_2 as $detail_offset_2) { ?>
                                                            <?php if ($detail_offset_2['id_penyakit'] == $penyakit['id_penyakit']) { ?>
                                                                <tr>
                                                                    <td><?= $no++; ?></td>
                                                                    <td><?= $detail_offset_2['id_gejala'] ?></td>
                                                                    <td><?= $detail_offset_2['nama'] ?></td>
                                                                    <?php $kepastian[$penyakit['id_penyakit']][] = $detail_offset_2['bobot'] ?>
                                                                    <td><?= $detail_offset_2['bobot'] ?></td>
                                                                    <td><?= 1 - $detail_offset_2['bobot'] ?></td>
                                                                </tr>
                                                                <?php
                                                                // $m1_pasti = end($nilai_densitas);
                                                                // $m2_pasti = $kepastian[$penyakit['id_penyakit']][$awl];
                                                                // $m1_tidak_pasti = 1 - $m1_pasti;
                                                                // $m2_tidak_pasti = 1 - $m2_pasti;
                                                                // $hitung_densitas = ($m1_pasti * $m2_pasti) + ($m1_tidak_pasti * $m2_pasti) + ($m1_pasti * $m2_tidak_pasti);
                                                                // echo "<br><br><br>";
                                                                // echo "M pasti : " . $m1_pasti . "<br>";
                                                                // echo "M pasti : " . var_dump($nilai_densitas) . "<br>";
                                                                // echo "M pasti : " . $m2_pasti . "<br>";
                                                                // echo "M hasil perkalian 1 : " . ($m1_pasti * $m2_pasti) . "<br>";
                                                                // echo "M tidak pasti : " . round($m1_tidak_pasti, 2) . "<br>";
                                                                // echo "M tidak pasti : " . round($m2_tidak_pasti, 2) . "<br>";
                                                                // echo "Nilai Densitas M : " . $hitung_densitas . "<br>";
                                                                $nilai_densitas[] = hitung_densitas(end($nilai_densitas), $kepastian[$penyakit['id_penyakit']][$awl]);
                                                                $awl++;
                                                                $i++;
                                                                $index++;
                                                                ?>
                                                            <?php } ?>
                                                        <?php }
                                                        // rumus densitas m1 simpan ke array nilai_densitas index 0
                                                        ?>
                                                    <?php } else { ?>
                                                        <tr>
                                                            <td colspan="5">Data Gejala Kurang</td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                                <tfoot>
                                                    <?php if ($query_num_row->jumlah_gejala == '2') { ?>
                                                        <?php foreach ($data_detail_diagnosa_grup_by as $detail) { ?>
                                                            <?php if ($detail['id_penyakit'] == $penyakit['id_penyakit']) { ?>
                                                                <?php $nilai_densitas_single = Hitung_densitas($single_kepastian[$penyakit['id_penyakit']][0], $single_kepastian[$detail['id_penyakit']][1]); ?>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <?php
                                                                    $nilai_kepastian_single = $nilai_densitas_single; ?>
                                                                    <td><?= $nilai_kepastian_single ?></td>
                                                                    <td><?= 1 - $nilai_kepastian_single ?></td>
                                                                </tr>
                                                                <?php $query_check_data_hasil_diagnosa =  mysqli_query($con, "SELECT count(*) AS jumlah_data_hasil_diagnosa FROM tbl_hasil_diagnosa WHERE id_diagnosa='$id_diagnosa' AND id_penyakit='$id_penyakit'")->fetch_object(); ?>
                                                                <?php if ($query_check_data_hasil_diagnosa->jumlah_data_hasil_diagnosa > 0) {
                                                                    $nilai_persentase_hasil_diagnosa = $nilai_kepastian_single * 100;
                                                                    $query = mysqli_query(
                                                                        $con,
                                                                        "UPDATE tbl_hasil_diagnosa set persentase='$nilai_persentase_hasil_diagnosa' WHERE id_diagnosa='$id_diagnosa' AND id_penyakit='$id_penyakit'"
                                                                    );
                                                                } else {
                                                                    // $nilai_persentase_hasil_diagnosa = $nilai_kepastian * 100;
                                                                    $nilai_kepastian_single = $nilai_kepastian * 100;
                                                                    $query = mysqli_query(
                                                                        $con,
                                                                        "INSERT INTO tbl_hasil_diagnosa(id_diagnosa, id_penyakit, persentase)
                                                                        VALUES ('$id_diagnosa', '$id_penyakit', '$nilai_persentase_hasil_diagnosa')"
                                                                    );
                                                                } ?>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    <?php  } elseif ($query_num_row->jumlah_gejala > '2') { ?>
                                                        <?php $no = 1; ?>
                                                        <?php $index = 1; ?>
                                                        <?php $awl = 0; ?>
                                                        <?php foreach ($data_detail_diagnosa_limit_2 as $detail_limit_2) { ?>
                                                            <?php if ($detail_limit_2['id_penyakit'] == $penyakit['id_penyakit']) { ?>

                                                                <?php $kepastian_awal[$penyakit['id_penyakit']][] = $detail_limit_2['bobot'] ?>

                                                            <?php } ?>
                                                        <?php }
                                                        // rumus densitas m1 simpan ke array nilai_densitas index 0
                                                        $nilai_densitas[] = hitung_densitas($kepastian_awal[$penyakit['id_penyakit']][0], $kepastian_awal[$penyakit['id_penyakit']][1]);
                                                        $m1_pasti = $kepastian_awal[$penyakit['id_penyakit']][0];
                                                        $m2_pasti = $kepastian_awal[$penyakit['id_penyakit']][1];
                                                        $m1_tidak_pasti = 1 - $m1_pasti;
                                                        $m2_tidak_pasti = 1 - $m2_pasti;
                                                        $hitung_densitas = ($m1_pasti * $m2_pasti) + ($m1_tidak_pasti * $m2_pasti) + ($m1_pasti * $m2_tidak_pasti);
                                                        ?>
                                                        <!-- no di sinih tandinya bernilai 3 saya ubah jadi 1 penyakit 5 nonya jadi urut 1,2,3 tapi di penyakit 1 no 3-nya ilang -->
                                                        <!-- kalo $no = 3 di penyakit 1 ada no 3-nya, tapi di penyakit 5 jadi 3,4,5 no-nya  -->
                                                        <?php $no = 3; ?>
                                                        <?php $i = 1; ?>
                                                        <?php foreach ($data_detail_diagnosa_offset_2 as $detail_offset_2) { ?>
                                                            <?php if ($detail_offset_2['id_penyakit'] == $penyakit['id_penyakit']) { ?>

                                                                <?php $kepastian[$penyakit['id_penyakit']][] = $detail_offset_2['bobot'] ?>

                                                                <?php
                                                                $nilai_densitas[] = hitung_densitas(end($nilai_densitas), $kepastian[$penyakit['id_penyakit']][$awl]);
                                                                // $m1_pasti = $nilai_densitas[$awl];
                                                                // $m2_pasti = $kepastian[$penyakit['id_penyakit']][$awl];
                                                                // $m1_tidak_pasti = 1 - $m1_pasti;
                                                                // $m2_tidak_pasti = 1 - $m2_pasti;
                                                                // $hitung_densitas = ($m1_pasti * $m2_pasti) + ($m1_tidak_pasti * $m2_pasti) + ($m1_pasti * $m2_tidak_pasti);
                                                                $awl++;
                                                                $i++;
                                                                $index++;
                                                                ?>
                                                            <?php } ?>
                                                        <?php }
                                                        // rumus densitas m1 simpan ke array nilai_densitas index 0
                                                        ?>

                                                        <?php if ($query_num_row->jumlah_gejala > '2') { ?>
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <?php $nilai_kepastian = round(end($nilai_densitas), 2); ?>
                                                                <td><?= $nilai_kepastian ?></td>
                                                                <td><?= 1 - $nilai_kepastian ?></td>
                                                            </tr>
                                                            <?php $query_check_data_hasil_diagnosa =  mysqli_query($con, "SELECT count(*) AS jumlah_data_hasil_diagnosa FROM tbl_hasil_diagnosa WHERE id_diagnosa='$id_diagnosa' AND id_penyakit='$id_penyakit'")->fetch_object(); ?>
                                                            <?php if ($query_check_data_hasil_diagnosa->jumlah_data_hasil_diagnosa > 0) {
                                                                $nilai_persentase_hasil_diagnosa = $nilai_kepastian * 100;
                                                                $query = mysqli_query(
                                                                    $con,
                                                                    "UPDATE tbl_hasil_diagnosa set persentase='$nilai_persentase_hasil_diagnosa' WHERE id_diagnosa='$id_diagnosa' AND id_penyakit='$id_penyakit'"
                                                                );
                                                            } else {
                                                                $nilai_persentase_hasil_diagnosa = $nilai_kepastian * 100;
                                                                $query = mysqli_query(
                                                                    $con,
                                                                    "INSERT INTO tbl_hasil_diagnosa(id_diagnosa, id_penyakit, persentase)
                                                                        VALUES ('$id_diagnosa', '$id_penyakit', '$nilai_persentase_hasil_diagnosa')"
                                                                );
                                                            } ?>
                                                        <?php } ?>
                                                    <?php } else { ?>
                                                        <tr>
                                                            <td colspan="6"></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div><br>
                                <?php } ?>
                            <?php
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <h3 style="text-align: center; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">
        <span class="site-heading-upper text-success mb-3" style="text-decoration: underline; line-height: 50px;">KETERANGAN HASIL DIAGNOSA</span>
    </h3><br>
    <!-- Section Start -->
    <section class="page-section about-heading">
        <div class="container">
            <div class="about-heading-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-8 mx-auto">
                        <?php
                        $query_hasil_diagnosa = mysqli_query($con, "SELECT * FROM tbl_hasil_diagnosa a 
                            JOIN tbl_diagnosa b ON a.id_diagnosa=b.id_diagnosa
                            JOIN tbl_penyakit c ON a.id_penyakit=c.id_penyakit WHERE a.id_diagnosa='$id_diagnosa'") or die(mysqli_error($con));
                        while ($row_hasil_diagnosa = mysqli_fetch_assoc($query_hasil_diagnosa)) {
                            $hasil_diagnosa[] = $row_hasil_diagnosa;
                        }
                        ?>
                        <table class="table table-bordered">
                            <thead>
                                <tr style="text-align:center;">
                                    <th style="width: 15%;">PENYAKIT</th>
                                    <th style="width: 40%;">KETERANGAN</th>
                                    <th style="width: 40%;">SOLUSI</th>
                                    <th style="width: 5%;">NILAI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($hasil_diagnosa as $row) { ?>
                                    <tr style="text-align: center">
                                        <td style="width: 15%;"><?= $row['nama']; ?></td>
                                        <td style="width: 40%; text-align:justify"><?= $row['kett']; ?></td>
                                        <td style="width: 40%; text-align:justify"><?= $row['solusi']; ?></td>
                                        <td style="width: 5%;"><?= $row['persentase']; ?>%</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col container text-right" style="margin-left: 12px;">
                <a class="btn btn-warning" href="../index.php">Halaman Utama</a>
                </button>
            </div>
        </div>
    </section><br>
</body>

</html>