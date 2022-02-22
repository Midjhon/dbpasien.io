<?php
	
	session_start();
	// cek dulu ada ga sessionnya / user sudah berhasil login apa belum :  //-> buat pengecekan ini ke semua halaman kecuali halaman "login.php"
	if ( !isset($_SESSION["login"]) ) { 		//-> kalo belum login gabisa ke halaman ini atau "index.php"
		header("Location: login.php");			//-> arahkan atau kembalikan ke halaman login
		exit;
	}
	
	
	require 'functions.php';
	$id = $_GET["id"];
	
	$psn = query("SELECT * FROM pasien WHERE id = $id")[0];
	
	if( isset($_POST["submit"]) ) { //-> APAKAH $_POST(Elemen yang ada didalam form dengan method="post" yang key nya submit (elemen btn/ hubungan di name="submit") pada elemen button)	
									//-> jika dipecet, maka di dalam array assosiative $_POST, akan dibuat nya elemen yang key nya "submit"	
		
		
	
	
		// check apakah data berhasil di ubah atau tidak
		if( ubah($_POST)  > 0 ) {					
			// teknik javascript : menampilkan alert di atas layar . dan ketika di tekan ok maka akan di bawa ke halaman 'index.php'
			echo "
				<script>
					alert('data berhasil diubah!');
					document.location.href = 'index.php'
				</script>
			";
		} else {
			echo "
				<script>
					alert('data gagal diubah!');
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
	<title>Ubah Data</title>
	
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
		
			<p class="fs-3 text-center">Ubah Data Pasien</p>
		</div>
			<div class="content">
				<form action="" method="post" class="input ">
				<table cellspacing="0" cellpadding="5">
				
				<input type="hidden" name="id" value="<?= $psn["id"]; ?>">
				
					<tr>
						<td> <label for="no_rm">No.RM  </label> </td>
						<td> <input type="text" name="no_rm" id="no_rm" required value="<?= $psn["no_rm"]; ?>"> </td>	<!---- required: harus di isi gaboleh kosong ---->
					
					</tr>
					
					<tr>
					
						<td> <label for="nama">Nama Lengkap </label> </td>
						<td> <input type="text" name="nama" id="nama" value="<?= $psn["nama"]; ?>"> </td>
					
					</tr>
					
					<tr>
					
						<td> <label for="tgl_lahir">Tanggal Lahir  </label> </td>
						<td> <input type="text" name="tgl_lahir" id="tgl_lahir" value="<?= $psn["tgl_lahir"]; ?>">	</td>
					
					</tr>
					
					<tr>
					
						<td> <label for="tmpt_lahir">Tempat Lahir  </label> </td>
						<td> <input type="text" name="tmpt_lahir" id="tmpt_lahir" value="<?= $psn["tmpt_lahir"]; ?>"> </td>	
					
					</tr>
					
					<tr>
					
						<td> <label for="alamat">Alamat  </label> </td>
						<td> <input type="text" name="alamat" id="alamat" value="<?= $psn["alamat"]; ?>"> </td>	
					
					</tr>
					<tr>
					
						<td> <label for="no_tlp">No.Telepon  </label> </td>
						<td> <input type="text" name="no_tlp" id="no_tlp" value="<?= $psn["no_tlp"]; ?>"> </td>
					
					</tr>
					
					<tr>
					
						<td colspan="2"> <button type="submit" name="submit" class="submit">Ubah data!</button> </td>
					
					</tr>
						
				
				
				
				</form>
			</div>
		</div>
	
		
	</div>
	
	
	
	
</body>
</html>