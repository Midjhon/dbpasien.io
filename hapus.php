<?php 
	// cara buat fungsi hapus
	// Hubungkan dengan halaman function
	require 'functions.php';
	
	// cara buat fungsi hapus
	// buat variabel $id : utk mengkap id yg kirim dari url
	$id = $_GET["id"]; //->$_GET : agar muncul di urlnya
		// penjelasan : saat diklik tombol hapus, idnya dikirim lewat url, lalu ditangkap trus dimasukan kedalam $id
	// lalu buat function dengan naman hapus -> buat di halaman "functions.php" | terlebih dahulu hubungkan dengan halamanya dengan "require"
	
	// setelah function sudah dibuat baru buat allertnya dengan javascript:
	if ( hapus($id) > 0 ) {
		echo "
				<script>
					alert('data berhasil dihapus!');
					document.location.href = 'index.php'
				</script>
			";	
	}else {
		echo "
				<script>
					alert('data gagal dihapus!');
					document.location.href = 'index.php'
				</script>
			";
	}
		
?>