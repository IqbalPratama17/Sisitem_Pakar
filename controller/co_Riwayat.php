<?php
class Riwayat
{
    function TampilSemua()
    {
        include "../koneksi.php";
        $query = mysqli_query(
            $con,
            "SELECT * FROM tbl_hasil_diagnosa JOIN tbl_diagnosa ON tbl_hasil_diagnosa.id_diagnosa=tbl_diagnosa.id_diagnosa"
        );
        $i = 0;
        while ($d = mysqli_fetch_array($query)) {
            $data[$i]['id_hasil_diagnosa'] = $d['id_hasil_diagnosa'];
            $data[$i]['id_diagnosa'] = $d['id_diagnosa'];
            $data[$i]['id_pasien'] = $d['id_pasien'];
            $data[$i]['id_penyakit'] = $d['id_penyakit'];
            $data[$i]['persentase'] = $d['persentase'];
            $i++;
        }
        return $data;
    }

    function TampilSemuaPakar()
    {
        include "../koneksi.php";
        $query = mysqli_query(
            $con,
            // "SELECT * FROM tbl_hasil_diagnosa JOIN tbl_diagnosa ON tbl_hasil_diagnosa.id_diagnosa=tbl_diagnosa.id_diagnosa"
            "SELECT * FROM tbl_hasil_diagnosa a 
            JOIN tbl_diagnosa b ON a.id_diagnosa=b.id_diagnosa
            JOIN tbl_pasien c ON c.id_pasien=b.id_pasien
            JOIN tbl_penyakit d ON a.id_penyakit=d.id_penyakit"
        );
        $i = 0;
        while ($h = mysqli_fetch_array($query)) {
            $data[$i]['id_diagnosa'] = $h['id_diagnosa'];
            $data[$i]['id_pasien'] = $h['id_pasien'];
            $data[$i]['tanggal'] = $h['tanggal'];
            $data[$i]['nama'] = $h['nama']; // Penyakit
            // $data[$i]['nama_gejala'] = $h['nama_gejala']; // Gejala
            $data[$i]['persentase'] = $h['persentase'];
            $i++;
        }
        return $data;
    }

    function TampilSatuData($id_diagnosa)
    {
        include "../koneksi.php";
        $query = mysqli_query($con, "SELECT * FROM tbl_hasil_diagnosa WHERE id_hasil_diagnosa = '$id_diagnosa'");
        $h = mysqli_fetch_object($query);
        $this->id_diagnosa = $h->id_diagnosa;
        $this->id_penyakit = $h->id_penyakit;
        $this->persentase = $h->persentase;
    }

    function SimpanDiagnosa($id_diagnosa, $id_pasien, $tanggal)
    {
        include "../koneksi.php";
        $tanggal = date("Y-m-d h:i:s");
        $id_pasien = $_POST['id_pasien'];
        $query = mysqli_query(
            $con,
            "INSERT INTO tbl_diagnosa(id_diagnosa, id_pasien, tanggal)
            VALUES ('$id_diagnosa', '$id_pasien', '$tanggal')"
        );
        return $query;
    }

    // public function InsertHasilDiagnosa($id_diagnosa, $id_pasien, $id_penyakit, $nilai_kepastian)
    // {
    //     include "../koneksi.php";
    //     $id_pasien = $_POST['id_pasien'];
    //     $id_penyakit = $_POST['id_penyakit'];
    //     $nilai_kepastian = $_POST['nilai_kepastian'];
    //     $query = mysqli_query(
    //         $con,
    //         "INSERT INTO tbl_hasil_diagnosa(id_diagnosa, id_pasien, id_penyakit, persentase)
    //         VALUES ('$id_diagnosa', '$id_pasien', '$id_penyakit', '$nilai_kepastian')"
    //     );
    // }

    function IdDiagnosa()
    {
        include "../koneksi.php";
        $query = mysqli_query($con, "SELECT max(id_diagnosa) as kodeDiagnosa FROM tbl_diagnosa");
        $data = mysqli_fetch_array($query);
        $kodeDiagnosa = $data['kodeDiagnosa'];

        $urutan = (int) substr($kodeDiagnosa, 3, 3);
        $urutan++;

        $huruf = "DNS";
        $kodeDiagnosa = $huruf . sprintf("%03s", $urutan);
        mysqli_close($con);
        return $kodeDiagnosa;
    }

    function Hapus($id_hasil_diagnosa)
    {
        include "../koneksi.php";
        $query = mysqli_query($con, "DELETE FROM tbl_hasil_diagnosa WHERE id_hasil_diagnosa = '$id_hasil_diagnosa'");
    }

    function Count()
    {
        include '../koneksi.php';
        $query = mysqli_query($con, "SELECT COUNT(*) as jum FROM diagnosa_penyakit");
        $hasil = mysqli_fetch_object($query);
        $this->jum = $hasil->jum;
    }
}
error_reporting(0); // Menghilangkan Error
