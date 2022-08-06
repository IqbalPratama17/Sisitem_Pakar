<?php
include 'a_header.php';
include "../controller/co_riwayat.php";
$r = new Riwayat;
?>
<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb and right sidebar toggle -->
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-5">
                <h4 class="page-title">Riwayat Diagnosa</h4>
                <div class="d-flex align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Riwayat Diagnosa</li>
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
                                <center>ID DIAGNOSA</center>
                            </th>
                            <th style="color: white;">
                                <center>ID PASIEN</center>
                            </th>
                            <th style="color: white;">
                                <center>ID PENYAKIT</center>
                            </th>
                            <th style="color: white;">
                                <center>PERSENTASE</center>
                            </th>
                            <th style="color: white;">
                                <center>AKSI</center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = $r->TampilSemua();
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
                                        <center><?php print $d['id_diagnosa']; ?></center>
                                    </td>
                                    <td>
                                        <center><?php print $d['id_pasien']; ?></center>
                                    </td>
                                    <td>
                                        <center><?php print $d['id_penyakit']; ?></center>
                                    </td>
                                    <td>
                                        <center><?php print $d['persentase']; ?>%</center>
                                        <!-- <center><?php print number_format(($d['persentase'] * 100)); ?>%</center> -->
                                    </td>
                                    <td>
                                        <center>
                                            <a onclick="if (! confirm('Apakah anda yakin akan menghapus riwayat diagnosa dari daftar ?')) { return false; }" href="../proses/P_Hapus_Riwayat.php?id_hasil_diagnosa=<?php print $d['id_hasil_diagnosa']; ?>" class="btn btn-danger btn-simple btn-sm" title="Hapus Riwayat">
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