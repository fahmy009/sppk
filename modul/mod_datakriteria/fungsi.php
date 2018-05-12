<?php
include "../config/koneksi.php";
?>
<?php


function set_login($username,$password){
	
	$mysql_query = mysql_query("SELECT * FROM user WHERE userid='".$username."' AND passid='".$password."'");
	$mysql_num = mysql_num_rows($mysql_query);
	$mysql_row = mysql_fetch_array($mysql_query);
	
	if( $mysql_num > 0 ){
		
		$_SESSION[namauser]     = $r[userid];
 		$_SESSION[passuser]     = $r[passid];
  		$_SESSION[leveluser]    = $r[level_user];
		
		echo redirect_to();
		
	}else{
		echo "Username dan Password salah";
	}
	
}



function get_uname_id(){
	$uname = $_SESSION['namauser'];
	return $uname;
	
}

function get_uname_name($string){
	$uname = $_SESSION['userid'];
	return $uname."_".$string;
	
}

function redirect_to( $redirect = "" ){		
		return "<meta http-equiv=\"Refresh\" content=\"0; url=$redirect\"/>";
}

function matrik_id($id,$jenis = 'alternatif'){
	$user_id = get_uname_id();
	$query_alternatif = mysql_query("SELECT * FROM `matrik` WHERE jenis='$jenis' AND user_id='$user_id' AND id_matrik='$id'");
	$row_alternatif = mysql_fetch_object($query_alternatif);
	return $row_alternatif->matrik_value;
}

function list_npm_op($op_link = false){
	if( empty($op_link) ) $link = '?module=datakriteria'; 
	else $link = $op_link;
	

		
		$query_nip = mysql_query("SELECT * FROM guru");
	while($row_nip = mysql_fetch_object($query_nip)){
		$selected  = "";
		if( $row_nip->nip == $_GET['nip']) $selected = 'selected="selected"';
		echo '<option value="'.$link.'&nip='.$row_nip->nip.'" '.$selected.'>'.$row_nip->nip.'</option>';

	}
}

function js_redirect() {
	return '<script language="javascript">function redir(mylist){ if (newurl=mylist.options[mylist.selectedIndex].value)document.location=newurl;}</script>'."\n";
}

function get_kandidat($param){
	$user_id = get_uname_id();
	$kandidat = array();
	$query_kandidat = mysql_query("SELECT * FROM kriteria WHERE user_id='$user_id'");
	while($row_kandidat = mysql_fetch_object($query_kandidat)){
		$kandidat[] = $row_kandidat->nama;
	}
	return $kandidat[$param];
	
}

function array_sort($array, $on, $order = SORT_ASC){
	$new_array = $sortable_array = array();
	if( count($array) > 0 ){
		foreach( $array as $k => $v ){
			if(is_array($v)){
				foreach($v as $k2 => $v2){
					if( $k2 == $on ){
						$sortable_array[$k] = $v2;;
					}
				}
			}else{
				$sortable_array[$k] = $v;
			}
		}
		switch( $order ){
			case SORT_ASC:
				asort($sortable_array);
				break;
			case SORT_DESC:
				arsort($sortable_array);
				break;
		}
		foreach($sortable_array as $k => $v){
			$new_array[$k] = $array[$k];
		}
	}
	return $new_array;
}

