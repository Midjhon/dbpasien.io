<?php 
	require '../functions.php';		//-> karna berada diluar folder 'mahasiswa.php'
	
	// tangkap urlnya
	$keyword = $_GET["keyword"];
	// gunakan keyword nya ke dalam querynya:
	$query = "SELECT * FROM pasien
				WHERE
					no_rm LIKE '%$keyword%' OR
					nama LIKE '%$keyword%' OR
					tgl_lahir LIKE '%$keyword%' OR
					tmpt_lahir LIKE '%$keyword%' OR
					alamat LIKE '%$keyword%' OR
					no_tlp LIKE '%$keyword%' 
				";
				//-> dilakukan setiap ketik di pencarian tanpa pencet tombolnya
	$pasien = query($query);
	
	
	// lalu manipulasi query agar sesuai dengan permintaan kita
?>
<!-- copy tabel di 'index.php' --->

<table class="table sm w-75 m-auto mt-4 shadow" border="3" style="padding:10px;font-family:times new roman;background-color:white;border:3px solid green;">			
				<thead>
					<th>No.</th>
					<th>Aksi</th>
					<th>No.RM</th>
					<th>Nama</th>
					<th>Tgl lahir</th>
					<th>Tmpt Lahir</th>
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