<!-- Web Programming UNPAS -->

<?php 
require 'functions.php';

if ( isset($_POST["daftar"]) ) {
	if ( daftar($_POST) > 0 ) {
		echo "<script>
		alert('berhasil ditambahkan!');
		document.location.href = 'login.php';
		</script>";
	} else {
		echo mysqli_error($conn);
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pendaftaran</title>
	<link rel="stylesheet" href="css/cssreset.css?v=1.0">
	<link rel="stylesheet" type="text/css" href="css/login.css?v=1.0">
	<link href="vendor/fontawesome-free-5.15.1-web/css/all.css" rel="stylesheet">
</head>
<body class="bdy">
<div class="isi2">
	<h2>ADMIN REGISTER</h2>
	<form action="" method="post">
		<div class="input_data">
			<input type="text" name="username" id="username" autofocus placeholder="Username">
		</div>
		<div class="password">
			<input type="password" name="password" id="password" autofocus placeholder="Password">
		</div>
		<div class="password">
			<input type="password" name="password2" id="password2"
			autofocus placeholder="Konfirmasi Password">
		</div>
		<div class="tmbl_submit">
			<button type="submit" name="daftar">Daftar</button>
		</div>
	</form>
</div>
</body>
</html>
