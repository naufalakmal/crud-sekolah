<?php
$action = 'tambah.php';
if (!empty($siswa)) $action = 'edit.php';

if (empty($siswa)) {
    $judul = 'Tambah Data Siswa';
} else {
    $judul = 'Edit Data Siswa';
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
        }

        .card {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            width: 70%;
            height: auto;
            padding: 20px;
            box-sizing: border-box;
            background-color: #272727;
            border-radius: 10px;
            box-shadow: 0 0 12px 3px rgba(0, 0, 0, 0.5);
        }

        h2 {
            color: white;
            margin-bottom: 30px;
        }

        .dark {
            background-color: #121212;
            color: white;
            border: 2px solid #121212;
        }

        label {
            font-size: 20px;
            color: white;

        }

        .gender {
            margin-right: 5px;
        }

        .btn-dark {
            width: 100%;
        }

        .hider {
            color: white;
        }
    </style>
</head>

<body>
    <div class="card">
        <form action="<?= $action; ?>" method="post" enctype="multipart/form-data">
            <h2><?= $judul; ?></h2>
            <?php if (!empty($success)) : ?>
                <div class="alert alert-success" role="alert">
                    <?= $success; ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($error)) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $error; ?>
                </div>
            <?php endif; ?>
            <div class="input-group mb-3 inp">
                <div class="input-group-prepend">
                    <span class="input-group-text dark" id="basic-addon1">Nis</span>
                </div>
                <input type="text" class="form-control del" placeholder="Masukkan Nomor induk siswa" aria-label="Username" aria-describedby="basic-addon1" name="nis" pattern="[0-9]{10}" title="hanya bisa angka dan harus 10 angka" value="<?= @$siswa['nis']; ?>">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text dark" id="basic-addon1">Nama Lengkap</span>
                </div>
                <input type="text" class="form-control" placeholder="Masukkan Nama lengkap" aria-label="Username" aria-describedby="basic-addon1" name="nama_lengkap" value="<?= @$siswa['nama_lengkap']; ?>">
            </div>
            <div class="radio">
                <label>
                    <h5>jenis_kelamin :</h5>
                    <input type="radio" name="jenis_kelamin" value="L" class="gender" <?= @$siswa['jenis_kelamin'] == 'L' ? 'checked' : '' ?> required> Laki-laki
                </label>
                <label>
                    <input type="radio" name="jenis_kelamin" value="P" class="gender" <?= @$siswa['jenis_kelamin'] == 'P' ? 'checked' : '' ?>> Perempuan
                </label>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text dark" for="inputGroupSelect01">Kelas</label>
                </div>
                <select class="custom-select" id="inputGroupSelect01" name="id_kelas" required>
                    <option value="">[ Pilih Kelas ]</option>
                    <!-- Looping data kelasnya -->
                    <?php while ($row = mysqli_fetch_object($dataKelas)) : ?>
                        <option value="<?= $row->id_kelas ?>" <?= @$siswa->id_kelas == $row->id_kelas ? 'selected' : '' ?>>
                            <?= $row->nama_kelas; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text dark" id="basic-addon1">Alamat</span>
                </div>
                <input type="text" class="form-control" placeholder="Masukkan Alamat Rumah" aria-label="Username" aria-describedby="basic-addon1" name="alamat" value="<?= @$siswa['alamat']; ?>" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text dark" for="inputGroupSelect01">Golongan Darah</label>
                </div>
                <select class="custom-select" id="inputGroupSelect01" name="golongan_darah" required>
                    <option value="A" <?= @$siswa['golongan_darah'] == 'A' ? 'selected' : '' ?>>A</option>
                    <option value="B" <?= @$siswa['golongan_darah'] == 'B' ? 'selected' : '' ?>>B</option>
                    <option value="AB" <?= @$siswa['golongan_darah'] == 'AB' ? 'selected' : '' ?>>AB</option>
                    <option value="O" <?= @$siswa['golongan_darah'] == 'O' ? 'selected' : '' ?>>O</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text dark" id="basic-addon1">Nama Ibu kandung</span>
                </div>
                <input type="text" class="form-control" placeholder="Masukkan Nama Ibu Kandung anda" aria-label="Username" aria-describedby="basic-addon1" name="ibu_kandung" value="<?= @$siswa['ibu_kandung']; ?>" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text dark" id="basic-addon1">Foto</span>
                    <div class="col-sm-10 hider">
                        <?php if ($action == "edit.php") : ?>
                            <?php if (strlen(@$siswa["file"]) > 0) : ?>
                                <img class="d-inline mb-3" src="<?= base_url(); ?>/assets/images/<?= @$siswa['file']; ?>" width="80px" alt="Profile Siswa">
                            <?php else : ?>
                                <img src="<?= base_url(); ?>/assets/images/default.png" alt="Default profile">
                            <?php endif; ?>
                            <input type="hidden" name="foto" value="<?= @$siswa['file']; ?>">
                        <?php endif; ?>
                        <input type="file" name="foto">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-dark dark">Simpan</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script>
        const del = document.querySelector(".del");
        const overwrite = document.createElement("input");
        const inp = document.querySelector(".inp");
        if (del.value != '') {
            del.setAttribute("type", "hidden");
            overwrite.setAttribute("type", "text");
            overwrite.setAttribute("class", "form-control");
            overwrite.setAttribute("value", "<?= $siswa["nis"] ?>");
            overwrite.setAttribute("disabled", "");
            inp.appendChild(overwrite);
        }
    </script>
</body>

</html>