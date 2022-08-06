<?php include "../koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16" href="../assetsA/assets/images/pakar.png">
    <title>Perhitungan</title>
    <link rel="icon" type="image/png" sizes="16x16" href="assetsA/assets/images/pakar.png">
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
</head>

<body>
    <div class="col-xl-9 col-lg-8 mx-auto">
        <div class="bg-faded rounded p-5">
            <?php
            function hitung_densitas($m1_pasti, $m2_pasti)
            {
                $m1_tidak_pasti = 1 - $m1_pasti;
                $m2_tidak_pasti = 1 - $m2_pasti;
                $hitung_densitas = ($m1_pasti * $m2_pasti) + ($m1_tidak_pasti * $m2_pasti) + ($m1_pasti * $m2_tidak_pasti);
                return $hitung_densitas;
            }
            ?>
            <table class="table table-hover table-bordered" style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
                <thead>
                    <tr class="table-warning">
                        <th style="text-align: center;">NO.</th>
                        <th style="text-align: center;">No ID</th>
                        <th style="text-align: center;">NAMA PASIEN</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $id_diagnosa = $_GET['id_diagnosa'];
                    //query ke database SELECT urut berdasarkan id yang paling besar
                    $sql = mysqli_query($con, "SELECT * FROM tbl_diagnosa JOIN tbl_pasien ON tbl_diagnosa.id_pasien=tbl_pasien.id_pasien WHERE tbl_diagnosa.id_diagnosa = '$id_diagnosa'") or die(mysqli_error($con));
                    //jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
                    if (mysqli_num_rows($sql) > 0) {
                        $id = 1;

                        //membuat variabel $no untuk menyimpan nomor urut
                        //melakukan perulangan while dengan dari query $sql
                        while ($data = mysqli_fetch_assoc($sql)) {
                            $id_diagnosa = $data['id_diagnosa'];
                            //menampilkan data perulangan
                            echo '
                                                    <tr>
                                                        <td style="text-align:center">' . $id . '</td>							
                                                        <td style="text-align:center">' . $data['id_pasien'] . '</td>					
                                                        <td style="text-align:center">' . $data['nama'] . '</td>					
                                                    </tr>
                                                    ';
                        }
                        //jika query menghasilkan nilai 0
                    } else {
                        echo '
                                                    <tr>
                                                        <td style="text-align:center;" colspan="3">Tidak ada data.</td>
                                                    </tr>
                                                    ';
                    }
                    ?>
                </tbody>
            </table>
            <br>
            <table class="table table-hover table-bordered" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                <thead>
                    <tr class="table-info">
                        <th style="text-align: center;">NO.</th>
                        <th style="text-align: center;">ID GEJALA</th>
                        <th style="text-align: center;">NAMA GEJALA</th>
                        <th style="text-align: center;">BOBOT</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //query ke database SELECT urut berdasarkan id yang paling besar
                    $sql = mysqli_query($con, "SELECT * FROM tbl_detail_diagnosa JOIN tbl_gejala WHERE tbl_gejala.id_gejala=tbl_detail_diagnosa.id_gejala AND tbl_detail_diagnosa.id_diagnosa = '$id_diagnosa'") or die(mysqli_error($con));
                    //jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
                    if (mysqli_num_rows($sql) > 0) {
                        //membuat variabel $no untuk menyimpan nomor urut
                        $id = 1;
                        $total_bayar = 0;
                        //melakukan perulangan while dengan dari query $sql
                        while ($data = mysqli_fetch_assoc($sql)) {
                            //menampilkan data perulangan
                            echo '
                                                <tr>
                                                    <td style="text-align:center">' . $id++ . '</td>							
                                                    <td style="text-align:center">' . $data['id_gejala'] . '</td>					
                                                    <td style="text-align:center">' . $data['nama'] . '</td>					
                                                    <td style="text-align:center">' . $data['bobot'] . '</td>					
                                                </tr>
                                            ';
                        }
                        //jika query menghasilkan nilai 0
                    } else {
                        echo '
                                                    <tr>
                                                        <td style="text-align:center;" colspan="3">Tidak ada data.</td>
                                                    </tr>
                                                    ';
                    }
                    ?>
                </tbody>
            </table>
            <br>
            <center>
                <h3 style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Langkah 1 Menentukan Nilai Ketidak Pasitian</h3>
            </center><br>
            <table class="table table-hover table-bordered" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                <thead>
                    <tr class="table-secondary">
                        <th style="text-align: center;">NO.</th>
                        <th style="text-align: center;">ID GEJALA</th>
                        <th style="text-align: center;">NAMA GEJALA</th>
                        <th style="text-align: center;">BOBOT</th>
                        <!-- <th style="text-align: center;">Kepastian</th> -->
                        <th style="text-align: center;">Ketidakpastian</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //query ke database SELECT urut berdasarkan id yang paling besar
                    $sql1 = mysqli_query($con, "SELECT * FROM tbl_detail_diagnosa JOIN tbl_gejala WHERE tbl_gejala.id_gejala=tbl_detail_diagnosa.id_gejala AND tbl_detail_diagnosa.id_diagnosa = '$id_diagnosa'") or die(mysqli_error($con));
                    //jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
                    if (mysqli_num_rows($sql1) > 0) {
                        //membuat variabel $no untuk menyimpan nomor urut
                        $id = 1;
                        $i = 1;
                        $total_bayar = 0;
                        //melakukan perulangan while dengan dari query $sql
                        while ($data1 = mysqli_fetch_assoc($sql1)) {

                            $data_awal[$i]['id_gejala'] = $data1['id_gejala'];
                            $data_awal[$i]['nama'] = $data1['nama'];
                            $data_awal[$i]['nilai_pasti'] = $data1['bobot'];
                            $data_awal[$i]['nilai_ketidak_pastian'] = 1 - $data1['bobot'];
                            $i++;
                            //menampilkan data perulangan
                            if ($data1['bobot'] > 0) {
                                $nilai_kepastian = $data1['bobot'];
                                $nilai_ketidakpastian =  1 - $nilai_kepastian;
                            } else {
                                $nilai_kepastian = $data1['bobot'];
                                $nilai_ketidakpastian = 0;
                            }
                            echo '
                                                <tr>
                                                    <td style="text-align:center">' . $id++ . '</td>
                                                    <td style="text-align:center">' . $data1['id_gejala'] . '</td>
                                                    <td style="text-align:center">' . $data1['nama'] . '</td>
                                                    <td style="text-align:center">' . $data1['bobot'] . '</td>
                                                    <td style="text-align:center">' . $nilai_ketidakpastian . '</td>					
                                                </tr>
                                            ';
                        }
                        //jika query menghasilkan nilai 0
                    } else {
                        echo '
                                                    <tr>
                                                        <td style="text-align:center;" colspan="3">Tidak ada data.</td>
                                                    </tr>
                                                    ';
                    }
                    ?>
                </tbody>
            </table>
            <br>
            <center>
                <h3 style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Langkah 2 Mengelompokkan banyaknya Gejala yang dipilih berdasarkan penyakit </h3>
            </center><br>
            <div class="table-responsive-sm">
                <?php
                $sqlKelompokanByPenyakit = mysqli_query($con, "SELECT * FROM tbl_detail_diagnosa JOIN tbl_penyakit WHERE tbl_penyakit.id_penyakit=tbl_detail_diagnosa.id_penyakit AND tbl_detail_diagnosa.id_diagnosa = '$id_diagnosa' GROUP BY tbl_detail_diagnosa.id_penyakit ORDER BY id_detail_diagnosa") or die(mysqli_error($con));
                if (mysqli_num_rows($sqlKelompokanByPenyakit) > 0) {
                    while ($kelompokPenyakit = mysqli_fetch_assoc($sqlKelompokanByPenyakit)) {
                        $jumlah_gejala = 0;
                ?>
                        <h6 style="font-family: Verdana, Geneva, Tahoma, sans-serif;">M1 <?= $kelompokPenyakit['nama']; ?></h6>
                        <?php
                        $id_penyakit = $kelompokPenyakit['id_penyakit'];
                        $sqlDetailDiagnosa = mysqli_query($con, "SELECT * FROM tbl_detail_diagnosa JOIN tbl_gejala WHERE tbl_gejala.id_gejala=tbl_detail_diagnosa.id_gejala AND tbl_detail_diagnosa.id_diagnosa = '$id_diagnosa' AND tbl_detail_diagnosa.id_penyakit = '$id_penyakit' ORDER BY id_detail_diagnosa") or die(mysqli_error($con));
                        $jumlah_row = mysqli_num_rows($sqlDetailDiagnosa);
                        if (mysqli_num_rows($sqlDetailDiagnosa) > 2) {
                        ?>
                            <table class="table table-hover table-bordered" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                                <thead>
                                    <tr class="table-success">
                                        <th style="text-align: center;">NO.</th>
                                        <th style="text-align: center;">ID GEJALA</th>
                                        <th style="text-align: center;">NAMA GEJALA</th>
                                        <th style="text-align: center;">Bobot</th>
                                        <th style="text-align: center;">Ketidakpastian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql2 = mysqli_query($con, "SELECT * FROM tbl_detail_diagnosa JOIN tbl_gejala WHERE tbl_gejala.id_gejala=tbl_detail_diagnosa.id_gejala AND tbl_detail_diagnosa.id_diagnosa = '$id_diagnosa' AND tbl_detail_diagnosa.id_penyakit = '$id_penyakit' ORDER BY id_detail_diagnosa limit 2") or die(mysqli_error($con));
                                    if (mysqli_num_rows($sql2) > 0) {
                                        $id = 1;
                                        $j = 1;
                                        $n = 0;
                                        $total_bayar = 0;
                                        while ($data2 = mysqli_fetch_assoc($sql2)) {
                                            $jumlah_gejala = $jumlah_gejala + 1;
                                            $data_nilai_gejala[] = $data2['bobot'];
                                            if ($data2['bobot'] > 0) {
                                                $nilai_kepastian = $data2['bobot'];
                                                $nilai_ketidakpastian =  1 - $nilai_kepastian;
                                            } else {
                                                $nilai_kepastian = $data2['bobot'];
                                                $nilai_ketidakpastian = 0;
                                            }
                                            echo '<tr>
                                                    <td style="text-align:center">' . $id++ . '</td>
                                                    <td style="text-align:center">' . $data2['id_gejala'] . '</td>
                                                    <td style="text-align:center">' . $data2['nama'] . '</td>
                                                    <td style="text-align:center">' . $nilai_kepastian . '</td>
                                                    <td style="text-align:center">' . $nilai_ketidakpastian . '</td>
                                                </tr>';
                                        } ?>
                                        <tr>
                                            <td style="text-align:center"></td>
                                            <td style="text-align:center"></td>
                                            <td style="text-align:center"></td>
                                            <?php $m[$n] =  hitung_densitas($data_nilai_gejala[0], $data_nilai_gejala[1]); ?>
                                            <td style="text-align:center"><?= $m[$n]; ?></td>
                                            <td style="text-align:center"><?= 1 - $m[$n]; ?></td>
                                        </tr>
                                    <?php
                                    } else {
                                        echo '
                                                    <tr>
                                                        <td style="text-align:center;" colspan="3">Tidak ada data.</td>
                                                    </tr>
                                                    ';
                                    }
                                    ?>
                                    <!-- disini -->
                                </tbody>
                            </table>
                            <?php
                            $m_number = 2;
                            $limit = 1;
                            $offset = 2;
                            for ($i = 0; $i < ($jumlah_row - 2); $i++) {
                            ?>
                                <h6 style="font-family: Verdana, Geneva, Tahoma, sans-serif;">M<?= $m_number++; ?> <?= $kelompokPenyakit['nama']; ?></h6>
                                <table class="table table-hover table-bordered" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                                    <thead>
                                        <tr class="table-success">
                                            <th style="text-align: center;">NO.</th>
                                            <th style="text-align: center;">ID GEJALA</th>
                                            <th style="text-align: center;">NAMA GEJALA</th>
                                            <th style="text-align: center;">Kepastian</th>
                                            <th style="text-align: center;">Ketidakpastian</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql2 = mysqli_query($con, "SELECT * FROM tbl_detail_diagnosa JOIN tbl_gejala WHERE tbl_gejala.id_gejala=tbl_detail_diagnosa.id_gejala AND tbl_detail_diagnosa.id_diagnosa = '$id_diagnosa' AND tbl_detail_diagnosa.id_penyakit = '$id_penyakit' ORDER BY id_detail_diagnosa LIMIT $limit OFFSET $offset") or die(mysqli_error($con));
                                        if (mysqli_num_rows($sql2) > 0) {
                                            $id = 1;
                                            $total_bayar = 0;
                                            while ($data2 = mysqli_fetch_assoc($sql2)) {
                                                $jumlah_gejala = $jumlah_gejala + 1;
                                                $data_nilai_gejala[$j] = $data2['bobot'];
                                                if ($data2['bobot'] > 0) {
                                                    $nilai_kepastian = $data2['bobot'];
                                                    $nilai_ketidakpastian =  1 - $nilai_kepastian;
                                                } else {
                                                    $nilai_kepastian = $data2['bobot'];
                                                    $nilai_ketidakpastian = 0;
                                                }
                                                echo '
                                                                    <tr>
                                                                        <td style="text-align:center">' . $id++ . '</td>							
                                                                        <td style="text-align:center">' . $data2['id_gejala'] . '</td>
                                                                        <td style="text-align:center">' . $data2['nama'] . '</td>
                                                                        <td style="text-align:center">' . $nilai_kepastian . '</td>
                                                                        <td style="text-align:center">' . $nilai_ketidakpastian . '</td>
                                                                    </tr>
                                                                ';
                                            } ?>
                                            <tr>
                                                <td style="text-align:center"></td>
                                                <td style="text-align:center"></td>
                                                <td style="text-align:center"></td>
                                                <?php $m[$j] =  hitung_densitas($m[$j - 1], $data_nilai_gejala[$j]); ?>
                                                <td style="text-align:center"><?= $m[$j]; ?></td>
                                                <td style="text-align:center"><?= 1 - $m[$j]; ?></td>
                                            </tr>
                                        <?php
                                        } else {
                                            echo '
                                                    <tr>
                                                        <td style="text-align:center;" colspan="5">Tidak ada data.</td>
                                                    </tr>
                                                    ';
                                        }
                                        ?>
                                    </tbody>
                                </table><br>
                            <?php
                                $offset++;
                                $j++;
                                $n++;
                            }
                            // $hasilAkhir[] = end($m) * $jumlah_gejala;
                            $hasilAkhir = end($m);
                            $sqlHasilKelompokanByPenyakit = mysqli_query($con, "SELECT * FROM tbl_detail_diagnosa JOIN tbl_penyakit WHERE tbl_penyakit.id_penyakit=tbl_detail_diagnosa.id_penyakit AND tbl_detail_diagnosa.id_diagnosa = '$id_diagnosa' GROUP BY tbl_detail_diagnosa.id_penyakit ORDER BY id_detail_diagnosa") or die(mysqli_error($con));
                            if (mysqli_num_rows($sqlHasilKelompokanByPenyakit) > 0) {
                                $p = 0;

                            ?>
                                <table class="table table-hover table-bordered" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">

                                    <?php
                                    while ($HasilkelompokPenyakit = mysqli_fetch_assoc($sqlHasilKelompokanByPenyakit)) {
                                        if ($id_penyakit == $HasilkelompokPenyakit['id_penyakit']) { ?>
                                            <tr>
                                                <td style="text-align:center"><b><?= $HasilkelompokPenyakit['nama']; ?></b></td>
                                                <td style="text-align:center"><?= number_format(($hasilAkhir * 100), 2, ".", "."); ?> %</td>
                                            </tr>
                                    <?php $p++;
                                        }
                                    } ?>
                                </table>
                            <?php   } ?><br>

                            <?php } else {

                            // ----------------------------- data 2 ----------------------------------



                            $sql2 = mysqli_query($con, "SELECT * FROM tbl_detail_diagnosa JOIN tbl_gejala WHERE tbl_gejala.id_gejala=tbl_detail_diagnosa.id_gejala AND tbl_detail_diagnosa.id_diagnosa = '$id_diagnosa' ORDER BY id_detail_diagnosa") or die(mysqli_error($con));
                            while ($data2 = mysqli_fetch_assoc($sql2)) {
                                $data_detail_diagnosa[] = $data2;
                            }
                            $sql3 = mysqli_query($con, "SELECT * FROM tbl_penyakit") or die(mysqli_error($con));
                            while ($data3 = mysqli_fetch_assoc($sql3)) {
                                $data_penyakit[] = $data3;
                            }
                            // var_dump($data_detail_diagnosa_limi2);
                            // die();
                            if (mysqli_num_rows($sql2) > 0) {
                                foreach ($data_penyakit as $grup_penyakit) { ?>
                                    <p><?= $grup_penyakit['nama'] ?></p>
                                    <table class="table table-hover table-bordered" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                                        <thead>
                                            <tr class="table-success">
                                                <th style="text-align: center;">NO.</th>
                                                <th style="text-align: center;">ID GEJALA</th>
                                                <th style="text-align: center;">NAMA GEJALA</th>
                                                <th style="text-align: center;">Kepastian</th>
                                                <th style="text-align: center;">Ketidakpastian</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        foreach ($data_detail_diagnosa as $detail) {
                                            if ($grup_penyakit['id_penyakit'] == $detail['id_penyakit']) { ?>
                                                <tbody>
                                                    <?php
                                                    $id = 1;
                                                    $j = 1;
                                                    $n = 0;
                                                    $total_bayar = 0;
                                                    $jumlah_gejala = $jumlah_gejala + 1;
                                                    $data_nilai_gejala[] = $detail['bobot'];
                                                    if ($detail['bobot'] > 0) {
                                                        $nilai_kepastian = $detail['bobot'];
                                                        $nilai_ketidakpastian =  1 - $nilai_kepastian;
                                                    } else {
                                                        $nilai_kepastian = $detail['bobot'];
                                                        $nilai_ketidakpastian = 0;
                                                    }
                                                    ?>

                                                    <tr>
                                                        <td style="text-align:center"><?= $id++ ?></td>
                                                        <td style="text-align:center"><?= $detail['id_gejala'] ?></td>
                                                        <td style="text-align:center"><?= $detail['nama'] ?></td>
                                                        <td style="text-align:center"><?= $nilai_kepastian ?></td>
                                                        <td style="text-align:center"><?= $nilai_ketidakpastian ?></td>
                                                    </tr>
                                            <?php }  // end if
                                        } // end foreach detail 
                                            ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td style="text-align:center"></td>
                                                        <td style="text-align:center"></td>
                                                        <td style="text-align:center"></td>
                                                        <?php $k[$j] =  hitung_densitas($data_nilai_gejala[$n], $data_nilai_gejala[1]); ?>
                                                        <td style="text-align:center"><?= $k[$j]; ?></td>
                                                        <td style="text-align:center"><?= 1 - $k[$j]; ?></td>
                                                    </tr>
                                                </tfoot>
                                    </table>
                                <?php } // end foreach grup penyakit
                                ?>
                            <?php
                            } // end if row sql 2
                            $hasilAkhir = end($k);
                            ?>
                            <br>
                    <?php
                            // $hasilAkhir[] = end($k) * $jumlah_gejala;
                            // $real_hasil_akhir[] = end($k);
                            // echo (end($k));
                            // echo "<br>";
                            // echo ($jumlah_gejala);
                            // echo "<br>";
                            // echo (end($k) * $jumlah_gejala);
                        }
                    }
                }
                // $total_hasil_akhir = array_sum($hasilAkhir);
                // echo "<br>";
                // echo  $total_hasil_akhir;

                // echo "<br>";
                // echo "<br>";
                $sqlHasilKelompokanByPenyakit = mysqli_query($con, "SELECT * FROM tbl_detail_diagnosa JOIN tbl_penyakit WHERE tbl_penyakit.id_penyakit=tbl_detail_diagnosa.id_penyakit AND tbl_detail_diagnosa.id_diagnosa = '$id_diagnosa' GROUP BY tbl_detail_diagnosa.id_penyakit ORDER BY id_detail_diagnosa") or die(mysqli_error($con));
                if (mysqli_num_rows($sqlHasilKelompokanByPenyakit) > 0) {
                    $p = 0;

                    ?>
                    <table class="table table-hover table-bordered" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">

                        <?php
                        while ($HasilkelompokPenyakit = mysqli_fetch_assoc($sqlHasilKelompokanByPenyakit)) {
                        ?>
                            <tr>
                                <td style="text-align:center"><b><?= $HasilkelompokPenyakit['nama']; ?></b></td>
                                <td style="text-align:center"><?= number_format(($hasilAkhir * 100), 2, ".", "."); ?> %</td>
                            </tr>
                        <?php $p++;
                        } ?>
                    </table>
                <?php   } ?><br>
                <center>
                    <!-- <button class="btn btn-success" type="submit">Lihat Detail Perhitungan</button> -->
                    <a href="../index.php">Kembali ke Halaman Utama</a>
                </center>
            </div>
        </div>
    </div>
</body>

</html>