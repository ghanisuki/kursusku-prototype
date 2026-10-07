<?php
/**
 * includes/header.php - kepala halaman + navigasi bersama (Pertemuan 6).
 * Variabel yang dibaca: $pageTitle (judul), $currentPage (nama file aktif).
 */
require_once __DIR__ . '/theme.php';   // harus sebelum output HTML

$pageTitle   = $pageTitle   ?? 'KursusKu';
$currentPage = $currentPage ?? '';

$navItems = [
    'index.php'          => 'Beranda',
    'fee-calculator.php' => 'Estimasi Biaya',
    'register.php'       => 'Daftar Kursus',
    'history.php'        => 'History Dummy',
    'test-matrix.php'    => 'Test Matrix',
];

// Tautan pemilih warna menuju halaman yang sedang dibuka.
$switchTarget = $currentPage !== '' ? $currentPage : basename($_SERVER['SCRIPT_NAME']);
?>
<!doctype html>
<html lang="id" data-theme="<?= e($currentTheme) ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($pageTitle) ?> - KursusKu</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header class="site-header">
    <div class="container nav-wrap">
        <a class="brand" href="index.php">KursusKu</a>
        <nav aria-label="Navigasi utama">
            <?php foreach ($navItems as $file => $label): ?>
                <a href="<?= e($file) ?>"<?= $file === $currentPage ? ' aria-current="page"' : '' ?>><?= e($label) ?></a>
            <?php endforeach; ?>
        </nav>
        <div class="theme-switch" role="group" aria-label="Pilih warna tema">
            <?php foreach ($themes as $key => $label): ?>
                <a class="swatch swatch-<?= e($key) ?>"
                   href="<?= e($switchTarget) ?>?theme=<?= e($key) ?>"
                   title="Tema <?= e($label) ?>"
                   aria-label="Tema <?= e($label) ?>"<?= $key === $currentTheme ? ' aria-current="true"' : '' ?>></a>
            <?php endforeach; ?>
        </div>
    </div>
</header>
