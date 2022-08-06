<?php include 'A_header.php';
include "../controller/co_Pasien.php";
$p = new Pasien;
?>

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-5">
                <h4 class="page-title">Manajemen Pasien</h4>
                <div class="d-flex align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Pasien</li>
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
                                <thead style="background-color: #76B023; color: #ffffff;">
                                    <tr>
                                        <th style="color: white;">
                                            <center>NO</center>
                                        </th>
                                        <th style="color: white;">
                                            <center>NAMA PASIEN</center>
                                        </th>
                                        <th style="color: white;">
                                            <center>USIA PASIEN</center>
                                        </th>
                                        <th style="color: white;">
                                            <center>NO TELP</center>
                                        </th>
                                        <th style="color: white;">
                                            <center>ALAMAT</center>
                                        </th>
                                        <th style="color: white;">
                                            <center>AKSI</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $data = $p->TampilSemua($id_admin);
                                    if (!isset($data)) {
                                    ?>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <?php
                                    } else {
                                        $i = 0;
                                        foreach ($data as $d) {
                                            $i++;
                                        ?>
                                            <tr>
                                                <td>
                                                    <center><?php print $i; ?></center>
                                                </td>
                                                <td>
                                                    <center><?php print $d['nama']; ?></center>
                                                </td>
                                                <td>
                                                    <center><?php print $d['usia']; ?> Tahun</center>
                                                </td>
                                                <td>
                                                    <center><?php print $d['no_telp']; ?></center>
                                                </td>
                                                <td>
                                                    <center><?php print $d['alamat']; ?></center>
                                                </td>
                                                <td>
                                                    <center>
                                                        <!-- <a href="detail.php?id_pasien=<?php print $d['id_pasien']; ?>" class="btn btn-info btn-warning btn-sm text-white" title="Lihat Diagnosa Pasien">
                                                            <i class="mdi mdi-eye-outline"></i>
                                                        </a> -->
                                                        <a href="../view/Hasil_Diagnosa_dev_2.php?id_diagnosa=<?php print $d['id_diagnosa']; ?>" class="btn btn-info btn-warning btn-sm text-white" title="Lihat Diagnosa Pasien">
                                                            <i class="mdi mdi-eye-outline"></i>
                                                        </a>
                                                        <a onclick="if (! confirm('Apakah anda yakin akan menghapus pasien dari daftar ?')) { return false; }" href="../proses/P_Hapus_pasien.php?id_pasien=<?php print $d['id_pasien']; ?>" class="btn btn-danger btn-simple btn-sm text-white" title="Hapus Pasien">
                                                            <i class="mdi mdi-delete-empty"></i>
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