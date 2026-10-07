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
<?php
require __DIR__ . '/helpers.php';

$pageTitle   = 'Kalkulator Biaya';
$currentPage = 'fee-calculator.php';
require __DIR__ . '/includes/header.php';
?>
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
            <a class="btn-link" href="register.php">Daftar Sekarang</a>
            <a class="btn-outline" href="index.php">Kembali ke Beranda</a>
        </p>
    </section>
</main>

<?php require __DIR__ . '/includes/footer.php'; ?>
