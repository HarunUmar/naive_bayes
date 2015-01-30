<?php

require "../../config/koneksi.php";
include "../../config/fungsi_indotgl.php";
include "../../config/fungsi_combobox.php";
include "../../config/library.php";

   echo "<h2>Cetak Laporan Hasil Diagnosa</h2><br/>
          

          <form method=POST action='main/main_laporan/pdf_diagnosa.php' target='_blank'>
          <table>
          <tr><td colspan=2><b>Laporan Per Periode</b></td></tr>
          <tr><td>Dari Tanggal</td><td> : ";        
          combotgl(1,31,'tgl_mulai',$tgl_skrg);
          combonamabln(1,12,'bln_mulai',$bln_sekarang);
          combothn(2000,$thn_sekarang,'thn_mulai',$thn_sekarang);

    echo "</td></tr>
          <tr><td>s/d Tanggal</td><td> : ";
          combotgl(1,31,'tgl_selesai',$tgl_skrg);
          combonamabln(1,12,'bln_selesai',$bln_sekarang);
          combothn(2000,$thn_sekarang,'thn_selesai',$thn_sekarang);

    echo "</td></tr>
          <tr><td colspan=2><input type=submit value=Proses></td></tr>
          </table>
          </form>";

?>
