<?php
$courseName        = 'Laravel Fundamental';
$fee               = 350000;
$participantCount  = 2;
$discountPercent   = 10;
$adminFee          = 25000;
$isActive          = true;

$subtotal = $fee * $participantCount;
$discount = intdiv($subtotal * $discountPercent, 100);
$total    = $subtotal - $discount + $adminFee;
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kalkulator Biaya - KursusKu</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header class="site-header">
    <div class="container nav-wrap">
        <a class="brand" href="index.php">KursusKu</a>
        <nav aria-label="Navigasi utama">
            <a href="index.php">Beranda</a>
            <a href="index.php#katalog">Katalog</a>
            <a href="fee-calculator.php">Estimasi Biaya</a>
            <a href="registration.php">Daftar Kursus</a>
        </nav>
    </div>
</header>

<main class="container">
    <section class="page-intro">
        <p class="eyebrow">Pertemuan 3</p>
        <h1>Kalkulator Estimasi Biaya</h1>
        <p>Kursus: <strong><?= htmlspecialchars($courseName) ?></strong></p>
    </section>

    <section class="summary-card">
        <div class="table-wrap">
            <table>
                <thead>
                    <tr><th>Komponen</th><th>Nilai</th></tr>
                </thead>
                <tbody>
                    <tr><td>Biaya per peserta</td><td>Rp <?= number_format($fee, 0, ',', '.') ?></td></tr>
                    <tr><td>Jumlah peserta</td><td><?= $participantCount ?></td></tr>
                    <tr><td>Subtotal</td><td>Rp <?= number_format($subtotal, 0, ',', '.') ?></td></tr>
                    <tr><td>Diskon (<?= $discountPercent ?>%)</td><td>- Rp <?= number_format($discount, 0, ',', '.') ?></td></tr>
                    <tr><td>Biaya admin</td><td>Rp <?= number_format($adminFee, 0, ',', '.') ?></td></tr>
                    <tr class="total"><td>Total akhir</td><td>Rp <?= number_format($total, 0, ',', '.') ?></td></tr>
                </tbody>
            </table>
        </div>
        <p>
            <a class="btn-link" href="registration.php">Daftar Sekarang</a>
            <a class="btn-outline" href="index.php">Kembali ke Beranda</a>
        </p>
    </section>
</main>

<footer class="site-footer">
    <small>&copy; <?= date('Y') ?> KursusKu</small>
</footer>
</body>
</html>
