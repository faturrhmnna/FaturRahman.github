<!-- Web Programming UNPAS -->

<?php 
session_start();
if ( !isset( $_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

$npm =  $_GET["npm"];
if ( hapus($npm) > 0 ) {
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
?>

