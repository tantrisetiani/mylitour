<?php
 /* @package   OpenSID
 * @author    Tim Pengembang OpenDesa
 * @copyright Hak Cipta 2009 - 2015 Combine Resource Institution (http://lumbungkomunitas.net/)
 * @copyright Hak Cipta 2016 - 2022 Perkumpulan Desa Digital Terbuka (https://opendesa.id)
 * @license   http://www.gnu.org/licenses/gpl.html GPL V3
 * @link      https://github.com/OpenSID/OpenSID
 *
 */

defined('BASEPATH') || exit('No direct script access allowed');

/**
 * @param mixed $needle
 * @param mixed $array
 */

/*
    Mencari nilai di nested array (array dalam array).
    Ambil key dari array utama
*/
function nested_array_search($needle, $array)
{
    foreach ($array as $key => $value) {
        $array_key = array_search($needle, $value, true);
        if ($array_key !== false) {
            return $key;
        }
    }
}

function Parse_Data($data, $p1, $p2)
{
    $data  = ' ' . $data;
    $hasil = '';
    $awal  = strpos($data, $p1);
    if ($awal != '') {
        $akhir = strpos(strstr($data, $p1), $p2);
        if ($akhir != '') {
            $hasil = substr($data, $awal + strlen($p1), $akhir - strlen($p1));
        }
    }

    return $hasil;
}

function Rupiah($nil = 0)
{
    $nil = $nil + 0;
    if (($nil * 100) % 100 == 0) {
        $nil = $nil . '.00';
    } elseif (($nil * 100) % 10 == 0) {
        $nil = $nil . '0';
    }
    $nil  = str_replace('.', ',', $nil);
    $str1 = $nil;
    $str2 = '';
    $dot  = '';
    $str  = strrev($str1);
    $arr  = str_split($str, 3);
    $i    = 0;

    foreach ($arr as $str) {
        $str2 = $str2 . $dot . $str;
        if (strlen($str) == 3 && $i > 0) {
            $dot = '.';
        }
        $i++;
    }
    $rp = strrev($str2);
    if ($rp != '' && $rp > 0) {
        return "Rp. {$rp}";
    }

    return 'Rp. 0,00';
}

function Rupiah2($nil = 0)
{
    $nil = $nil + 0;
    if (($nil * 100) % 100 == 0) {
        $nil = $nil . '.00';
    } elseif (($nil * 100) % 10 == 0) {
        $nil = $nil . '0';
    }
    $nil  = str_replace('.', ',', $nil);
    $str1 = $nil;
    $str2 = '';
    $dot  = '';
    $str  = strrev($str1);
    $arr  = str_split($str, 3);
    $i    = 0;

    foreach ($arr as $str) {
        $str2 = $str2 . $dot . $str;
        if (strlen($str) == 3 && $i > 0) {
            $dot = '.';
        }
        $i++;
    }
    $rp = strrev($str2);
    if ($rp != '' && $rp > 0) {
        return "Rp. {$rp}";
    }

    return '-';
}

function Rupiah3($nil = 0)
{
    $nil = $nil + 0;
    if (($nil * 100) % 100 == 0) {
        $nil = $nil . '.00';
    } elseif (($nil * 100) % 10 == 0) {
        $nil = $nil . '0';
    }
    $nil  = str_replace('.', ',', $nil);
    $str1 = $nil;
    $str2 = '';
    $dot  = '';
    $str  = strrev($str1);
    $arr  = str_split($str, 3);
    $i    = 0;

    foreach ($arr as $str) {
        $str2 = $str2 . $dot . $str;
        if (strlen($str) == 3 && $i > 0) {
            $dot = '.';
        }
        $i++;
    }
    $rp = strrev($str2);
    if ($rp != 0) {
        return "{$rp}";
    }

    return '-';
}

function to_rupiah($inp = '')
{
    $outp = str_replace('.', '', $inp);

    return str_replace(',', '.', $outp);
}

function rp($inp = 0)
{
    return number_format($inp, 2, ',', '.');
}

function rupiah24($angka)
{
    return 'Rp ' . number_format($angka, 2, ',', '.');
}

function jecho($a, $b, $str)
{
    if ($a == $b) {
        echo $str;
    }
}

function compared_return($a, $b, $retval = null)
{
    ($a === $b) && print 'active';
}

function selected($a, $b, $opt = 0)
{
    if ($a == $b) {
        if ($opt) {
            echo "checked='checked'";
        } else {
            echo "selected='selected'";
        }
    }
}

function date_is_empty($tgl)
{
    return null === $tgl || substr($tgl, 0, 10) == '0000-00-00';
}

function rev_tgl($tgl, $replace_with = '-')
{
    if (date_is_empty($tgl)) {
        return $replace_with;
    }
    $ar = explode('-', $tgl);

    return $ar[2] . '-' . $ar[1] . '-' . $ar[0];
}

function penetration($str)
{
    return str_replace("'", '-', $str);
}

function penetration1($str)
{
    return str_replace("'", ' ', $str);
}

function unpenetration($str)
{
    return str_replace('-', "'", $str);
}
function spaceunpenetration($str)
{
    return str_replace('-', ' ', $str);
}

function underscore($str)
{
    return str_replace(' ', '_', $str);
}

function ununderscore($str)
{
    return str_replace('_', ' ', $str);
}

function bulan()
{
    return [1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'];
}

function getBulan(string $bln)
{
    $bulan = bulan();

    return $bulan[(string) $bln];
}

function tahun(int $awal = 2018, $asc = false)
{
    $akhir = date('Y');
    $tahun = [];

    for ($i = $akhir; $i >= $awal; $i--) {
        $tahun[] = $i;
    }

    if ($asc) {
        sort($tahun);
    }

    return $tahun;
}

function nama_bulan($tgl)
{
    $ar = explode('-', $tgl);
    $nm = getBulan($ar[1]);

    return $ar[0] . ' ' . $nm . ' ' . $ar[2];
}

function hari($tgl)
{
    $hari = [
        0 => 'Minggu', 1 => 'Senin', 2 => 'Selasa', 3 => 'Rabu', 4 => 'Kamis', 5 => 'Jumat', 6 => 'Sabtu',
    ];
    $dayofweek = date('w', $tgl);

    return $hari[$dayofweek];
}

function dua_digit($i)
{
    if ($i < 10) {
        $o = '0' . $i;
    } else {
        $o = $i;
    }

    return $o;
}

function tiga_digit($i)
{
    if ($i < 10) {
        $o = '00' . $i;
    } elseif ($i < 100) {
        $o = '0' . $i;
    } else {
        $o = $i;
    }

    return $o;
}

function tgl_indo2($tgl, $replace_with = '-')
{
    if (date_is_empty($tgl)) {
        return $replace_with;
    }
    $tanggal = substr($tgl, 8, 2);
    $jam     = substr($tgl, 11, 8);
    $bulan   = getBulan(substr($tgl, 5, 2));
    $tahun   = substr($tgl, 0, 4);

    return $tanggal . ' ' . $bulan . ' ' . $tahun . ' ' . $jam;
}

function tgl_indo_dari_str($tgl_str, $kosong = '-')
{
    $time = strtotime($tgl_str);

    return $time ? tgl_indo(date('Y m d', strtotime($tgl_str))) : $kosong;
}

function tgl_indo($tgl, $replace_with = '-')
{
    if (date_is_empty($tgl)) {
        return $replace_with;
    }
    $tanggal = substr($tgl, 8, 2);
    $bulan   = getBulan(substr($tgl, 5, 2));
    $tahun   = substr($tgl, 0, 4);

    return $tanggal . ' ' . $bulan . ' ' . $tahun;
}

function tgl_indo_out($tgl, $replace_with = '-')
{
    if (date_is_empty($tgl)) {
        return $replace_with;
    }

    if ($tgl) {
        $tanggal = substr($tgl, 8, 2);
        $bulan   = substr($tgl, 5, 2);
        $tahun   = substr($tgl, 0, 4);

        return $tanggal . '-' . $bulan . '-' . $tahun;
    }
}

function tgl_indo_in($tgl, $replace_with = '-')
{
    if (date_is_empty($tgl)) {
        return $replace_with;
    }
    $tanggal = substr($tgl, 0, 2);
    $bulan   = substr($tgl, 3, 2);
    $tahun   = substr($tgl, 6, 4);
    $jam     = substr($tgl, 11);
    $jam     = empty($jam) ? '' : ' ' . $jam;

    return $tahun . '-' . $bulan . '-' . $tanggal . $jam;
}



function ribuan($angka)
{
    return number_format($angka, 0, '.', '.');
}

