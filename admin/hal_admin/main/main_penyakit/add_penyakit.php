<?php
session_start();
?>
<link href="../../../../style/style.css" rel="stylesheet" type="text/css" /> 
<div class="add">
<fieldset>
<legend>Tambah Daftar Penyakit</legend>
          <div ></div>
<?php
include "../../../../config/inc.library.php";
include "../../../../config/koneksi.php";
$dataKode	= buatKode("penyakit", "H");
$dataNama	= isset($_POST['txtNama']) ? $_POST['txtNama'] : '';
$dataPencegahan	= isset($_POST['txtPencegahan']) ? $_POST['txtPencegahan'] : '';
$dataPengobatan = isset($_POST['txtPengobatan']) ? $_POST['txtPengobatan'] : '';
$dataPopulasi	= isset($_POST['txtPopulasi']) ? $_POST['txtPopulasi'] : '';
?>
<form action="?main=simpanpenyakit" method="post" name="form1">
<table width="100%" cellpadding="2" cellspacing="1" class="table-list">
	<tr>
	  <th colspan="3">TAMBAH DATA PENYAKIT </th>
	</tr>
	<tr>
	  <td width="15%"><strong>Kode</strong></td>
	  <td width="1%"><strong>:</strong></td>
	  <td width="84%"><input name="textfield" value="<?php echo $dataKode; ?>" size="10" maxlength="4" readonly="readonly"/></td></tr>
	<tr>
	  <td><strong>Nama Penyakit </strong></td>
	  <td><strong>:</strong></td>
	  <td><input name="txtNama" value="<?php echo $dataNama; ?>" size="80" maxlength="100" /></td>
	</tr>
	<tr>
      <td><strong>Pencegahan</strong></td>
	  <td><strong>:</strong></td>
	  <td><textarea name="txtPencegahan" cols="70" rows="3"><?php echo $dataPencegahan; ?></textarea></td>
    </tr>
	<tr>
      <td><strong>Pengobatan </strong></td>
	  <td><strong>:</strong></td>
	  <td><textarea name="txtPengobatan" cols="70" rows="3"><?php echo $dataPengobatan; ?></textarea></td>
    </tr>
	<tr>
      <td><strong>Populasi</strong></td>
	  <td><strong>:</strong></td>
	  <td><input name="txtPopulasi" value="<?php echo $dataPopulasi; ?>" size="20" maxlength="20" /></td>
	</tr>
	<tr><td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td><input type="submit" name="btnSimpan" value=" SIMPAN "></td>
    </tr>
</table>
</form>
</fieldset>
</div>