<?php
class Penyakit
{
    function TampilSemua()
    {
        include "../koneksi.php";
        $query = mysqli_query($con, "SELECT * FROM tbl_penyakit");
        $i = 1;
        while ($d = mysqli_fetch_array($query)) {
            $data[$i]['id_penyakit'] = $d['id_penyakit'];
            $data[$i]['nama'] = $d['nama'];
            $data[$i]['kett'] = $d['kett'];
            $data[$i]['solusi'] = $d['solusi'];
            $i++;
        }
        return $data;
    }

    function InsertPenyakit($id_penyakit, $nama, $kett, $solusi)
    {
        include "../koneksi.php";
        $query = mysqli_query($con, "INSERT INTO tbl_penyakit(id_penyakit, nama, kett, solusi) VALUES('$id_penyakit', '$nama', '$kett', '$solusi')");
    }

    function HapusPenyakit($id_penyakit)
    {
        include "../koneksi.php";
        $query = mysqli_query($con, "DELETE FROM tbl_penyakit WHERE id_penyakit = '$id_penyakit'");
    }

    function EditDataPenyakit($id_penyakit, $nama, $kett, $solusi)
    {
        include "../koneksi.php";
        $query = mysqli_query(
            $con,
            "UPDATE tbl_penyakit SET nama='$nama', kett='$kett', solusi='$solusi' WHERE id_penyakit='$id_penyakit'"
        );
    }

    function TampilSatuDataPenyakit($id_penyakit)
    {
        include "../koneksi.php";
        $query = mysqli_query($con, "SELECT * FROM tbl_penyakit WHERE id_penyakit = '$id_penyakit'");
        $p = mysqli_fetch_object($query);
        $this->id_penyakit = $p->id_penyakit;
        $this->nama = $p->nama;
        $this->kett = $p->kett;
        $this->solusi = $p->solusi;
    }

    // function TampilAngka()
    // {
    //     include "../koneksi.php";
    //     $query = mysqli_query($con, "SELECT max(id_penyakit) AS nilai FROM tbl_penyakit");
    //     $g = mysqli_fetch_object($query);
    //     $this->nilai = $g->nilai;
    // }

    // NEW CODE
    function IdPenyakit()
    {
        include "../koneksi.php";
        $query = mysqli_query($con, "SELECT max(id_penyakit) as kodePenyakit FROM tbl_penyakit");
        $data = mysqli_fetch_array($query);
        $kodePenyakit = $data['kodePenyakit'];

        // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
        // dan diubah ke integer dengan (int)
        $urutan = (int) substr($kodePenyakit, 3, 3);

        // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
        $urutan++;

        // membentuk kode barang baru
        // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
        // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
        // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
        $huruf = "PNY";
        $kodePenyakit = $huruf . sprintf("%03s", $urutan);
        // mysqli_close($con);
        return $kodePenyakit;
    }
}
// error_reporting(0);
