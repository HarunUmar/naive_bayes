<?php
# Konek ke Web Server Lokal
$myHost	= "localhost";
$myUser	= "root";
$myPass	= "root";
$myDbs	= "dbparu";

// Konek ke MySQL Server 
$koneksidb	= mysql_connect($myHost, $myUser, $myPass);
if (! $koneksidb) {
  echo "Ada kesalahan koneksi ke MySQL !";
}

// Memilih database pd MySQL Server
mysql_select_db($myDbs) or die ("Database <b>$myDbs</b> tidak ditemukan !");
?>