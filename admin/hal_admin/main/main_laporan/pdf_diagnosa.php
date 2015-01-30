<?php
include "class.ezpdf.php";
require "../../../../config/koneksi.php";
include "../../../../config/fungsi_indotgl.php";
include "../../../../config/fungsi_combobox.php";
include "../../../../config/library.php";
  
$pdf = new Cezpdf();
 
// Set margin dan font
$pdf->ezSetCmMargins(3, 3, 3, 3);
$pdf->selectFont('fonts/Courier.afm');

$all = $pdf->openObject();

// Tampilkan logo
$pdf->setStrokeColor(0, 0, 0, 1);
//$pdf->addJpegFromFile('logo.jpg',20,800,69);

// Teks di tengah atas untuk judul header
$pdf->addText(180, 820, 18,'<b>Laporan Hasil Diagnosa</b>');
$pdf->addText(200, 800, 14,'<b>Penyakit Demam Berdarah</b>');
// Garis atas untuk header
$pdf->line(10, 795, 578, 795);

// Garis bawah untuk footer
$pdf->line(10, 50, 578, 50);
// Teks kiri bawah
$pdf->addText(30,34,8,'Dicetak tgl:' . date( 'd-m-Y, H:i:s'));

$pdf->closeObject();

// Tampilkan object di semua halaman
$pdf->addObject($all, 'all');

// Baca input tanggal yang dikirimkan user
$mulai=$_POST[thn_mulai].'-'.$_POST[bln_mulai].'-'.$_POST[tgl_mulai];
$selesai=$_POST[thn_selesai].'-'.$_POST[bln_selesai].'-'.$_POST[tgl_selesai];

// Query untuk merelasikan kedua tabel di filter berdasarkan tanggal
$sql = mysql_query("SELECT diagnosa.kd_penyakit as kd_penyakit,penyakit.nm_penyakit,DATE_FORMAT(tgl_diagnosa, '%d-%m-%Y') as tanggal,
                    nama,jenis_kelamin,usia,alamat 
                    FROM diagnosa, penyakit  
                    WHERE (diagnosa.kd_penyakit=penyakit.kd_penyakit) 
                    
					 AND (diagnosa.tgl_diagnosa BETWEEN '$mulai' AND '$selesai')");
$jml = mysql_num_rows($sql);

if ($jml > 0){
$i = 1;
while($r = mysql_fetch_array($sql)){
  
  
  $data[$i]=array('<b>No</b>'=>$i, 
                  '<b>Nama</b>'=>$r[nama], 
                  '<b>Jenis Kelamin</b>'=>$r[jenis_kelamin], 
                  '<b>Usia</b>'=>$r[usia], 
                  '<b>Alamat</b>'=>$r[alamat],
				  '<b>Penyakit</b>'=>$r[nm_penyakit], 
                  '<b>Tgl_Diagnosa</b>'=>$r[tanggal]);
                  
  $i++;
}

$pdf->ezTable($data, '', '', '');

// Penomoran halaman
$pdf->ezStartPageNumbers(320, 15, 8);
$pdf->ezStream();
}
else{
  $m=$_POST[tgl_mulai].'-'.$_POST[bln_mulai].'-'.$_POST[thn_mulai];
  $s=$_POST[tgl_selesai].'-'.$_POST[bln_selesai].'-'.$_POST[thn_selesai];
  echo "Tidak ada Laporan/Hasil Diagnosa pada Tanggal $m s/d $s";
  //echo '<script language="javascript">window.location = "javascript:history.go(-1)"</script>';
}

?>
