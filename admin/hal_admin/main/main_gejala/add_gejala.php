<?php
session_start();
require "../../../../config/koneksi.php";
require "../../../../config/inc.library.php";
$dataKode	= buatKode("gejala", "E");
$dataNama	= isset($_POST['txtNama']) ? $_POST['txtNama'] : '';
?>
<script type="text/javascript">
function harusangka(jumlah){
  var karakter = (jumlah.which) ? jumlah.which : event.keyCode
  if (karakter > 31 && (karakter < 46 || karakter > 57))
    return (false);

  return (true);
}
</script>

<link href="../../../../style/style.css" rel="stylesheet" type="text/css" /> 
<div class="add">
<fieldset>
<legend>Tambah Daftar Gejala</legend>
          <div ></div>
          <form action="?main=simpangejala" method="post" name="form1" target="_self">
<table class="table-list" width="100%">
	<tr>
	  <th colspan="3">TAMBAH  GEJALA </th>
	</tr>
	<tr>
	  <td width="15%"><b>Kode</b></td>
	  <td width="1%"><b>:</b></td>
	  <td width="84%"><input name="textfield" value="<?php echo $dataKode; ?>" size="10" maxlength="4" readonly="readonly"/></td></tr>
	<tr>
	  <td><b>Nama Gejala </b></td>
	  <td><b>:</b></td>
	  <td><input name="txtNama" value="<?php echo $dataNama; ?>" size="80" maxlength="100" /></td>
	</tr>
	<tr><td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td><input type="submit" name="btnSimpan" value=" SIMPAN "></td>
    </tr>
</table>
</form>
</fieldset>
</div>