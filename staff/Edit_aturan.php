<?php
include 'a_header.php';
include "../controller/co_Aturan.php";
include "../controller/co_Gejala.php";
include "../controller/co_Penyakit.php";
$aturan = new BasisP;
$aturan->TampilSatuDataAturan($_GET['id_aturan']);
?>

<style>
    .container {
        margin-bottom: 21%;
        margin-left: 13%;
    }
</style>

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-5">
                <h4 class="page-title">Manajemen Ubah Aturan</h4>
                <div class="d-flex align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="Data_aturan.php">Data Aturan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Ubah Aturan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div><br><br>

    <div class="container" style="margin-bottom: 25%;">
        <div class="panel panel-default" style="margin-right: 160px;">
            <div class="panel-body">
                <form method="post" class="form-horizontal form-material" action="../proses/P_Edit_aturan.php">
                    <div style="margin-left: 623px;">
                        <button class="btn btn-success" type="submit" onclick="myalert()">
                            <i class="fas fa-exchange-alt"></i> Ubah Data
                        </button>
                    </div>
                    <div class="form-group">
                        <input type="hidden" value="<?php print $_GET['id_aturan'] ?>" name="id_aturan" />
                        <div class="form-group col-md-10">
                            <b><label class="text-left">Nama Penyakit</label></b>
                            <input type="text" value="<?php print $aturan->nama_penyakit; ?>" placeholder="" class="form-control form-control-line" name="nama" readonly="true">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8" style="margin-left: 10px;">
                            <b><label class="text-left">Nama Gejala</label></b>
                            <input type="text" value="<?php print $aturan->nama_gejala; ?>" class="form-control form-control-line" name="nama" required readonly="true">
                        </div>
                        <div class="form-group col-md-2">
                            <b><label class="text-left">Bobot Gejala</label></b>
                            <input style="max-width: 88%;" type="number" name="bobot" class="form-control" min="0" max="1" step="0.05" placeholder="0 - 1" value="<?php print $aturan->bobot; ?>">
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