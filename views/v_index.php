<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="http://localhost/pwpb20/assets/style.css">

    <style>
        .lol {
            background-color: #ff5472;
            margin-left: -10px;
        }

        .search {
            width: 67%;
            position: relative;
            margin-left: 40px;
        }

        .s {
            margin-left: -10px;
        }

        .search-button {
            background: none;
            border: none;
            margin-top: 5px;
            margin-right: 120px;
            position: absolute;
        }

        .linked {
            color: #ff5472;
        }

        .linked:hover {
            color: white;
            text-decoration: none;
        }

        .reset {
            margin-right: -22px;
        }

        .btnYa {
            width: 60px;
            margin-left: -10px;
            border: none;
        }
    </style>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Toastr Plugins -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
</head>

<body>
    <div class="sidenav">
        <div class="judul">
            <h3>SMKN 4 BDG</h3>
        </div>
        <ul class="icons">
            <li>
                <p><i class="material-icons a">dashboard</i>Dashboard</p>
            </li>
            <li class="active">
                <p><i class="material-icons">account_circle</i>Daftar Siswa</p>
            </li>
            <li>
                <p><i class="material-icons b">account_circle</i>Daftar Guru</p>
            </li>
            <li>
                <p><i class="material-icons c">school</i>About</p>
            </li>
        </ul>
    </div>
    <div class="navbar">
        <form action="index.php" method="get" class="search">
            <button type="submit" class="search-button"><i class="material-icons s">search</i></button>
            <input type="text" name="search" id="search" class="search" placeholder="Cari siswa . . ." autocomplete="off" value="<?= @$search; ?>">
        </form>
        <a class="btn btn-outline-primary reset" href=" index.php">Reset</a>
        <a class="btn btn-outline-primary" href="tambah.php" role="button">Tambah data</a>
        <a class="btn btn-primary lol" href="logout.php">Logout</a>
    </div>

    <div class=" table-responsive-sm daftar">
        <table class="table table-hover table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Foto</th>
                    <th scope="col">
                        Nis
                        <a href="index.php?sort=nis&order=asc" class="linked">▲</a>
                        <a href="index.php?sort=nis&order=desc" class="linked">▼</a>
                    </th>
                    <th scope="col">
                        Nama Lengkap
                        <a href="index.php?sort=nama_lengkap&order=asc" class="linked">▲</a>
                        <a href="index.php?sort=nama_lengkap&order=desc" class="linked">▼</a>
                    </th>
                    <th scope="col">
                        Gender
                        <a href="index.php?sort=jenis_kelamin&order=asc" class="linked">▲</a>
                        <a href="index.php?sort=jenis_kelamin&order=desc" class="linked">▼</a>
                    </th>
                    <th scope="col">
                        Kelas
                        <a href="index.php?sort=nama_kelas&order=asc" class="linked">▲</a>
                        <a href="index.php?sort=nama_kelas&order=desc" class="linked">▼</a>
                    </th>
                    <th scope="col">
                        Alamat
                        <a href="index.php?sort=alamat&order=asc" class="linked">▲</a>
                        <a href="index.php?sort=alamat&order=desc" class="linked">▼</a>
                    </th>
                    <th scope="col">
                        Gol Darah
                        <a href="index.php?sort=golongan_darah&order=asc" class="linked">▲</a>
                        <a href="index.php?sort=golongan_darah&order=desc" class="linked">▼</a>
                    </th>
                    <th scope="col">
                        Nama Ibu
                        <a href="index.php?sort=ibu_kandung&order=asc" class="linked">▲</a>
                        <a href="index.php?sort=ibu_kandung&order=desc" class="linked">▼</a>
                    </th>
                    <th scope="col">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($listSiswa as $siswa) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td>
                            <img src="<?= base_url(); ?>/assets/images/<?= $siswa['file']; ?>" width="60px" alt="">
                        </td>
                        <td><?= $siswa['nis']; ?></td>
                        <td><?= $siswa['nama_lengkap']; ?></td>
                        <td><?= $siswa['jenis_kelamin']; ?></td>
                        <td><?= $siswa['nama_kelas']; ?></td>
                        <td><?= $siswa['alamat']; ?></td>
                        <td><?= $siswa['golongan_darah']; ?></td>
                        <td><?= $siswa['ibu_kandung']; ?></td>
                        <td><a href="edit.php?nis=<?= $siswa["nis"]; ?>" class="badge badge-primary">Edit</a>
                            <a href="delete.php?nis=<?= $siswa["nis"]; ?>" class="badge badge-danger btnDelete">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>

    <!-- Modal -->
    <div class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                    <button type="button" class="btn btn-primary btnYa">Ya</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            $(".btnDelete").on("click", function(e) {
                e.preventDefault();

                var nama = $(this).parent().parent().children()[3];
                nama = $(nama).html();

                var tr = $(this).parent().parent();

                $(".modal").modal("show");
                $(".modal-title").html("Konfirmasi");
                $(".modal-body").html("Anda yakin ingin menghapus data <b>" + nama + '</b> ?');

                var Href = $(this).attr('href');

                $('.btnYa').off();
                $('.btnYa').on('click', function() {
                    $.ajax({
                        url: Href,
                        type: "POST",
                        success: function(result) {
                            if (result == 1) {
                                $(".modal").modal("hide");
                                tr.fadeOut();

                                toastr.success('Data berhasil dihapus', 'Informasi')
                            }
                        }
                    });
                    window.location.href
                });
            });
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>
