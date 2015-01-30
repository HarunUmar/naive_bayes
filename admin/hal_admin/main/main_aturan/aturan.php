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
			$tampil=mysql_query("SELECT * FROM aturan Where id_aturan IN(" . $a . ")");
    		while($r=mysql_fetch_array($tampil)){
			
			}
            mysql_query("DELETE FROM aturan WHERE id_aturan='$a'");
            print "<script>alert('Data berhasil di dihapus');
						javascript:history.go(-1);</script>";
        }
}else{
echo "
<div class=judul><h2>Berikut Detail Basis Aturan:</h2></div>
<br/>
<form action='' method='post'>
<div style='float:right; padding:10px; width:250px; margin-top:5px;'>
<a class='thickbox' href='main/main_aturan/add_aturan.php'>Add Daftar Aturan</a>
<input type='submit' name='Del' value='Hapus' onclick='return confirmDelete();'>
</div><br/>
<table id=o width=100%><tbody>
          <tr>
		  <th width='1%' class=th>No</th>
		  <th width='1%' class=th>Kode Penyakit</th>
		  <th width='1%' class=th>Kode Gejala</th>
		  <th width='10%' class=th>Nilai Probabilitas (%)</th>
		  <th width='1%' bgcolor='#8DAD9C'><div align='center'><span class='style1'>Ubah</span></div></th>
		  <th width='1%' bgcolor='#8DAD9C'><div align='center'><span class='style1'><input type='checkbox' name='checkbox[]' class='checkall'></span></div></th>
          </tr>"; 
	$p = new Paging;
    $batas = 15;
    $posisi = $p->cariPosisi($batas);
	$tampil=mysql_query("SELECT aturan.*, penyakit.nm_penyakit, gejala.nm_gejala FROM aturan 
			LEFT JOIN penyakit ON aturan.kd_penyakit = penyakit.kd_penyakit
			LEFT JOIN gejala ON aturan.kd_gejala = gejala.kd_gejala
			ORDER BY aturan.kd_penyakit, aturan.kd_gejala desc LIMIT $posisi,$batas");
	$no=1;
	$i = $posisi;
    while ($r=mysql_fetch_array($tampil)){
	    if (($no % 2) > 0)
            $bg = '#FFFFFF'; else
            $bg = '#cccccc';
       echo "<tr bgcolor=" . $bg . "><td class=td align=center>$no</td>
			 <td class=td>$r[kd_penyakit]</td>
			 <td class=td>$r[kd_gejala]</td>
			 <td class=td>$r[nilai_probabilitas]</td>
			 <td><div align='center' style='background-color:none;'><a class='colorbox' href=main/main_aturan/edit_aturan.php?Kode=" . $r['id_aturan'] . " ><img src='../images/edit.png' border='0' width='16' height='16' /></a></div></td>
    <td><div align='center'><input type='checkbox' name='cex[]'  value='" . $r['id_aturan'] . "'></div></td>
  </tr></tr>";
$no++;
}
echo "</tbody></table></form>";

$sql_pagging = mysql_query("SELECT COUNT(*) AS jml FROM aturan");
    $pagging = mysql_fetch_array($sql_pagging);
    $jml = $pagging['jml'];


    echo"
		 </br>
        <div class='results'> <span>Jumlah Data : $jml</span><br/><br/> ";
    $jmldata = mysql_num_rows(mysql_query("SELECT * from aturan"));
    $jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman);

    echo" Halaman : $linkHalaman </div>";
}
?>