<?php 
	
	require 'functions.php';
	
	if( isset($_POST['register']) ) {
		
		if( registrasi($_POST) > 0 ) {		//-> Kalo nilai nyalebih dari 0 berarti ada user lain yang masuk ke database kita
			
			echo "<script>
					alert('user baru berhasil ditambahkan!')
				  </script>";
		
		} else {
			echo mysqli_error($conn);	//-> menampilkan error diconnection nya
		}
	}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Halaman Registrasi</title>
	
	<link rel="stylesheet" href="reset.css">
	<link rel="stylesheet" href="css/dum.css">
	
	<style>
		label {
			display: block;			<!---- agar inputan labelnya dibawah labelnya ------>
		}
	</style>
</head>
<body>
	<div class="container">
	
		<div class="reg">
		<h1>Registrasi</h1>
		</div>
		<hr>
		<div class="input">
			<form action="" method="post">
				<ul>
					<li>
						<label for="username">Username : </label>
						<input type="text" name="username" id="username">
					</li>
					<li>
						<label for="password">Password : </label>
						<input type="password" name="password" id="password">
					</li>
					<li>
						<label for="password2">Konfirmasi Password : </label>
						<input type="password" name="password2" id="password2">
					</li>
					<li>
						<button type="submit" name="register" style="margin-top:10px;" class="regis">Register!</button>
					</li>
					<hr>
					<h3>Silahkan Login ke halaman <a href="login.php" style="text-decoration:none; color:blue; font-weight:bold; ">L O G I N</a></h3>
				</ul>
			</form>
		</div>
		
	</div>
		
</body>
</html>