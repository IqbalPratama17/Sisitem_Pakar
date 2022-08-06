<?php
class Admin
{
    function TampilDataAdmin($id_admin)
    {
        include '../koneksi.php';
        $query = mysqli_query($con, "SELECT * FROM tbl_admin WHERE id_admin = '$id_admin'");
        $p = mysqli_fetch_object($query);
        $this->id_admin = $p->id_admin;
        $this->nama = $p->nama;
        $this->username = $p->username;
        $this->password = $p->password;
        $this->email = $p->email;
        $this->nohp = $p->nohp;
    }

    function PakarSemua()
    {
        include '../koneksi.php';
        $query = mysqli_query($con, "SELECT * FROM tbl_admin WHERE jabatan = 'pakar'");
        $i = 0;
        while ($d = mysqli_fetch_array($query)) {
            $data[$i]['id_admin'] = $d['id_admin'];
            $data[$i]['username'] = $d['username'];
            $data[$i]['nama'] = $d['nama'];
            $data[$i]['password'] = $d['password'];
            $data[$i]['email'] = $d['email'];
            $data[$i]['nohp'] = $d['nohp'];
            $i++;
        }
        return $data;
    }

    function TambahPakar($nama, $username, $password, $email, $nohp, $jabatan)
    {
        include "../koneksi.php";
        $query = mysqli_query($con, "INSERT INTO tbl_admin (nama, username, password, email, nohp, jabatan)
			values('$nama', '$username', '$password', '$email', '$nohp', '$jabatan')");
    }

    function UbahPakar($id_admin, $nama, $username, $password, $email, $nohp)
    {
        include "../koneksi.php";
        $query = mysqli_query($con, "UPDATE tbl_admin set nama='$nama', username='$username', password='$password', email='$email', nohp='$nohp' WHERE id_admin='$id_admin'");
    }

    function HapusPakar($id_admin)
    {
        include "../koneksi.php";
        $query = mysqli_query($con, "DELETE FROM tbl_admin WHERE id_admin = '$id_admin'");
    }

    function Login($username, $password)
    {
        include '../koneksi.php';
        $query = mysqli_query($con, "SELECT * FROM tbl_admin where username='$username' AND password='$password'");
    }
}
error_reporting(0);
