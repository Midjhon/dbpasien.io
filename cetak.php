<?php
	// Panggil dulu library yang ada dlm vendornya 
	require_once __DIR__ . '/vendor/autoload.php';
	// panggil functions untuk tabel mahasiswa
	require 'functions.php';
	// lalu copy query mahasiswa
	$pasien = query("SELECT * FROM pasien"); 
	// kemudian instansiasi
	$mpdf = new \Mpdf\Mpdf();
	// cetak html ke pdfnya
	// bikin variabel baru
	// masukan data2 dari array mahasiswa ke string html
	// suport beberapa style di css lihat di dokumentasi "https://mpdf.github.io/css-stylesheets/supported-css.html"
	$html = '<!doctype html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Daftar Pasien</title>
		
		<link rel="stylesheet" href="css/print.css">
	</head>
	<body>
		<h1>Daftar Kunjungan Pasien</h1>
		
		<table border="1" cellpadding="10" cellspacing="0">	
		<tr>
			<th>No.</th>
			<th>No.RM</th>
			<th>Nama Lengkap</th>
			<th>Tanggal Lahir</th>
			<th>Tempat Lahir</th>
			<th>Alamat</th>
			<th>No.Telepon</th>
		</tr>';
			
			//-> logicnya
			// pisahkan antar tutp stringnya jadi 2
			// lalu lopping dari database
		$i = 1;	
		foreach( $pasien as $row ) {
			$html .= '<tr>
					<td>'.$i++.'</td>
					<td>'.$row["no_rm"].'</td>
					<td>'.$row["nama"].'</td>
					<td>'.$row["tgl_lahir"].'</td>
					<td>'.$row["tmpt_lahir"].'</td>
					<td>'.$row["alamat"].'</td>
					<td>'.$row["no_tlp"].'</td>
				</tr>'; 
		}
			
	$html .= '</table>
			
	</body>
	</html>';
	
	// lalu masukan ke dalam variabel html
	$mpdf->WriteHTML($html);
	
	// costum default nama saat download pdfnya
	$mpdf->Output('Daftar-kunjungan-pasien.pdf', 'I');  //-> 'I' -> singkatan dari -> \Mpdf\Output\Destination::INLINE (direview seblum didownload)
	                                             //-> 'D' -> singkatan dari -> \Mpdf\Output\Destination::DOWNLOAD (langsung didownload tanpa review)
	
	// hasilnya langsung dibuatkan librarynya 'hello world'
	// kemudian modifikasi isinya
	// liha di dokumentasnyaa 'https://mpdf.github.io/installation-setup/installation-v7-x.html'
	// modif agar sama 'index.php'
	
?>

