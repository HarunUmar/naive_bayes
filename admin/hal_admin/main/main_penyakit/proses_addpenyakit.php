<?php
include "../../config/koneksi.php";
# Tombol Simpan diklik
if(isset($_POST['btnSimpan'])){
	# Baca Variabel Form
	$txtNama		= $_POST['txtNama'];
	$txtPencegahan	= $_POST['txtPencegahan'];
	$txtPengobatan	= $_POST['txtPengobatan'];
	$txtPopulasi	= $_POST['txtPopulasi'];

	# Validasi form, jika kosong sampaikan pesan error
	$pesanError = array();
	if (trim($txtNama)=="") {
		$pesanError[] = "Data <b>Nama Penyakit</b> tidak boleh kosong !";		
	}
	if (trim($txtPencegahan)=="") {
		$pesanError[] = "Data <b>Pencegahan</b> tidak boleh kosong !";		
	}
	if (trim($txtPengobatan)=="") {
		$pesanError[] = "Data <b>Pengobatan</b> tidak boleh kosong !";		
	}
	if (trim($txtPopulasi)=="") {
		$pesanError[] = "Data <b>Populasi</b> tidak boleh kosong !";		
	}
	

	# JIKA ADA PESAN ERROR DARI VALIDASI
	if (count($pesanError)>=1 ){
		echo "<div class='mssgBox'>";
		echo "<img src='../images/attention.png'> <br><hr>";
			$noPesan=0;
			foreach ($pesanError as $indeks=>$pesan_tampil) { 
			$noPesan++;
				echo "&nbsp;&nbsp; $noPesan. $pesan_tampil<br>";	
			} 
		echo "</div> <br>"; 
	}
	else {
		# SIMPAN DATA KE DATABASE. // Jika tidak menemukan error, simpan data ke database	
		// Membuat kode baru
		$kodeBaru	= buatKode("penyakit", "H");

		$mySql	= "INSERT INTO penyakit (kd_penyakit, nm_penyakit, pencegahan, pengobatan, np_populasi) 
					VALUES ('$kodeBaru',
							'$txtNama',
							'$txtPencegahan',
							'$txtPengobatan',
							'$txtPopulasi')";
		$myQry	= mysql_query($mySql, $koneksidb) or die ("Gagal query".mysql_error());
		if($myQry){
			echo "<meta http-equiv='refresh' content='0; url=?main=penyakit'>";
		}
		exit;
	}	
} // Penutup Tombol Simpan
?>
