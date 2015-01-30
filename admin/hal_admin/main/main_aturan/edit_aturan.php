<?php
require "../../../../config/koneksi.php";

$Kode	 = isset($_GET['Kode']) ?  $_GET['Kode'] : $_POST['txtKode']; 
$mySql	 = "SELECT * FROM aturan WHERE id_aturan='$Kode'";
$myQry	 = mysql_query($mySql, $koneksidb)  or die ("Query ambil data salah : ".mysql_error());
$myData	 = mysql_fetch_array($myQry);

	// Menyimpan data ke variabel temporary (sementara)
	$dataKode		= $myData['id_aturan'];
	$dataPenyakit	= isset($_POST['cmbPenyakit']) ? $_POST['cmbPenyakit'] : $myData['kd_penyakit'];
	$dataGejala		= isset($_POST['cmbGejala']) ? $_POST['cmbGejala'] : $myData['kd_gejala'];
	$dataProbabilitas	= isset($_POST['txtProbabilitas']) ? $_POST['txtProbabilitas'] : $myData['nilai_probabilitas'];
?>

<div class="add">
<fieldset>
<legend>Edit Basis Aturan <?php echo $q['id_aturan'] ?></legend>
          <div ></div>
          <form action="?main=updateaturan" method="post" name="form1">
<table class="table-list" width="100%">
	<tr>
	  <th colspan="3">UBAH DATA ATURAN </th>
	</tr>
	<tr>
	  <td width="15%"><b>Nama Penyakit </b></td>
	  <td width="1%"><b>:</b></td>
	  <td width="84%"><select name="cmbPenyakit">
        <option value="Kosong"> .... </option>
        <?php
	  $daftarSql = "SELECT * FROM penyakit ORDER BY kd_penyakit";
	  $daftarQry = mysql_query($daftarSql, $koneksidb) or die ("Gagal Query".mysql_error());
	  while ($daftarData = mysql_fetch_array($daftarQry)) {
		if ($daftarData['kd_penyakit'] == $dataPenyakit) {
			$cek = " selected";
		} else { $cek=""; }
		echo "<option value='$daftarData[kd_penyakit]' $cek>$daftarData[kd_penyakit] | $daftarData[nm_penyakit]</option>";
	  }
	  ?>
      </select>
      <input name="txtKode" type="hidden" value="<?php echo $dataKode; ?>" /></td></tr>
	<tr>
      <td><b>Nama Gejala </b></td>
	  <td><b>:</b></td>
	  <td><select name="cmbGejala">
        <option value="Kosong"> .... </option>
        <?php
	  $daftarSql = "SELECT * FROM gejala ORDER BY kd_gejala";
	  $daftarQry = mysql_query($daftarSql, $koneksidb) or die ("Gagal Query".mysql_error());
	  while ($daftarData = mysql_fetch_array($daftarQry)) {
		if ($daftarData['kd_gejala'] == $dataGejala) {
			$cek = " selected";
		} else { $cek=""; }
		echo "<option value='$daftarData[kd_gejala]' $cek>$daftarData[kd_gejala] | $daftarData[nm_gejala]</option>";
	  }
	  ?>
      </select>
      <input name="txtLama" type="hidden" value="<?php echo $myData['kd_gejala']; ?>" /></td>
    </tr>
	<tr>
      <td><b>Nilai Probabilitas (%) </b></td>
	  <td><b>:</b></td>
	  <td><input name="txtProbabilitas" type="text" value="<?php echo $dataProbabilitas; ?>" size="10" maxlength="10" /></td>
    </tr>
	<tr><td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td><input type="submit" name="btnSimpan" value=" SIMPAN "></td>
    </tr>
</table>
</form>

</fieldset>
</div>
