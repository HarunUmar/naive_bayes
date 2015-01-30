<div class='judul'><h2>BUKU TAMU</h2></div><br/><br/><br/><br/>
<form method="POST"  name="frm" id="frm" action="send-contact">
          <table class="in" width="100%">
          <tr><td>Nama Tamu</td><td> : <input type=text  name="nama" ></td></tr>
		  <tr><td>Email</td><td> : <input type=text name="email" ></td></tr>
          <tr><td>Pesan</td><td>&nbsp;&nbsp;<textarea name='pesan' style="width:250px;height:100px;" ></textarea></td></tr>
          <tr><td>&nbsp;</td><td>&nbsp;&nbsp;<img src='javascript/captcha.php' width="120px"></td></tr>
          <tr><td>&nbsp;</td><td>&nbsp;&nbsp;(Masukkan 6 kode diatas)<br />&nbsp;&nbsp;<input type=text name=captcha size=6 maxlength=6 style="width:50px;" ><br /></td></tr>	  
          <tr><td></td>
		      <td>&nbsp;&nbsp;&nbsp; &nbsp;
			      <input type="submit" value="Kirim" >
              </td></tr>
          </table>
</form>	<br/>
<div class='bukutamu'>
  <?php 
require "../config/koneksi.php";
$sql = mysql_query("SELECT * FROM bukutamu Where publish='Y' order by id_bukutamu DESC LIMIT 5");
    $no=1;
    while ($r = mysql_fetch_array($sql)) {
	if (($no % 2) > 0)
            $bg = '#e2e2e2'; else
            $bg = '';
	echo "<table class=in width='100%' bgcolor=" . $bg . ">
	      <tr><td width=50px></td><td align=right><img src='image/calendar_icon.gif'> $r[tanggal] </td></tr>
          <tr><td width=50px><b>Nama</b></td><td> $r[nama] </td></tr>
          <tr><td width=50px><b>Email</b></td><td> $r[email] </td></tr>
		  <tr><td width=50px><b>Pesan</b></td><td> $r[pesan] </td></tr>
     </table>";
	$no++;
	}
?>
</div>