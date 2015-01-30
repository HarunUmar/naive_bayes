<?php
require "../../config/koneksi.php";
# Tombol Simpan diklik
if(isset($_POST['btnSimpan'])){
	# Baca Variabel Form
	$cmbPenyakit	= $_POST['cmbPenyakit'];
	$cmbGejala		= $_POST['cmbGejala'];
	$txtProbabilitas= $_POST['txtProbabilitas'];
	$txtProbabilitas= str_replace(",",".",$txtProbabilitas); // mengubah tanda koma(,) menjadi titik (.), misalnya: 0,5 menjadi 0.5 (desimal)

	# Validasi form, jika kosong sampaikan pesan error
	$pesanError = array();
	if (trim($cmbPenyakit)=="Kosong") {
		$pesanError[] = "Data <b>Nama Penyakit</b> belum ada yang dipilih !";		
	}
	if (trim($cmbGejala)=="Kosong") {
		$pesanError[] = "Data <b>Nama Gejala</b> belum ada yang dipilih !";		
	}
	if (trim($txtProbabilitas)=="") {
		$pesanError[] = "Data <b>Nilai Probabilitas (%)</b> tidak boleh kosong !";		
	}
	
	# Validasi Nama aturan, jika sudah ada akan ditolak
	$txtLama	= $_POST['txtLama'];
	$cekSql="SELECT * FROM aturan WHERE kd_penyakit='$cmbPenyakit' AND kd_gejala='$cmbGejala' AND NOT(kd_gejala='$txtLama')";
	$cekQry=mysql_query($cekSql, $koneksidb) or die ("Eror Query".mysql_error()); 
	if(mysql_num_rows($cekQry)>=1){
		$pesanError[] = "Maaf, aturan <b> $cmbPenyakit</b> dan <b>$cmbGejala</b> sudah ada, ganti dengan yang lain";
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
		# SIMPAN PERUBAHAN DATA, Jika jumlah error pesanError tidak ada, simpan datanya
		$Kode	= $_POST['txtKode'];
		$mySql	= "UPDATE aturan SET kd_penyakit='$cmbPenyakit', kd_gejala='$cmbGejala', 
					nilai_probabilitas='$txtProbabilitas' WHERE id_aturan ='$Kode'";
		$myQry	= mysql_query($mySql, $koneksidb) or die ("Gagal query".mysql_error());
		if($myQry){
			echo "<meta http-equiv='refresh' content='0; url=?main=aturan'>";
		}
		exit;
	}	
} // Penutup Tombol Simpan
?>

