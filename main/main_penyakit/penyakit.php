<style type="text/css">
<!--
.style1 {
	color: #A5ADB6;
}
-->
</style>
<span class="style1"></span>
<?php

echo "
<div class=judul><h2>Daftar Gejala Demam Berdarah:</h2></div>
<br/><br/><br/>"; 
	
	$sql=mysql_query("SELECT * FROM gejala");
	$no=1; 
	echo "<br/><p><b>Penyakit : $r[penyakit]</b></p>
	<table id=o width=100%><tbody> <tr>
			  <th width='2%' class=th>no</th>
			  <th width='88%' class=th>Gejala</th>
			
	      </tr>";
    while($q=mysql_fetch_array($sql)){
	if (($no % 2) > 0)
            $bg = '#fff'; else
            $bg = '#cccccc';
       echo "	         
         
		  <tr bgcolor=" . $bg . ">
		      <td class=td align=center>$no</td>
              <td class=td>$q[nm_gejala]</td>
			   
		 </tr>";
		 $no++;
		 }
		 echo"</tbody></table><p>&nbsp;</p><hr>";


?>