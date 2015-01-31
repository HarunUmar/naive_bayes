# naive_bayes
implementasi algoritma naive bayes 


Algoritma Naive Bayes merupakan salah satu algoritma yang terdapat pada teknik klasifikasi.
Naive Bayes merupakan pengklasifikasian dengan metode probabilitas dan statistik yang dikemukan oleh ilmuwan Inggris Thomas Bayes, 
yaitu memprediksi peluang di masa depan berdasarkan pengalaman dimasa sebelumnya sehingga dikenal sebagai Teorema Bayes. 
Teorema tersebut dikombinasikan dengan Naive dimana diasumsikan kondisi antar atribut saling bebas. 
Klasifikasi Naive Bayes diasumsikan bahwa ada atau tidak ciri tertentu dari sebuah kelas tidak ada hubungannya dengan ciri dari kelas lainnya.


tutor 
========================================================

creat db yg teletak pada dbparuf
sesuikan koneksi ente di config/koneksi.php

=========================================================

buat file .htacces, trus tambahin
===========================================================
RewriteEngine on

RewriteRule ^home.html$ main/home.php?main=home [L]
RewriteRule ^penyakit.html$ main/home.php?main=penyakit [L]
RewriteRule ^review-(.*)\.html$ main/home.php?main=detilgejala&id=$1 [L]
RewriteRule ^solusi.html$ main/home.php?main=solusi [L]
RewriteRule ^solusi.html$ main/home.php?main=solusi [L]

RewriteRule ^aturan.html$ main/home.php?main=aturan [L]

RewriteRule ^proses$ main/home.php?main=prosessolusi [L]

RewriteRule ^bukutamu.html$ main/home.php?main=bukutamu [L]
RewriteRule ^send-contact$ main/main_bukutamu/proses_bukutamu.php [L]

Options All -indexes

==========================================================================

love u mahasiswa galau :p
