<!-- Web Programming UNPAS -->

<?php  
session_start();

if ( !isset( $_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

$jumlahDataPerHalaman = 6;

$jumlahData = count(query("SELECT * FROM mahasiswa") );

$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);

$halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;

$awalData = ( $jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$data = query("SELECT * FROM mahasiswa ORDER BY npm DESC LIMIT $awalData, $jumlahDataPerHalaman");

if ( isset($_POST["cari"]) ) {
    $data = cari($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css?v=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
    <header class="text-light bg-secondary text-center">
        <p>Data Mahasiswa</p>
    </header>

    <div class="row">
        <div class="col-md-12">
            <div class="container">
                <ul class="nav nav-pills nav-stacked bg-info">
                    <li><a class="link" href="index.php">Home</a></li>
                    <li><a class="link" href="tambah.php">Tambah Data</a></li> 
                    <li><a href="logout.php">Logout</a></li> 
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
                <div class="container">
                    <div id="tombol">
                        <ul class="tombol-cari">
                            <li>
                                <form action="" method="post" class="cari">
                                    <input type="text" name="keyword" size="40" autofocus placeholder="Cari..." autocomplete="off">
                                    <button type="submit" name="cari" class="glyphicon glyphicon-search"></button>
                                </form>
                            </li>
                        </ul>
                    </div>

                    <table class="table table-hover">
                        <tr class="bg-primary">
                            <th>No.</th>
                            <th>Aksi</th>
                            <th>NPM</th>
                            <th>Nama</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Kode Pos</th>
                        </tr>
                        <?php $i = 1; ?>
                        <?php foreach( $data as $row ) :  ?>
                        <tr class="bg-light">
                            <td><?= $i; ?></td>
                            <td>
                                <span id="hapus" ><a href="hapus.php?npm=<?= $row["npm"]; ?>" onclick="return confirm('Yakin?');" class="aksi hapus">Hapus</a></span>
                                <a href="edit.php?npm=<?= $row["npm"]; ?>" class="aksi">edit</a>
                            </td>
                            <td><?= $row["npm"]; ?></td>
                            <td><?= $row["nama"]; ?></td>
                            <td><?= $row["tempat_lahir"]; ?></td>
                            <td><?= $row["tanggal_lahir"]; ?></td>
                            <td><?= $row["jenis_kelamin"]; ?></td>
                            <td><?= $row["alamat"]; ?></td>
                            <td><?= $row["kode_pos"]; ?></td>
                        </tr>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                    </table>
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <?php if ( $halamanAktif > 1 ) : ?>
                                <li>
                                <a href="?halaman=<?= $halamanAktif - 1; ?>">&laquo;</a>
                                </li>
                            <?php endif; ?>
                            <?php for( $i = 1; $i <= $jumlahHalaman; $i++) : ?>
                                <?php if ( $i == $halamanAktif ) : ?>
                                    <li>
                                    <a href="?halaman=<?= $i; ?>" style="font-weight: bold; color: salmon;"><?= $i; ?></a>
                                    </li>
                                <?php else : ?>
                                    <li>
                                    <a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php endfor; ?>
                            <?php if ( $halamanAktif < $jumlahHalaman ) : ?>
                                <li>
                                <a href="?halaman=<?= $halamanAktif + 1; ?>">&raquo;</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
        </div>
    </div>


</body>
</html>