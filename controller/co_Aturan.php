<?php
class BasisP
{
    function TampilSemua()
    {
        include "../koneksi.php";
        $query = mysqli_query(
            $con,
            "SELECT a.*, g.nama AS nama_gejala,p.nama AS nama_penyakit 
			FROM tbl_aturan a 
			JOIN tbl_gejala g ON a.id_gejala=g.id_gejala
			JOIN tbl_penyakit p ON a.id_penyakit=p.id_penyakit"
        );

        //$query = mysqli_query($con, "SELECT * from ds_aturan a, ds_penyakit b, ds_gejala c where b.id = a.id_penyakit");

        $i = 0;
        while ($d = mysqli_fetch_array($query)) {
            $data[$i]['id_aturan'] = $d['id_aturan'];
            $data[$i]['id_penyakit'] = $d['id_penyakit'];
            $data[$i]['id_gejala'] = $d['id_gejala'];
            $data[$i]['bobot'] = $d['bobot'];
            $data[$i]['nama_penyakit'] = $d['nama_penyakit'];
            $data[$i]['nama_gejala'] = $d['nama_gejala'];
            $i++;
        }
        return $data;
    }

    function TampilSemuaPenyakit()
    {
        include "../koneksi.php";
        $query = mysqli_query(
            $con,
            "SELECT * FROM tbl_penyakit"
        );

        //$query = mysqli_query($con, "SELECT * from ds_aturan a, ds_penyakit b, ds_gejala c where b.id = a.id_penyakit");

        $i = 0;
        while ($d = mysqli_fetch_array($query)) {
            $data[$i]['id_penyakit'] = $d['id_penyakit'];
            $data[$i]['nama'] = $d['nama'];
            $data[$i]['kett'] = $d['kett'];
            $data[$i]['solusi'] = $d['bobot'];
            $i++;
        }
        return $data;
    }

    function TampilSemuaGejala()
    {
        include "../koneksi.php";
        $query = mysqli_query(
            $con,
            "SELECT * FROM tbl_gejala"
        );

        //$query = mysqli_query($con, "SELECT * from ds_aturan a, ds_penyakit b, ds_gejala c where b.id = a.id_penyakit");

        $i = 0;
        while ($d = mysqli_fetch_array($query)) {
            $data[$i]['id_gejala'] = $d['id_gejala'];
            $data[$i]['id_penyakit'] = $d['id_penyakit'];
            $data[$i]['nama'] = $d['nama'];
            $i++;
        }
        return $data;
    }

    function TampilSatuDataAturan($id)
    {
        include "../koneksi.php";
        $query = mysqli_query(
            $con,
            // "SELECT a.*, g.nama AS nama_gejala, p.nama AS nama_penyakit
            // FROM ds_aturan a, ds_gejala g, ds_penyakit p
            // WHERE a.id_aturan=p.id_penyakit
            // AND a.id_aturan = g.id_gejala
            // AND a.id_aturan = '$id'"
            "SELECT a.*, g.nama AS nama_gejala,p.nama AS nama_penyakit 
			FROM tbl_aturan a 
			JOIN tbl_gejala g ON a.id_gejala=g.id_gejala
			JOIN tbl_penyakit p ON a.id_penyakit=p.id_penyakit"
        );
        $aturan = mysqli_fetch_object($query);
        $this->id_penyakit = $aturan->id_penyakit;
        $this->id_gejala = $aturan->id_gejala;
        $this->bobot = $aturan->bobot;
        $this->nama_penyakit = $aturan->nama_penyakit;
        $this->nama_gejala = $aturan->nama_gejala;
    }

    function HapusBasis($id_aturan)
    {
        include "../koneksi.php";
        $query = mysqli_query($con, "DELETE FROM tbl_aturan WHERE id_aturan = '$id_aturan'");
    }

    function InsertBasis($id_penyakit, $id_gejala, $bobot)
    {
        include "../koneksi.php";
        $query = mysqli_query($con, "INSERT INTO tbl_aturan (id_penyakit, id_gejala, bobot)
    		values('$id_penyakit', '$id_gejala', '$bobot')");
    }

    function EditBasis($id_aturan, $id_penyakit, $id_gejala, $bobot)
    {
        include "../koneksi.php";
        $query2 = mysqli_query(
            $con,
            "UPDATE tbl_aturan
            SET bobot='$bobot'
            WHERE id_aturan = '$id_aturan'"
        );
    }
}
error_reporting(0);
