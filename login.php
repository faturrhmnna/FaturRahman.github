<!-- Web Programming UNPAS -->

<?php 
session_start();
require 'functions.php';

if ( isset($_POST["login"]) ) {
	$username = $_POST["username"];
	$password = $_POST["password"];
	$box = mysqli_query($db, "SELECT * FROM user WHERE username = '$username'");

	if ( mysqli_num_rows($box) === 1 ) {
		$row = mysqli_fetch_assoc($box);
		 if ( password_verify($password, $row["password"]) ) {
		 	$_SESSION["login"] = true;
		 	header("Location: index.php");
		 	exit;
		 	}
	}
	$error = true;
} 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="css/cssreset.css?v=1.0">
	<link rel="stylesheet" type="text/css" href="css/login.css?v=1.0">
	<link href="vendor/fontawesome-free-5.15.1-web/css/all.css" rel="stylesheet">
</head>
<body class="bdy">
<div class="isi">
	<h2>ADMIN LOGIN</h2>
	<form action="" method="post">
		<div class="input_data">
			<input type="text" name="username" id="username" autofocus placeholder="Username" autocomplete="on">
		</div>
		<div class="password">
			<input type="password" name="password" id="password" autofocus placeholder="Password" autocomplete="on">
		</div>
		<div class="pesan_error">
			<?php if( isset($error) ) : ?>
				<p>username / password salah</p>
			<?php endif; ?>
		</div>
		<div class="tmbl_submit">
			<button type="submit" name="login">Login</button>
		</div>
	</form>
</div>
<form method="post" action="daftar.php" class="daftar">
	<div class="daftar">
		<button type="submit" nama="daftar"><i class="fa-2x fas fa-exclamation-circle"></i></button>
	</div>
</form>
</body>
</html>
