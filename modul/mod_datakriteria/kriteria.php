
<h2 class="head">Input Kandidat Perbandingan Kriteria</h2>
<?php 
session_start();
include "fungsi.php"; 
function get_guru($param){
	$user_id = get_uname_id();
	$guru = array();
	$query_kandidat = mysql_query("SELECT * FROM kandidat WHERE user_id='$user_id'");
	while($row_kandidat = mysql_fetch_object($query_kandidat)){
		$kandidat[] = $row_kandidat->nama;
	}
	return $kandidat[$param];
	
}



$user_id =$_SESSION['namauser'];
$query_nip = mysql_query("SELECT * FROM guru WHERE nip='".$_GET['nip']."'");
$row_nip = mysql_fetch_object($query_nip);

if( isset($_POST['submit']) ){
		$id_kriteria = $_POST['id_kriteria'];
		$nama_kriteria = $_POST['nama_kriteria'];
		
		
		$query_kriteria_jumlah = mysql_query("SELECT * FROM kriteria WHERE user_id='$user_id'");
		$num_kriteria = mysql_num_rows($query_kriteria_jumlah);
		
		if( empty($id_kriteria) ) echo '<div class="error">Maaf Kode Kriteria Kosong</div><br>';
		elseif($num_kriteria>=6) echo '<div class="error">Maaf jumlah Kriteria  sudah melebihi batas</div><br>';
		else{
		
		$query_kriteria_run = mysql_query("INSERT INTO kriteria (id_kriteria,user_id,nama) VALUES ('$id_kriteria','$user_id','$nama_kriteria')");
		if( $query_kriteria_run ) echo '<div class="sukses">Kriteria Perbandingan berhasil ditambahkan</div><br>';
		
		}
}
?>
<form action="" method="post">
  <table width="100%" border="0" cellspacing="0" cellpadding="2" class="tabel">
    <tr>
      <td width="16%">Kode Kriteria</td>
      <td width="84%"><label>
        <input name="id_kriteria" type="text" id="id_kriteria" size="10" maxlength="4" />
        </label></td>
    </tr>
    <tr>
      <td>Nama Kriteria</td>
      <td><input name="nama_kriteria" type="text" id="nama_kriteria" size="45" /></td>
    </tr>
    

    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit" value="Submit" class="tombol"/>
        <input type="reset" name="reset" value="Reset" class="tombol" /></td>
    </tr>
  </table>
</form>
<br />
<?php
if( $_GET['act'] == 'del' ){
	$id_kriteria = $_GET['id_kriteria'];
	$del_query = mysql_query("DELETE FROM kriteria WHERE id_kriteria='$id_kriteria'");
	if( $del_query ) echo '<div class="sukses">Kriteria berhasil dihapus</div><br>';
	else echo '<div class="error">Kriteria gagal dihapus</div><br>';
}
?>
  <table width="100%" border="0" cellspacing="0" cellpadding="2" class="tabel">
    <tr>
      <td width="8%" align="center">No</td>
      <td width="43%" align="center">Kode Kriteria</td>
      <td width="49%" align="center">Nama Kriteria</td>
      
      <td width="49%" align="center">Aksi</td>
    </tr>
<?php
$i=1;
$query_nip = mysql_query("SELECT * FROM kriteria ");
$num_nip = mysql_num_rows($query_nip);

if( $num_nip < 1 ){
?>
	<tr>
      <td colspan="4" align="left">Kriteria kosong</td>
    </tr>
<?php
}

while($row_nip = mysql_fetch_object($query_nip)){
?>
    <tr>
      <td align="center"><?php echo $i?></td>
      <td align="center"><div align="left"><?php echo $row_nip->id_kriteria?></div></td>
      <td align="center"><div align="left"><?php echo $row_nip->nama?></div></td>
      <td align="center"><a href="?module=datakriteria&amp;act=del&amp;id_kriteria=<?php echo $row_nip->id_kriteria?>">Hapus</a></td>
    </tr>
<?php $i++;}?>
  </table>
  