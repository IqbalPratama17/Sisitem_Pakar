<?php
// //membuat koneksi
// // $con = mysqli_connect("localhost", "root", "", "latihan");
// include '../koneksi.php';


// //memasukkan data ke array
// $nama       = $_POST['nama'];
// $jk         = $_POST['jk'];
// $alamat     = $_POST['alamat'];
// $jurusan    = $_POST['jurusan'];

// $total = count($nama);


// //melakukan perulangan input
// for ($i = 0; $i < $total; $i++) {

//     mysqli_query($con, "insert into mahasiswa set
//             nama    = '$nama[$i]',
//             jk      = '$jk[$i]',
//             alamat  = '$alamat[$i]',
//             jurusan = '$jurusan[$i]'
//         ");
// }

// //kembali ke halaman sebelumnya
// header("location: index.php");

class Gejala
{
    function TampilSemuaGejala()
    {
        include "../koneksi.php";
        $query = mysqli_query(
            $con,
            "SELECT a.*, p.nama as nama_penyakit
			from tbl_gejala a, tbl_penyakit p
			where a.id_penyakit=p.id_penyakit"
        );

        $i = 0;
        while ($d = mysqli_fetch_array($query)) {
            $data[$i]['id_gejala'] = $d['id_gejala'];
            $data[$i]['id_penyakit'] = $d['id_penyakit'];
            $data[$i]['nama'] = $d['nama'];
            $data[$i]['nama_penyakit'] = $d['nama_penyakit'];
            $i++;
        }
        return $data;
    }
    function TampilSatuGejala($id_gejala)
    {
        include "../koneksi.php";
        $query = mysqli_query($con, "SELECT tbl_gejala.id_gejala, tbl_gejala.id_penyakit, tbl_aturan.bobot FROM tbl_gejala JOIN tbl_aturan ON tbl_aturan.id_gejala = tbl_gejala.id_gejala WHERE tbl_gejala.id_gejala='$id_gejala'")->fetch_object();
        return $query;
    }

    public function InsertDetailDiagnosa($id_diagnosa, $id_gejala, $id_penyakit, $bobot)
    {
        include "../koneksi.php";
        $query = mysqli_query(
            $con,
            "INSERT INTO tbl_detail_diagnosa(id_diagnosa, id_gejala, id_penyakit, bobot)
                VALUES ('$id_diagnosa','$id_gejala', '$id_penyakit', '$bobot')"
        );
    }

    // public function InsertHasilDiagnosa($id_diagnosa, $id_pasien, $id_penyakit, $nilai_kepastian)
    // {
    //     include "../koneksi.php";
    //     $id_pasien = $_POST['id_pasien'];
    //     $id_penyakit = $_POST['id_penyakit'];
    //     $nilai_kepastian = $_POST['persentase'];
    //     $query = mysqli_query(
    //         $con,
    //         "INSERT INTO tbl_hasil_diagnosa(id_diagnosa, id_pasien, id_penyakit, persentase)
    //         VALUES ('$id_diagnosa', '$id_pasien', '$id_penyakit', '$nilai_kepastian')"
    //     );
    // }

    function InsertGejala($id_gejala, $id_penyakit, $nama)
    {
        include "../koneksi.php";
        $query = mysqli_query(
            $con,
            "INSERT INTO tbl_gejala(id_gejala, id_penyakit, nama)
            VALUES ('$id_gejala', '$id_penyakit', '$nama')"
        );
        return ($query);
    }

    function InsertAturan($id_penyakit, $id_gejala)
    {
        include "../koneksi.php";
        $query = mysqli_query(
            $con,
            "INSERT INTO tbl_aturan(id_penyakit, id_gejala, bobot)
            VALUES ('$id_penyakit', '$id_gejala', '')"
        );
        return ($query);
    }

    function HapusGejala($id_gejala)
    {
        include "../koneksi.php";
        $query = mysqli_query($con, "DELETE FROM tbl_gejala WHERE id_gejala = '$id_gejala'");
    }

    function EditGejala($id_gejala, $nama)
    {
        include "../koneksi.php";
        $query = mysqli_query($con, "UPDATE tbl_gejala set nama='$nama' WHERE id_gejala='$id_gejala'");
    }

    function TampilSatuDataGejala($id_gejala)
    {
        include "../koneksi.php";
        $query = mysqli_query($con, "SELECT * FROM tbl_gejala WHERE id_gejala = '$id_gejala'");
        $g = mysqli_fetch_object($query);
        $this->id_gejala = $g->id_gejala;
        $this->nama = $g->nama;
    }

    // function TampilAngka()
    // {
    //     include "../koneksi.php";
    //     $query = mysqli_query($con, "SELECT max(id_gejala) as nilai FROM tbl_gejala");
    //     $g = mysqli_fetch_object($query);
    //     $this->nilai = $g->nilai;
    // }

    // NEW
    function IdGejala()
    {
        include "../koneksi.php";
        $query = mysqli_query($con, "SELECT max(id_gejala) as kodeGejala FROM tbl_gejala");
        $data = mysqli_fetch_array($query);
        $kodeGejala = $data['kodeGejala'];

        // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
        // dan diubah ke integer dengan (int)
        $urutan = (int) substr($kodeGejala, 3, 3);

        // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
        $urutan++;

        // membentuk kode barang baru
        // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
        // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
        // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
        $huruf = "GJL";
        $kodeGejala = $huruf . sprintf("%03s", $urutan);
        mysqli_close($con);
        return $kodeGejala;
    }


    //bagian halaman utama
    function TampilSemuaWeb()
    {
        include "../koneksi.php";
        $query = mysqli_query($con, "SELECT * from tbl_gejala");
        $i = 0;
        while ($d = mysqli_fetch_array($query)) {
            $data[$i]['id_gejala'] = $d['id_gejala'];
            $data[$i]['id_penyakit'] = $d['id_penyakit'];
            $data[$i]['nama'] = $d['nama'];
            $i++;
        }
        return $data;
    }
}
error_reporting(0);
