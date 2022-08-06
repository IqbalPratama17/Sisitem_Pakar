<?php
include '../koneksi.php';
?>

<!DOCTYPE html>
<html>

<head>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
            <div class="form-group">
                <p class="mt-4 text-sm text-right">
                    <a href="../index.php" class="text-primary text-gradient font-weight-bold">Beranda</a>
                </p>
                <label for="sel1">Kata Kunci:</label>
                <?php
                $kata_kunci = "";
                if (isset($_POST['kata_kunci'])) {
                    $kata_kunci = $_POST['kata_kunci'];
                }
                ?>
                <input type="text" name="kata_kunci" value="<?php echo $kata_kunci; ?>" class="form-control" required placeholder="Cari Data Pasien" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-info" value="Pilih">
            </div>
        </form>

        <table class="table table-bordered table-hover">
            <br>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pasien</th>
                    <th>Jenis Kelamin</th>
                    <th>Usia</th>
                    <th>No.Telp</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_POST['kata_kunci'])) {
                    $kata_kunci = trim($_POST['kata_kunci']);
                    $sql = "SELECT * FROM tbl_pasien WHERE id_pasien LIKE '%" . $kata_kunci . "%' OR nama LIKE '%" . $kata_kunci . "%' ORDER BY id_pasien ASC";
                } else {
                    $sql = "SELECT * from tbl_pasien order by id_pasien asc";
                }

                $hasil = mysqli_query($con, $sql);
                $no = 0;
                while ($data = mysqli_fetch_array($hasil)) {
                    $no++;
                ?>
            <tbody>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data["nama"]; ?></td>
                    <td><?php echo $data["jenis_kelamin"]; ?></td>
                    <td><?php echo $data["usia"]; ?></td>
                    <td><?php echo $data["no_telp"]; ?></td>
                    <td><?php echo $data["alamat"]; ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>