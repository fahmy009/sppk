<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
    include "file:///D|/AppServ/www/config/koneksi.php";

    $module = $_GET[module];
    $act = $_GET[act];

// Hapus Kandidat
    if ($module == 'kandidat' AND $act == 'hapus') {
        mysqli_query($con, "DELETE FROM kandidat WHERE nip='$_GET[id]'");
        header('location:../../media.php?module=' . $module);
    } // Input Kandidat

    elseif ($module == 'kandidat' AND $act == 'input') {
        mysqli_query($con, "INSERT INTO kandidat(user_id,nip,nama) VALUES('$_POST[user_id]','$_POST[nip]','$_POST[nama]')");
        header('location:../../media.php?module=' . $module);
    }
}

?>
