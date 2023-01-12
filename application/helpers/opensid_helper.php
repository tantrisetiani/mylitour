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


// Untuk mengirim data ke OpenSID tracker
function httpPost($url, $params)
{
    if (!extension_loaded('curl') || isset($_SESSION['no_curl'])) {
        log_message('error', 'curl tidak bisa dijalankan 1.' . $_SESSION['no_curl'] . ' 2.' . extension_loaded('curl'));

        return;
    }

    $postData = '';
    //create name value pairs seperated by &
    foreach ($params as $k => $v) {
        $postData .= $k . '=' . $v . '&';
    }
    $postData = rtrim($postData, '&');

    try {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, count($postData));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

        // Batasi waktu koneksi dan ambil data, supaya tidak menggantung kalau ada error koneksi
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 4);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);

        $output = curl_exec($ch);

        if ($output === false) {
            log_message('error', 'Curl error: ' . curl_error($ch));
            log_message('error', print_r(curl_getinfo($ch), true));
        }
        curl_close($ch);

        return $output;
    } catch (Exception $e) {
        return $e;
    }
}

/**
 * Cek ada koneksi internet.
 *
 * @param string $sCheckHost Default: www.google.com
 *
 * @return bool
 */
function cek_koneksi_internet($sCheckHost = 'www.google.com')
{
    $connected = @fsockopen($sCheckHost, 443);

    if ($connected) {
        fclose($connected);

        return true;
    }

    return false;
}

function cek_bisa_akses_site($url)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $content = curl_exec($ch);
    $error   = curl_error($ch);

    curl_close($ch);

    return empty($error);
}

/**
 * Laporkan error PHP.
 * Script ini digunakan untuk mengatasi masalah di mana ada hosting (seperti indoreg.co.id)
 * yang tidak mengizinkan fungsi sistem, seperti curl.
 * Simpan info ini di $_SESSION, supaya pada pemanggilan berikut
 * tracker tidak dijalankan.
 */
set_error_handler('myErrorHandler');
register_shutdown_function('fatalErrorShutdownHandler');
function myErrorHandler($code, $message, $file, $line)
{
    // Khusus untuk mencatat masalah dalam pemanggilan httpPost di track_model.php
    if (strpos($message, 'curl_exec') !== false) {
        $_SESSION['no_curl'] = 'y';
        echo '<strong>Apabila halamannya tidak tampil, coba di-refresh.</strong>';
        // Ulangi url yang memanggil fungsi tracker.
        redirect(base_url() . 'index.php/' . $_SESSION['balik_ke']);
    }
    // Uncomment apabila melakukan debugging
    // else {
    //   echo "<strong>Telah dialami error PHP sebagai berikut: </strong><br><br>";
    //   echo "Severity: ".$code."<br>";
    //   echo "Pesan: ".$message."<br>";
    //   echo "Nama File: ".$file."<br>";
    //   echo "Nomor Baris: ".$line;
    // }
}
function fatalErrorShutdownHandler()
{
    $last_error = error_get_last();
    if ($last_error['type'] === E_ERROR) {
        // fatal error
        myErrorHandler(E_ERROR, $last_error['message'], $last_error['file'], $last_error['line']);
    }
}

function get_dynamic_title_page_from_path()
{
    $parse = str_replace([
        '/first',
    ], '', $_SERVER['PATH_INFO']);
    $explo = explode('/', $parse);

    $title = '';

    for ($i = 0; $i < count($explo); $i++) {
        $t = trim($explo[$i]);
        if (!empty($t) && $t != '1' && $t != '0') {
            $title .= ((is_numeric($t)) ? ' ' : ' - ') . $t;
        }
    }

    return ucwords(str_replace([
        '  ',
        '_',
    ], ' ', $title));
}

function show_zero_as($val, $str)
{
    return empty($val) ? $str : $val;
}

function log_time($msg)
{
    $now = DateTime::createFromFormat('U.u', microtime(true));
    error_log($now->format('m-d-Y H:i:s.u') . ' : ' . $msg . "\n", 3, 'opensid.log');
}


// Dari https://stackoverflow.com/questions/4117555/simplest-way-to-detect-a-mobile-device
function isMobile()
{
    return preg_match("/\\b(?:a(?:ndroid|vantgo)|b(?:lackberry|olt|o?ost)|cricket|do‌\u{200b}como|hiptop|i(?:emob‌\u{200b}ile|p[ao]d)|kitkat|m‌\u{200b}(?:ini|obi)|palm|(?:‌\u{200b}i|smart|windows )phone|symbian|up\\.(?:browser|link)|tablet(?: browser| pc)|(?:hp-|rim |sony )tablet|w(?:ebos|indows ce|os))/i", $_SERVER['HTTP_USER_AGENT']);
}


function get_external_ip()
{
    // Batasi waktu mencoba
    $options = stream_context_create([
        'http' => [
            'timeout' => 2, //2 seconds
        ],
    ]);
    $externalContent = file_get_contents('http://checkip.dyndns.com/', false, $options);
    preg_match('/\b(?:\d{1,3}\.){3}\d{1,3}\b/', $externalContent, $m);

    return $m[0];
}

function get_extension($filename)
{
    $ext = explode('.', strtolower($filename));

    return '.' . end($ext);
}


function crawler()
{
    $file = APPPATH . 'config/crawler-user-agents.json';
    $data = json_decode(file_get_contents($file), true);

    foreach ($data as $entry) {
        if (preg_match('/' . strtolower($entry['pattern']) . '/', $_SERVER['HTTP_USER_AGENT'])) {
            return true;
        }
    }

    return false;
}

function pre_print_r($data)
{
    echo '<pre>' . print_r($data, true) . '</pre>';
}


// https://stackoverflow.com/questions/6158761/recursive-php-function-to-replace-characters/24482733
function strReplaceArrayRecursive($replacement = [], $strArray = false, $isReplaceKey = false)
{
    if (!is_array($strArray)) {
        return str_replace(array_keys($replacement), array_values($replacement), $strArray);
    }

    $newArr = [];

    foreach ($strArray as $key => $value) {
        $replacedKey = $key;
        if ($isReplaceKey) {
            $replacedKey = str_replace(array_keys($replacement), array_values($replacement), $key);
        }
        $newArr[$replacedKey] = strReplaceArrayRecursive($replacement, $value, $isReplaceKey);
    }

    return $newArr;
}

function get_domain(string $url)
{
    $parse = parse_url($url);

    return preg_replace('#^(http(s)?://)?w{3}\.#', '$1', $parse['host']);
}



// https://stackoverflow.com/questions/24043400/php-check-if-ipaddress-is-local/37725041
function isLocalIPAddress($IPAddress)
{
    if (strpos($IPAddress, '127.0.') === 0) {
        return true;
    }

    return !filter_var($IPAddress, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE);
}


// Kode format lampiran surat
function kode_format($lampiran = '')
{
    $str = strtoupper(str_replace('.php', '', $lampiran));

    return str_replace(',', ', ', $str);
}
