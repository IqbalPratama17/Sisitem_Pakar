<?php
class Pasien
{
    function TampilSemua()
    {
        include "../koneksi.php";
        $query = mysqli_query(
            $con,
            // "SELECT * FROM tbl_pasien"
            "SELECT * FROM tbl_diagnosa a 
            JOIN tbl_pasien c ON c.id_pasien=a.id_pasien"
        );
        $i = 0;
        while ($d = mysqli_fetch_array($query)) {
            $data[$i]['id_diagnosa'] = $d['id_diagnosa'];
            $data[$i]['id_pasien'] = $d['id_pasien'];
            $data[$i]['nama'] = $d['nama'];
            $data[$i]['jenis_kelamin'] = $d['jenis_kelamin'];
            $data[$i]['no_telp'] = $d['no_telp'];
            $data[$i]['tgl_lahir'] = $d['tgl_lahir'];
            $data[$i]['usia'] = $d['usia'];
            $data[$i]['alamat'] = $d['alamat'];
            $i++;
        }
        return $data;
    }

    // function TampilDetailPasien($id_pasien)
    // {
    // }

    function TambahPasien($id_pasien, $nama, $jenis_kelamin, $no_telp, $tgl_lahir, $usia, $alamat)
    {
        include "../koneksi.php";
        $query = mysqli_query($con, "INSERT INTO tbl_pasien (id_pasien, nama, jenis_kelamin, no_telp, tgl_lahir, usia, alamat) VALUES ('$id_pasien','$nama', '$jenis_kelamin', '$no_telp', '$tgl_lahir', '$usia', '$alamat')");
        return $query;
    }

    function Hapus($id_pasien)
    {
        include "../koneksi.php";
        $query - mysqli_query($con, "DELETE FROM tbl_pasien WHERE id_pasien = '$id_pasien'");
    }

    function TampilSatuData($id_pasien)
    {
        include "../koneksi.php";
        $query = mysqli_query($con, "SELECT * FROM new_pasien WHERE id_pasien = '$id_pasien'");
        $g = mysqli_fetch_object($query);
        $this->nama = $g->nama;
        $this->jenis_kelamin = $g->jenis_kelamin;
        $this->no_telp = $g->no_telp;
        $this->tgl_lahir = $g->tgl_lahir;
        $this->usia = $g->usia;
        $this->alamat = $g->alamat;
    }

    function IdPasien()
    {
        include "../koneksi.php";
        $query = mysqli_query($con, "SELECT max(id_pasien) as kodePasien FROM tbl_pasien");
        $data = mysqli_fetch_array($query);
        $kodePasien = $data['kodePasien'];

        // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
        // dan diubah ke integer dengan (int)
        $urutan = (int) substr($kodePasien, 3, 3);

        // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
        $urutan++;

        // membentuk kode barang baru
        // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
        // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
        // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
        $huruf = "PSN";
        $kodePasien = $huruf . sprintf("%03s", $urutan);
        mysqli_close($con);
        return $kodePasien;
    }
}
error_reporting(0);
