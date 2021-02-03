<!-- Web Programming UNPAS -->

<?php 
session_start();

if ( !isset( $_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

if ( isset($_POST["tambah"]) ) {
	if ( tambah($_POST) > 0 ) {
		echo "
		<script>
		alert('Berhasil');
		document.location.href = 'tambah.php';
		</script>
		";
	} else {
		echo "
		<script>
		alert('Gagal');
		document.location.href = 'tambah.php';
		</script>
		";
	}
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
            <div class="container">
                <br>
                <br>
                    <form action="" method="post">
                        <div class="form-group">
                            <input type="text" name="npm" class="form-control" id="npm" required placeholder="npm">
                        </div>
                        <div class="form-group">
                            <input type="text" name="nama" class="form-control" id="nama" required placeholder="nama">
                        </div>
                        <div class="form-group">
                            <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" required placeholder="tempat_lahir">
                        </div>
                        <div class="form-group">
                            <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" required placeholder="tanggal_lahir">
                        </div>
                        <div class="pilihan">
                            <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="text" name="alamat" class="form-control" id="alamat" required placeholder="alamat">
                        </div>
                        <div class="form-group">
                            <input type="text" name="kode_pos" class="form-control" id="kode_pos" required placeholder="kode_pos">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success center-block btn-lg" name="tambah">TAMBAH</button>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</body>
</html>