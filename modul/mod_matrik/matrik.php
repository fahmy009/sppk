<?php
$aksi = "modul/mod_matrik/aksi_matrik.php";
switch ($_GET[act]) {
    // Tampil Data Mobil
    default:
        echo "<h2>Data Nilai Matrik Kriteria</h2><br>
		
          <table>
          <tr><th>no</th><th>IDMatrik</th><th>UserID</th><th>Matrik Value</th><th>Jenis</th><th>Aksi</th></tr>";

        $p = new Paging;
        $batas = 10;
        $posisi = $p->cariPosisi($batas);

        $tampil = mysqli_query($con, "SELECT * FROM matrik ORDER BY id_matrik DESC LIMIT $posisi, $batas");

        $no = $posisi + 1;
        while ($r = mysqli_fetch_array($tampil)) {
            $tgl = tgl_indo($r[tanggal]);
            echo "<tr><td>$no</td>
                <td>$r[id_matrik]</td>
				<td>$r[user_id]</td>
				<td>$r[matrik_value]</td>
				<td>$r[jenis]</td>
				<td><a href=$aksi?module=matrik&act=hapus&id=$r[id_matrik]>Hapus</a>
                </td></tr>";
            $no++;
        }
        echo "</table>";
        $jmldata = mysqli_num_rows(mysqli_query($con, "SELECT * FROM matrik"));
        $jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
        $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

        echo "<div id=paging>Hal: $linkHalaman</div><br>";
        break;
}
?>
