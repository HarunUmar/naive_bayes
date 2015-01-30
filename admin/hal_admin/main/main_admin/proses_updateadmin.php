<?php
 include "../../../../config/koneksi.php";
 if ($_GET['main'] == 'private'){
	  $id= $_POST['id'];
$r = mysql_fetch_array(mysql_query("SELECT * FROM admin WHERE id_session = '$id' "));
 
 $pass_lama=md5($_POST['passold']);
 $pass_baru=md5($_POST['passnew']);
 
if (empty($_POST["passnew"]) OR empty($_POST["passold"]) OR empty($_POST["passnew2"])){
    echo "<script>window.alert('Wajib isikan password lama sebelumnya dan Password Baru sebanyak dua kali ');
                window.location=('../../index.php?main=setuser')</script>";
} else { 
// Apabila password lama cocok dengan password admin di database
	if ($r['password'] == $pass_lama){
  // Pastikan bahwa password baru yang dimasukkan sebanyak dua kali sudah cocok
  	if ($_POST["passnew"]==$_POST["passnew2"]){
    mysql_query("UPDATE admin SET password = '$pass_baru' WHERE id_session = '$id'");
	session_start();
	session_destroy();
    header('location:../../../index.php?reset=3');
  	}
  	else{
	    echo "<script>window.alert('Password baru yang Anda masukkan sebanyak dua kali belum cocok.');
                window.location=('../../index.php?main=setuser')</script>";
    }
} else {
    echo "<script>window.alert('Anda salah memasukkan Password Lama Anda ');
                window.location=('../../index.php?main=setuser')</script>";
 }
}

} else {
$id= $_POST['id'];
$nm = $_POST['nama'];
$telp = $_POST['telp'];
$email = $_POST['email'];
mysql_query("UPDATE admin SET nama_lengkap = '$nm', no_telp = '$telp', email = '$email'  WHERE id_session = '$id'");
echo "<script>window.alert('Anda telah berhasil update data');
                window.location=('../../index.php?main=setuser')</script>";
}
?>