<?php 
session_start();
error_reporting(0);
include "timeout.php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Sistem Pendukung Keputusan Pemilihan Guru Teladan :::</title>
<link rel="shortcut icon" href="images/guru berprestasi.jpg" />

<link rel="stylesheet" href="css/style.css" type="text/css"  />
<script src="js/jquery-1.4.js" type="text/javascript"></script>
<script src="js/superfish.js" type="text/javascript"></script>
<script src="js/hoverIntent.js" type="text/javascript"></script>

	<script type="text/javascript">
$(document).ready(function(){
			   $('ul.nav').superfish();
		  });
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
</script>
</head>

<body>
<div id="container">
<div id="header">


</div>
<div id="menu">
	<ul class="nav">
	<?php if ($_SESSION['leveluser']=='3'){ ?>
	<li><a class="border link linkback" href="?module=home">Home</a></li>
	<li><a class="border link linkback" href="?module=guru&act=detail&id=<?php echo "$_SESSION[namauser]";?>">Data Guru</a></li>
     <li><a class="border link linkback" href="?module=guru&act=lihat-nilai&id=<?php echo "$_SESSION[namauser]";?>">Lihat Nilai</a>
       
        
        
        </li>
    <li><a href="" class="li" onclick="MM_openBrWindow('laporan_keseluruhan.php','','status=yes,scrollbars=yes,width=1200,height=1000')">Hasil Analisa Metode Promethee</a></li>
   
        
     <li><a class="border link linkback" href="logout.php">Logout</a></li>
	<?php 
	}
	if ($_SESSION['leveluser']=='1'){
	?>
    <li><a class="border link linkback" href="?module=home">Home</a></li>
    	<li><a class="border link linkback" href="?module=guru">Data Guru</a>
        	<ul>
            <li><a href="media.php?module=guru&act=input" class="li">Tambah Guru</a></li>
            <li><a href="?module=guru" class="li">List Guru</a></li>
            <li><a href="?module=bagian" class="li">Data Golongan</a></li>
            <li><a href="?module=jabatan" class="li">Data Jabatan Guru</a></li>
            </ul>
        </li>
       
        
	<?php } 
	if($_SESSION['leveluser']=='1' or $_SESSION['leveluser']=='2'){
	?>
    
     <li><a class="border link linkback" href="">Input Data</a>
        <ul>
			
            <li><a href="?module=dataalternatif" class="li">Alternatif</a></li>
            <li><a href="?module=datakriteria"  class="li">Kriteria</a></li>
			
            
            </ul>
        
        
        </li>
    <li><a class="border link linkback" href="?module=analisis">Analisa Promethee</a></li>
		<li><a class="border link linkback" href="#">Laporan</a>
        	<ul>
			<li><a href="" class="li" onclick="MM_openBrWindow('laporan_pegawai.php','','status=yes,scrollbars=yes,width=980,height=900')">Laporan Data Guru</a></li>
            
           <li><a href="" class="li" onclick="MM_openBrWindow('laporan_keseluruhan.php','','status=yes,scrollbars=yes,width=1200,height=1000')">Laporan Data Penilaian</a></li>
          </ul>
        </li>
        
        <li><a class="border link linkback" href="logout.php">Logout</a></li>
	<?php } ?>
        <li class="clear"></li>
    </ul>
</div>
<div id="content">
<div class="form">
	<?php include "data.php"; ?>
</div>
</div>
<div id="footer">Copyright &copy; 2014 By Sistem Pendukung Keputusan Pemilihan Guru Teladan </div>
</div>
</body>
</html>
