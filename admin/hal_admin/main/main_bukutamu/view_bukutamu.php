<?php
session_start();
require "../../../../config/koneksi.php";
$id = $_GET['id'];
$sql = mysql_query("SELECT * FROM bukutamu Where id_bukutamu = '$id'");
$r = mysql_fetch_array($sql);
?>

<div class="add">
<fieldset>
<legend>Edit Buku Tamu</legend>
          <div ></div>
          <form method="POST" action="main/main_bukutamu/proses_bukutamu.php">
          <input type=hidden name="id" value='<?php echo $r['id_bukutamu'] ?>'>
          <table class="in">
          <tr><td>Nama</td><td> : <?php echo $r['nama'] ?></td></tr>
          <tr><td>Email</td><td> : <?php echo $r['email'] ?></td></tr>
		  <tr><td>Pesan</td><td> : <?php echo $r['pesan'] ?></td></tr>
          <tr><td>Tanggal</td><td> : <?php echo $r['tanggal'] ?></td></tr>
          <?php if ($r['publish']=='N'){
      echo "<tr><td>Tampilkan</td> <td> : <input type=radio name='val' value='N' checked> N  
                                        <input type=radio name='val' value='Y'> Y</td></tr>";
    }
    else{
      echo "<tr><td>Tampilkan</td> <td> : <input type=radio name='val' value='N'> N 
                                        <input type=radio name='val' value='Y' checked> Y</td></tr>";
    } ?>
          <tr><td></td>
		      <td>&nbsp;&nbsp;&nbsp; &nbsp;
			      <input type="submit" name="submit" value="Simpan">
                  
              </td></tr>
          </table>	
		  </form>
</fieldset>
</div>