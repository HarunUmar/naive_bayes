<?php
include "../config/koneksi.php";
include "../config/inc.library.php";
?>
<div class='judul'><h2>DATA BASIS ATURAN PER PENYAKIT </h2></div>
<table class="in" width="100%' border="0" cellspacing="1" cellpadding="3">
  <tr>
    <td width="1%" bgcolor="#CCCCCC"><strong>No</strong></td>
    <td width="20%" bgcolor="#CCCCCC"><strong>PENYAKIT</strong></td>
    <td width="30%" bgcolor="#CCCCCC"><strong>GEJALA</strong></td>
  </tr>
<?php
// Menampilkan daftar aturan
$mySql = "SELECT * FROM penyakit ORDER BY kd_penyakit ASC";
$myQry = mysql_query($mySql, $koneksidb)  or die ("Query salah : ".mysql_error());
$nomor = 0; 
while($myData = mysql_fetch_array($myQry)) {
	$nomor++;
	$Kode	= $myData['kd_penyakit'];
	// gradasi warna
	if($nomor%2==1) { $warna=""; } else {$warna="#F5F5F5";}
?>
  <tr  bgcolor="<?php echo $warna; ?>">
    <td><?php echo $nomor; ?></td>
    <td><?php echo $myData['kd_penyakit']." / ".$myData['nm_penyakit']; ?></td>
    <td>
	<table class="in" width="100%" border="0" cellspacing="1" cellpadding="2">
      <tr>
        <td width="1%" bgcolor="#CCCCCC"><b>No</b></td>
        <td width="10%" bgcolor="#CCCCCC"><b>Kode </b></td>
        <td width="20%" bgcolor="#CCCCCC"><b>Nama Gejala</b></td>
        <td width="10%" bgcolor="#CCCCCC"><strong>Probabilitas (%)</strong></td>
        </tr>
      <?php
	  // Menampilkan daftar aturan
	$my2Sql = "SELECT aturan.*,  gejala.nm_gejala FROM aturan 
			LEFT JOIN gejala ON aturan.kd_gejala = gejala.kd_gejala
			WHERE aturan.kd_penyakit = '$Kode'
			ORDER BY aturan.kd_gejala ASC";
	$my2Qry = mysql_query($my2Sql, $koneksidb)  or die ("Query salah : ".mysql_error());
	$nomor2 = 0; 
	while ($my2Data = mysql_fetch_array($my2Qry)) {
		$nomor2++;
		// gradasi warna
		if($nomor2%2==1) { $warna2=""; } else {$warna2="#F5F5F5";}
	?>
      <tr bgcolor="<?php echo $warna2; ?>">
        <td><?php echo $nomor2; ?></td>
        <td><?php echo $my2Data['kd_gejala']; ?></td>
        <td><?php echo $my2Data['nm_gejala']; ?></td>
        <td><?php echo $my2Data['nilai_probabilitas']; ?></td>
        </tr>
      <?php } ?>
    </table></td>
  </tr>
<?php } ?>
</table>
