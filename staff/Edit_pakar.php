<?php include 'a_header.php';

include "../controller/co_Admin.php";
$g = new Admin;
$g->TampilDataAdmin($_GET['id_admin']);

?>

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-5">
                <h4 class="page-title">Manajemen Ubah Data Pakar</h4>
                <div class="d-flex align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="Data_pakar.php">Pakar</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Ubah Data Pakar</li>
                    </ol>
                </div>
            </div>
        </div>
    </div><br>

    <div class="container" style="margin-bottom: 5%;">
        <div class=" panel panel-default">
            <div class="panel-body">
                <form method="post" class="form-horizontal form-material" action="../proses/P_Edit_pakar.php">
                    <div class="col panel-body text-right">
                        <button class="btn btn-success" type="submit" onclick="myalert()">
                            <i class="fas fa-save"></i> Simpan </button>
                        </button>
                    </div>
                    <div class="form-group">
                        <input type="hidden" value="<?php print $_GET['id_admin'] ?>" name="id_admin" />
                        <b><label class="col-md-12">Nama</label></b>
                        <div class="col-md-12">
                            <input type="text" value="<?php print $g->nama; ?>" class="form-control form-control-line" name="nama" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <b><label class="col-md-12">Username</label></b>
                        <div class="col-md-12">
                            <input type="text" value="<?php print $g->username; ?>" class="form-control form-control-line" name="username" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <b><label class="col-md-12">Password</label></b>
                        <div class="col-md-12">
                            <input type="password" value="<?php print $g->password; ?>" class="form-control form-control-line" name="password" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <b><label class="col-md-12">Email</label></b>
                        <div class="col-md-12">
                            <input type="email" value="<?php print $g->email; ?>" class="form-control form-control-line" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <b><label class="col-md-12">No HP</label></b>
                        <div class="col-md-12">
                            <input type="text" value="<?php print $g->nohp; ?>" class="form-control form-control-line" name="nohp">
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