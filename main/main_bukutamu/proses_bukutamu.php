<?php
session_start();
error_reporting(0); 
include "../../config/koneksi.php";

$nama=trim($_POST['nama']);
$email=trim($_POST['email']);
$pesan=trim($_POST['pesan']);
$captcha=trim($_POST['captcha']);


$kar1=strstr($_POST['email'], "@");
$kar2=strstr($_POST['email'], ".");

if (empty($nama)){
          echo "<script>window.alert('Anda belum mengisikan Nama');
                window.location=('bukutamu.html')</script>";}
elseif (empty($email)){
              echo "<script>window.alert('Anda belum mengisikan Email');
                    window.location=('bukutamu.html')</script>"; }
elseif (strlen($kar1)==0 OR strlen($kar2)==0){
              echo "<script>window.alert('Alamat email Anda tidak valid, mungkin kurang tanda titik (.) atau tanda @.');
                    window.location=('bukutamu.html')</script>";}
elseif (empty($pesan)){
              echo "<script>window.alert('Anda belum mengisikan Pesan');
                    window.location=('bukutamu.html')</script>"; 
              echo"return (true)";}


else{
     function antiinjection($data){
              $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
              return $filter_sql; 
			  }

		 $nama = antiinjection($_POST['nama']);
		 $email = antiinjection($_POST['email']);
		 $pesan= antiinjection($_POST['pesan']);
		 $captcha= antiinjection($_POST['captcha']);


	      if(!empty($_POST['captcha'])){
		     if($_POST['captcha']==$_SESSION['captcha_session']){
                 $split_text = explode(" ",$captcha);
                 $split_count = count($split_text);
                 $max = 57;


              for($i = 0; $i <= $split_count; $i++){
                  if(strlen($split_text[$i]) >= $max){
                     for($j = 0; $j <= strlen($split_text[$i]); $j++){
                         $char[$j] = substr($split_text[$i],$j,1);

                         if(($j % $max == 0) && ($j != 0)){
                             $v_text .= $char[$j] . ' ';  }

                         else{  $v_text .= $char[$j];  }
                     } 
                   }
                         else{  $v_text .= " " . $split_text[$i] . " ";}   
			  }



    $tgl_skrg = date("Ymd");
    $sql = mysql_query("INSERT INTO bukutamu(nama,email,pesan,captcha,tanggal) 
                        VALUES('$nama','$email','$pesan','$captcha','$tgl_skrg')");
						print "<script>alert('Pengisian buku tamu berhasil');
						javascript:history.go(-1);</script>";

   /* echo "<meta http-equiv='refresh' content='0; url=bukutamu.html'>";*/
	   }
		  else{
			   echo "<script>window.alert('Kode yang Anda masukkan tidak cocok');
                     window.location=('bukutamu.html')</script>"; }
	      }
	      else{
	           echo "<script>window.alert('Anda belum memasukkan kode');
                     window.location=('bukutamu.html')</script>"; }
}
?>
