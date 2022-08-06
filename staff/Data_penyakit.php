<?php
include "a_header.php";
include "../controller/co_Penyakit.php";
$ps = new Penyakit;
?>

<!-- Start Pgae Wrapper -->
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-5">
                <h4 class="page-title">Daftar Penyakit Mental</h4>
                <div class="d-flex align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Nama Penyakit</li>
                    </ol>
                </div>
            </div>
            <div class="col text-right" style="margin-right: 29px;">
                <a href="Tambah_penyakit.php" class="btn btn-dark text-white">
                    <i class="mdi mdi-library-plus"></i> Tambah Data</a>
            </div>
        </div>
    </div>
    <!-- Start Container fluid  -->
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="example3" class="table table-hover table-bordered">
                    <thead style="background-color: #76B023; color: #ffffff;">
                        <tr style="text-align: center;">
                            <th style="color: white;">
                                ID PENYAKIT
                            </th>
                            <th style="color: white;">
                                NAMA PENYAKIT
                            </th>
                            <th style="color: white;">
                                KETERANGAN
                            </th>
                            <th style="color: white;">
                                SOLUSI
                            </th>
                            <th style="color: white" ; width="10%" ;>
                                AKSI
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = $ps->TampilSemua();
                        if (!isset($data)) {
                        ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php
                        } else {
                            foreach ($data as $d) {
                            ?>
                                <tr style="text-align: center;">
                                    <td>
                                        <?php print $d['id_penyakit']; ?>
                                    </td>
                                    <td>
                                        <?php print $d['nama']; ?>
                                    </td>
                                    <td style="text-align: justify;"><?php print $d['kett']; ?></td>
                                    <td style="text-align: justify;"><?php print $d['solusi']; ?></td>
                                    <td>
                                        <a href="Edit_penyakit.php?id_penyakit=<?php print $d['id_penyakit']; ?>" class="btn btn-success btn-simple btn-sm" title="Edit Penyakit">
                                            <i class="mdi mdi-marker"></i>
                                        </a>
                                        <a onclick="if (! confirm('Apakah anda yakin akan menghapus penyakit dari daftar ?')) { return false; }" href="../proses/P_Hapus_penyakit.php?id_penyakit=<?php print $d['id_penyakit']; ?>" class="btn btn-danger btn-simple btn-sm" title="Hapus Penyakit">
                                            <i class="mdi mdi-delete-empty"></i>
                                        </a>
                                    </td>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php include 'b_footer.php'; ?>
</div>