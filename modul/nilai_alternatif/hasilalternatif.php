<div align="center">
    <h3> Daftar Peringkat Hasil Nilai Prioritas Metode AHP Pemilihan Tenaga Ahli PT. Buana Archicon</h3>
</div>

<?php
include "fungsi.php";
$kriteria = array();
$id = get_uname_id();
$query_kriteria = mysqli_query($con, "SELECT * FROM `nilai_alternatif` WHERE jenis='alternatif' AND user_id='$id'");
while ($row_kriteria = mysqli_fetch_object($query_kriteria)) {
    $kriteria[] = $row_kriteria->matrik_value;
}

$query_alternatif = mysqli_query($con, "SELECT * FROM `nilai_alternatif` WHERE jenis='alternatif' AND user_id='$id'");
$row_alternatif = mysqli_fetch_object($query_alternatif);

$kriteria1 = $kriteria[0];
$kriteria2 = $kriteria[1];
$kriteria3 = $kriteria[3];


$matrik0 = matrik_id(0);
$matrik1 = matrik_id(1);
$matrik2 = matrik_id(2);
$matrik3 = matrik_id(3);

$matrik4 = matrik_id(4);
$matrik5 = matrik_id(5);
$matrik6 = matrik_id(6);
$matrik7 = matrik_id(7);

$matrik8 = matrik_id(8);
$matrik9 = matrik_id(9);
$matrik10 = matrik_id(10);
$matrik11 = matrik_id(11);


$total_ranking0 = $kriteria1 * $matrik0;
$total_ranking1 = $kriteria1 * $matrik1;
$total_ranking2 = $kriteria3 * $matrik2;

$total_rankingx = (($total_ranking0 + $total_ranking1 + $total_ranking2 + $total_ranking3) / 4);

$total_ranking3 = $kriteria2 * $matrik3;
$total_ranking4 = $kriteria2 * $matrik4;
$total_ranking5 = $kriteria2 * $matrik5;

$total_ranking6 = $kriteria3 * $matrik6;
$total_ranking7 = $kriteria3 * $matrik7;
$total_ranking8 = $kriteria3 * $matrik8;


$total_global0 = ($total_ranking0 + $total_ranking3 + $total_ranking6) / 3;
$total_global1 = ($total_ranking1 + $total_ranking4 + $total_ranking7) / 3;
$total_global2 = ($total_ranking2 + $total_ranking5 + $total_ranking8) / 3;

$kandidat1 = get_kandidat(0);
$kandidat2 = get_kandidat(1);
$kandidat3 = get_kandidat(2);

$sort_array = array(
    array(
        'kandidat' => $kandidat1,
        'nilai' => $total_global0),
    array(
        'kandidat' => $kandidat2,
        'nilai' => $total_global1),
    array(
        'kandidat' => $kandidat3,
        'nilai' => $total_global2)
);
$sort_array = array_sort($sort_array, 'nilai', SORT_DESC);
?>
<table class="tabel">
    <tr>
        <td width="8%" align="center">Peringkat</td>
        <td width="43%" align="center">Kandidat</td>
        <td width="49%" align="center">Bobot</td>
    </tr>
    <?php
    $i = 1;
    foreach ($sort_array as $k => $v) {
        ?>
        <tr>
            <td align="center">
                <div align="left"><?php echo $i; ?></div>
            </td>
            <td align="center">
                <div align="left"><?php echo $v['kandidat']; ?></div>
            </td>
            <td align="center">
                <div align="left"><?php echo round($v['nilai'], 2) ?></div>
            </td>
        </tr>
        <?php $i++;
    } ?>
</table>

