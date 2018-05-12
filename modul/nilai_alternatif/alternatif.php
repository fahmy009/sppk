<style type="text/css">
    <!--
    .style1 {
        color: #FFFFFF;
        font-weight: bold;
    }

    -->
</style>
<h2 class="head">Tabel Preferensi Nilai Guru Teladan</h2>
<?php
error_reporting(0);
session_start();
$userid = $_SESSION[namauser];
include "fungsi.php";
// Memanggil id kandidat Guru 
function get_alternatif($param)
{
    $user_id = get_uname_id();
    $kandidat = array();
    $query_kandidat = mysqli_query($con, "SELECT * FROM kandidat WHERE user_id='$user_id'");
    while ($row_kandidat = mysqli_fetch_object($query_kandidat)) {
        $kandidat[] = $row_kandidat->id_kandidat;
    }
    return $kandidat[$param];

}

// Memanggil nilai kriteria 1 
function get_kriteria1($param)
{
    $user_id = get_uname_id();
    $kandidat = array();
    $query_kandidat = mysqli_query($con, "SELECT * FROM kandidat WHERE user_id='$user_id'");
    while ($row_kandidat = mysqli_fetch_object($query_kandidat)) {
        $kandidat[] = $row_kandidat->kriteria1;
    }
    return $kandidat[$param];
}

// Memanggil nilai kriteria 2 
function get_kriteria2($param)
{
    $user_id = get_uname_id();
    $kandidat = array();
    $query_kandidat = mysqli_query($con, "SELECT * FROM kandidat WHERE user_id='$user_id'");
    while ($row_kandidat = mysqli_fetch_object($query_kandidat)) {
        $kandidat[] = $row_kandidat->kriteria2;
    }
    return $kandidat[$param];
}

// Memanggil nilai kriteria 3 
function get_kriteria3($param)
{
    $user_id = get_uname_id();
    $kandidat = array();
    $query_kandidat = mysqli_query($con, "SELECT * FROM kandidat WHERE user_id='$user_id'");
    while ($row_kandidat = mysqli_fetch_object($query_kandidat)) {
        $kandidat[] = $row_kandidat->kriteria3;
    }
    return $kandidat[$param];
}

// Memanggil nilai kriteria 4 
function get_kriteria4($param)
{
    $user_id = get_uname_id();
    $kandidat = array();
    $query_kandidat = mysqli_query($con, "SELECT * FROM kandidat WHERE user_id='$user_id'");
    while ($row_kandidat = mysqli_fetch_object($query_kandidat)) {
        $kandidat[] = $row_kandidat->kriteria4;
    }
    return $kandidat[$param];
}

// Memanggil nilai kriteria 5 
function get_kriteria5($param)
{
    $user_id = get_uname_id();
    $kandidat = array();
    $query_kandidat = mysqli_query($con, "SELECT * FROM kandidat WHERE user_id='$user_id'");
    while ($row_kandidat = mysqli_fetch_object($query_kandidat)) {
        $kandidat[] = $row_kandidat->kriteria5;
    }
    return $kandidat[$param];
}

// Memanggil nilai kriteria 4 
function get_kriteria6($param)
{
    $user_id = get_uname_id();
    $kandidat = array();
    $query_kandidat = mysqli_query($con, "SELECT * FROM kandidat WHERE user_id='$user_id'");
    while ($row_kandidat = mysqli_fetch_object($query_kandidat)) {
        $kandidat[] = $row_kandidat->kriteria6;
    }
    return $kandidat[$param];
}

// Memanggil Kriteria
function get_kriteria($param)
{
    $user_id = get_uname_id();
    $kandidat = array();
    $query_kandidat = mysqli_query($con, "SELECT * FROM kriteria WHERE user_id='$user_id'");
    while ($row_kandidat = mysqli_fetch_object($query_kandidat)) {
        $kandidat[] = $row_kandidat->id_kriteria;
    }
    return $kandidat[$param];

}


if (isset($_POST['submit'])) {
    /*
     * A
     */
    $mak1a = $_POST['mak1a'];
    $mak2a = $_POST['mak2a'];
    $mak3a = $_POST['mak3a'];
    //==================================
    $hmak1a = (1 / $mak1a);
    $hmak2a = (1 / $mak2a);
    $hmak3a = (1 / $mak3a);
    //==================================
    $thmakaa = (1 + $hmak1a + $hmak2a);
    $thmakba = (1 + $mak1a + $hmak3a);
    $thmakca = (1 + $mak2a + $mak3a);
    //==================================
    $vhmak1a = (1 / $thmakaa);
    $vhmak2a = ($hmak1a / $thmakaa);
    $vhmak3a = ($hmak2a / $thmakaa);

    $vhmak4a = ($mak1a / $thmakba);
    $vhmak5a = (1 / $thmakba);
    $vhmak6a = ($hmak3a / $thmakba);

    $vhmak7a = ($mak2a / $thmakca);
    $vhmak8a = ($mak3a / $thmakca);
    $vhmak9a = (1 / $thmakca);

    $ev1a = (($vhmak1a + $vhmak4a + $vhmak7a) / 3);
    $ev2a = (($vhmak2a + $vhmak5a + $vhmak8a) / 3);
    $ev3a = (($vhmak3a + $vhmak6a + $vhmak9a) / 3);

    //==================================
    $thmaka_a = ($vhmak1a + $vhmak2a + $vhmak3a);
    $thmakb_a = ($vhmak4a + $vhmak5a + $vhmak6a);
    $thmakc_a = ($vhmak7a + $vhmak8a + $vhmak9a);

    $evtota = ($ev1a + $ev2a + $ev3a);

    /*
     * B
     */
    $mak1b = $_POST['mak1b'];
    $mak2b = $_POST['mak2b'];
    $mak3b = $_POST['mak3b'];
    //==================================
    $hmak1b = (1 / $mak1b);
    $hmak2b = (1 / $mak2b);
    $hmak3b = (1 / $mak3b);
    //==================================
    $thmakab = (1 + $hmak1b + $hmak2b);
    $thmakbb = (1 + $mak1b + $hmak3b);
    $thmakcb = (1 + $mak2b + $mak3b);
    //==================================
    $vhmak1b = (1 / $thmakab);
    $vhmak2b = ($hmak1b / $thmakab);
    $vhmak3b = ($hmak2b / $thmakab);

    $vhmak4b = ($mak1b / $thmakbb);
    $vhmak5b = (1 / $thmakbb);
    $vhmak6b = ($hmak3b / $thmakbb);

    $vhmak7b = ($mak2b / $thmakcb);
    $vhmak8b = ($mak3b / $thmakcb);
    $vhmak9b = (1 / $thmakcb);

    $ev1b = (($vhmak1b + $vhmak4b + $vhmak7b) / 3);
    $ev2b = (($vhmak2b + $vhmak5b + $vhmak8b) / 3);
    $ev3b = (($vhmak3b + $vhmak6b + $vhmak9b) / 3);

    //==================================
    $thmaka_b = ($vhmak1b + $vhmak2b + $vhmak3b);
    $thmakb_b = ($vhmak4b + $vhmak5b + $vhmak6b);
    $thmakc_b = ($vhmak7b + $vhmak8b + $vhmak9b);

    $evtotb = ($ev1b + $ev2b + $ev3b);

    /*
     * C
     */
    $mak1c = $_POST['mak1c'];
    $mak2c = $_POST['mak2c'];
    $mak3c = $_POST['mak3c'];
    //==================================
    $hmak1c = (1 / $mak1c);
    $hmak2c = (1 / $mak2c);
    $hmak3c = (1 / $mak3c);
    //==================================
    $thmakac = (1 + $hmak1c + $hmak2c);
    $thmakbc = (1 + $mak1c + $hmak3c);
    $thmakcc = (1 + $mak2c + $mak3c);
    //==================================
    $vhmak1c = (1 / $thmakac);
    $vhmak2c = ($hmak1c / $thmakac);
    $vhmak3c = ($hmak2c / $thmakac);

    $vhmak4c = ($mak1c / $thmakbc);
    $vhmak5c = (1 / $thmakbc);
    $vhmak6c = ($hmak3c / $thmakbc);

    $vhmak7c = ($mak2c / $thmakcc);
    $vhmak8c = ($mak3c / $thmakcc);
    $vhmak9c = (1 / $thmakcc);

    $ev1c = (($vhmak1c + $vhmak4c + $vhmak7c) / 3);
    $ev2c = (($vhmak2c + $vhmak5c + $vhmak8c) / 3);
    $ev3c = (($vhmak3c + $vhmak6c + $vhmak9c) / 3);

    //==================================
    $thmaka_c = ($vhmak1c + $vhmak2c + $vhmak3c);
    $thmakb_c = ($vhmak4c + $vhmak5c + $vhmak6c);
    $thmakc_c = ($vhmak7c + $vhmak8c + $vhmak9c);

    $evtotc = ($ev1c + $ev2c + $ev3c);

    /*
     * D
     */
    $mak1d = $_POST['mak1d'];
    $mak2d = $_POST['mak2d'];
    $mak3d = $_POST['mak3d'];
    //==================================
    $hmak1d = (1 / $mak1d);
    $hmak2d = (1 / $mak2d);
    $hmak3d = (1 / $mak3d);
    //==================================
    $thmakad = (1 + $hmak1d + $hmak2d);
    $thmakbd = (1 + $mak1d + $hmak3d);
    $thmakcd = (1 + $mak2d + $mak3d);
    //==================================
    $vhmak1d = (1 / $thmakad);
    $vhmak2d = ($hmak1d / $thmakad);
    $vhmak3d = ($hmak2d / $thmakad);

    $vhmak4d = ($mak1d / $thmakbd);
    $vhmak5d = (1 / $thmakbd);
    $vhmak6d = ($hmak3d / $thmakbd);

    $vhmak7d = ($mak2d / $thmakcd);
    $vhmak8d = ($mak3d / $thmakcd);
    $vhmak9d = (1 / $thmakcd);

    $ev1d = (($vhmak1d + $vhmak4d + $vhmak7d) / 3);
    $ev2d = (($vhmak2d + $vhmak5d + $vhmak8d) / 3);
    $ev3d = (($vhmak3d + $vhmak6d + $vhmak9d) / 3);

    //==================================
    $thmaka_d = ($vhmak1d + $vhmak2d + $vhmak3d);
    $thmakb_d = ($vhmak4d + $vhmak5d + $vhmak6d);
    $thmakc_d = ($vhmak7d + $vhmak8d + $vhmak9d);

    $evtotd = ($ev1d + $ev2d + $ev3d);

    $ev = array(
        $ev1a, $ev2a, $ev3a,
        $ev1b, $ev2b, $ev3b,
        $ev1c, $ev2c, $ev3c,
        $ev1d, $ev2d, $ev3d);

    $run_update = $run_insert = '';


    $user_id = $_SESSION['namauser'];

    $select_pa = mysqli_query($con, "SELECT * FROM `nilai_alternatif`  WHERE  `jenis` =  'alternatif' AND  `user_id` =  '$user_id'");
    $num_pa = mysqli_num_rows($select_pa);

    if ($num_pa > 0) {
        $i = 0;
        while ($row_pa = mysqli_fetch_object($select_pa)) {
            $evx = $ev[$i];
            $run_update .= mysqli_query($con, "UPDATE  `nilai_alternatif` SET  `matrik_value` =  '$evx' WHERE  `id_matrik` =  '$row_pa->id_matrik' AND `jenis` =  'alternatif' AND `user_id` = '$user_id'");
            $i++;
        }
    } else {
        for ($i = 0; $i <= 11; $i++) {
            $evx = $ev[$i];
            $run_insert .= mysqli_query($con, "INSERT INTO `nilai_alternatif` (`id_matrik`, `user_id`, `matrik_value`,`jenis`) VALUES ('$i','$user_id', '$evx','alternatif')");
        }
    }

    if ($run_update) echo "<div class=\"sukses\">Berhasil di perbaharui</div><br>";
    elseif ($run_insert) echo "<div class=\"sukses\">Berhasil di tambahkan</div><br>";
    else echo "<div class=\"error\">Gagal disimpan</div><br>";
}
?>
<form method="post" action="">

    <table border="1" class="tabel" width="54%">
        <thead>
        <tr>
            <td width="17">Kr</td>
            <td width="34" align="center">Min Max</td>
            <td width="17" align="center"><?php echo get_alternatif(0); ?></td>
            <td width="18" align="center"><?php echo get_alternatif(1); ?></td>
            <td width="17" align="center"><?php echo get_alternatif(2); ?></td>
            <td width="17" align="center"><?php echo get_alternatif(3); ?></td>
            <td width="17" align="center"><?php echo get_alternatif(4); ?></td>
            <td width="17" align="center"><?php echo get_alternatif(5); ?></td>
            <td width="17" align="center"><?php echo get_alternatif(6); ?></td>
            <td width="17" align="center"><?php echo get_alternatif(7); ?></td>
            <td width="17" align="center"><?php echo get_alternatif(8); ?></td>
            <td width="17" align="center"><?php echo get_alternatif(9); ?></td>
            <td width="17" align="center"><?php echo get_alternatif(10); ?></td>
            <td width="17" align="center"><?php echo get_alternatif(11); ?></td>
            <td width="17" align="center"><?php echo get_alternatif(12); ?></td>
            <td width="17" align="center"><?php echo get_alternatif(13); ?></td>
            <td width="17" align="center"><?php echo get_alternatif(14); ?></td>
            <td width="17" align="center"><?php echo get_alternatif(15); ?></td>
            <td width="17" align="center"><?php echo get_alternatif(16); ?></td>
            <td width="17" align="center"><?php echo get_alternatif(17); ?></td>
            <td width="17" align="center"><?php echo get_alternatif(18); ?></td>
            <td width="17" align="center"><?php echo get_alternatif(19); ?></td>
            <td width="17" align="center"><?php echo get_alternatif(20); ?></td>
            <td width="17" align="center"><?php echo get_alternatif(21); ?></td>
            <td width="17" align="center">ST</td>
        </tr>
        <tr>
            <td><?php echo get_kriteria(0); ?></td>
            <td align="center" bgcolor="#CCCCCC">Max</td>
            <td align="center"><label><?php echo get_kriteria1(0); ?></label></td>
            <td align="center"><?php echo get_kriteria1(1); ?></td>
            <td align="center"><?php echo get_kriteria1(2); ?></td>
            <td align="center"><?php echo get_kriteria1(3); ?></td>
            <td align="center"><?php echo get_kriteria1(4); ?></td>
            <td align="center"><?php echo get_kriteria1(5); ?></td>
            <td align="center"><?php echo get_kriteria1(6); ?></td>
            <td align="center"><?php echo get_kriteria1(7); ?></td>
            <td align="center"><?php echo get_kriteria1(8); ?></td>
            <td align="center"><?php echo get_kriteria1(9); ?></td>
            <td align="center"><?php echo get_kriteria1(10); ?></td>
            <td align="center"><?php echo get_kriteria1(11); ?></td>
            <td align="center"><?php echo get_kriteria1(12); ?></td>
            <td align="center"><?php echo get_kriteria1(13); ?></td>
            <td align="center"><?php echo get_kriteria1(14); ?></td>
            <td align="center"><?php echo get_kriteria1(15); ?></td>
            <td align="center"><?php echo get_kriteria1(16); ?></td>
            <td align="center"><?php echo get_kriteria1(17); ?></td>
            <td align="center"><?php echo get_kriteria1(18); ?></td>
            <td align="center"><?php echo get_kriteria1(19); ?></td>
            <td align="center"><?php echo get_kriteria1(20); ?></td>
            <td align="center"><?php echo get_kriteria1(21); ?></td>
            <td align="center">20</td>
        </tr>
        <tr>
            <td><?php echo get_kriteria(1); ?></td>
            <td align="center">Max</td>
            <td align="center"><label><?php echo get_kriteria2(0); ?></label></td>
            <td align="center"><?php echo get_kriteria2(1); ?></td>
            <td align="center"><?php echo get_kriteria2(2); ?></td>
            <td align="center"><?php echo get_kriteria2(3); ?></td>
            <td align="center"><?php echo get_kriteria2(4); ?></td>
            <td align="center"><?php echo get_kriteria2(5); ?></td>
            <td align="center"><?php echo get_kriteria2(6); ?></td>
            <td align="center"><?php echo get_kriteria2(7); ?></td>
            <td align="center"><?php echo get_kriteria2(8); ?></td>
            <td align="center"><?php echo get_kriteria2(9); ?></td>
            <td align="center"><?php echo get_kriteria2(10); ?></td>
            <td align="center"><?php echo get_kriteria2(11); ?></td>
            <td align="center"><?php echo get_kriteria2(12); ?></td>
            <td align="center"><?php echo get_kriteria2(13); ?></td>
            <td align="center"><?php echo get_kriteria2(14); ?></td>
            <td align="center"><?php echo get_kriteria2(15); ?></td>
            <td align="center"><?php echo get_kriteria2(16); ?></td>
            <td align="center"><?php echo get_kriteria2(17); ?></td>
            <td align="center"><?php echo get_kriteria2(18); ?></td>
            <td align="center"><?php echo get_kriteria2(19); ?></td>
            <td align="center"><?php echo get_kriteria2(20); ?></td>
            <td align="center"><?php echo get_kriteria2(21); ?></td>
            <td align="center">20</td>
        </tr>
        <tr>
            <td><?php echo get_kriteria(2); ?></td>
            <td align="center">Max</td>
            <td align="center"><label><?php echo get_kriteria3(0); ?></label></td>
            <td align="center"><?php echo get_kriteria3(1); ?></td>
            <td align="center"><?php echo get_kriteria3(2); ?></td>
            <td align="center"><?php echo get_kriteria3(3); ?></td>
            <td align="center"><?php echo get_kriteria3(4); ?></td>
            <td align="center"><?php echo get_kriteria3(5); ?></td>
            <td align="center"><?php echo get_kriteria3(6); ?></td>
            <td align="center"><?php echo get_kriteria3(7); ?></td>
            <td align="center"><?php echo get_kriteria3(8); ?></td>
            <td align="center"><?php echo get_kriteria3(9); ?></td>
            <td align="center"><?php echo get_kriteria3(10); ?></td>
            <td align="center"><?php echo get_kriteria3(11); ?></td>
            <td align="center"><?php echo get_kriteria3(12); ?></td>
            <td align="center"><?php echo get_kriteria3(13); ?></td>
            <td align="center"><?php echo get_kriteria3(14); ?></td>
            <td align="center"><?php echo get_kriteria3(15); ?></td>
            <td align="center"><?php echo get_kriteria3(16); ?></td>
            <td align="center"><?php echo get_kriteria3(17); ?></td>
            <td align="center"><?php echo get_kriteria3(18); ?></td>
            <td align="center"><?php echo get_kriteria3(19); ?></td>
            <td align="center"><?php echo get_kriteria3(20); ?></td>
            <td align="center"><?php echo get_kriteria3(21); ?></td>
            <td align="center">20</td>
        </tr>
        <tr>
            <td><?php echo get_kriteria(3); ?></td>
            <td align="center">Max</td>
            <td align="center"><label><?php echo get_kriteria4(0); ?></label></td>
            <td align="center"><?php echo get_kriteria4(1); ?></td>
            <td align="center"><?php echo get_kriteria4(2); ?></td>
            <td align="center"><?php echo get_kriteria4(3); ?></td>
            <td align="center"><?php echo get_kriteria4(4); ?></td>
            <td align="center"><?php echo get_kriteria4(5); ?></td>
            <td align="center"><?php echo get_kriteria4(6); ?></td>
            <td align="center"><?php echo get_kriteria4(7); ?></td>
            <td align="center"><?php echo get_kriteria4(8); ?></td>
            <td align="center"><?php echo get_kriteria4(9); ?></td>
            <td align="center"><?php echo get_kriteria4(10); ?></td>
            <td align="center"><?php echo get_kriteria4(11); ?></td>
            <td align="center"><?php echo get_kriteria4(12); ?></td>
            <td align="center"><?php echo get_kriteria4(13); ?></td>
            <td align="center"><?php echo get_kriteria4(14); ?></td>
            <td align="center"><?php echo get_kriteria4(15); ?></td>
            <td align="center"><?php echo get_kriteria4(16); ?></td>
            <td align="center"><?php echo get_kriteria4(17); ?></td>
            <td align="center"><?php echo get_kriteria4(18); ?></td>
            <td align="center"><?php echo get_kriteria4(19); ?></td>
            <td align="center"><?php echo get_kriteria4(20); ?></td>
            <td align="center"><?php echo get_kriteria4(21); ?></td>
            <td align="center">20</td>
        </tr>
        <tr>
            <td><?php echo get_kriteria(4); ?></td>
            <td align="center">Max</td>
            <td align="center"><label><?php echo get_kriteria5(0); ?></label></td>
            <td align="center"><?php echo get_kriteria5(1); ?></td>
            <td align="center"><?php echo get_kriteria5(2); ?></td>
            <td align="center"><?php echo get_kriteria5(3); ?></td>
            <td align="center"><?php echo get_kriteria5(4); ?></td>
            <td align="center"><?php echo get_kriteria5(5); ?></td>
            <td align="center"><?php echo get_kriteria5(6); ?></td>
            <td align="center"><?php echo get_kriteria5(7); ?></td>
            <td align="center"><?php echo get_kriteria5(8); ?></td>
            <td align="center"><?php echo get_kriteria5(9); ?></td>
            <td align="center"><?php echo get_kriteria5(10); ?></td>
            <td align="center"><?php echo get_kriteria5(11); ?></td>
            <td align="center"><?php echo get_kriteria5(12); ?></td>
            <td align="center"><?php echo get_kriteria5(13); ?></td>
            <td align="center"><?php echo get_kriteria5(14); ?></td>
            <td align="center"><?php echo get_kriteria5(15); ?></td>
            <td align="center"><?php echo get_kriteria5(16); ?></td>
            <td align="center"><?php echo get_kriteria5(17); ?></td>
            <td align="center"><?php echo get_kriteria5(18); ?></td>
            <td align="center"><?php echo get_kriteria5(19); ?></td>
            <td align="center"><?php echo get_kriteria5(20); ?></td>
            <td align="center"><?php echo get_kriteria5(21); ?></td>
            <td align="center">20</td>
        </tr>
        <tr>
            <td><?php echo get_kriteria(5); ?></td>
            <td align="center">Max</td>
            <td align="center"><label><?php echo get_kriteria6(0); ?></label></td>
            <td align="center"><?php echo get_kriteria6(1); ?></td>
            <td align="center"><?php echo get_kriteria6(2); ?></td>
            <td align="center"><?php echo get_kriteria6(3); ?></td>
            <td align="center"><?php echo get_kriteria6(4); ?></td>
            <td align="center"><?php echo get_kriteria6(5); ?></td>
            <td align="center"><?php echo get_kriteria6(6); ?></td>
            <td align="center"><?php echo get_kriteria6(7); ?></td>
            <td align="center"><?php echo get_kriteria6(8); ?></td>
            <td align="center"><?php echo get_kriteria6(9); ?></td>
            <td align="center"><?php echo get_kriteria6(10); ?></td>
            <td align="center"><?php echo get_kriteria6(11); ?></td>
            <td align="center"><?php echo get_kriteria6(12); ?></td>
            <td align="center"><?php echo get_kriteria6(13); ?></td>
            <td align="center"><?php echo get_kriteria6(14); ?></td>
            <td align="center"><?php echo get_kriteria6(15); ?></td>
            <td align="center"><?php echo get_kriteria6(16); ?></td>
            <td align="center"><?php echo get_kriteria6(17); ?></td>
            <td align="center"><?php echo get_kriteria6(18); ?></td>
            <td align="center"><?php echo get_kriteria6(19); ?></td>
            <td align="center"><?php echo get_kriteria6(20); ?></td>
            <td align="center"><?php echo get_kriteria6(21); ?></td>
            <td align="center">20</td>
        </tr>
        </thead>
    </table>
    <br/>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td>
                <div align="center">
                    <input type="submit" name="submit" id="button" value="Submit"/>
                    <input type=button value=Batal onclick=self.history.back()>
                </div>
            </td>
        </tr>
    </table>
    </table><br/>
    <?php if (isset($_POST['submit'])){ ?>
    <h2 class="head">Tabel Data Indeks Preferensi</h2>
    <?php

    $kriteria = array();

    $id = get_uname_id();
    $query_kriteria = mysqli_query($con, "SELECT * FROM nilai_alternatif WHERE jenis='kriteria' AND user_id='$id'");
    while ($row_kriteria = mysqli_fetch_object($query_kriteria)) {
        $kriteria[] = $row_kriteria->matrik_value;
    }
    $i = 0;
    $query_alternatif = mysqli_query($con, "SELECT * FROM nilai_alternatif WHERE jenis='alternatif' AND user_id='$id'");
    while ($row_alternatif = mysqli_fetch_object($query_alternatif)) {
        $kriteria[] = $row_alternatif->matrik_value;
    }
    $kriteria1 = $kriteria[0];
    $kriteria2 = $kriteria[1];
    $kriteria3 = $kriteria[2];


    $matrik0 = matrik_id(0);
    $matrik1 = matrik_id(1);
    $matrik2 = matrik_id(2);
    $matrik3 = matrik_id(3);


    $matrik4 = matrik_id(4);
    $matrik5 = matrik_id(5);
    $matrik6 = matrik_id(6);
    $matrik7 = matrik_id(7);

    $matrik8 = matrik_id(8);


    $total_ranking0 = $kriteria1 * $matrik0;
    $total_ranking1 = $kriteria1 * $matrik1;
    $total_ranking2 = $kriteria3 * $matrik2;

    $total_ranking3 = $kriteria2 * $matrik3;
    $total_ranking4 = $kriteria2 * $matrik4;
    $total_ranking5 = $kriteria2 * $matrik5;

    $total_ranking6 = $kriteria3 * $matrik6;
    $total_ranking7 = $kriteria3 * $matrik7;
    $total_ranking8 = $kriteria3 * $matrik8;


    $total_global0 = ($total_ranking0 + $total_ranking3 + $total_ranking6);
    $total_global1 = ($total_ranking1 + $total_ranking4 + $total_ranking7);
    $total_global2 = ($total_ranking2 + $total_ranking5 + $total_ranking8);

    $total_globalx = ($total_global0 + $total_global1 + $total_global2);

    ?>
    <table class="tabel">
        <thead>
        <tr>
            <td></td>
            <td align="center"><?php echo get_alternatif(0); ?></td>
            <td align="center"><?php echo get_alternatif(1); ?></td>
            <td align="center"><?php echo get_alternatif(2); ?></td>
            <td align="center"><?php echo get_alternatif(3); ?></td>
            <td align="center"><?php echo get_alternatif(4); ?></td>
            <td align="center"><?php echo get_alternatif(5); ?></td>
            <td align="center"><?php echo get_alternatif(6); ?></td>
            <td align="center"><?php echo get_alternatif(7); ?></td>
            <td align="center"><?php echo get_alternatif(8); ?></td>
            <td align="center"><?php echo get_alternatif(9); ?></td>
            <td align="center"><?php echo get_alternatif(10); ?></td>
            <td align="center"><?php echo get_alternatif(11); ?></td>
            <td align="center"><?php echo get_alternatif(12); ?></td>
            <td align="center"><?php echo get_alternatif(13); ?></td>
            <td align="center"><?php echo get_alternatif(14); ?></td>
            <td align="center"><?php echo get_alternatif(15); ?></td>
            <td align="center"><?php echo get_alternatif(16); ?></td>
            <td align="center"><?php echo get_alternatif(17); ?></td>
            <td align="center"><?php echo get_alternatif(18); ?></td>
            <td align="center"><?php echo get_alternatif(19); ?></td>
            <td align="center"><?php echo get_alternatif(20); ?></td>
            <td align="center"><?php echo get_alternatif(21); ?></td>
        </tr>

        <tr>
            <td><?php echo get_alternatif(0); ?></td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
        </tr>
        <tr>
            <td><?php echo get_alternatif(1); ?></td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
        </tr>
        <tr>
            <td><?php echo get_alternatif(2); ?></td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
        </tr>
        <tr>
            <td><?php echo get_alternatif(3); ?></td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
        </tr>
        <tr>
            <td><?php echo get_alternatif(4); ?></td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
        </tr>
        <tr>
            <td><?php echo get_alternatif(5); ?></td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
        </tr>
        <tr>
            <td><?php echo get_alternatif(6); ?></td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
        </tr>
        <tr>
            <td><?php echo get_alternatif(7); ?></td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
        </tr>
        <tr>
            <td><?php echo get_alternatif(8); ?></td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
        </tr>
        <tr>
            <td><?php echo get_alternatif(9); ?></td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
        </tr>
        <tr>
            <td><?php echo get_alternatif(10); ?></td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
        </tr>
        <tr>
            <td><?php echo get_alternatif(11); ?></td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
        </tr>
        <tr>
            <td><?php echo get_alternatif(12); ?></td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
        </tr>
        <tr>
            <td><?php echo get_alternatif(13); ?></td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
        </tr>
        <tr>
            <td><?php echo get_alternatif(14); ?></td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
        </tr>
        <tr>
            <td><?php echo get_alternatif(15); ?></td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
        </tr>
        <tr>
            <td><?php echo get_alternatif(16); ?></td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
        </tr>
        <tr>
            <td><?php echo get_alternatif(17); ?></td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
        </tr>
        <tr>
            <td><?php echo get_alternatif(18); ?></td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
        </tr>
        <tr>
            <td><?php echo get_alternatif(19); ?></td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
        </tr>
        <tr>
            <td><?php echo get_alternatif(20); ?></td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
        </tr>
        <tr>
            <td><?php echo get_alternatif(21); ?></td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
        </tr>
        </thead>
    </table>
    <table class="tabel">
        <thead>
        <tr>
            <td colspan="4">Total Ranking / Proritas Global</td>
            <td align="center">Prioriatas Global</td>
        </tr>
        <tr>
            <td><?php echo get_kandidat(0); ?></td>
            <td align="center"><?php echo round($total_ranking0, 2) ?></td>
            <td align="center"><?php echo round($total_ranking3, 2) ?></td>
            <td align="center"><?php echo round($total_ranking6, 2) ?></td>
            <td align="center"><?php echo round($total_global0, 2) ?></td>
        </tr>
        <tr>
            <td><?php echo get_kandidat(1); ?></td>
            <td align="center"><?php echo round($total_ranking1, 2) ?></td>
            <td align="center"><?php echo round($total_ranking4, 2) ?></td>
            <td align="center"><?php echo round($total_ranking7, 2) ?></td>
            <td align="center"><?php echo round($total_global1, 2) ?></td>
        </tr>
        <tr>
            <td><?php echo get_kandidat(2); ?></td>
            <td align="center"><?php echo round($total_ranking2, 2) ?></td>
            <td align="center"><?php echo round($total_ranking5, 2) ?></td>
            <td align="center"><?php echo round($total_ranking8, 2) ?></td>
            <td align="center"><?php echo round($total_global2, 2) ?></td>
        </tr>
        <tr>
            <td colspan="4">&nbsp;</td>
            <td align="center"><?php echo round($total_globalx, 2) ?></td>
        </tr>
        </thead>
    </table>

</form>
<?php } ?>