<?php
session_start();
error_reporting(0);
include "config/koneksi.php";

include "config/fungsi_indotgl.php";
include "config/class_paging.php";
include "config/kode_auto.php";
include "config/fungsi_combobox.php";
include "config/fungsi_nip.php";


if ($_SESSION['leveluser'] == '1' OR $_SESSION['leveluser'] == '2' OR $_SESSION['leveluser'] == '3') {
    if ($_GET['module'] == "home") {

        echo "<h3>Selamat Datang $_SESSION[namauser] di Sistem Pendukung Keputusan Pemilihan Guru Teladan  </h3>
          

		
<b>PROMETHEE </b> merupakan salah satu metode yang digunakan untuk menentukan urutan atau prioritas dari beberapa alternatif dalam permasalahan yang menggunakan multi kriteria. <b>PROMETHEE </b> mempunyai kemampuan untuk menangani banyak perbandingan dan memudahkan pengguna dengan menggunakan data secara langsung dalam bentuk tabel multikriteria sederhana. Pengambil keputusan hanya mendefinisikan skala ukurannya sendiri tanpa batasan, untuk mengindikasi prioritasnya dan preferensi untuk setiap kriteria dengan memusatkan pada nilai (value), tanpa memikirkan metoda perhitungannya.<br>

<br>Metodologi dalam mengimplementasikan <b>PROMETHEE </b> (Suryadi dan Ramdhani  2002)  adalah sebagai berikut: <br>1)  pengumpulan data nilai/ukuran relatif kriteria,<br> 2) pemilihan dan penentuan tipe fungsi preferensi kriteria beserta parameternya, <br>3) perhitungan nilai preferensi (P) antar alternatif ditentukan berdasarkan, <br>4) perhitungan nilai indeks preferensi multikriteria ( ) antar alternatif, <br>5) perhitungan nilai leaving flow, entering flow, dan net flow pada masing-masing alternatif, dan <br>6) Menentukan ranking pada Promethee I (Partial Ranking) dan Promethee II (Complete Ranking). <br><br>Fungsi preferensi kriteria yang dapat dipilih yaitu<br> 1) kriteria biasa,<br> 2) kriteria Quasi,<br> 3) kriteria linier, <br>4) kriteria level,<br> 5) kriteria level dengan area tidak berbeda , dan <br>6) kriteria Gaussian.
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>


          <p align=right>Login $_SESSION[namauser]: $hari_ini, ";
        echo tgl_indo(date("Y m d"));
        echo " | ";
        echo date("H:i:s");
        echo " WIB</p>";
    } else if ($_GET['module'] == "bagian") {
        include "modul/bagian/bagian.php";
    } else if ($_GET['module'] == "jabatan") {
        include "modul/jabatan/jabatan.php";
    } else if ($_GET['module'] == "guru") {
        include "modul/guru/guru.php";
    } else if ($_GET['module'] == "registrasi") {
        include "modul/pegawai/registrasi.php";
    } else if ($_GET['module'] == "kjb") {
        include "modul/k_jabatan/k_jabatan.php";
    } // Input Data Alternatif & Kriteria Perbandingan

    else if ($_GET['module'] == "dataalternatif") {
        include "modul/mod_dataalternatif/alternatif.php";
    } else if ($_GET['module'] == "datakriteria") {
        include "modul/mod_datakriteria/kriteria.php";
    } // Analisa Nilai Kriteria & Nilai alternatif
    else if ($_GET['module'] == "nilaikriteria") {
        include "modul/nilai_kriteria/nilai_kriteria.php";
    } else if ($_GET['module'] == "nilai_alternatif") {
        include "modul/nilai_alternatif/alternatif.php";
    } else if ($_GET['module'] == "analisis") {
        include "modul/mod_prome/analisis.php";
    } // Laporan Hasil Perhitungan
    else if ($_GET['module'] == "hasilalternatif") {
        include "modul/nilai_alternatif/hasilalternatif.php";
    } else if ($_GET['module'] == "peringkat") {
        include "menu_laporan.php";
    } else if ($_GET['module'] == "hitung_intelektual") {
        include "modul/hitung_intelektual/alternatif.php";
    } else if ($_GET['module'] == "hitung_prilaku") {
        include "modul/hitung_prilaku/alternatif.php";
    } else if ($_GET['module'] == "hitung_sikap") {
        include "modul/hitung_sikap/alternatif.php";
    } else if ($_GET['module'] == "hitung_skill") {
        include "modul/hitung_skill/alternatif.php";
    }


}

if ($_SESSION['leveluser'] == '2') {
    if ($_GET['module'] == "lap_absensi") {
        include "menu_laporan.php";
    }
}

?>