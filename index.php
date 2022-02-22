<?php 
	
	session_start();
	// cek dulu ada ga sessionnya / user sudah berhasil login apa belum :  //-> buat pengecekan ini ke semua halaman : "index.php", "tambah.php", "ubah.php", dan "hapus.php"
	if ( !isset($_SESSION["login"]) ) { 		//-> kalo belum login gabisa ke halaman ini atau "index.php"
		header("Location: login.php");			//-> arahkan atau kembalikan ke halaman login
		exit;
	}
	
	require 'functions.php';
	
	$pasien = query("SELECT * FROM pasien"); 		
				//-> buat functions querynya
				
	if( isset($_POST["cari"]) ) {
		$pasien = cari($_POST["keyword"]);
	
	}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Daftar Pasien</title>
	
	<link rel="stylesheet" href="reset.css">
	
	<link rel="stylesheet" href="mun.css">
	
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
		.loader {
			width: 100px;
			z-index: 1;
			position: absolute;
			margin-top: -55px;
			margin-left: 401px;
			display: none;
		}
		
		.cetak {
			font-size: 20px;
			text-decoration: none;
			position: absolute;
			margin-left: 63rem;
			margin-top: 13rem;
			outline: none;
			color: #fff;
			background-color: darkred;
			border: none;
			border-radius: 15px;
			box-shadow: 0 8px #999;
			font-family: algerian;
			padding: 5px;
		}
		.cetak:hover {
			background-color: darkred;
			color: white;
			text-shadow: 1px 1px 1px white;
			box-shadow: 0 5px #666;
			transform: translateY(5px);
		}
		
		
		
	</style>
	
	<script src="js/jquery-3.6.0.min.js"></script>
	<script src="js/script.js"></script>
	
</head>
<body>
	<div class="container">
		<div class="header cf">
			<a href="logout.php" class="out sm bi bi-box-arrow-right"></a>
			<a href="cetak.php" target="_blank" class="cetak bi bi-file-pdf"> PDF</a>
			
			<h1 class="text-center shadow sm fs-2" style="margin-left: 20%; margin-right: 20%; 
			margin-top: 10px; margin-bottom:10px; padding: 10px; color:white; 
			border-radius: 10%; text-shadow: 1px 1px 1px white;">MIDHOSPITAL EMERGENCY</h1>
			
			<p class="fs-3 text-center">Daftar Kunjungan Pasien</p>
			<a class="link fs-5 bi bi-person-plus text-decoration-none"
				href="tambah.php" style="margin-left:130px;position:absolute;margin-top:-10px; padding:2px 5px;"> Tambah data</a>
			
			<form action="" method="post">
			
				<input type="text" name="keyword" size="30" style="margin-left: 135px; position: absolute; 
				margin-top:30px;" autofocus placeholder="masukan keyword pencarian..." autocomplete="off" id="keyword"> 
				<br><br>
				<button type="submit" name="cari" style="position: absolute; margin-left: 400px; margin-top: -18px;" id="tombol-cari">Cari!</button>	
				<img src="hu.gif" class="loader">
			<!---- Keterangan atribut: ---->
			<!---- autofoucus : otomatis aktif form "keyword" tanpa diklik ---->
			<!---- placeholder : panduan sebelum kita mengisi di form / ada tulisan didalam form setelah kita klik tulisan yg diplaceholder nya hilang ---->
			<!---- autocomplete="off" : mematikan history yang sudah pernah diinput ---->
			</form>
		</div>
	
		<div id="container">
			<table class="table sm w-75 m-auto mt-4 shadow" border="3" style="padding:10px;font-family:times new roman;background-color:white;border:3px solid green;">			
				<thead>
					<th>No.</th>
					<th>Aksi</th>
					<th>No.RM</th>
					<th>Nama Lengkap</th>
					<th>Tanggal Lahir</th>
					<th>Tempat Lahir</th>
					<th>Alamat</th>
					<th>No.Telepon</th>
				</thead>
					
					
				<?php $i = 1; ?> <!--- membuat idn yg berurutan ----->
						<!--- LOOPING / PENGULANGAN ---->
				<?php foreach( $pasien as $row ) : ?>
						
				<tr>
					<td><?= $i; ?></td>
					<td>
						<a class="bi bi-pencil-square me-2 text-success" href="ubah.php?id=<?= $row["id"]; ?>"></a> | 
						<a class="bi bi-person-x ms-2 text-danger" href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin?');"></a>
					</td>
					<td><?= $row['no_rm']; ?></td>
					<td><?= $row['nama']; ?></td>
					<td><?= $row['tgl_lahir']; ?></td>
					<td><?= $row['tmpt_lahir']; ?></td>
					<td><?= $row['alamat']; ?></td>
					<td><?= $row['no_tlp']; ?></td>
					
				</tr>			
				
				<?php $i++; ?> <!--- penutup $i ----->
				<?php endforeach; ?>
			</table>
		</div>
	</div>
	
	
	
	
</body>
</html>