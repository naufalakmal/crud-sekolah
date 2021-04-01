<?php

include 'lib/library.php';

cekLogin();

$sql = "SELECT * FROM siswa INNER JOIN t_kelas ON (siswa.id_kelas = t_kelas.id_kelas)";

// Searching
$search = @$_GET['search'];
if (!empty($search)) $sql .=  " WHERE nis LIKE '%$search%' OR nama_lengkap LIKE '%$search%' OR ibu_kandung LIKE '%$search%' OR jenis_kelamin LIKE '%$search%' OR alamat LIKE '%$search%' OR golongan_darah LIKE '%$search%' OR nama_kelas LIKE '%$search%' ";

// Orderings
$order_field = @$_GET['sort']; // Mengambil Field yang akan di order
$order_mode = @$_GET['order']; // Mengambil mode nya, Ascending atau Descanding

if (!empty($order_field) && !empty($order_mode)) $sql .= " ORDER BY $order_field $order_mode";

$listSiswa = $mysqli->query($sql) or die($mysqli->error);

include 'views/v_index.php';
