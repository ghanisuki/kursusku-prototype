<?php
/**
 * includes/theme.php - pilihan warna tema (disimpan di cookie).
 * Harus dimuat SEBELUM ada output HTML, karena memakai setcookie() dan header().
 *
 * Cara kerja:
 *   1. Pengguna mengklik titik warna di navbar  -> halaman?theme=blue  (GET)
 *   2. File ini memvalidasi nilai, menyimpan cookie, lalu redirect ke halaman bersih.
 *   3. Pada permintaan berikutnya, nilai cookie dibaca dan dipasang di <html data-theme="...">.
 */
$themes = [
    'green'  => 'Hijau',
    'blue'   => 'Biru',
    'purple' => 'Ungu',
    'orange' => 'Oranye',
    'red'    => 'Merah',
];
$defaultTheme = 'green';

// Whitelist: hanya kunci yang ada di $themes yang diterima.
$requested = $_GET['theme'] ?? null;
if (is_string($requested) && isset($themes[$requested])) {
    setcookie('kursusku_theme', $requested, [
        'expires'  => time() + 60 * 60 * 24 * 365,
        'path'     => '/',
        'samesite' => 'Lax',
    ]);
    header('Location: ' . basename($_SERVER['SCRIPT_NAME']));
    exit;
}

$cookieTheme  = $_COOKIE['kursusku_theme'] ?? '';
$currentTheme = (is_string($cookieTheme) && isset($themes[$cookieTheme])) ? $cookieTheme : $defaultTheme;
