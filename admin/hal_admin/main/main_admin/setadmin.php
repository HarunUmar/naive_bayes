<script src="../ajax/jquery.validate.min.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#frm").validate({
					debug: false,
					rules: {
						nama: "required",
						user: "required",
						telp : "required"
					},
					messages: {
						nama: "<font style='color:#FF0000;'>* Masukan nama lengkap Anda</font>",
						user: "<font style='color:#FF0000;'>* Username Tidal boleh kosong</font>",
						telp: "<font style='color:#FF0000;'>* Kosong</font>"
					},
					submitHandler: function(form) {
						// do other stuff for a valid form
						$.post('logistik_data/log_users/prosses_update.php', $("#frm").serialize(), function(data) {
							$('#hasil').html(data);			  
							$('#divResult').text('Data berhasil diupdate').css({'color':'#000000','background-color':'#FFFF00'}).fadeIn();	
						
						});
					}
				});
			});
			</script>

<?php
require "../../config/koneksi.php";
$qryuser = mysql_query ("select * from admin ") or die('MySql Error' . mysql_error());
$us = mysql_fetch_array($qryuser);
?>
<div class=judul><h2>Berikut detail data admin:</h2></div><br/><br/><br/><br/>
<form method="POST" action="main/main_admin/proses_updateadmin.php?main=nama" name="frm">
<table>
          <tr><td width="150px">Nama Lengkap</td><td> : <input value='<?php echo $us['nama_lengkap']; ?>' type="text" name="nama"></td></tr>
		  <tr><td>No. Telp</td><td> : <input value='<?php echo $us['no_telp']; ?>' type="text" name="telp"></td></tr>        
          <tr><td>Email</td><td> : <input value='<?php echo $us['email']; ?>' type="text" name="email"></td></tr>
          <tr><td></td><td></td></tr>
          <tr><td></td>
		      <td>&nbsp;&nbsp;&nbsp; &nbsp;
              	  <input type=hidden name="id" value='<?php echo $us['id_session'] ?>' >
			      <input type="submit" name="submit" value="Ubah" >
              </td></tr>
          </table>
</form><br/><br/>
		 	<form method="POST" action="main/main_admin/proses_updateadmin.php?main=private" name="frm">
<table>
		  <tr><td  width="150px">Username</td><td> : <input type="text" value=<?php echo $us['username']; ?> disabled></td></tr>
		  <tr><td>Password Lama</td><td> : <input type="password" name="passold"></td></tr>
		  <tr><td>Password Baru</td><td> : <input type="password" name="passnew" ></td></tr>
          <tr><td>Ulangi Password Baru</td><td> : <input type=password name="passnew2" ></td></tr>
          <tr><td></td><td></td></tr>          
          <tr><td></td>
		      <td>&nbsp;&nbsp;&nbsp; &nbsp;
              	  <input type=hidden name="id" value='<?php echo $us['id_session'] ?>' >
			      <input type="submit" name="submit" value="Ubah" >
              </td></tr>
          </table>
</form>

