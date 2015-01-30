<?php
require "../../../../config/koneksi.php";
$dataPenyakit		= isset($_POST['cmbPenyakit']) ? $_POST['cmbPenyakit'] : '';
$dataGejala			= isset($_POST['cmbGejala']) ? $_POST['cmbGejala'] : '';
$dataProbabilitas	= isset($_POST['txtProbabilitas']) ? $_POST['txtProbabilitas'] : '';
?>


<div class="add">
<fieldset>
<legend>Tambah Daftar Basis Aturan</legend>
          <div ></div>
         <form action="?main=simpanaturan" method="post" name="form1" target="_self">
<table class="table-list" width="100%">
	<tr>
	  <th colspan="3">TAMBAH  DATA ATURAN  </th>
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
      </select></td>
	</tr>
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
      </select></td>
    </tr>
	<tr>
      <td><b>Nilai Probabilitas  (%)</b></td>
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
