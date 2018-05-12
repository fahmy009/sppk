
<h2 class="head">Input Kandidat Perbandingan Alternatif</h2>
<?php 
session_start();


function get_kriteria($param){
	$user_id = get_uname_id();
	$kandidat = array();
	$query_kandidat = mysql_query("SELECT * FROM kriteria ");
	while($row_kandidat = mysql_fetch_object($query_kandidat)){
		$kandidat[] = $row_kandidat->nama;
	}
	return $kandidat[$param];
	
}
include "fungsi.php"; 
$user_id =$_SESSION['namauser'];
$query_nip = mysql_query("SELECT * FROM guru WHERE nip='".$_GET['nip']."'");
$row_nip = mysql_fetch_object($query_nip);

if( isset($_POST['submit']) ){
		$nip = $_POST['nip'];
		$nama = $_POST['nama'];
		
		
		$query_nip_jumlah = mysql_query("SELECT * FROM kandidat WHERE user_id='$user_id'");
		$num_nip = mysql_num_rows($query_nip_jumlah);
		
		if( empty($nip) ) echo '<div class="error">Maaf NIP Guru belum dipilih</div><br>';
		elseif($num_nip>=22) echo '<div class="error">Maaf jumlah kandidat  sudah melebihi batas</div><br>';
		else{
		
		$query_nip_run = mysql_query("INSERT INTO kandidat (nip,user_id,nama) VALUES ('$nip','$user_id','$nama')");
		if( $query_nip_run ) echo '<div class="sukses">Kandidat berhasil ditambahkan</div><br>';
		
		}
}
?>
<form action="" method="post">
  <table width="100%" border="0" cellspacing="0" cellpadding="2" class="tabel">
    <tr>
      <td width="22%">NIP Guru</td>
      <td width="78%"><?php echo js_redirect()?>
        <select name="npm_op" onchange="redir(this)"><option value="">-- Pilih --</option><?php list_npm_op()?></select>
        <input type="hidden" name="nip" value="<?php echo $row_nip->nip?>" />        </td>
    </tr>
    <tr>
      <td>Nama Guru</td>
      <td><input type="hidden" name="nama" value="<?php echo $row_nip->nama?>" /><?php echo $row_nip->nama?></td>
    </tr>
    <tr>
      <td><?php echo get_kriteria(0);?></td>
      <td><label>
        <input name="kriteria1" type="text" id="kriteria1" size="6" />
      </label></td>
    </tr>
    <tr>
      <td><?php echo get_kriteria(1);?></td>
      <td><input name="kriteria2" type="text" id="kriteria2" size="6" /></td>
    </tr>
    <tr>
      <td><?php echo get_kriteria(2);?></td>
      <td><input name="kriteria3" type="text" id="kriteria3" size="6" /></td>
    </tr>
    <tr>
      <td><?php echo get_kriteria(3);?></td>
      <td><input name="kriteria4" type="text" id="kriteria4" size="6" /></td>
    </tr>
    <tr>
      <td><?php echo get_kriteria(4);?></td>
      <td><input name="kriteria5" type="text" id="kriteria5" size="6" /></td>
    </tr>
    <tr>
      <td><?php echo get_kriteria(5);?></td>
      <td><input name="kriteria6" type="text" id="kriteria6" size="6" /></td>
    </tr>
    

    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit" value="Submit" class="tombol"/>
        <input type="reset" name="reset" value="Reset" class="tombol" /></td>
    </tr>
  </table>
</form>
<br />

<h2 class="head">Data Kandidat Perbandingan Alternatif</h2>
<?php
if( $_GET['act'] == 'del' ){
	$nip = $_GET['nip'];
	$del_query = mysql_query("DELETE FROM kandidat WHERE  nip='$nip'");
	if( $del_query ) echo '<div class="sukses">Kandidat berhasil dihapus</div><br>';
	else echo '<div class="error">Kandidat gagal dihapus</div><br>';
}
?>
  <table width="100%" border="0" cellspacing="0" cellpadding="2" class="tabel">
    <tr>
      <td width="8%" align="center">No</td>
      <td width="43%" align="center">NIP Guru</td>
      <td width="49%" align="center">Nama Guru</td>
      <td width="49%" align="center">Aksi</td>
    </tr>
<?php
$i=1;
$query_nip = mysql_query("SELECT * FROM kandidat WHERE user_id='$user_id'");
$num_nip = mysql_num_rows($query_nip);

if( $num_nip < 1 ){
?>
	<tr>
      <td colspan="4" align="left">Kandidat kosong</td>
    </tr>
<?php
}

while($row_nip = mysql_fetch_object($query_nip)){
?>
    <tr>
      <td align="center"><?php echo $i?></td>
      <td align="center"><div align="left"><?php echo $row_nip->nip?></div></td>
      <td align="center"><div align="left"><?php echo $row_nip->nama?></div></td>
      <td align="center"><a href="?module=dataalternatif&amp;act=del&amp;nip=<?php echo $row_nip->nip?>">Hapus</a></td>
    </tr>
<?php $i++;}?>
  </table>
  