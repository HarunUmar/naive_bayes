
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


            mysql_query("DELETE FROM bukutamu WHERE id_bukutamu IN(" . $a . ")");
            print "<script>alert('Data berhasil di dihapus');
						javascript:history.go(-1);</script>";
        }
}else{
    echo "
<body>
<div class='judul'><h1>DATA BUKU TAMU</h1></div><br/>
<br/>
<form action='' method='post'>
<div style='float:right; padding:10px; width:70px; margin-top:5px;'>
<input type='submit' name='Del' value='Hapus' onclick='return confirmDelete();'>
</div><br/>
			<table width='100%' border='0' align='center' style='margin-bottom:50px;'>
  <tr>
    <th width='1%' bgcolor='#8DAD9C'><div align='center' class='style1'>NO</div></th>
    <th width='20%' bgcolor='#8DAD9C'><div align='center' class='style1'>Nama</div></th>
	<th width='20%' bgcolor='#8DAD9C'><div align='center' class='style1'>Email</div></th>
    <th width='10%' bgcolor='#8DAD9C'><div align='center' class='style1'>Tanggal</div></th> 
	<th width='2%' bgcolor='#8DAD9C'><div align='center' class='style1'>Status</div></th> 
    <th width='1%' bgcolor='#8DAD9C'><div align='center'><span class='style1'>Lihat</span></div></th>
    <th width='1%' bgcolor='#8DAD9C'><div align='center'><span class='style1'><input type='checkbox' name='checkbox[]' class='checkall'></span></div></th>
  </tr>";

	$p = new Paging;
    $batas = 10;
    $posisi = $p->cariPosisi($batas);
    $sql = mysql_query("SELECT * FROM bukutamu order by id_bukutamu desc LIMIT $posisi,$batas");
	$i = 0;
	$i = $posisi;
    while ($r = mysql_fetch_array($sql)) {
        if (($i % 2) > 0)
            $bg = '#FFFFFF'; else
            $bg = '#cccccc';

	$pilihan_status = array('Y','N');
    $pilih_status = '';
    foreach ($pilihan_status as $status) {
	   $pilih_status .= "<option value='$status'";
	   if ($status == $r['publish']) {
		    $pilih_status .= " selected";
	   }

	   $pilih_status .= ">$status</option>\r\n";
    }
        echo"
  <tr bgcolor=" . $bg . ">
  
    <td><div align='center'>" . ++$i . "</div></td>
    <td><div align='left'>" . $r['nama'] . "</div></td>
	<td><div align='left'>" . $r['email'] . "</div></td>
	<td><div align='center'>". $r['tanggal'] . "</div></td>
	<td><div align='center'>". $r['publish'] . "</div></td>
	
    <td><div align='center' style='background-color:none;'><a class='colorbox' href=main/main_bukutamu/view_bukutamu.php?id=" . $r['id_bukutamu'] . " ><img src='../images/dt.png' border='0' width='16' height='16' /></a></div></td>
    <td><div align='center'><input type='checkbox' name='cex[]'  value='" . $r['id_bukutamu'] . "'></div></td>
  </tr>";
    } echo"</table></form>";

    $sql_pagging = mysql_query("SELECT COUNT(*) AS jml FROM bukutamu");
    $pagging = mysql_fetch_array($sql_pagging);
    $jml = $pagging['jml'];
	    echo"
        <div class='results'> <span>Jumlah Data : $jml</span><br/><br/> ";
    $jmldata = mysql_num_rows(mysql_query("SELECT * from bukutamu"));
    $jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman);

    echo" Halaman : $linkHalaman
	</div>";
} 
?>

