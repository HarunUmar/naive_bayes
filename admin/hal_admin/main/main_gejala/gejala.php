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


            mysql_query("DELETE FROM gejala WHERE kd_gejala='$a' ");
            print "<script>alert('Data berhasil di dihapus');
						javascript:history.go(-1);</script>";
        }
}else{
echo "
<div class=judul><h2>Berikut detail data Gejala:</h2></div>
<br/>
<form action='' method='post'>
<div style='float:right; padding:10px; width:250px; margin-top:5px;'>
<a class='thickbox' href='main/main_gejala/add_gejala.php'>Add Daftar Gejala</a>
<input type='submit' name='Del' value='Hapus' onclick='return confirmDelete();'>
</div><br/>
<table id=o width=100%><tbody>
          <tr>
		  <th width='1%' class=th>no</th>
		  <th width='7%' class=th>Kode Gejala</th>
		  <th width='13%' class=th>Nama Gejala</th>
		 
		  <th width='1%' bgcolor='#8DAD9C'><div align='center'><span class='style1'>ubah</span></div></th>
		  <th width='1%' bgcolor='#8DAD9C'><div align='center'><span class='style1'><input type='checkbox' name='checkbox[]' class='checkall'></span></div></th>
          </tr>"; 
	$p = new Paging;
    $batas = 15;
    $posisi = $p->cariPosisi($batas);
	$tampil=mysql_query("SELECT * FROM gejala order by kd_gejala desc LIMIT $posisi,$batas");
	$i = 0;
	$i = $posisi;
    while ($r=mysql_fetch_array($tampil)){
	    if (($i % 2) > 0)
            $bg = '#ffffff'; else
            $bg = '#cccccc';
       echo "<tr bgcolor=" . $bg . ">
	         <td class=td align=center>" . ++$i ."</td>
             <td class=td>$r[kd_gejala]</td>
			 <td class=td>$r[nm_gejala]</td>
			 
			 <td><div align='center' style='background-color:none;'><a class='colorbox' href=main/main_gejala/edit_gejala.php?Kode=" . $r['kd_gejala'] . " ><img src='../images/edit.png' border='0' width='16' height='16' /></a></div></td>
    <td><div align='center'><input type='checkbox' name='cex[]'  value='" . $r['kd_gejala'] . "'></div></td>
  </tr></tr>";

}
echo "</tbody></table></form>";

$sql_pagging = mysql_query("SELECT COUNT(*) AS jml FROM gejala");
    $pagging = mysql_fetch_array($sql_pagging);
    $jml = $pagging['jml'];


    echo"
		 </br>
        <div class='results'> <span>Jumlah Data : $jml</span><br/><br/> ";
    $jmldata = mysql_num_rows(mysql_query("SELECT * from gejala"));
    $jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman);

    echo" Halaman : $linkHalaman </div>";
}
?>