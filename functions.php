<?php 

	$conn = mysqli_connect("localhost", "root", "", "myapp");
	
	function query($query) {
		global $conn;
		$result = mysqli_query($conn, $query);	
		
		$rows = [];
		
		while($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row; 
		} 
		return $rows;
	}
	
	
	function tambah($data) {
		
		global $conn;			
		
		$no_rm = htmlspecialchars($data["no_rm"]);
		$nama = htmlspecialchars($data["nama"]);
		$tgl_lahir = htmlspecialchars($data["tgl_lahir"]);
		$tmpt_lahir = htmlspecialchars($data["tmpt_lahir"]);
		$alamat = htmlspecialchars($data["alamat"]);
		$no_tlp = htmlspecialchars($data["no_tlp"]);
		
		// kemudian lakukan query insert data:
		// -> URUTAN FIELD DALAM TABEL 
		$query = "INSERT INTO pasien 
					VALUES
					('', '$no_rm', '$nama', '$tgl_lahir', '$tmpt_lahir', '$alamat', '$no_tlp')		
					";								
					
		mysqli_query($conn, $query);			//-> panggil funsi querynya  //->($conn, $query) : masukan parameternya koneksi, dan sintax query nya masukan ke dalam variabel $query 
		
		return mysqli_affected_rows($conn);
											
		
		
		
	}
	
	
	function hapus($id) {
		global $conn; 		//-> panggil koneksi
		mysqli_query($conn, "DELETE FROM pasien WHERE id = $id");		//->kemudian jalani querynya
	
		return mysqli_affected_rows($conn);
	}
	
	
	
	function ubah($data) {
		//  AMBIL data nya semua dari function ubah  //
		global $conn;			
		
		// tangkap $id yang sudah dibuat di input type="hidden" di file "ubah.php"
		$id = $data["id"];
		// ------------------------------ //
		
		$no_rm = htmlspecialchars($data["no_rm"]);
		$nama = htmlspecialchars($data["nama"]);
		$tgl_lahir = htmlspecialchars($data["tgl_lahir"]);
		$tmpt_lahir = htmlspecialchars($data["tmpt_lahir"]);
		$alamat = htmlspecialchars($data["alamat"]);
		$no_tlp = htmlspecialchars($data["no_tlp"]);
		
		// kemudian lakukan query insert data:
		// -> URUTAN FIELD DALAM TABEL 
		$query = "UPDATE pasien SET
					no_rm = '$no_rm',
					nama = '$nama',
					tgl_lahir = '$tgl_lahir',
					tmpt_lahir = '$tmpt_lahir',
					alamat = '$alamat',
					no_tlp = '$no_tlp'
				  WHERE id = $id
				";								
					
		mysqli_query($conn, $query);			
		
		return mysqli_affected_rows($conn);
		
	}
	
	function cari($keyword) {
		
		$query = "SELECT * FROM pasien
				WHERE
					no_rm LIKE '%$keyword%' OR
					nama LIKE '%$keyword%' OR
					tgl_lahir LIKE '%$keyword%' OR
					tmpt_lahir LIKE '%$keyword%' OR
					alamat LIKE '%$keyword%' OR
					no_tlp LIKE '%$keyword%' 
				";
		
		return query($query);
		
	}
	
	function registrasi($data) {
		
		global $conn;		//-> ngambil koneksi yang paling atas
		
		$username = strtolower(stripslashes($data["username"]));		//-> bersihkan slashnya 	//-> strtolower : saat mengkombinasikan huruf besar dan kecil dia masuk ke database	
		$password = mysqli_real_escape_string($conn, $data["password"]);
		$password2 = mysqli_real_escape_string($conn, $data["password2"]);
	
		$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
		if( mysqli_fetch_assoc($result) ) {
			echo "<script>
						alert ('Username sudah terdaftar!');
				  </script>";
			return false;
		}
		
		// cek konfirmasi password
		if( $password !== $password2 ) {			// jika password tidak sama dengan password2(konfirmasi passwordnya)	//-> ada yang salah dalam konfirmasi passwordnya
			echo "<script>
				 alert ('Konfirmasi password tidak sesuai!') 
				 </script>";
				 
			return false;			//-> berhentikan functions // agar masuk ke else yang di 'registrasi.php'
		} 
		
		// enkripsi password terlebih dahulu
		$password = password_hash($password, PASSWORD_DEFAULT); 	
		
		//tambahkan user baru kedalam database / INSERT ke data base 
		mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");
		
		// kemudian kita return ke
		return mysqli_affected_rows($conn);
	}
	
	
	
?>