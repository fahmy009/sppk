<div class="head">Matrik Nilai Perbandingan Kriteria</div><br />

<?php 
error_reporting(0);
session_start();
$userid=$_SESSION[namauser];
include "fungsi.php";
// Memanggil id kandidat Guru 
function get_alternatif($param){
	$user_id = get_uname_id();
	$kandidat = array();
	$query_kandidat = mysql_query("SELECT * FROM kandidat WHERE user_id='$user_id'");
	while($row_kandidat = mysql_fetch_object($query_kandidat)){
		$kandidat[] = $row_kandidat->id_kandidat;
		}
	return $kandidat[$param];
	
}

// Memanggil nilai kriteria 1 
function get_kriteria1($param){
	$user_id = get_uname_id();
	$kandidat = array();
	$query_kandidat = mysql_query("SELECT * FROM kandidat WHERE user_id='$user_id'");
	while($row_kandidat = mysql_fetch_object($query_kandidat)){
		$kandidat[] = $row_kandidat->kriteria1;
		}
	return $kandidat[$param];
}

// Memanggil nilai kriteria 2 
function get_kriteria2($param){
	$user_id = get_uname_id();
	$kandidat = array();
	$query_kandidat = mysql_query("SELECT * FROM kandidat WHERE user_id='$user_id'");
	while($row_kandidat = mysql_fetch_object($query_kandidat)){
		$kandidat[] = $row_kandidat->kriteria2;
		}
	return $kandidat[$param];
}

// Memanggil nilai kriteria 3 
function get_kriteria3($param){
	$user_id = get_uname_id();
	$kandidat = array();
	$query_kandidat = mysql_query("SELECT * FROM kandidat WHERE user_id='$user_id'");
	while($row_kandidat = mysql_fetch_object($query_kandidat)){
		$kandidat[] = $row_kandidat->kriteria3;
		}
	return $kandidat[$param];
}

// Memanggil nilai kriteria 4 
function get_kriteria4($param){
	$user_id = get_uname_id();
	$kandidat = array();
	$query_kandidat = mysql_query("SELECT * FROM kandidat WHERE user_id='$user_id'");
	while($row_kandidat = mysql_fetch_object($query_kandidat)){
		$kandidat[] = $row_kandidat->kriteria4;
		}
	return $kandidat[$param];
}

// Memanggil nilai kriteria 5 
function get_kriteria5($param){
	$user_id = get_uname_id();
	$kandidat = array();
	$query_kandidat = mysql_query("SELECT * FROM kandidat WHERE user_id='$user_id'");
	while($row_kandidat = mysql_fetch_object($query_kandidat)){
		$kandidat[] = $row_kandidat->kriteria5;
		}
	return $kandidat[$param];
}

// Memanggil nilai kriteria 4 
function get_kriteria6($param){
	$user_id = get_uname_id();
	$kandidat = array();
	$query_kandidat = mysql_query("SELECT * FROM kandidat WHERE user_id='$user_id'");
	while($row_kandidat = mysql_fetch_object($query_kandidat)){
		$kandidat[] = $row_kandidat->kriteria6;
		}
	return $kandidat[$param];
}

// Memanggil Kriteria
function get_kriteria($param){
	$user_id = get_uname_id();
	$kandidat = array();
	$query_kandidat = mysql_query("SELECT * FROM kriteria WHERE user_id='$user_id'");
	while($row_kandidat = mysql_fetch_object($query_kandidat)){
		$kandidat[] = $row_kandidat->id_kriteria;
	}
	return $kandidat[$param];
	
} 



if( isset($_POST['submit']) ){
	$mk1 = $_POST['mk1'];
	$mk2 = $_POST['mk2'];
	$mk3 = $_POST['mk3'];
	$mk4 = $_POST['mk4'];
	$mk5 = $_POST['mk5'];
	$mk6 = $_POST['mk6'];	
	//==================================
	$hmk1 = (1/$mk1);
	$hmk2 = (1/$mk2);
	$hmk3 = (1/$mk3);
	$hmk4 = (1/$mk4);
	$hmk5 = (1/$mk5);
	$hmk6 = (1/$mk6);	
	//==================================
	$thmka = (1+$hmk1+$hmk2+$hmk3);
	$thmkb = (1+$mk1+$hmk4+$hmk5);
	$thmkc = (1+$mk2+$mk4+$hmk6);
	$thmkd = (1+$mk3+$mk5+$mk6);
	//==================================
	$vhmk1 	= (1/$thmka);
	$vhmk2 	= ($hmk1/$thmka);
	$vhmk3 	= ($hmk2/$thmka);
	$vhmk4 	= ($hmk3/$thmka);	
	
	$vhmk5 	= ($mk1/$thmkb);
	$vhmk6 	= (1/$thmkb);
	$vhmk7 	= ($hmk4/$thmkb);
	$vhmk8 	= ($hmk5/$thmkb);
		
	$vhmk9 	= ($mk2/$thmkc);
	$vhmk10 = ($mk4/$thmkc);
	$vhmk11 = (1/$thmkc);
	$vhmk12 = ($hmk6/$thmkc);
		
	$vhmk13 = ($mk3/$thmkd);
	$vhmk14 = ($mk5/$thmkd);
	$vhmk15 = ($mk6/$thmkd);
	$vhmk16 = (1/$thmkd);
	
	$ev1 = (($vhmk1+$vhmk5+$vhmk9+$vhmk13)/3);
	$ev2 = (($vhmk2+$vhmk6+$vhmk10+$vhmk14)/3);
	$ev3 = (($vhmk3+$vhmk7+$vhmk11+$vhmk15)/3);
	$ev4 = (($vhmk4+$vhmk8+$vhmk12+$vhmk16)/3);
	
	$max1 = ($ev1*$thmka);
	$max2 = ($ev2*$thmkb);
	$max3 = ($ev3*$thmkc);
	$max4 = ($ev4*$thmkd);
	
	$tev = ($ev1+$ev2+$ev3+$ev4);
	$tmax = ($max1+$max2+$max3+$max4);
	//IK => (totB-4)/3 RK =>(IK/0.9)
	$ik = (($tmax-4)/3);
	$rk = ($ik/0.9);
	
	$ev = array($ev1,$ev2,$ev3,$ev4);
	
	
	$run_update = $run_insert = '';
	
	
$user_id =$_SESSION['namauser'];
	
	$select_pa = mysql_query("SELECT * FROM `nilai_kriteria`  WHERE  `jenis` =  'kriteria' AND  `user_id` =  '$user_id'");
	$num_pa = mysql_num_rows($select_pa);
	
	if( $num_pa > 0 ){	
		$i=0;
		while( $row_pa = mysql_fetch_object($select_pa) ){
		$evx = $ev[$i];
		$run_update.= mysql_query("UPDATE  `nilai_kriteria` SET  `matrik_value` =  '$evx' WHERE  `id_matrik` =  '$row_pa->id_matrik' AND `jenis` =  'kriteria' AND `user_id` = '$user_id'");
		$i++;
		}
	}else{
		for($i=0; $i<=3; $i++){
		$evx = $ev[$i];
		$run_insert.= mysql_query("INSERT INTO `nilai_kriteria` (`id_matrik`, `user_id`, `matrik_value`,`jenis`) VALUES ('$i','$user_id', '$evx','kriteria')");
		}
	}
	
	if( $run_update ) echo "<div class=\"sukses\">Berhasil di perbaharui</div><br>";
	elseif( $run_insert ) echo "<div class=\"sukses\">Berhasil di tambahkan</div><br>";
	else echo "<div class=\"error\">Gagal disimpan</div><br>";
	
}
?>
<form action="" method="POST">
<table border="1" class="tabel" width="54%">
    <thead>
      <tr>
        <td width="17">Kr</td>
        <td width="34" align="center">Min Max</td>
        <td width="17" align="center"><?php echo get_alternatif(0);?></td>
        <td width="18" align="center"><?php echo get_alternatif(1);?></td>
        <td width="17" align="center"><?php echo get_alternatif(2);?></td>
        <td width="17" align="center"><?php echo get_alternatif(3);?></td>
        <td width="17" align="center"><?php echo get_alternatif(4);?></td>
        <td width="17" align="center"><?php echo get_alternatif(5);?></td>
        <td width="17" align="center"><?php echo get_alternatif(6);?></td>
        <td width="17" align="center"><?php echo get_alternatif(7);?></td>
        <td width="17" align="center"><?php echo get_alternatif(8);?></td>
        <td width="17" align="center"><?php echo get_alternatif(9);?></td>
        <td width="17" align="center"><?php echo get_alternatif(10);?></td>
        <td width="17" align="center"><?php echo get_alternatif(11);?></td>
        <td width="17" align="center"><?php echo get_alternatif(12);?></td>
        <td width="17" align="center"><?php echo get_alternatif(13);?></td>
        <td width="17" align="center"><?php echo get_alternatif(14);?></td>
        <td width="17" align="center"><?php echo get_alternatif(15);?></td>
        <td width="17" align="center"><?php echo get_alternatif(16);?></td>
        <td width="17" align="center"><?php echo get_alternatif(17);?></td>
        <td width="17" align="center"><?php echo get_alternatif(18);?></td>
        <td width="17" align="center"><?php echo get_alternatif(19);?></td>
        <td width="17" align="center"><?php echo get_alternatif(20);?></td>
        <td width="17" align="center"><?php echo get_alternatif(21);?></td>
        <td width="17" align="center">ST</td>
      </tr>
      <tr>
        <td><?php echo get_kriteria(0);?></td>
        <td align="center" bgcolor="#CCCCCC">Max</td>
        <td align="center"><label><?php echo get_kriteria1(0);?></label></td>
        <td align="center"><?php echo get_kriteria1(1);?></td>
        <td align="center"><?php echo get_kriteria1(2);?></td>
        <td align="center"><?php echo get_kriteria1(3);?></td>
        <td align="center"><?php echo get_kriteria1(4);?></td>
        <td align="center"><?php echo get_kriteria1(5);?></td>
        <td align="center"><?php echo get_kriteria1(6);?></td>
        <td align="center"><?php echo get_kriteria1(7);?></td>
        <td align="center"><?php echo get_kriteria1(8);?></td>
        <td align="center"><?php echo get_kriteria1(9);?></td>
        <td align="center"><?php echo get_kriteria1(10);?></td>
        <td align="center"><?php echo get_kriteria1(11);?></td>
        <td align="center"><?php echo get_kriteria1(12);?></td>
        <td align="center"><?php echo get_kriteria1(13);?></td>
        <td align="center"><?php echo get_kriteria1(14);?></td>
        <td align="center"><?php echo get_kriteria1(15);?></td>
        <td align="center"><?php echo get_kriteria1(16);?></td>
        <td align="center"><?php echo get_kriteria1(17);?></td>
        <td align="center"><?php echo get_kriteria1(18);?></td>
        <td align="center"><?php echo get_kriteria1(19);?></td>
        <td align="center"><?php echo get_kriteria1(20);?></td>
        <td align="center"><?php echo get_kriteria1(21);?></td>
        <td align="center">20</td>
      </tr>
      <tr>
        <td><?php echo get_kriteria(1);?></td>
        <td align="center">Max</td>
        <td align="center"><label><?php echo get_kriteria2(0);?></label></td>
        <td align="center"><?php echo get_kriteria2(1);?></td>
        <td align="center"><?php echo get_kriteria2(2);?></td>
        <td align="center"><?php echo get_kriteria2(3);?></td>
        <td align="center"><?php echo get_kriteria2(4);?></td>
        <td align="center"><?php echo get_kriteria2(5);?></td>
        <td align="center"><?php echo get_kriteria2(6);?></td>
        <td align="center"><?php echo get_kriteria2(7);?></td>
        <td align="center"><?php echo get_kriteria2(8);?></td>
        <td align="center"><?php echo get_kriteria2(9);?></td>
        <td align="center"><?php echo get_kriteria2(10);?></td>
        <td align="center"><?php echo get_kriteria2(11);?></td>
        <td align="center"><?php echo get_kriteria2(12);?></td>
        <td align="center"><?php echo get_kriteria2(13);?></td>
        <td align="center"><?php echo get_kriteria2(14);?></td>
        <td align="center"><?php echo get_kriteria2(15);?></td>
        <td align="center"><?php echo get_kriteria2(16);?></td>
        <td align="center"><?php echo get_kriteria2(17);?></td>
        <td align="center"><?php echo get_kriteria2(18);?></td>
        <td align="center"><?php echo get_kriteria2(19);?></td>
        <td align="center"><?php echo get_kriteria2(20);?></td>
        <td align="center"><?php echo get_kriteria2(21);?></td>
        <td align="center">20</td>
      </tr>
      <tr>
        <td><?php echo get_kriteria(2);?></td>
        <td align="center">Max</td>
        <td align="center"><label><?php echo get_kriteria3(0);?></label></td>
        <td align="center"><?php echo get_kriteria3(1);?></td>
        <td align="center"><?php echo get_kriteria3(2);?></td>
        <td align="center"><?php echo get_kriteria3(3);?></td>
        <td align="center"><?php echo get_kriteria3(4);?></td>
        <td align="center"><?php echo get_kriteria3(5);?></td>
        <td align="center"><?php echo get_kriteria3(6);?></td>
        <td align="center"><?php echo get_kriteria3(7);?></td>
        <td align="center"><?php echo get_kriteria3(8);?></td>
        <td align="center"><?php echo get_kriteria3(9);?></td>
        <td align="center"><?php echo get_kriteria3(10);?></td>
        <td align="center"><?php echo get_kriteria3(11);?></td>
        <td align="center"><?php echo get_kriteria3(12);?></td>
        <td align="center"><?php echo get_kriteria3(13);?></td>
        <td align="center"><?php echo get_kriteria3(14);?></td>
        <td align="center"><?php echo get_kriteria3(15);?></td>
        <td align="center"><?php echo get_kriteria3(16);?></td>
        <td align="center"><?php echo get_kriteria3(17);?></td>
        <td align="center"><?php echo get_kriteria3(18);?></td>
        <td align="center"><?php echo get_kriteria3(19);?></td>
        <td align="center"><?php echo get_kriteria3(20);?></td>
        <td align="center"><?php echo get_kriteria3(21);?></td>
        <td align="center">20</td>
      </tr>
      <tr>
        <td><?php echo get_kriteria(3);?></td>
        <td align="center">Max</td>
        <td align="center"><label><?php echo get_kriteria4(0);?></label></td>
        <td align="center"><?php echo get_kriteria4(1);?></td>
        <td align="center"><?php echo get_kriteria4(2);?></td>
        <td align="center"><?php echo get_kriteria4(3);?></td>
        <td align="center"><?php echo get_kriteria4(4);?></td>
        <td align="center"><?php echo get_kriteria4(5);?></td>
        <td align="center"><?php echo get_kriteria4(6);?></td>
        <td align="center"><?php echo get_kriteria4(7);?></td>
        <td align="center"><?php echo get_kriteria4(8);?></td>
        <td align="center"><?php echo get_kriteria4(9);?></td>
        <td align="center"><?php echo get_kriteria4(10);?></td>
        <td align="center"><?php echo get_kriteria4(11);?></td>
        <td align="center"><?php echo get_kriteria4(12);?></td>
        <td align="center"><?php echo get_kriteria4(13);?></td>
        <td align="center"><?php echo get_kriteria4(14);?></td>
        <td align="center"><?php echo get_kriteria4(15);?></td>
        <td align="center"><?php echo get_kriteria4(16);?></td>
        <td align="center"><?php echo get_kriteria4(17);?></td>
        <td align="center"><?php echo get_kriteria4(18);?></td>
        <td align="center"><?php echo get_kriteria4(19);?></td>
        <td align="center"><?php echo get_kriteria4(20);?></td>
        <td align="center"><?php echo get_kriteria4(21);?></td>
        <td align="center">20</td>
      </tr>
      <tr>
        <td><?php echo get_kriteria(4);?></td>
        <td align="center">Max</td>
        <td align="center"><label><?php echo get_kriteria5(0);?></label></td>
        <td align="center"><?php echo get_kriteria5(1);?></td>
        <td align="center"><?php echo get_kriteria5(2);?></td>
        <td align="center"><?php echo get_kriteria5(3);?></td>
        <td align="center"><?php echo get_kriteria5(4);?></td>
        <td align="center"><?php echo get_kriteria5(5);?></td>
        <td align="center"><?php echo get_kriteria5(6);?></td>
        <td align="center"><?php echo get_kriteria5(7);?></td>
        <td align="center"><?php echo get_kriteria5(8);?></td>
        <td align="center"><?php echo get_kriteria5(9);?></td>
        <td align="center"><?php echo get_kriteria5(10);?></td>
        <td align="center"><?php echo get_kriteria5(11);?></td>
        <td align="center"><?php echo get_kriteria5(12);?></td>
        <td align="center"><?php echo get_kriteria5(13);?></td>
        <td align="center"><?php echo get_kriteria5(14);?></td>
        <td align="center"><?php echo get_kriteria5(15);?></td>
        <td align="center"><?php echo get_kriteria5(16);?></td>
        <td align="center"><?php echo get_kriteria5(17);?></td>
        <td align="center"><?php echo get_kriteria5(18);?></td>
        <td align="center"><?php echo get_kriteria5(19);?></td>
        <td align="center"><?php echo get_kriteria5(20);?></td>
        <td align="center"><?php echo get_kriteria5(21);?></td>
        <td align="center">20</td>
      </tr>
      <tr>
        <td><?php echo get_kriteria(5);?></td>
        <td align="center">Max</td>
        <td align="center"><label><?php echo get_kriteria6(0);?></label></td>
        <td align="center"><?php echo get_kriteria6(1);?></td>
        <td align="center"><?php echo get_kriteria6(2);?></td>
        <td align="center"><?php echo get_kriteria6(3);?></td>
        <td align="center"><?php echo get_kriteria6(4);?></td>
        <td align="center"><?php echo get_kriteria6(5);?></td>
        <td align="center"><?php echo get_kriteria6(6);?></td>
        <td align="center"><?php echo get_kriteria6(7);?></td>
        <td align="center"><?php echo get_kriteria6(8);?></td>
        <td align="center"><?php echo get_kriteria6(9);?></td>
        <td align="center"><?php echo get_kriteria6(10);?></td>
        <td align="center"><?php echo get_kriteria6(11);?></td>
        <td align="center"><?php echo get_kriteria6(12);?></td>
        <td align="center"><?php echo get_kriteria6(13);?></td>
        <td align="center"><?php echo get_kriteria6(14);?></td>
        <td align="center"><?php echo get_kriteria6(15);?></td>
        <td align="center"><?php echo get_kriteria6(16);?></td>
        <td align="center"><?php echo get_kriteria6(17);?></td>
        <td align="center"><?php echo get_kriteria6(18);?></td>
        <td align="center"><?php echo get_kriteria6(19);?></td>
        <td align="center"><?php echo get_kriteria6(20);?></td>
        <td align="center"><?php echo get_kriteria6(21);?></td>
        <td align="center">20</td>
      </tr>
      </thead>
    </table>
  
</form>
<?php if( isset($_POST['submit']) ){?>

<table class="tabel">
    <tr>
      <td>&nbsp;</td>
      <td align="center"><?php echo get_kandidat(0);?></td>
      <td align="center"><?php echo get_kandidat(1);?></td>
      <td align="center"><?php echo get_kandidat(2);?></td>
      <td align="center">Eigen Vector</td>
      <td align="center">^Maks</td>
    </tr>
    <tr>
      <td><?php echo get_kandidat(0);?></td>
      <td align="center"><?php echo round($vhmk1,2)?></td>
      <td align="center"><?php echo round($vhmk5,2)?></td>
      <td align="center"><?php echo round($vhmk9,2)?></td>
      <td align="center"><?php echo round($ev1,2)?></td>
      <td align="center"><?php echo round($max1,2)?></td>
    </tr>
    <tr>
      <td><?php echo get_kandidat(1);?></td>
      <td align="center"><?php echo round($vhmk2,2)?></td>
      <td align="center"><?php echo round($vhmk6,2)?></td>
      <td align="center"><?php echo round($vhmk10,2)?></td>
      <td align="center"><?php echo round($ev2,2)?></td> <!-- abcd/4 -->
      <td align="center"><?php echo round($max2,2)?></td> <!-- (abcd/4)*tmk2 -->
    </tr>
    <tr>
      <td><?php echo get_kandidat(2);?></td>
      <td align="center"><?php echo round($vhmk3,2)?></td>
      <td align="center"><?php echo round($vhmk7,2)?></td>
      <td align="center"><?php echo round($vhmk11,2)?></td>
      <td align="center"><?php echo round($ev3,2)?></td>
      <td align="center"><?php echo round($max3,2)?></td>
    </tr>
    
    <tr>
      <td colspan="4">Jumlah</td>
      <td align="center"><?php echo round($tev,2)?></td>
      <td align="center"><?php echo round($tmax,2)?></td>
    </tr>
  </table>
<br />
  <table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td width="23%">Index Konsistensi</td>
    <td width="1%"><strong>:</strong></td>
    <td width="76%"><?php echo round($ik,2)?></td>
    </tr>
  <tr>
    <td>Rasio Konsistensi</td>
    <td><strong>:</strong></td>
    <td><?php echo round($rk,2)?></td>
    </tr>
  <tr>
    <td colspan="3" align="center">
    <?php
	if( $rk > 0.10 ) echo "<div class=\"kons_no\">Tidak Konsisten</div>";
	else echo "<div class=\"kons_yes\">Konsisten</div>";
	?>  
   
    </td>
    </tr>
</table>
<?php }?>