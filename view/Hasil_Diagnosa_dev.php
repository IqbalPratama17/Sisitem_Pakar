<?php
include "../koneksi.php";
include "../controller/co_Gejala.php";
include "../controller/co_Riwayat.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16" href="../assetsA/assets/images/pakar.png">
    <title>Perhitungan</title>
    <link rel="icon" type="image/png" sizes="16x16" href="../assetsA/assets/images/pakar.png">
    <!-- Bootstrap core CSS -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../assets/css/business-casual.min.css" rel="stylesheet">


    <!-- CSS Inline -->
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

    <?php
    function hitung_densitas($m1_pasti, $m2_pasti)
    {
        $m1_tidak_pasti = 1 - $m1_pasti;
        $m2_tidak_pasti = 1 - $m2_pasti;
        $hitung_densitas = ($m1_pasti * $m2_pasti) + ($m1_tidak_pasti * $m2_pasti) + ($m1_pasti * $m2_tidak_pasti);
        return $hitung_densitas;
    }
    // ------------------------------------------------------------------------------------------------
    $id_diagnosa = $_GET['id_diagnosa'];
    $query_detail_diagnosa = mysqli_query(
        $con,
        "SELECT * FROM tbl_detail_diagnosa JOIN tbl_gejala WHERE tbl_gejala.id_gejala=tbl_detail_diagnosa.id_gejala 
        AND tbl_detail_diagnosa.id_diagnosa = '$id_diagnosa' ORDER BY id_detail_diagnosa"
    ) or die(mysqli_error($con));
    while ($row_detail_diagnosa = mysqli_fetch_assoc($query_detail_diagnosa)) {
        $data_detail_diagnosa[] = $row_detail_diagnosa;
    }

    $query_detail_diagnosa_grup_by = mysqli_query(
        $con,
        "SELECT * FROM tbl_detail_diagnosa JOIN tbl_gejala WHERE tbl_gejala.id_gejala=tbl_detail_diagnosa.id_gejala 
        AND tbl_detail_diagnosa.id_diagnosa = '$id_diagnosa' GROUP BY tbl_detail_diagnosa.id_penyakit ORDER BY id_detail_diagnosa"
    ) or die(mysqli_error($con));
    while ($row_detail_diagnosa_grup_by = mysqli_fetch_assoc($query_detail_diagnosa_grup_by)) {
        $data_detail_diagnosa_grup_by[] = $row_detail_diagnosa_grup_by;
    }

    $query_penyakit = mysqli_query($con, "SELECT * FROM tbl_penyakit") or die(mysqli_error($con));
    while ($row_penyakit = mysqli_fetch_assoc($query_penyakit)) {
        $data_penyakit[] = $row_penyakit;
    }
    // ------------------------------------------------------------------------------------------------
    ?>
</head>

<body style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
    <h1 class="site-heading text-center d-none d-lg-block">
        <span class="site-heading-upper text-warning mb-3" style="text-decoration: underline; line-height: 70px;">
            Hasil Diagnosa Penyakit Kesehatan Mental
        </span>
    </h1>
    <!-- Section Start -->
    <section class="page-section about-heading">
        <div class="container">
            <div class="about-heading-content">
                <div class="row">
                    <div class="col-xl-10 col-lg-8 mx-auto">
                        <div class="bg-faded rounded p-3">
                            <?php
                            foreach ($data_penyakit as $penyakit) {
                                // query detail diagnosa where id_penyakit trus count
                                $id_penyakit = $penyakit['id_penyakit'];
                                $query_num_row =  mysqli_query(
                                    $con,
                                    "SELECT count(*) AS jumlah_gejala FROM tbl_detail_diagnosa WHERE id_penyakit='$id_penyakit' AND id_diagnosa='$id_diagnosa'"
                                )->fetch_object();
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
                                                            <?php if ($detail['id_penyakit'] == $penyakit['id_penyakit']) { ?>
                                                                <tr>
                                                                    <td><?= $no++; ?></td>
                                                                    <td><?= $detail['id_gejala'] ?></td>
                                                                    <td><?= $detail['nama'] ?></td>
                                                                    <?php $kepastian[$penyakit['id_penyakit']][] = $detail['bobot'] ?>
                                                                    <td><?= $detail['bobot'] ?></td>
                                                                    <td><?= 1 - $detail['bobot'] ?></td>
                                                                </tr>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    <?php  } elseif ($query_num_row->jumlah_gejala > '2') { ?>
                                                        <?php $no = 1; ?>
                                                        <?php $index = 1; ?>
                                                        <?php foreach ($data_detail_diagnosa_limit_2 as $detail_limit_2) { ?>
                                                            <?php if ($detail_limit_2['id_penyakit'] == $penyakit['id_penyakit']) { ?>
                                                                <tr>
                                                                    <td><?= $no++; ?></td>
                                                                    <td><?= $detail_limit_2['id_gejala'] ?></td>
                                                                    <td><?= $detail_limit_2['nama'] ?></td>
                                                                    <?php $kepastian[$index][] = $detail_limit_2['bobot'] ?>
                                                                    <td><?= $detail_limit_2['bobot'] ?></td>
                                                                    <td><?= 1 - $detail_limit_2['bobot'] ?></td>
                                                                </tr>
                                                            <?php } ?>
                                                        <?php }
                                                        // rumus densitas m1 simpan ke array nilai_densitas index 0
                                                        $nilai_densitas[] = hitung_densitas($kepastian[$index][0], $kepastian[$index][1]);
                                                        ?>
                                                        <!-- no di sinih tandinya bernilai 3 saya ubah jadi 1 penyakit 5 nonya jadi urut 1,2,3 tapi di penyakit 1 no 3-nya ilang -->
                                                        <!-- kalo $no = 3 di penyakit 1 ada no 3-nya, tapi di penyakit 5 jadi 3,4,5 no-nya  -->
                                                        <?php $no = 3; ?>
                                                        <?php $i = 1; ?>
                                                        <?php $awl = 0; ?>
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
                                                            <?php } ?>
                                                        <?php }
                                                        // rumus densitas m1 simpan ke array nilai_densitas index 0
                                                        $nilai_densitas[] = hitung_densitas($kepastian[$index][$awl], $kepastian[$index][$i]);
                                                        $awl++;
                                                        $i++;
                                                        $index++;
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
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <?php $nilai_kepastian = Hitung_densitas($kepastian[$penyakit['id_penyakit']][0], $kepastian[$detail['id_penyakit']][1]); ?>
                                                                    <td><?= $nilai_kepastian ?></td>
                                                                    <td><?= 1 - $nilai_kepastian ?></td>
                                                                </tr>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    <?php  } elseif ($query_num_row->jumlah_gejala > '2') { ?>
                                                        <?php $no = 1; ?>
                                                        <?php foreach ($data_detail_diagnosa_limit_2 as $detail_limit_2) { ?>
                                                            <?php if ($detail_limit_2['id_penyakit'] == $penyakit['id_penyakit']) { ?>
                                                                <?php $kepastian[$penyakit['id_penyakit']][] = $detail_limit_2['bobot']; ?>
                                                                <?php $bobot_limit_2 = $detail_limit_2['bobot']; ?>
                                                            <?php } ?>
                                                        <?php }
                                                        // rumus densitas m1 simpan ke array nilai_densitas index 0
                                                        $nilai_densitas[] = hitung_densitas($kepastian[$penyakit['id_penyakit']][0], $kepastian[$penyakit['id_penyakit']][1]);
                                                        ?>

                                                        <?php $no = 3; ?>
                                                        <?php $i = 1; ?>
                                                        <?php $awl = 0; ?>
                                                        <?php foreach ($data_detail_diagnosa_offset_2 as $detail_offset_2) { ?>
                                                            <?php if ($detail_offset_2['id_penyakit'] == $penyakit['id_penyakit']) { ?>
                                                                <?php $kepastian[$penyakit['id_penyakit']][] = $detail_offset_2['bobot']; ?>
                                                            <?php } ?>
                                                        <?php }
                                                        // rumus densitas m1 simpan ke array nilai_densitas index 0
                                                        $nilai_densitas[] = hitung_densitas(end($nilai_densitas),  end($kepastian[$penyakit['id_penyakit']]));
                                                        $awl++;
                                                        $i++;
                                                        ?>

                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <?php $nilai_kepastian = end($nilai_densitas); ?>
                                                            <td><?= $nilai_kepastian ?></td>
                                                            <td><?= 1 - $nilai_kepastian ?></td>
                                                        </tr>
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

    <div class="container">
        <div class="about-heading-content">
            <div class="row">
                <div class="col-xl-12 col-lg-8 mx-auto">
                    <h3 style="text-align: center; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">
                        <span class="site-heading-upper text-success mb-3" style="text-decoration: underline; line-height: 50px;">KETERANGAN HASIL DIAGNOSA</span>
                    </h3>
                    <?php
                    foreach ($data_penyakit as $penyakit) {
                        // query detail diagnosa where id_penyakit trus count
                        $id_penyakit = $penyakit['id_penyakit'];
                        $query_num_row =  mysqli_query($con, "SELECT count(*) AS jumlah_gejala FROM tbl_detail_diagnosa WHERE id_penyakit='$id_penyakit' AND id_diagnosa='$id_diagnosa'")->fetch_object();
                        // echo $query_num_row->jumlah_gejala;

                    ?>
                        <table class="table table-bordered" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;text-align:center;">
                            <thead>
                                <tr style="text-align: center;">
                                    <th style="width: 15%;">Nama Penyakit</th>
                                    <th style="width: 40%;">Keterangan</th>
                                    <th style="width: 40%;">Solusi</th>
                                    <th style="width: 5%;">Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($query_num_row->jumlah_gejala == '2') { ?>
                                    <?php $no = 1; ?>
                                    <?php foreach ($data_detail_diagnosa as $detail) { ?>
                                        <?php if ($detail['id_penyakit'] == $penyakit['id_penyakit']) { ?>

                                            <?php $kepastian[$penyakit['id_penyakit']][] = $detail['bobot'] ?>

                                        <?php } ?>
                                    <?php } ?>
                                <?php  } elseif ($query_num_row->jumlah_gejala > '2') { ?>
                                    <?php $no = 1; ?>
                                    <?php $index = 1; ?>
                                    <?php foreach ($data_detail_diagnosa_limit_2 as $detail_limit_2) { ?>
                                        <?php if ($detail_limit_2['id_penyakit'] == $penyakit['id_penyakit']) { ?>

                                            <?php $kepastian[$index][] = $detail_limit_2['bobot'] ?>

                                        <?php } ?>
                                    <?php }
                                    // rumus densitas m1 simpan ke array nilai_densitas index 0
                                    $nilai_densitas[] = hitung_densitas($kepastian[$index][0], $kepastian[$index][1])
                                    ?>
                                    <?php $no = 3; ?>
                                    <?php $i = 1; ?>
                                    <?php $awl = 0; ?>
                                    <?php foreach ($data_detail_diagnosa_offset_2 as $detail_offset_2) { ?>
                                        <?php if ($detail_offset_2['id_penyakit'] == $penyakit['id_penyakit']) { ?>

                                            <?php $kepastian[$penyakit['id_penyakit']][] = $detail_offset_2['bobot'] ?>

                                        <?php } ?>
                                    <?php }
                                    // rumus densitas m1 simpan ke array nilai_densitas index 0
                                    $nilai_densitas[] = hitung_densitas($kepastian[$index][$awl],  $kepastian[$index][$i]);
                                    $awl++;
                                    $i++;
                                    $index++;
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

                                            <?php $nilai_kepastian = Hitung_densitas($kepastian[$penyakit['id_penyakit']][0], $kepastian[$detail['id_penyakit']][1]) ?>

                                        <?php } ?>
                                    <?php } ?>
                                    <tr>
                                        <td><?= $penyakit['nama'] ?></td>
                                        <td style="text-align: justify;"><?= $penyakit['kett'] ?></td>
                                        <td style="text-align: justify;"><?= $penyakit['solusi'] ?></td>
                                        <td style="text-align:center"><?= number_format(($nilai_kepastian * 100)); ?>%</td>
                                        <!-- <td><?= $nilai_kepastian * 100 ?>%</td> -->

                                        <!-- kodingan insert ke tabel baru -->
                                        <?php
                                        // query detail diagnosa where id_penyakit trus count
                                        // $id_pasien = $_GET['id_pasien'];
                                        // $query_pasien =  mysqli_query($con, "SELECT * FROM tbl_diagnosa WHERE id_diagnosa = 'id_pasien'")->fetch_object();
                                        // var_dump($query_pasien);
                                        // die();

                                        // $sql1 = "SELECT id_pasien FROM tbl_diagnosa WHERE id_diagnosa ='$id_diagnosa'";
                                        // $queryHasil = mysqli_query($con, $sql1);
                                        // $id_p = session_id('id_pasien');
                                        // session_start();

                                        // var_dump($id_p);
                                        // die();

                                        $sql = mysqli_query(
                                            $con,
                                            "INSERT INTO tbl_hasil_diagnosa(id_diagnosa, id_pasien, id_penyakit, persentase)
                                            VALUES ('$id_diagnosa', '$id_pasien', '$id_penyakit', '$nilai_kepastian')"
                                        );
                                        ?>
                                        <!-- end insert -->
                                    </tr>
                                <?php  } elseif ($query_num_row->jumlah_gejala > '2') { ?>
                                    <?php $no = 1; ?>
                                    <?php foreach ($data_detail_diagnosa_limit_2 as $detail_limit_2) { ?>
                                        <?php if ($detail_limit_2['id_penyakit'] == $penyakit['id_penyakit']) { ?>
                                            <?php $kepastian[$penyakit['id_penyakit']][] = $detail_limit_2['bobot'] ?>
                                            <?php $bobot_limit_2 = $detail_limit_2['bobot']; ?>
                                        <?php } ?>
                                    <?php }
                                    // rumus densitas m1 simpan ke array nilai_densitas index 0
                                    $nilai_densitas[] = hitung_densitas($kepastian[$penyakit['id_penyakit']][0], $kepastian[$penyakit['id_penyakit']][1])
                                    ?>

                                    <?php $no = 3; ?>
                                    <?php $i = 1; ?>
                                    <?php $awl = 0; ?>
                                    <?php foreach ($data_detail_diagnosa_offset_2 as $detail_offset_2) { ?>
                                        <?php if ($detail_offset_2['id_penyakit'] == $penyakit['id_penyakit']) { ?>
                                            <?php $kepastian[$penyakit['id_penyakit']][] = $detail_offset_2['bobot'] ?>
                                        <?php } ?>
                                    <?php }
                                    // rumus densitas m1 simpan ke array nilai_densitas index 0
                                    $nilai_densitas[] = hitung_densitas(end($nilai_densitas),  end($kepastian[$penyakit['id_penyakit']]));
                                    $awl++;
                                    $i++;
                                    ?>

                                    <?php $nilai_kepastian = end($nilai_densitas); ?>
                                    <tr>
                                        <td><?= $penyakit['nama'] ?></td>
                                        <td style="text-align: justify;"><?= $penyakit['kett'] ?></td>
                                        <td style="text-align: justify;"><?= $penyakit['solusi'] ?></td>
                                        <td style="text-align:center"><?= number_format(($nilai_kepastian * 100)); ?>%</td>
                                        <!-- <td><?= $nilai_kepastian * 100 ?>%</td> -->

                                    </tr>
                                    <!-- kodingan insert ke tabel baru -->
                                    <?php
                                    // $id_pasien = $_POST['id_pasien'];
                                    // $query_pasien =  mysqli_query($con, "SELECT * FROM tbl_diagnosa WHERE id_diagnosa = 'id_pasien'")->fetch_object();
                                    // var_dump($query_pasien);
                                    // die();

                                    $sql = mysqli_query(
                                        $con,
                                        "INSERT INTO tbl_hasil_diagnosa(id_diagnosa, id_pasien, id_penyakit, persentase)
                                        VALUES ('$id_diagnosa', '$id_pasien', '$id_penyakit', '$nilai_kepastian')"
                                    );
                                    ?>
                                    <!-- end insert -->
                                <?php } else { ?>

                                <?php } ?>
                            </tfoot>
                        </table>
                    <?php
                    } ?>
                </div>
            </div>
        </div>
        <center>
            <!-- <button class="btn btn-success" type="submit">Lihat Detail Perhitungan</button> -->
            <!-- <a href="../.php">Kembali ke Halaman Utama</a> -->
            <a href="../index.php">Kembali ke Halaman Utama</a>
        </center><br>
    </div>
</body>

</html>