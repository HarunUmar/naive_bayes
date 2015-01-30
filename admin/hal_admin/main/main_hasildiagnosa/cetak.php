<?php 
session_start();
require "../../../../config/koneksi.php";
$NOIP = $_GET['id'];

$sql = "SELECT diagnosa.*, pasien.* , penyakit.* 
		FROM diagnosa,pasien,penyakit
		WHERE pasien.idpasien=diagnosa.idpasien
		AND diagnosa.idpasien='$NOIP' AND diagnosa.kd_penyakit=penyakit.kd_penyakit
		
		ORDER BY diagnosa.idpasien DESC LIMIT 1";
$qry = mysql_query($sql, $koneksidb) 
	   or die ("Query Hasil salam".mysql_error());
$data1= mysql_fetch_array($qry);




?>
<html>
<head>
<title>Hasil Analisa Pasien</title>
<style type="text/css">
<!--
.style1 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
</head>
<body>
<table width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#DBEAF5">
  <tr align="center" bgcolor="#0099CC"> 
    <td height="35" colspan="2" align="left" valign="top"><div align="center">
      <h3 class="style1">Laporan Hasil Dianogsa Penyakit Demam Berdarah</h3>
    </div></td>
  </tr>
  <tr> 
    <td colspan="2"><b>DATA PETANI :</b></td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td width="188">Nama</td>
    <td width="870"><?php echo $data1['nama']; ?></td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td>Kelamin</td>
    <td><?php echo $data1['jenis_kelamin']; ?></td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td>Usia</td>
    <td><?php echo $data1['usia']; ?> Tahun</td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td>Alamat</td>
    <td><?php echo $data1['alamat']; ?></td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td colspan="2"><b>HASIL ANALISA TERAKHIR :</b></td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td>Penyakit</td>
    <td><?php echo $data1['nm_penyakit']; ?></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td valign="top">Penyebab </td>
    <td><?php echo $data1['pencegahan']; ?></td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td valign="top">Solusi</td>
    <td><?php echo $data1['pengobatan']; ?></td>
  </tr>
  
</table>
</body>
</html>
