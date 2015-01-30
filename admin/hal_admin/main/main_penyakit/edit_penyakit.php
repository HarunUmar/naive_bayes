<?php
session_start();
include "../../../../config/koneksi.php";


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
<form action="?main=updatepenyakit" method="post" name="form1" enctype="multipart/form-data">
<table class="table-list" width="100%">
	<tr>
	  <th colspan="3">UBAH DATA PENYAKIT </th>
	</tr>
	<tr>
	  <td width="15%"><strong>Kode</strong></td>
	  <td width="1%"><strong>:</strong></td>
	  <td width="84%"><input name="textfield" value="<?php echo $dataKode; ?>" size="8" maxlength="4"  readonly="readonly"/>
    <input name="txtKode" type="hidden" value="<?php echo $dataKode; ?>" /></td></tr>
	<tr>
	  <td><strong>Nama Penyakit </strong></td>
	  <td><strong>:</strong></td>
	  <td><input name="txtNama" type="text" value="<?php echo $dataNama; ?>" size="80" maxlength="100" />
      <input name="txtLama" type="hidden" value="<?php echo $myData['nm_penyakit']; ?>" /></td></tr>
	<tr>
      <td><strong>Pencegahan</strong></td>
	  <td><strong>:</strong></td>
	  <td><textarea name="txtPencegahan" cols="60" rows="3"><?php echo $dataPencegahan; ?></textarea></td>
    </tr>
	<tr>
      <td><strong>Pengobatan </strong></td>
	  <td><strong>:</strong></td>
	  <td><textarea name="txtPengobatan" cols="60" rows="3"><?php echo $dataPengobatan; ?></textarea></td>
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