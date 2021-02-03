<!-- Web Programming UNPAS -->

<?php 
session_start();

if ( !isset( $_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

$npm = $_GET["npm"];
$data = query("SELECT * FROM mahasiswa WHERE npm = $npm")[0];

if ( isset($_POST["submit"]) ) {
	if ( edit($_POST) > 0 ) {
		echo "
		<script>
		alert('Berhasil');
		document.location.href = 'index.php';
		</script>
		";
	} else {
		echo "
		<script>
		alert('Gagal');
		document.location.href = 'index.php';
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
						<input type="hidden" name="npm" value="<?= $data["npm"]; ?>">
						<div class="form-group">
							<input type="text" class="form-control" name="nama" id="nama" required placeholder="nama"	value="<?= $data["nama"]; ?>">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" required placeholder="tempat_lahir"	value="<?= $data["tempat_lahir"]; ?>">
						</div>
						<div class="form-group">
							<input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" required placeholder="tanggal_lahir"	value="<?= $data["tanggal_lahir"]; ?>">
						</div>
						<div class="pilihan">
							<select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
								<option value="<?= $data["jenis_kelamin"]; ?>" selected><?= $data["jenis_kelamin"]; ?></option>
								<option value="L">L</option>
								<option value="P">P</option>
							</select>
						</div>
						<div class="form-group"> 
							<input type="text" class="form-control" name="alamat" id="alamat" required placeholder="alamat" value="<?= $data["alamat"]; ?>">
						</div>
						<div class="form-group"> 
							<input type="text" class="form-control" name="kode_pos" id="kode_pos" required placeholder="kode_pos" value="<?= $data["kode_pos"]; ?>">
						</div>
						<div class="tmbl_submit">
							<button type="submit" name="submit">UBAH</button>
						</div>
                    </form>
                </div>
            </div>
    </div>
</body>
</html>