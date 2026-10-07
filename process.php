<?php
require __DIR__ . '/data.php';
require __DIR__ . '/helpers.php';

// Redirect harus sebelum output HTML apa pun.
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: register.php');
    exit;
}

/* ---------- 1. Baca data POST dengan aman (?? memberi nilai default) ---------- */
$name            = postString('name');
$email           = postString('email');
$courseCode      = postString('course_code');
$participantType = postString('participant_type');
$learningMode    = postString('learning_mode');
$packageCount    = (int) postString('package_count', '1');
$notes           = postString('notes');

$interests = $_POST['interests'] ?? [];
if (!is_array($interests)) {
    $interests = [];
}
// Hanya terima minat yang ada di daftar resmi.
$interests = array_values(array_intersect($interests, array_keys($interestOptions)));

/* ---------- 2. Validasi fundamental ---------- */
$errors = [];

if ($name === '') {
    $errors[] = 'Nama wajib diisi.';
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Format email tidak valid.';
}

$course = findCourse($courses, $courseCode);
if ($course === null) {
    $errors[] = 'Kursus tidak ditemukan.';
}
if (!in_array($participantType, ['mahasiswa', 'guru', 'umum'], true)) {
    $errors[] = 'Tipe peserta tidak valid.';
}
if (!in_array($learningMode, ['offline', 'online', 'hybrid'], true)) {
    $errors[] = 'Metode belajar tidak valid.';
}
if (!in_array($packageCount, [1, 2, 3], true)) {
    $errors[] = 'Jumlah paket tidak valid.';
}

/* ---------- 3. Hentikan proses jika ada data tidak valid ---------- */
if ($errors !== []) {
    $pageTitle   = 'Data Belum Valid';
    $currentPage = 'register.php';
    require __DIR__ . '/includes/header.php';
    ?>
    <main class="container">
        <section class="alert-error">
            <h1>Data belum dapat diproses</h1>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= e($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </section>
        <p class="btn-row" style="max-width:760px;margin:0 auto 2rem">
            <a class="btn-link" href="register.php">Kembali ke form</a>
        </p>
    </main>
    <?php
    require __DIR__ . '/includes/footer.php';
    exit;
}

/* ---------- 4. Hitung biaya: satuan -> paket -> subtotal -> diskon -> total ---------- */
$discountPercent   = getDiscountPercent($participantType);
$grossTotal        = $course['fee'] * $packageCount;
$discountAmount    = intdiv($grossTotal * $discountPercent, 100);
$finalTotal        = $grossTotal - $discountAmount;
$learningModeLabel = getLearningModeLabel($learningMode);

/* ---------- 5. Tampilkan ringkasan ---------- */
$pageTitle   = 'Ringkasan Pendaftaran';
$currentPage = 'register.php';
require __DIR__ . '/includes/header.php';
?>
<main class="container">
    <section class="alert-success">
        <h1>Pendaftaran Berhasil Diproses</h1>
        <p>Periksa kembali ringkasan data latihan berikut.</p>
    </section>

    <section class="summary-card">
        <h2>Data Peserta</h2>
        <dl class="summary-list">
            <dt>Nama</dt><dd><?= e($name) ?></dd>
            <dt>Email</dt><dd><?= e($email) ?></dd>
            <dt>Kursus</dt><dd><?= e($course['name']) ?></dd>
            <dt>Tipe peserta</dt><dd><?= e(ucfirst($participantType)) ?></dd>
            <dt>Metode</dt><dd><?= e($learningModeLabel) ?></dd>
            <dt>Jumlah paket</dt><dd><?= $packageCount ?></dd>
            <dt>Catatan</dt><dd><?= $notes === '' ? '-' : e($notes) ?></dd>
        </dl>

        <h2>Rincian Biaya</h2>
        <dl class="summary-list">
            <dt>Biaya satuan</dt><dd><?= formatRupiah($course['fee']) ?></dd>
            <dt>Subtotal</dt><dd><?= formatRupiah($grossTotal) ?></dd>
            <dt>Diskon</dt><dd><?= $discountPercent ?>% (-<?= formatRupiah($discountAmount) ?>)</dd>
        </dl>
        <div class="total-box"><b>Total akhir: <?= formatRupiah($finalTotal) ?></b></div>

        <h2>Minat</h2>
        <ul>
            <?php if ($interests === []): ?>
                <li>Belum memilih minat.</li>
            <?php else: ?>
                <?php foreach ($interests as $interest): ?>
                    <?php $label = $interestOptions[$interest] ?? $interest; ?>
                    <li><?= e($label) ?></li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>

        <div class="btn-row">
            <a class="btn-link" href="register.php">Daftar Lagi</a>
            <a class="btn-outline" href="history.php">Lihat History Dummy</a>
        </div>
    </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
