<?php

$aksi = "modul/guru/aksi_guru.php";

switch ($_GET[act]) {
    default:
        $tampil = mysqli_query($con, "select * from guru,bagian,jabatan where guru.id_bag=bagian.id_bag and
	guru.id_jab=jabatan.id_jab order by nip DESC");
        echo "<h2 class='head'>DATA GURU</h2>
	<div>
	<input type=button value='Tambah Data Guru' onclick=\"window.location.href='?module=guru&act=input';\">
	</div>
	<table class='tabel'>
	<thead>
  <tr>
    <td>No</td>
    <td>Nip</td>
    <td>Nama</td>
	<td>Tgl Masuk</td>
	<td>Bagian</td>
	<td>Jabatan</td>
	<td>Control</td>
  </tr>
  </thead>";
        $no = 1;
        while ($dt = mysqli_fetch_array($tampil)) {
            echo "<tr>
    <td>$no</td>
    <td>$dt[nip]</td>
    <td>$dt[nama]</td>
	<td>" . tgl_indo($dt['tgl_masuk']) . "</td>
    <td>$dt[n_bag]</td>
	<td>$dt[n_jab]</td>
	<td><span><a href='?module=guru&act=edit&id=$dt[nip]'>Edit</a></span><span>
	<a href=\"$aksi?module=guru&act=hapus&id=$dt[nip]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\">Hapus</a></span>
	<span><a href='?module=guru&act=detail&id=$dt[nip]'>Detail</a></span></td>
  </tr>";
            $no++;
        }
        echo "  
</table>
	";

        break;

    case "input":
        echo "<h2 class='head'>Entry Data Guru</h2>
	<form action='$aksi?module=guru&act=input' method='post' enctype='multipart/form-data' >
	<table class='tabelform tabpad'>
	<tr>
	<td>Nip</td><td>:</td><td><input name='nip' type='text'></td>
	</tr>
	<tr>
	<td>Password Login</td><td>:</td><td><input class='input' name='psl' type='password'></td>
	</tr>
	<tr>
	<td>Nama Guru</td><td>:</td><td><input class='input' name='nama' type='text'></td>
	</tr>
	<tr>
	<td>Tempat Lahir</td><td>:</td><td><input class='input' name='tls' type='text'></td>
	</tr>
	<tr>
	<td>Tanggal Lahir</td><td>:</td><td>
	<select name='hari'>
                <option value='none' selected='selected'>Tgl*</option>";
        for ($h = 1; $h <= 31; $h++) {
            echo "<option value=", $h, ">", $h, "</option>";
        }
        echo "</select>
	<select name='bulan'>
            	<option value='none' selected='selected'>Bulan*</option>
				<option value='1'>Januari</option>
				<option value='2'>Februari</option>
				<option value='3'>Maret</option>
				<option value='4'>April</option>
				<option value='5'>Mei</option>
				<option value='6'>Juni</option>
				<option value='7'>Juli</option>
				<option value='8'>Agustus</option>
				<option value='9'>September</option>
				<option value='10'>Oktober</option>
				<option value='11'>November</option>
				<option value='12'>Desember</option>
			</select>
	<select name='tahun'>
            <option value='none' selected='selected'>Tahun*</option>";
        $now = date("Y");
        $saiki = 1965;
        for ($l = $saiki; $l <= $now; $l++) {
            echo "<option value=", $l, ">", $l, "</option>";
        }
        echo "</select>
	</td>
	</tr>
	
	<tr>
	<td>Jenis Kelamin</td><td>:</td><td><input name='jk' type='radio' value='L' />Pria <input name='jk' type='radio' value='P' />Wanita</td>
	</tr>
	
	<tr>
	<td>Alamat</td><td>:</td><td><textarea name='almt' ></textarea></td>
	</tr>
	
	<tr>
	<td>Tanggal Masuk</td><td>:</td><td>
	<select name='hm'>
                <option value='none' selected='selected'>Tgl*</option>";
        for ($h = 1; $h <= 31; $h++) {
            echo "<option value=", $h, ">", $h, "</option>";
        }
        echo "</select>
	<select name='bm'>
            	<option value='none' selected='selected'>Bulan*</option>
				<option value='1'>Januari</option>
				<option value='2'>Februari</option>
				<option value='3'>Maret</option>
				<option value='4'>April</option>
				<option value='5'>Mei</option>
				<option value='6'>Juni</option>
				<option value='7'>Juli</option>
				<option value='8'>Agustus</option>
				<option value='9'>September</option>
				<option value='10'>Oktober</option>
				<option value='11'>November</option>
				<option value='12'>Desember</option>
			</select>
	<select name='tm'>
            <option value='none' selected='selected'>Tahun*</option>";
        $now = date("Y");
        $saiki = 2000;
        for ($l = $saiki; $l <= $now; $l++) {
            echo "<option value=", $l, ">", $l, "</option>";
        }
        echo "</select>
	</td>
	</tr>
	
	<tr>
	<td>Golongan</td><td>:</td><td><select name='bagian'>
	<option value='' selected >Pilih Bagian</option>";
        $jab = mysqli_query($con, "select * from bagian");
        while ($j = mysqli_fetch_array($jab)) {
            echo "<option value='$j[id_bag]'>$j[n_bag]</option>";
        }
        echo "</select></td>
	</tr>
	
	<tr>
	<td>Jabatan</td><td>:</td><td><select name='jabatan'>	
	<option value='' selected >Pilih Jabatan</option>";
        $jab = mysqli_query($con, "select * from jabatan");
        while ($j = mysqli_fetch_array($jab)) {
            echo "<option value='$j[id_jab]'  >$j[n_jab]</option>";
        }
        echo "</select></td>
	</tr>
	
	<tr>
	<td>Pendidikan</td><td>:</td><td><input class='input' name='pdk' type='text'></td>
	</tr>
	
	<tr>
	<td>Foto</td><td>:</td><td><input name='fupload' type='file' /></td>
	</tr>
	
	<tr>
	<td>Status Guru</td><td>:</td><td><select name='sp'>
	<option value='' selected >Pilih Status</option>
	<option value='tetap' >Tetap</option>
	<option value='kontrak' >Kontrak</option>
	</select></td>
	</tr>
	
	<tr>
	<td></td><td></td><td><input type=submit value=Simpan>
	<input type=button value=Batal onclick=self.history.back()>
	</td>
	</tr>
	</table>
	</form>
	";
        break;

    case "edit":
        $ambil = mysqli_query($con, "select * from guru where nip='$_GET[id]'");
        $t = mysqli_fetch_array($ambil);
        echo "<h2 class='head'>Edit Data Guru</h2>
	<form action='$aksi?module=guru&act=edit' method='post' enctype='multipart/form-data' >
	<table class='tabelform tabpad'>
	<tr>
	<td>Nip</td><td>:</td><td><input name='nip' type='text' value='$t[nip]' readonly></td>
	</tr>
	<tr>
	<td>Nama guru</td><td>:</td><td><input class='input' name='nama' type='text' value='$t[nama]'></td>
	</tr>
	<tr>
	<td>Tempat Lahir</td><td>:</td><td><input class='input' name='tls' type='text' value='$t[tmpt_lahir]'></td>
	</tr>
	<tr>
	<td>Tanggal Lahir</td><td>:</td><td>";
        $tg = explode("-", $t['tgl_lahir']);
        $tl = $tg[0];
        $btl = $tg[1];
        $htl = $tg[2];
        combotgl(1, 31, ttl, $htl);
        combonamabln(1, 12, btl, $btl);
        combothn(1965, 2000, tl, $tl);
        echo "</td>
	</tr>
	
	<tr>
	<td>Jenis Kelamin</td><td>:</td><td>";
        echo "<input name='jk' type='radio' value='L'";
        if ($t['jenis_kelamin'] == 'L') {
            echo "checked";
        }
        echo "/>Pria ";
        echo "<input name='jk' type='radio' value='P'";
        if ($t['jenis_kelamin'] == 'P') {
            echo "checked";
        }
        echo "/>Wanita ";

        echo "</td></tr>
	
	<tr>
	<td>Alamat</td><td>:</td><td><textarea name='almt' >$t[alamat]</textarea></td>
	</tr>
	
	<tr>
	<td>Tanggal Masuk</td><td>:</td><td>";
        $ta = explode("-", $t['tgl_masuk']);
        $ttm = $ta[0];
        $btm = $ta[1];
        $htm = $ta[2];
        $now = date("Y");
        $saiki = 2000;
        $ht = "ht";
        $bt = "bt";
        $tt = "tt";
        combotgl(1, 31, $ht, $htm);
        combonamabln(1, 12, $bt, $btm);
        combothn($saiki, $now, $tt, $ttm);

        echo "
	</td>
	</tr>
	
	<tr>
	<td>Bagian</td><td>:</td><td><select name='bagian'>
	<option value='' selected >Pilih Bagian</option>";
        $jab = mysqli_query($con, "select * from bagian");
        while ($j = mysqli_fetch_array($jab)) {
            if ($t['id_bag'] == $j['id_bag']) {
                echo "<option value='$j[id_bag]' selected='$t[id_bag]'>$j[n_bag]</option>";
            } else {
                echo "<option value='$j[id_bag]'>$j[n_bag]</option>";
            }
        }
        echo "</select></td>
	</tr>
	
	<tr>
	<td>Jabatan</td><td>:</td><td><select name='jabatan'>	
	<option value='' selected >Pilih Jabatan</option>";
        $jab = mysqli_query($con, "select * from jabatan");
        while ($j = mysqli_fetch_array($jab)) {
            if ($t['id_jab'] == $j['id_jab']) {
                echo "<option value='$j[id_jab]' selected='$t[id_jab]'  >$j[n_jab]</option>";
            } else {
                echo "<option value='$j[id_jab]'>$j[n_jab]</option>";
            }
        }
        echo "</select></td>
	</tr>
	<tr>
	<td>Foto</td><td>:</td><td><img src='image_peg/small_$t[foto]' /></td>
	</tr>
	
	<tr>
	<td>Ganti Foto</td><td>:</td><td><input name='fupload' type='file' /></td>
	</tr>
	
	<tr>
	<td></td><td></td><td><input type=submit value=Simpan>
	<input type=button value=Batal onclick=self.history.back()>
	</td>
	</tr>
	</table>
	</form>
	";
        break;

    case "detail":
        $ambil = mysqli_query($con, "select * from guru where nip='$_GET[id]'");
        $t = mysqli_fetch_array($ambil);
        echo "<h2 class='head'>Data Guru</h2>
	<div class='rp' >
	<div class='foto'>";
        if ($t[foto] == "") {
            echo "<img src='image_peg/no.jpg' width='200' height='240' />";
        } else {
            echo "<img src='image_peg/small_$t[foto]' width='200' height='240' />";
        }
        echo "</div>
	<table class='tabelform tabpad'>
	<tr>
	<td>Nip</td><td>:</td><td>$t[nip]</td>
	</tr>
	<tr>
	<td>Nama guru</td><td>:</td><td>$t[nama]</td>
	</tr>
	<tr>
	<td>Tempat Lahir</td><td>:</td><td>$t[tmpt_lahir]</td>
	</tr>
	<tr>
	<td>Tanggal Lahir</td><td>:</td><td>";
        echo "" . tgl_indo($t['tgl_lahir']) . "";
        echo "</td>
	</tr>
	
	<tr>
	<td>Jenis Kelamin</td><td>:</td><td>";
        if ($t['jenis_kelamin'] == 'L') {
            echo "Pria";
        } else {
            echo "Wanita";
        }
        echo "</td></tr>
	
	<tr>
	<td>Alamat</td><td>:</td><td>$t[alamat]</td>
	</tr>
	
	<tr>
	<td>Tanggal Masuk</td><td>:</td><td>";
        echo "" . tgl_indo($t['tgl_masuk']) . "";
        echo "
	</td>
	</tr>
	
	<tr>
	<td>Bagian</td><td>:</td><td>";
        $bag = mysqli_query($con, "select * from bagian where id_bag='$t[id_bag]'");
        $b = mysqli_fetch_array($bag);
        echo "$b[n_bag]";
        echo "</td>
	</tr>
	
	<tr>
	<td>Jabatan</td><td>:</td><td>";
        $jab = mysqli_query($con, "select * from jabatan where id_jab='$t[id_jab]'");
        $j = mysqli_fetch_array($jab);
        echo "$j[n_jab]";
        echo "</td>
	</tr>
	
	<tr>
	<td colspan='3'>[ <a href='?module=guru&act=edit&id=$t[nip]'> Edit Profil </a>] [ <a href='?module=guru&act=pwd&id=$t[nip]'> Ganti Password </a>]</td>
	</tr>
	
	</table>
	<div style='clear:both'></div>
	<h2 class='head'>Riwayat pendidikan</h2>
	<table class='tabel'>
	<thead>
	<tr>
	<td>Tahun</td>
	<td>Detail Pendidikan</td>
	</tr>
	</thead>";
        $nip = $_SESSION['namauser'];
        $ri = mysqli_query($con, "select * from pendidikan where nip='$_GET[id]' order by idp ASC");
        if (mysqli_num_rows($ri) == 0) {
            echo "<tr>
	<td colspan='2'>*Tidak Ada Data*</td>
	</tr>";
        } else {
            while ($p = mysqli_fetch_array($ri)) {
                echo "
	<tr>
	<td>$p[t_pdk]</td>
	<td>" . nl2br($p['d_pdk']) . "</br>[ <a href='?module=guru&act=rpedit&id=$p[idp]'>edit</a> | 
	<a href='$aksi?module=guru&act=rpdel&id=$p[idp]&nip=$p[nip]'>hapus</a>]</td>
	</tr>";
            }
        }
        echo "
	<tr><td colspan='2'><a href='?module=guru&act=rp&id=$_GET[id]'>Tambah Data</a></td></td>
	</table>
	</div>
	
	
	<div class='rp2'>
	<h2 class='head'>PENGALAMAN KERJA</h2>
	<table class='tabel'>	
	<thead>
	<tr>
	<td>Nama Pekerjaan</td>
	<td>Detail Pekerjaan</td>
	</tr>	
	</thead>";
        $nip = $_SESSION['namauser'];
        $ri = mysqli_query($con, "select * from pengalaman_kerja where nip='$_GET[id]' order by id_peker ASC");
        if (mysqli_num_rows($ri) == 0) {
            echo "<tr>
	<td colspan='2'>*Tidak Ada Data*</td>
	</tr>";
        } else {
            while ($p = mysqli_fetch_array($ri)) {
                echo "
	<tr>
	<td>$p[nm_pekerjaan]</td>
	<td>" . nl2br($p['d_pekerjaan']) . " </br>[ <a href='?module=guru&act=pkedit&id=$p[id_peker]'>edit</a> | 
	<a href='$aksi?module=guru&act=pkdel&id=$p[id_peker]&nip=$p[nip]'>hapus</a>]</td>
	</tr>";
            }
        }
        echo "
	<tr><td colspan='2'><a href='?module=guru&act=pk&id=$_GET[id]'>Tambah Data</a></td></td>
	</table>
	</div>
		<div style='clear:both'></div>
	";
        break;

    case "rp":
        echo "<h2 class='head'>TAMBAH RIWAYAT PENDIDIKAN</h2>
	<form action='$aksi?module=guru&act=rp' method='post' enctype='multipart/form-data' >
	<table class='tabelform tabpad'>
	<tr>
	<td></td><td></td><td><input name='nip' type='hidden' value='$_GET[id]' readonly></td>
	</tr>
	<tr>
	<td>Tahun</td><td>:</td><td><input class='input' name='tahun' type='text'><span> format: 2000-2006</span></td>
	</tr>
	<tr>
	<td>Detail Pendidikan</td><td>:</td><td><textarea class='input' name='dp' rows='5'></textarea></td>
	</tr>
	<tr>
	<td></td><td></td><td><input type=submit value=Simpan>
	<input type=button value=Batal onclick=self.history.back()>
	</td>
	</tr>
	</table>
	</form>
	";
        break;

    case "rpedit":
        $edit = mysqli_query($con, "select * from pendidikan where idp='$_GET[id]' ");
        $e = mysqli_fetch_array($edit);
        echo "<h2 class='head'>EDIT RIWAYAT PENDIDIKAN</h2>
	<form action='$aksi?module=guru&act=rpedit' method='post' enctype='multipart/form-data' >
	<table class='tabelform tabpad'>
	<tr>
	<td></td><td></td><td>
	<input name='nip' type='hidden' value='$e[nip]' readonly>
	<input name='idp' type='hidden' value='$_GET[id]' readonly></td>
	</tr>
	<tr>
	<td>Tahun</td><td>:</td><td><input class='input' name='tahun' type='text' value='$e[t_pdk]'><span> format: 2000-2006</span></td>
	</tr>
	<tr>
	<td>Detail Pendidikan</td><td>:</td><td><textarea class='input' name='dp' rows='5'>$e[d_pdk]</textarea></td>
	</tr>
	<tr>
	<td></td><td></td><td><input type=submit value=Simpan>
	<input type=button value=Batal onclick=self.history.back()>
	</td>
	</tr>
	</table>
	</form>
	";
        break;

    case "pk":
        echo "<h2 class='head'>TAMBAH DATA PENGALAMAN KERJA</h2>
	<form action='$aksi?module=guru&act=pk' method='post' enctype='multipart/form-data' >
	<table class='tabelform tabpad'>
	<tr>
	<td></td><td></td><td><input name='nip' type='hidden' value='$_GET[id]' readonly></td>
	</tr>
	<tr>
	<td>Nama Pekerjaan</td><td>:</td><td><input class='input' name='np' type='text'><span> </span></td>
	</tr>
	<tr>
	<td>Detail Pekerjaan</td><td>:</td><td><textarea class='input' name='dp' rows='5'></textarea></td>
	</tr>
	<tr>
	<td></td><td></td><td><input type=submit value=Simpan>
	<input type=button value=Batal onclick=self.history.back()>
	</td>
	</tr>
	</table>
	</form>
	";
        break;

    case "pkedit":
        $edit = mysqli_query($con, "select * from pengalaman_kerja where id_peker='$_GET[id]' ");
        $e = mysqli_fetch_array($edit);
        echo "<h2 class='head'>EDIT DATA RIWAYAT PENDIDIKAN</h2>
	<form action='$aksi?module=guru&act=pkedit' method='post' enctype='multipart/form-data' >
	<table class='tabelform tabpad'>
	<tr>
	<td></td><td></td><td><input name='nip' type='hidden' value='$e[nip]' readonly>
	<input name='idp' type='hidden' value='$_GET[id]' readonly></td>
	</tr>
	<tr>
	<td>Nama Pekerjaan</td><td>:</td><td><input class='input' name='np' type='text' value='$e[nm_pekerjaan]'><span> </span></td>
	</tr>
	<tr>
	<td>Detail Pekerjaan</td><td>:</td><td><textarea class='input' name='dp' rows='5'>$e[d_pekerjaan]</textarea></td>
	</tr>
	<tr>
	<td></td><td></td><td><input type=submit value=Simpan>
	<input type=button value=Batal onclick=self.history.back()>
	</td>
	</tr>
	</table>
	</form>
	";
        break;

    case "pwd":
        echo "<h2 class='head'>GANTI PASSWORD</h2>
	<form action='$aksi?module=guru&act=pwd' method='post' enctype='multipart/form-data' >
	<table class='tabelform tabpad'>
	<tr>
	<td></td><td></td><td><input name='nip' type='hidden' value='$_GET[id]' readonly>
	</td>
	</tr>
	<tr>
	<td>Password Lama</td><td>:</td><td><input class='input' name='pl' type='password'><span> </span></td>
	</tr>
	<tr>
	<td>Password Baru</td><td>:</td><td><input class='input' name='pb' type='password'><span> </span></td>
	</tr>
	<td></td><td></td><td><input type=submit value=Simpan>
	<input type=button value=Batal onclick=self.history.back()>
	</td>
	</tr>
	</table>
	</form>
	";
        break;


    // LIhat Nilai Guru 
    case "lihat-nilai":

        $ambilfoto = mysqli_query($con, "select * from guru where nip='$_GET[id]'");
        $t1 = mysqli_fetch_array($ambilfoto);
        $ambil = mysqli_query($con, "select * from kandidat where nip='$_GET[id]'");
        $t = mysqli_fetch_array($ambil);
        echo "<h2 class='head'>Data Hasil Penilaian Guru ($t[nama] )</h2>
	<div class='rp' >
	<div class='foto'>";
        if ($t1[foto] == "") {
            echo "<img src='image_peg/no.jpg' width='200' height='240' />";
        } else {
            echo "<img src='image_peg/small_$t1[foto]' width='200' height='240' />";
        }
        echo "</div>
	<table>
	<tr>
	<td>Nip</td><td>:</td><td>$t[nip]</td>
	</tr><br/>
	<tr>
	<td>Nama Guru</td><td>:</td><td>$t[nama]</td>
	</tr>
	
	<tr>
	<td><b>Hasil Penilain : </b></td>
	</tr>
	<tr>
	<td>Absensi</td><td>:</td><td>$t[kriteria1]</td>
	</tr>
	<tr>
	<td>Kerapihan</td><td>:</td><td>$t[kriteria2]</td>
	</tr>
	<tr>
	<td>Kedisiplinan</td><td>:</td><td>$t[kriteria3]</td>
	</tr>
	
	<td width=100%>Kemampuan Dalam Mengajar</td><td>:</td><td>$t[kriteria4]</td>
	</tr>
	<tr>
	
	<td>Kepribadian</td><td>:</td><td>$t[kriteria5]</td>
	</tr>
	<tr>
	
	<td>Kejujuran</td><td>:</td><td>$t[kriteria6]</td>
	</tr>
	
	</table>
	<div style='clear:both'></div>
	
	</div>
	
	
	<div class='rp2'>
	
	</div>
		<div style='clear:both'></div>
	";
        break;


}


?>