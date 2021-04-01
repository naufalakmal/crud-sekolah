<?php

include 'lib/library.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nis = htmlspecialchars(@$_POST['nis']);
    $nama_lengkap = htmlspecialchars(@$_POST['nama_lengkap']);
    $jenis_kelamin = htmlspecialchars(@$_POST['jenis_kelamin']);
    $id_kelas = htmlspecialchars(@$_POST['id_kelas']);
    $alamat = htmlspecialchars(@$_POST['alamat']);
    $golongan_darah = htmlspecialchars(@$_POST['golongan_darah']);  
    $ibu_kandung = htmlspecialchars(@$_POST['ibu_kandung']);

    $foto = @$_FILES['foto'];

    if (empty($nis)) {
        flash('error', 'Mohon masukkan Nis dengan benar');
    } else if (empty($nama_lengkap)) {
        flash('error', 'Mohon masukkan Nama lengkap anda');
    } else if (empty($id_kelas) && $_G) {
        flash('error', 'Mohon masukkan Kelas anda');
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

        $sql = "INSERT INTO siswa (nis,nama_lengkap,jenis_kelamin,id_kelas,alamat,golongan_darah,ibu_kandung, file) VALUES ('$nis','$nama_lengkap','$jenis_kelamin','$id_kelas','$alamat','$golongan_darah','$ibu_kandung', '$file')";

        if ($mysqli->query($sql)) {
            flash('success', 'Tambah data berhasil!');
            header('location: index.php');
        } else {
            flash('error', 'Gagal menambahkan data!');
            header('location: index.php');
        }
    }
}

$success = flash('success');
$error = flash('error');

$sqlKelas = "SELECT * FROM t_kelas";
$dataKelas = $mysqli->query($sqlKelas) or die($mysqli->error);

include 'views/v_tambah.php';
