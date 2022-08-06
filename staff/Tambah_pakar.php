<?php
include 'a_header.php';
?>
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-5">
                <h4 class="page-title">Tambah Pakar</h4>
                <div class="d-flex align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="dokter.php">Data Pakar</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Pakar</li>
                    </ol>
                </div>
            </div>
        </div>
    </div><br>

    <div class="container" style="margin-bottom: 5%;">
        <div class=" panel panel-default">
            <div class="panel-body">
                <form method="post" class="form-horizontal form-material" action="../proses/P_Tambah_pakar.php">
                    <div class="control-group after-add-more">
                        <div class="col panel-body text-right">
                            <button class="btn btn-success" type="submit" onclick="myalert()">
                                <i class="fas fa-save"></i> Simpan </button>
                            </button>
                        </div>
                        <div class="form-group">
                            <b><label class="col-md-12">Nama Pakar</label></b>
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-line" name="nama" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <b><label class="col-md-12">Username</label></b>
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-line" name="username" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <b><label class="col-md-12">Password</label></b>
                            <div class="col-md-12">
                                <input type="password" class="form-control form-control-line" name="password" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <b><label class="col-md-12">Email</label></b>
                            <div class="col-md-12">
                                <input type="email" class="form-control form-control-line" name="email" placeholder="ex@gamail.com">
                            </div>
                        </div>
                        <div class="form-group">
                            <b><label class="col-md-12">No HP</label></b>
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-line" name="nohp" placeholder="+62">
                            </div>
                        </div>
                        <input type="hidden" value="pakar" name="jabatan">
                    </div>
                </form>
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