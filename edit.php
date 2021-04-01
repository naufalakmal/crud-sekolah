<?php

include 'lib/library.php';



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nis = $_POST['nis'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $id_kelas = $_POST['id_kelas'];
    $alamat = $_POST['alamat'];
    $golongan_darah = $_POST['golongan_darah'];
    $ibu_kandung = $_POST['ibu_kandung'];
    $file = $_POST['foto'];
    $foto = $_FILES['foto'];

    $nis = $_POST['nis'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $id_kelas = $_POST['id_kelas'];
    $alamat = $_POST['alamat'];
    $golongan_darah = $_POST['golongan_darah'];
    $ibu_kandung = $_POST['ibu_kandung'];
    $file = $_POST['foto'];
    $foto = $_FILES['foto'];

    if (empty($nama_lengkap)) {
        flash('error', 'Mohon masukkan Nama lengkap anda');
    } else if (empty($id_kelas)) {
        flash('error', 'Mohon masukkan Kelas yang benar anda');
    } else {
        if (!empty($foto) and $foto['error'] == 0) {
            $path = './assets/images/';
            $upload = move_uploaded_file($foto['tmp_name'], $path . $foto['name']);

            if (!$upload) {
                flash('error', "Upload file gagal");
                header('location:index.php');
            }
            $file = $foto['name'];
        } else {
            $file = "default.png";
        }
    }

    $sql = "UPDATE siswa SET
                nama_lengkap = '$nama_lengkap',
                jenis_kelamin = '$jenis_kelamin',
                id_kelas = '$id_kelas',
                alamat = '$alamat',
                golongan_darah = '$golongan_darah',
                ibu_kandung = '$ibu_kandung',
                file = '$file'
            WHERE nis = $nis;
            ";

    $mysqli->query($sql) or die($mysqli->error);

    header('location: index.php');
}

$nis = $_GET['nis'];

if (empty($nis)) header('location: index.php');

// data siswa
$sql = "SELECT * FROM siswa WHERE nis = '$nis'";
$query = $mysqli->query($sql);
$siswa = $query->fetch_array();

// Ambil data kelas
$sqlKelas = "SELECT * FROM t_kelas";
$dataKelas = $mysqli->query($sqlKelas) or die($mysqli->error);

if (empty($siswa)) header('location: index.php');

include 'views/v_tambah.php';
