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
		# SIMPAN PERUBAHAN DATA, Jika jumlah error pesanError tidak ada, simpan datanya
		// Membaca Kode dari form
		$Kode	= $_POST['txtKode'];

		$mySql	= "UPDATE penyakit SET nm_penyakit='$txtNama', pencegahan='$txtPencegahan', pengobatan='$txtPengobatan', np_populasi='$txtPopulasi' 
					WHERE kd_penyakit ='$Kode'";
		$myQry	= mysql_query($mySql, $koneksidb) or die ("Gagal query".mysql_error());
		if($myQry){
			echo "<meta http-equiv='refresh' content='0; url=?main=penyakit'>";
		}
		exit;
	}	
} // Penutup Tombol Simpan

# MENGAMBIL DATA YANG DIEDIT, SESUAI KODE YANG DIDAPAT DARI URL
$Kode	= isset($_GET['Kode']) ?  $_GET['Kode'] : $_POST['txtKode']; 
$mySql	= "SELECT * FROM penyakit WHERE kd_penyakit='$Kode'";
$myQry	= mysql_query($mySql, $koneksidb)  or die ("Query salah : ".mysql_error());
$myData = mysql_fetch_array($myQry);

	# MASUKKAN DATA DARI FORM KE VARIABEL TEMPORARY (SEMENTARA)
	$dataKode	= $myData['kd_penyakit'];
	$dataNama	= isset($_POST['txtNama']) ? $_POST['txtNama'] : $myData['nm_penyakit'];
	$dataPencegahan	= isset($_POST['txtPencegahan']) ? $_POST['txtPencegahan'] : $myData['pencegahan'];
	$dataPengobatan = isset($_POST['txtPengobatan']) ? $_POST['txtPengobatan'] : $myData['pengobatan'];
	$dataPopulasi	= isset($_POST['txtPopulasi']) ? $_POST['txtPopulasi'] : $myData['np_populasi'];
?>

