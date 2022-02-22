<?php
	session_start();
	// hilangkan sessionnya / penambahan 2 fungsi itu untuk memastikan bahwa beneran hilang sessionnya 
	// karna ada browser yang sesson nya belum hilang kalo hanya pake "session_destroy()"
	$_SESSION = [];
	session_unset();
	session_destroy();
	
	// TENDANG USERNYA kembali ke halaman login
	header("Location: login.php");
	exit;
	
	
	
	// kemudian tambahkan link di halaman "index.php" agar menuju ke "logout.php"
	// buat sebelum h1 atau judul daftar mahasiswa


?>