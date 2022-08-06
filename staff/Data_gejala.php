<?php
include 'a_header.php';
include "../controller/co_gejala.php";
$gjl = new Gejala;
?>
<!-- Page wrapper  -->
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-5">
                <h4 class="page-title">Gejala Penyakit</h4>
                <div class="d-flex align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Gejala</li>
                    </ol>
                </div>
            </div>
            <div class="col text-right" style="margin-right: 29px;">
                <div class="text-right upgrade-btn">
                    <a href="Tambah_gejala.php" class="btn btn-dark text-white"><i class="mdi mdi-library-plus"></i> Tambah Data</a>
                </div>
            </div>
        </div>
    </div><!-- End Bread crumb and right sidebar toggle -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="example3" class="table table-hover table-bordered">
                    <thead style="background-color: #76B023; color: #ffffff;">
                        <tr>
                            <th style="color: white; width:10px;">
                                <center>KODE PENYAKIT</center>
                            </th>
                            <th style="color: white; width:10px;">
                                <center>KODE GEJALA</center>
                            </th>
                            <th style="color: white;">
                                <center>NAMA GEJALA</center>
                            </th>
                            <th style="color: white;">
                                <center>AKSI</center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = $gjl->TampilSemuaGejala();
                        if (!isset($data)) {
                        ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php
                        } else {
                            foreach ($data as $d) {
                            ?>
                                <tr>
                                    <td>
                                        <center><?php print $d['id_penyakit']; ?></center>
                                    </td>
                                    <td>
                                        <center><?php print $d['id_gejala']; ?></center>
                                    </td>
                                    <td>
                                        <?php print $d['nama']; ?>
                                    </td>
                                    <td>
                                        <center>
                                            <a href="Edit_gejala.php?id_gejala=<?php print $d['id_gejala']; ?>" class="btn btn-success btn-simple btn-sm" title="Edit Gejala">
                                                <i class="mdi mdi-marker"></i>
                                            </a>
                                            <a onclick="if (! confirm('Apakah anda yakin akan menghapus gejala dari daftar ?')) { return false; }" href="../proses/P_Hapus_gejala.php?id_gejala=<?php print $d['id_gejala']; ?>" class="btn btn-danger btn-simple btn-sm" title="Hapus Gejala">
                                                <i class="mdi mdi-delete-empty"></i>
                                            </a>
                                        </center>
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