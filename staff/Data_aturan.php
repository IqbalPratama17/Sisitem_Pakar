<?php
include 'a_header.php';
include "../controller/co_Aturan.php";
include "../controller/co_Gejala.php";
include "../controller/co_Penyakit.php";

$basis = new BasisP;
$data = $basis->TampilSemua();

?>
<!-- Page wrapper  -->
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-5">
                <h4 class="page-title">Basis Pengetahuan</h4>
                <div class="d-flex align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Basis Pengetahuan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div> <!-- End Bread crumb and right sidebar toggle -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <div class="col-12">
            <div class="table-responsive">
                <table id="bootstrap-data-table" class="table table-hover table-bordered">
                    <thead style="background-color: #76B023; color: #ffffff;">
                        <tr>
                            <th style="color: white;">
                                <center>NO</center>
                            </th>
                            <th style="color: white;">
                                <center>NAMA PENYAKIT</center>
                            </th>
                            <th style="color: white;">
                                <center>NAMA GEJALA</center>
                            </th>
                            <th style="color: white;">
                                <center>NILAI KEPERCAYAAN</center>
                            </th>
                            <th style="color: white;" width="10%">
                                <center>AKSI</center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
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
                            $i = 0;
                            foreach ($data as $d) {
                                $i++;
                            ?>
                                <tr>
                                    <td>
                                        <center><?php print $i; ?></center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php print $d['nama_penyakit']; ?></center>
                                    </td>
                                    <td><?php print $d['nama_gejala']; ?></td>
                                    <td>
                                        <center><?php print $d['bobot']; ?></center>
                                    </td>
                                    <td>
                                        <center>
                                            <a href="Edit_aturan.php?id_aturan=<?php print $d['id_aturan']; ?>" class="btn btn-success btn-simple btn-sm" title="Edit Basis Pengetahuan">
                                                <i class="mdi mdi-marker"></i>
                                            </a>
                                            <a onclick="if (! confirm('Apakah anda yakin akan menghapus basis pengetahuan dari daftar ?')) { return false; }" href="../proses/P_Hapus_aturan.php?id_aturan=<?php print $d['id_aturan']; ?>" class="btn btn-danger btn-simple btn-sm" title="Hapus Basis Pengetahuan">
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