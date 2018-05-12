<title>Laporan Hasil Perhitungan Keseluruhan</title><?php
include "config/koneksi.php";

include "config/fungsi_indotgl.php";
include "config/class_paging.php";
include "config/kode_auto.php";
include "config/fungsi_combobox.php";
include "config/fungsi_nip.php";
$userid = $_SESSION['namauser'];
switch ($_GET['act']) {
    default:

        $p = new Paging;
        $batas = 22;
        $posisi = $p->cariPosisi($batas);
        $no = 1;
        $tampil = mysqli_query($con, "select * from kandidat LIMIT $posisi,$batas");
        echo "<h2 class='head'>Tabel Nilai Preferensi Keseluruhan Guru</h2>
	<table width=100% border=1>
	<thead>
	<tr>
	<td>No</td>
	<td>Alternatif</td>
	<td>F1</td>
	<td>F2</td>
	<td>F3</td>
	<td>F4</td>
	<td>F5</td>
	<td>F6</td>

	</tr>
	</thead>";

        $no = $posisi + 1;
        while ($dt = mysqli_fetch_array($tampil)) {
            echo "<tr>
		<td>$no</td>
		<td>$dt[id_kandidat]</td>
		<td>$dt[kriteria1]</td>
		<td>$dt[kriteria2]</td>
		<td>$dt[kriteria3]</td>
		<td>$dt[kriteria4]</td>
		<td>$dt[kriteria5]</td>
		<td>$dt[kriteria6]</td>

		</tr>";
            $no++;
        }
        echo "
	</table>";
        $jmldata = mysqli_num_rows(mysqli_query($con, "SELECT * FROM kandidat where user_id='$userid'"));
        $jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
        $linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman);

        echo "<div id=paging>Hal: $linkHalaman</div><br>";
        //exit();
        echo "<center><input type=button value='Lihat Hasil Analisa Promethee' class='border link linkback' onclick=\"window.location.href='?module=analisis&act=analisa-prome';\"></center>";
        //exit();
        break;


    // Analisa Metode Promee Thee
    case "analisa-prome":
        $userid = $_SESSION[namauser];
        $p = new Paging;
        $batas = 22;
        $posisi = $p->cariPosisi($batas);
        $no = 1;

        $data = array();
        $sip = mysqli_query($con, "select kriteria1,kriteria2,kriteria3,kriteria4,kriteria5,kriteria6 from kandidat LIMIT $posisi,$batas");
        $no = $posisi + 1;
        while ($data1 = mysqli_fetch_array($sip)) {
            array_push($data, array($data1['kriteria1'], $data1['kriteria2'], $data1['kriteria3'], $data1['kriteria4'], $data1['kriteria5'], $data1['kriteria6']));
        };


        /*$data = array(
        array(99, 88, 99, 88, 77, 66),
        array(66, 67, 73, 81, 78, 87),
        array(75, 78, 69, 70, 88, 78),
        array(80, 88, 78, 70, 87, 73)
    );
    */


        $preferensi = array();
        $panjang_data = count($data);

        //var_dump($data1);
        //exit();
        for ($i = 0; $i < $panjang_data; $i++) {
            if ($i < count($data) - 1) {
                $start = $i;
                $next = $i + 1;
                $jumlah_loop = $panjang_data - 1 - $i;

                $pref_row = array();
                for ($p = 0; $p < $next; $p++) {
                    array_push($pref_row, 0);
                }

                for ($j = 0; $j < $jumlah_loop; $j++) {
                    $data1 = $data[$i];
                    $data2 = $data[$next + $j];

                    $total = 0;
                    for ($k = 0; $k < count($data[$i]); $k++) {
                        $selisih = ($data1[$k] - $data2[$k]);
                        $t = 0;
                        if ($selisih >= 20) {
                            $t = 1;
                        } else {
                            $t = 0;
                        }
                        $total = $total + $t;
                    }
                    //echo $i . ' ' . ($next + $j) . ' = ' . $total . ', ';
                    $rata_rata = $total / count($data1);
                    array_push($pref_row, $rata_rata);
                }

                for ($col = 0; $col < count($pref_row); $col++) {
                    // echo $pref_row[$col] . ' ';
                }
                //echo "<hr>";
                array_push($preferensi, $pref_row);
            }
        }
        //exit();
        $zero_array = array();
        for ($xc = 0; $xc < $panjang_data; $xc++) {
            array_push($zero_array, 0);
        }
        array_push($preferensi, $zero_array);

        $preferensi2 = &$preferensi;
        for ($row = 0; $row < count($preferensi); $row++) {
            for ($col = 0; $col < count($preferensi[$row]); $col++) {
                $preferensi2[$row][$col] = $preferensi[$row][$col];
                $preferensi2[$col][$row] = $preferensi[$row][$col];
            }
        }

        echo "<h2 class='head'>Hasil Data Indexs Preferensi Nilai</h2>";
        echo "<table border=1 width=100% class='tabel'>";
        echo "<tr>
	<td>Alternatif</td>

	<td>G1</td>
	<td>G2</td>
	<td>G3</td>
	<td>G4</td>
	<td>G5</td>
	<td>G6</td>
	<td>G7</td>
	<td>G8</td>
	<td>G9</td>
	<td>G10</td>
	<td>G11</td>
	<td>G12</td>
	<td>G13</td>
	<td>G14</td>
	<td>G15</td>
	<td>G16</td>
	<td>G17</td>
	<td>G18</td>
	<td>G19</td>
	<td>G20</td>
	<td>G21</td>
	<td>G22</td>



	</tr>";


        for ($row = 0; $row < count($preferensi2); $row++) {


            echo "<tr>";
            echo "<td width=5%>G$no</td>";
            for ($col = 0; $col < count($preferensi2[$row]); $col++) {

                echo "<td width=100px>" . $preferensi2[$row][$col] . "</td>";

            }
            $no++;
            echo "<tr>";
        }
        echo "</table>";
        // Akhir Tabel
        // Penomoran :
        $p = new Paging;
        $batas = 22;
        $posisi = $p->cariPosisi($batas);
        $no1 = 0;

        echo "<h2 class='head'>Hasil Perangkingan Leaving Flow </h2>";
        echo "<table border=1 width=100% class='tabel'>";
        echo "<tr>
	<td>No</td><td>Leaving Flow</td><td>Rank</td></tr>";


        for ($row = 0; $row < count($preferensi2); $row++) {
            $no1++;
            echo "<tr>";
            echo "<td width=5%>$no1</td>";
            $total = 0;
            for ($col = 0; $col < count($preferensi2[$row]); $col++) {
                $total = $total + $preferensi2[$row][$col];
            }
            echo "<td width=100px>" . $total . "</td>";
            echo "<td width=5%>$no1</td>";
        }
        //$no1++;
        echo "<tr>";
        echo "</table>";
        //echo"<p>Berdasarkan Perangkingan Leaving Flow,menjadi alternatif Guru Teladan Pertama dengan nilai <p/>".$total;
        // Akhir Tabel

        // Penomoran :
        $p = new Paging;
        $batas = 22;
        $posisi = $p->cariPosisi($batas);
        $no2 = 0;


        echo "<hr>";
        echo "<h2 class='head'>Hasil Perangkingan Entering Flow </h2>";
        echo "<table border=1 width=100% class='tabel'>";
        echo "<tr>
	<td>No</td><td>Entering Flow</td><td>Rank</td></tr>";
        for ($row = 0; $row < count($preferensi2); $row++) {
            $no2++;
            echo "<tr>";
            echo "<td width=5%>$no2</td>";
            $total = 0;
            for ($col = 0; $col < count($preferensi2[$row]); $col++) {
                $total = $total + $preferensi2[$row][$col];
            }


            echo "<td width=100px>" . ($total / count($data)) . "</td>";
            echo "<td width=5%>$no2</td>";
        }

        echo "<tr>";
        echo "</table>";

        // Penomoran :
        $p = new Paging;
        $batas = 23;
        $posisi = $p->cariPosisi($batas);
        $no3 = 0;
        // Akhir Tabel Entering Flow
        echo "<hr>";
        echo "<h2 class='head'>Hasil Perangkingan Net Flow </h2>";
        echo "<table border=1 width=100% class='tabel'>";
        echo "<tr>
	<td>No</td><td>Net Flow</td><td>Rank</td></tr>";
        for ($row = 0; $row < count($preferensi2); $row++) {
            $no3++;
            echo "<tr>";
            echo "<td width=5%>$no3</td>";
            $total = 0;
            $total2 = 0;
            for ($col = 0; $col < count($preferensi2[$row]); $col++) {
                $total = $total + $preferensi[$row][$col];
                $total2 = $total2 + $preferensi2[$row][$col];
            }
            $hsl = $total - ($total / count($data)) . " <br/> ";

            echo "<td>$hsl</td>";
            echo "<td width=5%>$no3</td>";
        }
        $no++;
        echo "<tr>";
        echo "</table>";

        //echo"<br/><h2 class='head'>Kesimpulannya</h2>";
        //echo"<p>Berdasarkan nilai Leaving Flow,menjadi alternatif Guru Teladan Pertama dengan nilai <p/><br".$no1[1]['$total'];
        //Berdasarkan nilai Entering Flow,...  menjadi alternatif Guru Teladan Kedua dengan nilai ...<br/>
        //Berdasarkan nilai Net Flow,...  menjadi alternatif Guru Teladan Ketiga dengan nilai .... ";
        break;


}

?>
