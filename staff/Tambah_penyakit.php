<?php
include 'a_header.php';
include "../controller/co_Penyakit.php";
$pt = new Penyakit;
// $pt->TampilAngka();
?>
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-5">
                <h4 class="page-title">Manajemen Tambah Penyakit</h4>
                <div class="d-flex align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="penyakit.php">Daftar Penyakit</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Penyakit</li>
                    </ol>
                </div>
            </div>
        </div>
    </div><br>

    <div class="container" style="margin-bottom: 5%;">
        <div class=" panel panel-default">
            <div class="panel-body">
                <!-- Form -->
                <form method="POST" action="../proses/P_Tambah_penyakit.php">
                    <div class="control-group after-add-more">
                        <div class="col panel-body text-right">
                            <button class="btn btn-warning add-more" type="button" style="margin: 5px;">
                                <i class="fas fa-plus"></i> Tambah Data
                            </button>
                            <button class="btn btn-success" type="submit" onclick="myalert()">
                                <i class="fas fa-save"></i> Simpan </button>
                            </button>
                        </div><br>
                        <!-- <div class="form-group">
                            <b><label class="col-md-12">Id Penyakit</label></b>
                            <div class="col-md-12">
                                <input type="text" value="" class="form-control form-control-line" name="id_penyakit" required="required">
                            </div>
                        </div> -->
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-line" name="nama[]" required placeholder="Nama Penyakit">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-line" name="kett[]" required placeholder="Keterangan Penyakit">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-line" name="solusi[]" required placeholder="Solusi Penyakit">
                            </div>
                            <hr>
                        </div>
                    </div>
                </form>
                <!-- class hide membuat form disembunyikan  -->
                <div class="copy invisible">
                    <div class="control-group">
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-line" name="nama[]" required placeholder="Nama Penyakit">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-line" name="kett[]" required placeholder="Keterangan Penyakit">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-line" name="solusi[]" required placeholder="Solusi Penyakit">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-danger remove" type="button">
                                    <i class="fas fa-trash-alt"></i> Remove
                                </button>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'b_footer.php'; ?>
</div>
<script>
    function myalert() {
        alert("Data Berhasil Ditambah");
    }
</script>
<!-- fungsi javascript untuk menampilkan form dinamis  -->
<!-- penjelasan : saat tombol add-more ditekan, maka akan memunculkan div dengan class copy -->
<script type="text/javascript">
    $(document).ready(function() {
        $(".add-more").click(function() {
            var html = $(".copy").html();
            $(".after-add-more").after(html);
        });

        // saat tombol remove dklik control group akan dihapus 
        $("body").on("click", ".remove", function() {
            $(this).parents(".control-group").remove();
        });
    });
</script>