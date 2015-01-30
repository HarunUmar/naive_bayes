<script type="text/javascript">
			$(document).ready(function(){
				//Examples of how to assign the ColorBox event to elements
				$(".thickbox").colorbox({width:"50%", height:"75%"});

			});
</script>
<script type="text/javascript">
			$(document).ready(function(){
				//Examples of how to assign the ColorBox event to elements
				$(".colorbox").colorbox({width:"50%", height:"75%"});

			});
</script>
<?php

if (isset($_POST['Del'])) {

        if ($_POST['cex'] == NULL) {
            echo "<script>window.alert('Data yang akan dihapus belum di pilih')
                                javascript:history.go(-1);</script>";
        } else {
            $a = join(",", $_POST['cex']);
			$tampil=mysql_query("SELECT * FROM pasien Where idpasien='$a'");
    		while($r=mysql_fetch_array($tampil)){
			//unlink("../../../gambar/small_$r[gambar]");
			}
            mysql_query("DELETE FROM pasien WHERE idpasien='$a'");
            print "<script>alert('Data berhasil di dihapus');
						javascript:history.go(-1);</script>";
        }
}else{
echo "
<div class=judul><h2>Berikut Detail Data Hasil Diagnosa:</h2></div>
<br/>
<form action='' method='post'>
<div style='float:right; padding:10px; width:100px; margin-top:5px;'>

<input type='submit' name='Del' value='Hapus' onclick='return confirmDelete();'>
</div><br/>
<table id=o width=100%><tbody>
          <tr>
		  <th width='1%' class=th>no</th>
		  <th width='5%' class=th>Nama</th>
		  <th width='1%' class=th>Jenis Kelamin</th>
		  <th width='1%' class=th>Usia</th>
		  <th width='10%' class=th>Alamat</th>
		  <th width='1%' class=th>Lihat Diagnosa</th>
		  <th width='1%' bgcolor='#8DAD9C'><div align='center'><span class='style1'><input type='checkbox' name='checkbox[]' class='checkall'></span></div></th>
          </tr>"; 
	$p = new Paging;
    $batas = 15;
    $posisi = $p->cariPosisi($batas);
	$tampil=mysql_query("SELECT * FROM pasien order by idpasien desc LIMIT $posisi,$batas");
	$no=1;
	$i = $posisi;
    while ($r=mysql_fetch_array($tampil)){
	    if (($no % 2) > 0)
            $bg = '#FFFFFF'; else
            $bg = '#cccccc';
       echo "<tr bgcolor=" . $bg . "><td class=td align=center>$no</td>
			 <td class=td>$r[nama]</td>
			 <td class=td>$r[jenis_kelamin]</td>
			 <td class=td>$r[usia]</td>
			 <td class=td>$r[alamat]</td>
			  
			<td align='center' class=td><div align='center' style='background-color:none;'><a class='colorbox' href=main/main_hasildiagnosa/cetak.php?id=" . $r['idpasien'] . " ><img src='../images/dt.png' border='0' width='16' height='16' title='Lihat Hasil Diagnosa' /></a></div></td>
    <td><div align='center'><input type='checkbox' name='cex[]'  value='" . $r['idpasien'] . "'></div></td>
  </tr></tr>";
$no++;
}
echo "</tbody></table></form>";

$sql_pagging = mysql_query("SELECT COUNT(*) AS jml FROM pasien");
    $pagging = mysql_fetch_array($sql_pagging);
    $jml = $pagging['jml'];


    echo"
		 </br>
        <div class='results'> <span>Jumlah Data : $jml</span><br/><br/> ";
    $jmldata = mysql_num_rows(mysql_query("SELECT * from pasien"));
    $jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman);

    echo" Halaman : $linkHalaman </div>";
}
?>