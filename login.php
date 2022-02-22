<?php
	session_start();
	
	require 'functions.php';
	
	// cek cookienya
	// kalo ada dia masih login
	if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
		// ada ga isisnya kalo ada cek :
		$id = $_COOKIE['id'];
		$key = $_COOKIE['key'];
		
		// ambil username berdasarkan idnya
		$result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
		$row = mysqli_fetch_assoc($result);
		
		// cek cookie dan username
		if( $key === hash('sha256', $row['username']) )    //-> key adalah username yang sudah diacak, sekarang kita acak username baru , sama ga hasil hashnya kalo sama berati user yang benar
			$_SESSION['login'] = 'true';
	}
	
	
	// cek dulu ada ga sessionnya / user sudah berhasil login apa belum :  //-> buat pengecekan ini ke semua halaman : "index.php", "tambah.php", "ubah.php", dan "hapus.php"
	if ( isset($_SESSION["login"]) ) { 		//-> kalo uda login pindahkan ke halaman "index.php"
		header("Location: index.php");			//-> arahkan  ke halaman index
		exit;
	}
	
	
	// halaman loginnya
	// buaat formnya
	// kelola logic loginnya
	
	//cek apakah tombol submit uda diklik
	if( isset($_POST["login"]) ) {
		// tangkap username data username,password, dan $_POST
		$username = $_POST["username"];
		$password = $_POST["password"];
		
		// cek adakah username di database yang sama dengan username yang di inputkan saat login
			//-> kalo ada cek passwordnya
			
		$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
		
		
		// cek usernamenya :
		if( mysqli_num_rows($result) === 1 ) {
		// mysqli_num_rows() : ada berapa bari yang dikembalikan dari fungsi select, kalo ketemu pasti nilai nya 1kalo gadak nilainya "0"
			// cek password
			$row = mysqli_fetch_assoc($result);          //-> menyimpan data user yang login
			if ( password_verify($password, $row["password"]) ) {
				
				// set sessionnya :
				// sebelum set pastikan sudah menjalankan fungsi sessionnya di paling atas / sebelum ada halaman apapun yg tampil ke layar 
				// "session_start()"
				// lalu buat variabel session yang keynya login :
				$_SESSION["login"] = true;		//-> cek ditiap halaman agar tidak ada yg bisa masuk ke halaman lain seblm halaman login
				// setelah ini kembali ke halaman "index.php"
				
				// cek remember me
				// jika diceklis remember me
				if( isset($_POST['remember']) ) {		//->checkboxnya diambil
					// buat 2 cookie
					// cookie 1 :
					setcookie('id', $row['id'], time()+60);
					// cookie 2 :
					setcookie('key', hash('sha256', $row['username']), time()+60);  //-> time()+60); -> cookie nya akan hilang setelah 1 menit.
				}
				
				header("Location: index.php");  //-> arahkan
				exit;
			}
		}
		$error = true;		//-> pemberitahuan error saat login / pesan kesalahan // lalu berikan elertnya di halaman login 'html'
		
	}
	
	
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Halaman Login</title>
	<link rel="stylesheet" href="reset.css">
	
	<link rel="stylesheet" href="css/duk.css">
	<style>
	
	body{
		background-image: url(img/bg1.jpg);
		background-size: cover;
		
	}
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	
	<!-- Bootstrap Icon -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
	<!-- link icon : https://icons.getbootstrap.com/ -->
	
	
	</style>
</head>
<body>
	<div class="container">
		<div class="login">
			<h1 class="bi bi-box-arrow-in-left"> LOGIN</h1>
			<?php if( isset($error) ) : ?>
				<p style="color: red; font-style: italic; margin-left: 22%;; margin-top:5px;">username / password salah!</p>
			<?php endif; ?>
			
		</div>
		<hr>
		<div class="input">
			<form action="" method="post">
				<ul>		
					<li>
						<label for="username">Username </label>
						<input type="text" name="username" id="username"  
						placeholder="Masukkan Username...">
					</li>
					<li>
						<label for="password">Password </label>
						<input type="password" name="password" id="password"
						placeholder="Masukkan Password...">
					</li>
					
					<li>
						<input type="checkbox" name="remember" id="remember">
						<label for="remember">Remember me</label>
					</li>
					
					<li>
						<button type="submit" name="login" class="submit">Login</button>
					</li>
					
					<hr>
					
					<p>belum punya akun??</p>
					
					<h3>Silahkan daftar ke halaman <a href="registrasi.php" style="text-decoration:none; color:blue">Registrasi</a></h3>
				</ul>
			</form>
		</div>
		
	</div>		
			
		
	
</body>
</html>