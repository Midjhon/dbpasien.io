// sebelum menuliskan sesuatu dengan jquery, tulis sintax berikut;

$(document).ready(function() {          //->artinya : jQuery tolong carikan saya dokumen /ambil, ketia dokumen tersebut siap. jalankan fungsi berikut;
	
	// hilangkan tombol cari
	$('#tombol-cari').hide();     //-> menghilangkan yang muncul
	
	// even ketika keyword ditulis
	$('#keyword').on('keyup', function() {     //-> artinya : carikan elemen 'keyword' lalu on ketika di keyup lakukan fungsi berikut ini; 
		
		// munculkan icon loading
		$('.loader').show();		//-> memunculkan yang hilang
		
		// ajax menggunakan load
		// $('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());
			//-> artinya : carikan elemen '#container' / id yang bernama "container" lalu load / ubah isinya dengan data yang kita ambil dari sumber
						//-> sumbernya 'ajax/mahasiswa.php', lalu kirimkan data keyword nya yang dikirim dengan apapun yang diketikan oleh usernya ("+ $('#keyword').val());")
			
		// });
		// load memiliki ketebatasan
		// hanya bisa di method "get". jika method "post" harus menggunakan fungsi ajax yang lain
		
		// ajax menggunakan $.get()
			$.get('ajax/mahasiswa.php?keyword=' + $('#keyword').val(), function(data) {
			
			$('#container').html(data);	
			// Hentikan / hilangka loadingnya kembali saat data sudah ketemu
			$('.loader').hide();
			});
		}); 
});

    
