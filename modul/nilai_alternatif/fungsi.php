<?php
include "../config/koneksi.php";
?>
<?
session_start();

function set_login($username, $password)
{

    $mysqli_query = mysqli_query($con, "SELECT * FROM user WHERE userid='" . $username . "' AND passid='" . $password . "'");
    $mysqli_num = mysqli_num_rows($mysqli_query);
    $mysqli_row = mysqli_fetch_array($mysqli_query);

    if ($mysqli_num > 0) {

        $_SESSION[namauser] = $r[userid];
        $_SESSION[passuser] = $r[passid];
        $_SESSION[leveluser] = $r[level_user];

        echo redirect_to();

    } else {
        echo "Username dan Password salah";
    }

}


function get_uname_id()
{
    $uname = $_SESSION['namauser'];
    return $uname;

}

function get_uname_name($string)
{
    $uname = $_SESSION['userid'];
    return $uname . "_" . $string;

}

function redirect_to($redirect = "")
{
    return "<meta http-equiv=\"Refresh\" content=\"0; url=$redirect\"/>";
}

function matrik_id($id, $jenis = 'alternatif')
{
    $user_id = get_uname_id();
    $query_alternatif = mysqli_query($con, "SELECT * FROM `nilai_alternatif` WHERE jenis='$jenis' AND user_id='$user_id' AND id_matrik='$id'");
    $row_alternatif = mysqli_fetch_object($query_alternatif);
    return $row_alternatif->matrik_value;
}

function list_npm_op($op_link = false)
{
    if (empty($op_link)) $link = '?module=kandidat';
    else $link = $op_link;


    $query_nip = mysqli_query($con, "SELECT * FROM pegawai");
    while ($row_nip = mysqli_fetch_object($query_nip)) {
        $selected = "";
        if ($row_nip->nip == $_GET['nip']) $selected = 'selected="selected"';
        echo '<option value="' . $link . '&nip=' . $row_nip->nip . '" ' . $selected . '>' . $row_nip->nip . '</option>';

    }
}

function js_redirect()
{
    return '<script language="javascript">function redir(mylist){ if (newurl=mylist.options[mylist.selectedIndex].value)document.location=newurl;}</script>' . "\n";
}

function get_kandidat($param)
{
    $user_id = get_uname_id();
    $kandidat = array();
    $query_kandidat = mysqli_query($con, "SELECT * FROM kandidat WHERE user_id='$user_id'");
    while ($row_kandidat = mysqli_fetch_object($query_kandidat)) {
        $kandidat[] = $row_kandidat->nama;
    }
    return $kandidat[$param];

}

function array_sort($array, $on, $order = SORT_ASC)
{
    $new_array = $sortable_array = array();
    if (count($array) > 0) {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k2 => $v2) {
                    if ($k2 == $on) {
                        $sortable_array[$k] = $v2;;
                    }
                }
            } else {
                $sortable_array[$k] = $v;
            }
        }
        switch ($order) {
            case SORT_ASC:
                asort($sortable_array);
                break;
            case SORT_DESC:
                arsort($sortable_array);
                break;
        }
        foreach ($sortable_array as $k => $v) {
            $new_array[$k] = $array[$k];
        }
    }
    return $new_array;
}


function uploader($data)
{
    extract($data, EXTR_SKIP);

    $myfile_name = $myfile['name'];
    $myfile_temp = $myfile['tmp_name'];
    $uploadFile = $uploadDir . basename($myfile_name);

    if (move_uploaded_file($myfile_temp, $uploadFile)) {
        echo '<div id="success">File successfully uploaded!</div>';
        return true;
    } else {
        $msg = array();
        switch ($myfile['error']) {
            case 1:
                $msg[] = 'The file is bigger than this PHP installation allows';
                break;
            case 2:
                $msg[] = 'The file is bigger than this form allows';
                break;
            case 3:
                $msg[] = 'Only part of the file was uploaded';
                break;
            case 4:
                $msg[] = 'No file was uploaded';
                break;
            default:
                $msg[] = 'unknown error';
        }
        if (is_array($msg)) {
            foreach ($msg as $val) {
                echo '<div id="error">' . $val . ' </div>';
            }
        }
    }
}