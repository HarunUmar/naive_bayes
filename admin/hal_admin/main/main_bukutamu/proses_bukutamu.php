<?php
require "../../../../config/koneksi.php";
$id = $_REQUEST['id'];
$val = $_REQUEST['val'];
$query = mysql_query("UPDATE bukutamu SET publish  = '$val' Where id_bukutamu = '$id'");
if ($val == '') $val = "_show";
if ($query){
	echo "Fields" . "$id" . "|" . stripslashes($val);
}
echo "<meta http-equiv='refresh' content='0; url=../../index.php?main=bukutamu'>"; 

?>
