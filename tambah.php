<?php 
	
	session_start();
	// cek dulu ada ga sessionnya / user sudah berhasil login apa belum :  //-> buat pengecekan ini ke semua halaman kecuali halaman "login.php"
	if ( !isset($_SESSION["login"]) ) { 		//-> kalo belum login gabisa ke halaman ini atau "index.php"
		header("Location: login.php");			//-> arahkan atau kembalikan ke halaman login
		exit;
	}
	
	
	// hubungkan ke file function ;
	require 'functions.php';

	// apakah tombol submit sudah diklik atau belum
	if( isset($_POST["submit"]) ) { //-> APAKAH $_POST(Elemen yang ada didalam form dengan method="post" yang key nya submit (elemen btn/ hubungan di name="submit") pada elemen button)	
									//-> jika dipecet, maka di dalam array assosiative $_POST, akan dibuat nya elemen yang key nya "submit"	
		// var_dump($_POST);    //-> check datanya masuk atau tidak
		
	
	
		// check apakah data berhasil di tambahkan atau tidak
		if( tambah($_POST)  > 0 ) {					//-> tambah adalah function yang harus di hubungkan ke halaman nya . menggunaka require 'functions.php'
			// teknik javascript : menampilkan alert di atas layar . dan ketika di tekan ok maka akan di bawa ke halaman 'index.php'
			echo "
				<script>
					alert('data berhasil ditambahkan!');
					document.location.href = 'index.php'
				</script>
			";
		} else {
			echo "
				<script>
					alert('data gagal ditambahkan!');
					document.location.href = 'index.php'
				</script>
			";

		}
	
	
	}	
				
		
	
	 
?>


<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tambah Data </title>
	
	<link rel="stylesheet" href="reset.css">
	
	<link rel="stylesheet" href="add.css">
	
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	
	
	<!-- Bootstrap Icon -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
	<!-- link icon : https://icons.getbootstrap.com/ -->
	
	<style>
		
		.container {
			background-color: rgba(255, 99, 71, 0.2);
			border-radius: 30%;
			padding: 0;	
			margin-top: 20px;	
			text-shadow: 1px 1px 1px white;
			
			
		}
		
		
		.link:hover{
			box-shadow: 0 5px #666;
			transform: translateY(4px);
		}
		
	
		
	</style>
	
	
	
</head>
<body>
	<div class="container">
		<div class="header cf">
			<a href="index.php" class="out sm bi bi-arrow-left-square"></a>
			<h1 class="text-center shadow sm fs-2" style="margin-left: 20%; margin-right: 20%; 
			margin-top: 10px; margin-bottom:10px; padding: 10px; color:white; 
			border-radius: 10%; text-shadow: 1px 1px 1px white;">MIDHOSPITAL EMERGENCY</h1>
		
			<p class="fs-3 text-center">Tambah Data Pasien</p>
		</div>
			<div class="content">
				<form action="" method="post" class="input ">
				<table cellspacing="0" cellpadding="5">
				
					<tr>
						<td> <label for="no_rm">No.RM  </label> </td>
						<td> <input type="text" name="no_rm" id="no_rm" required> </td>	<!---- required: harus di isi gaboleh kosong ---->
					
					</tr>
					
					<tr>
					
						<td> <label for="nama">Nama Lengkap </label> </td>
						<td> <input type="text" name="nama" id="nama"> </td>
					
					</tr>
					
					<tr>
					
						<td> <label for="tgl_lahir">Tanggal Lahir  </label> </td>
						<td> <input type="text" name="tgl_lahir" id="tgl_lahir">	</td>
					
					</tr>
					
					<tr>
					
						<td> <label for="tmpt_lahir">Tempat Lahir  </label> </td>
						<td> <input type="text" name="tmpt_lahir" id="tmpt_lahir"> </td>	
					
					</tr>
					
					<tr>
					
						<td> <label for="alamat">Alamat  </label> </td>
						<td> <input type="text" name="alamat" id="alamat"> </td>	
					
					</tr>
					<tr>
					
						<td> <label for="no_tlp">No.Telepon  </label> </td>
						<td> <input type="text" name="no_tlp" id="no_tlp"> </td>
					
					</tr>
					
					<tr>
					
						<td colspan="2"> <button type="submit" name="submit" class="submit">Tambah data!</button> </td>
					
					</tr>
						
				
				
				
				</form>
			</div>
		</div>
	
		
	</div>
	
	
	
	
</body>
</html>