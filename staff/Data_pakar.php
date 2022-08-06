<?php
include 'a_header.php';
include "../controller/co_Admin.php";
$p = new Admin;
?>
<!-- Page wrapper  -->
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-5">
                <h4 class="page-title">Data Pakar</h4>
                <div class="d-flex align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pakar</li>
                    </ol>
                </div>
            </div>
            <div class="col text-right" style="margin-right: 30px;">
                <div class="text-right upgrade-btn">
                    <a href="Tambah_Pakar.php" class="btn btn-dark text-white">
                        <i class="mdi mdi-library-plus"></i> Tambah Pakar
                    </a>
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
                                <center>NAMA</center>
                            </th>
                            <th style="color: white;">
                                <center>EMAIL</center>
                            </th>
                            <th style="color: white;">
                                <center>NO.HP</center>
                            </th>
                            <th style="color: white;">
                                <center>AKSI</center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = $p->PakarSemua();
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
                                        <center><?php print $d['nama']; ?></center>
                                    </td>
                                    <td>
                                        <center><?php print $d['email']; ?></center>
                                    </td>
                                    <td>
                                        <center><?php print $d['nohp']; ?></center>
                                    </td>
                                    <td>
                                        <center>
                                            <a href="Edit_pakar.php?id_admin=<?php print $d['id_admin']; ?>" class="btn btn-success btn-simple btn-sm" title="Edit Data Dokter">
                                                <i class="mdi mdi-marker"></i>
                                            </a>
                                            <a onclick="if (! confirm('Apakah anda yakin akan menghapus pakar dari daftar ?')) { return false; }" href="../proses/P_Hapus_pakar.php?id_admin=<?php print $d['id_admin']; ?>" class="btn btn-danger btn-simple btn-sm" title="Hapus Dokter">
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