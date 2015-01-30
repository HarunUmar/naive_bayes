<?php
include "../config/koneksi.php";
function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}

$user_name = anti_injection($_POST['id-user']);
$passwd     = anti_injection(md5($_POST['passwd']));

// pastikan username dan password adalah berupa huruf atau angka.

$login=mysql_query("SELECT * FROM admin WHERE username='$user_name' AND password='$passwd'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();

  $_SESSION['nama_user']     = $r['username'];
  $_SESSION['nama_lengkap']  = $r['nama_lengkap'];
  $_SESSION['pass_user']     = $r['password'];

	$sid_lama = session_id();
	
	session_regenerate_id();

	$sid_baru = session_id();
	
	
  mysql_query("UPDATE admin SET id_session='$sid_baru' WHERE username='$user_name'");
  	if($r['password']=="$passwd"){
            echo 'OK';
        }
}
else{
  echo "<div style='color:#FF0000; font-size:13px;' ><center>LOGIN GAGAL!!<br> 
        Username atau Password Anda salah.</center></div>";
}
?>