<?php 
session_start();
include "../../config/koneksi.php";
include "../../config/print.php";


$NOIP = $_SESSION['id_p'];

$sql = "SELECT diagnosa.*, petani.* , penyakit.*, tbsolusi.* 
		FROM diagnosa,petani,penyakit,tbsolusi 
		WHERE petani.idpetani=diagnosa.idpetani
		AND diagnosa.idpetani='$NOIP' AND diagnosa.id_penyakit=penyakit.id_penyakit
		AND diagnosa.id_penyakit=tbsolusi.id_penyakit
		ORDER BY diagnosa.idpetani DESC LIMIT 1";
$qry = mysql_query($sql, $koneksi) 
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
      <h3 class="style1">Laporan Hasil Dianogsa Penyakit Tanaman Terung</h3>
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
    <td><?php echo $data1['penyakit']; ?></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td valign="top">Penyebab </td>
    <td><?php echo $data1['penyebab']; ?></td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td valign="top">Solusi</td>
    <td><?php echo $data1['solusi']; ?></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td valign="top">Gambar</td>
    <td><?php  echo "<img src='../../image/foto/$data1[foto]' width=150 height=180>" ?></td>
  </tr>
</table>
</body>
</html>
