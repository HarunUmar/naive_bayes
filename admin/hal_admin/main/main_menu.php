<?php
include "../../config/class_paging.php";
include "../../config/inc.library.php";
$main = $_GET['main'];
if ($main == 'home'){

include "home.php";
}
elseif($main == 'setuser'){
include "main/main_admin/setadmin.php";
}
elseif($main == 'penyakit'){
include "main/main_penyakit/penyakit.php";
}

elseif($main == 'addpenyakit'){
include "main/main_penyakit/add_penyakit.php";
}

elseif($main == 'simpanpenyakit'){
include "main/main_penyakit/proses_addpenyakit.php";
}

elseif($main == 'updatepenyakit'){
include "main/main_penyakit/proses_updatepenyakit.php";
}



elseif($main == 'gejala'){
include "main/main_gejala/gejala.php";
}

elseif($main == 'simpangejala'){
include "main/main_gejala/proses_addgejala.php";
}
elseif($main == 'updategejala'){
include "main/main_gejala/proses_updategejala.php";
}

elseif($main == 'aturan'){
include "main/main_aturan/aturan.php";
}
elseif($main == 'add_aturan'){
include "main/main_aturan/add_aturan.php";
}
elseif($main == 'edit_aturan'){
include "main/main_aturan/edit_aturan.php";
}
elseif($main == 'simpanaturan'){
include "main/main_aturan/proses_addaturan.php";
}
elseif($main == 'updateaturan'){
include "main/main_aturan/proses_updateaturan.php";
}
elseif($main == 'bukutamu'){
include "main/main_bukutamu/bukutamu.php";
}
elseif($main == 'hasildiagnosa'){
include "main/main_hasildiagnosa/hasildiagnosa.php";
}
elseif($main == 'laporandiagnosa'){
include "main/main_laporan/laporan.php";
}

else {
echo "Halaman tidak Ada";
}
?>