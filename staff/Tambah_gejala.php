<?php
include 'a_header.php';
include "../controller/co_Gejala.php";
$tt = new Gejala;

include "../controller/co_Penyakit.php";
$t = new Penyakit;
$data = $t->TampilSemua();
?>

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-5">
                <h4 class="page-title">Manajemen Tambah Gejala</h4>
                <div class="d-flex align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="gejala.php">Data Gejala</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Gejala</li>
                    </ol>
                </div>
            </div>
        </div>
    </div><br>

    <div class="container" style="margin-bottom: 10%;">
        <div class="panel panel-default">
            <div class="panel-body">
                <!-- membuat form  -->
                <!-- gunakan tanda [] untuk menampung array  -->
                <form action="../proses/P_Tambah_gejala.php" method="POST">
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
                            <b><label class="col-md-12">Kode Gejala</label></b>
                            <div class="col-md-12">
                                <input type="text" value="" class="form-control form-control-line" name="id_gejala" readonly="true">
                            </div>
                        </div> -->

                        <div class="form-group">
                            <div class="col-md-12">
                                <select class="form-control form-control-line" name="id_penyakit[]" required="">
                                    <?php foreach ($data as $d) {
                                    ?>
                                        <option value="" disabled selected hidden>Pilih Penyakit</option>
                                        <option value="<?php print $d['id_penyakit']; ?>"><?php print $d['nama']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-line" name="nama[]" required="" placeholder="Isi gejala sesuai dengan penyakit" autocomplete="off">
                                <hr>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- class hide membuat form disembunyikan  -->
                <!-- hide adalah fungsi bootstrap 3, klo bootstrap 4 pake invisible  -->
                <div class="copy invisible">
                    <div class="control-group">

                        <div class="form-group">
                            <div class="col-md-12">
                                <select class="form-control form-control-line" name="id_penyakit[]" required>
                                    <?php foreach ($data as $d) {
                                    ?>
                                        <option value="" disabled selected hidden>Pilih Penyakit</option>
                                        <option value="<?php print $d['id_penyakit']; ?>"><?php print $d['nama']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-line" name="nama[]" required="" placeholder="Isi gejala sesuai dengan penyakit" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-danger remove" type="button">
                                    <i class="fas fa-trash-alt"></i> Remove
                                </button>
                                <hr>
                            </div>
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