<?php
function UploadImage($fupload_name){
  //direktori gambar
  $vdir_upload = "../../../../gambar/";
  $vfile_upload = $vdir_upload . "small_" . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //identitas file asli
  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
}

?>
