<?php include 'A_header.php';

include "../controller/co_Riwayat.php";
?>

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-5">
                <h4 class="page-title">Manajemen Rekam Medis </h4>
                <div class="d-flex align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="pasien.php">Data Pasien</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Rekam Medis</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="bootstrap-data-table" class="table table-hover table-bordered">
                                <thead style="background-color: #336699; color: #ffff;">
                                    <tr style="text-align: center;">
                                        <!-- <th style="color: white;" width="5%">NO</th> -->
                                        <th style="color: white;">ID PASIEN</th>
                                        <th style="color: white;">TANGGAL</th>
                                        <th style="color: white;">PENYAKIT</th>
                                        <th style="color: white;">PERSENTASE</th>
                                        <th style="color: white;">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Sementara
                                    $p = new Riwayat;
                                    $data = $p->TampilSemuaPakar();
                                    if (!isset($data)) {
                                    ?>
                                        <tr>
                                            <!-- <td></td> -->
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <?php
                                    } else {
                                        $i = 0;
                                        foreach ($data as $r) {
                                            $i++;
                                        ?>
                                            <tr>
                                                <!-- <td>
                                                    <center><?php print $r['id_diagnosa']; ?></center>
                                                </td> -->
                                                <td>
                                                    <center><?php print $r['id_pasien']; ?></center>
                                                </td>
                                                <td>
                                                    <center><?php print Date("d-m-Y", strtotime($r['tanggal'])); ?> <br><?php print Date("h:i:s", strtotime($r['tanggal'])); ?></center>
                                                    <!-- <center><?php print $r['tanggal']; ?></center> -->
                                                </td>
                                                <td>
                                                    <!-- Penyakit -->
                                                    <center><?php print $r['nama']; ?></center>
                                                </td>
                                                <td>
                                                    <center><?php print $r['persentase']; ?>%</center>
                                                </td>
                                                <td>
                                                    <center>
                                                        <a href="../view/Hasil_Diagnosa_dev_2.php?id_diagnosa=<?php print $r['id_diagnosa']; ?>" class="btn btn-info btn-warning btn-sm text-white" title="Lihat Diagnosa Pasien">
                                                            <i class="mdi mdi-eye-outline"></i>
                                                        </a>
                                                    </center>
                                                </td>
                                            </tr>
                                    <?php }
                                    } ?>
                                </tbody>
                            </table>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'B_footer.php'; ?>