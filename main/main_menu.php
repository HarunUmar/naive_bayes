<?php

$main = $_GET['main'];
if ($main == 'home'){

include "main.php";
}
elseif($main == 'penyakit'){
include "main_penyakit/penyakit.php";
}
elseif($main == 'detilgejala'){
include "main_penyakit/detil_gejala.php";
}
elseif($main == 'solusi'){
include "main_solusi/solusi.php";
}
elseif($main == 'prosessolusi'){
include "main_solusi/proses_hitungsolusi.php";
}
elseif($main == 'cetak'){
include "main_solusi/cetak.php";
}
elseif($main == 'bukutamu'){
include "main_bukutamu/bukutamu.php";
}

elseif($main == 'aturan'){
include "main_solusi/dataaturan.php";
}

elseif($main == 'konsultasi_hitung'){
include "main_solusi/konsultasi_hitung.php";
}

else {
echo "Halaman tidak Ada";
}
?>
