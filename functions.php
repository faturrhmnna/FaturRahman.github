<!-- Web Programming UNPAS PHP Dasar -->

<?php 
$db = mysqli_connect("localhost", "root", "", "mahasiswa");

function query($data) {
	global $db;
	$result = mysqli_query($db, $data);
	$kolom = [];
	while( $baris = mysqli_fetch_assoc($result) ) {
		$kolom[] = $baris;
	}
	return $kolom;
}

function cari($keyword) {
	$data = "SELECT * FROM mahasiswa 
				WHERE 
			nama LIKE '%$keyword%' OR 
			npm LIKE '%$keyword%' OR 
			tempat_lahir LIKE '%$keyword%' OR
			jenis_kelamin LIKE '%$keyword%'
			";
	return query($data);
}

function tambah($data) {
	global $db;

	$npm = ($data["npm"]);
	$nama = ($data["nama"]);
	$tempat_lahir = ($data["tempat_lahir"]);
	$tanggal_lahir = ($data["tanggal_lahir"]);
	$jenis_kelamin = ($data["jenis_kelamin"]);
	$alamat = ($data["alamat"]);
	$kode_pos = ($data["kode_pos"]);
	
	$data = "INSERT INTO  mahasiswa
				VALUES 
				('$npm', '$nama', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$alamat', '$kode_pos')
			";
	mysqli_query($db, $data);
	return mysqli_affected_rows($db);
}

function hapus($npm) {
	global $db;
	mysqli_query($db, "DELETE FROM mahasiswa WHERE npm = $npm");
	return mysqli_affected_rows($db);
}

function edit($data) {
	global $db;

	$npm = ($data["npm"]);
	$nama = ($data["nama"]);
	$tempat_lahir = ($data["tempat_lahir"]);
	$tanggal_lahir = ($data["tanggal_lahir"]);
	$jenis_kelamin = ($data["jenis_kelamin"]);
	$alamat = ($data["alamat"]);
	$kode_pos = ($data["kode_pos"]);

	$query = "UPDATE mahasiswa SET 
				npm = '$npm',
				nama = '$nama',
				tempat_lahir = '$tempat_lahir',
				tanggal_lahir = '$tanggal_lahir',
				jenis_kelamin = '$jenis_kelamin',
				alamat = '$alamat',
				kode_pos = '$kode_pos'
			WHERE npm = $npm
			";
	mysqli_query($db, $query);
	return mysqli_affected_rows($db);
}

function daftar($data) {
	global $db;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($db, $data["password"]);
	$password2 = mysqli_real_escape_string($db, $data["password2"]);
	$result = mysqli_query($db, "SELECT username FROM user WHERE 	
				username = '$username'");
	if ( mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('Username sudah ada!')
			</script>";
			return false;
	}
	if ( $password !== $password2 ) {
		echo "<script>
				alert('Konfirmasi password tidak sesuai!');
			</script>";
			return false;
	}
	$password = password_hash($password, PASSWORD_DEFAULT);
	mysqli_query($db, "INSERT INTO user VALUES
				('', '$username', '$password')"
				);
	return mysqli_affected_rows($db);
}
?>
