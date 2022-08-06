<?php
include 'a_header.php';
include '../koneksi.php';
include "../controller/co_Penyakit.php";
$p = new Penyakit;
$p->TampilSatuDataPenyakit($_GET['id_penyakit']);

// NEW
// $id = $_GET['id_penyakit'];
// $show = mysqli_query($con, "SELECT * FROM ds_penyakit WHERE id_penyakit='$id'");
// if (mysqli_num_rows($show) == 0) {
//     echo '<script>window.history.back()</script>';
// } else {
//     $data = mysqli_fetch_assoc($show);
// }

?>
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-5">
                <h4 class="page-title">Edit Data Penyakit</h4>
                <div class="d-flex align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="Data_penyakit.php">Data Penyakit</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Penyakit</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-bottom: 12%;">
        <div class="panel panel-default">
            <div class="panel-body">
                <form method="post" class="form-horizontal form-material" action="../proses/P_Edit_penyakit.php">
                    <div class="col panel-body text-right">
                        <button class="btn btn-success" type="submit" onclick="myalert()">
                            <i class="fas fa-exchange-alt"></i> Ubah Data
                        </button>
                    </div>
                    <div class="form-group">
                        <input type="hidden" value="<?php print $_GET['id_penyakit']; ?>" name="id_penyakit" />
                        <b><label class="col-md-12">Kode Penyakit</label></b>
                        <div class="col-md-12">
                            <input type="text" value="<?php print $p->id_penyakit; ?>" class="form-control form-control-line" name="id_penyakit" readonly="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <b><label class="col-md-12">Nama Penyakit</label></b>
                        <div class="col-md-12">
                            <input type="text" class="form-control form-control-line" value="<?php print $p->nama; ?>" name="nama" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <b><label for="example-email" class="col-md-12">Keterangan</label></b>
                        <div class="col-md-12">
                            <input type="text" class="form-control form-control-line" value="<?php print $p->kett; ?>" name="kett" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <b><label for="example-email" class="col-md-12">Solusi Penanganan</label></b>
                        <div class="col-md-12">
                            <input type="text" class="form-control form-control-line" value="<?php print $p->solusi; ?>" name="solusi" required>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include 'b_footer.php'; ?>
</div>
<script>
    function myalert() {
        alert("Data Berhasil Diubah");
    }
</script>