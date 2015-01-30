<?php

// class paging untuk halaman administrator
class Paging {

// Fungsi untuk mencek halaman dan posisi data
    function cariPosisi($batas) {
        if (empty($_GET['halaman'])) {
            $posisi = 0;
            $_GET['halaman'] = 1;
        } else {
            $posisi = ($_GET['halaman'] - 1) * $batas;
        }
        return $posisi;
    }

// Fungsi untuk menghitung total halaman
    function jumlahHalaman($jmldata, $batas) {
        $jmlhalaman = ceil($jmldata / $batas);
        return $jmlhalaman;
    }

// Fungsi untuk link halaman 1,2,3 (untuk admin)
    function navHalaman($halaman_aktif, $jmlhalaman) {
        $link_halaman = "";

// Link halaman 1,2,3, ...
        for ($i = 1; $i <= $jmlhalaman; $i++) {
            if ($i == $halaman_aktif) {
                $link_halaman .= "<b>$i</b> | ";
            } else {
                $link_halaman .= "<a href='$_SERVER[PHP_SELF]?main=$_GET[main]&halaman=$i'>$i</a> | ";
            }
            $link_halaman .= " ";
        }
        return $link_halaman;
    }

}



?>
