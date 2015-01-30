<?php
$id = $_GET['id'];
	$s=mysql_fetch_array(mysql_query("SELECT * FROM gejala,penyakit,tbsolusi Where gejala.id_penyakit=penyakit.id_penyakit AND penyakit.id_penyakit=tbsolusi.id_penyakit AND id_gejala = '$id'")); ?>

<div class=judul><h2>Berikut detail data Hama Dan Penyakit Dan Gejala :</h2></div>
<br/><br/><br/><br/>
<div class='detil'>
<div class='title'><span><b>Hama Dan Penyakit : <?php echo $s['penyakit'] ?></b></span><br/>
<div syle='padding-left:50px;' ></div></div><br/>

<p><b><u>Penyebab Pada Hama Dan Penyakit <?php echo $s['penyakit'] ?> </u>:</b></p><br/>
<div style='margin-left:20px;'><?php echo$s['penyebab'] ?></div><br/>
<p><b><u>Solusi Mengatasi Pada Hama Dan Penyakit <?php echo $s['penyakit'] ?></u>:</b> </p><br/>
<div style='margin-left:20px;'><?php echo $s['solusi']?></div>
</div>

