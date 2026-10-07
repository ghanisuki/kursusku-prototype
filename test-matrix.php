<?php
require __DIR__ . '/data.php';
require __DIR__ . '/helpers.php';

/**
 * test-matrix.php - Evidence Pertemuan 6.
 * Setiap baris dihitung langsung memakai fungsi proyek (findCourse, getDiscountPercent,
 * formatRupiah, getLearningModeLabel) atau ekspresi yang sama dengan process.php,
 * lalu dibandingkan dengan hasil yang diharapkan pada panduan.
 */

/** Total akhir untuk satu skenario, mengikuti urutan hitung process.php. */
function hitungTotal(array $courses, string $code, string $type, int $packages): string
{
    $course = findCourse($courses, $code);
    if ($course === null) {
        return 'Kursus tidak ditemukan';
    }
    $gross    = $course['fee'] * $packages;
    $discount = intdiv($gross * getDiscountPercent($type), 100);

    return formatRupiah($gross - $discount);
}

/** Nama minat (label) dari daftar kode yang dikirim, disaring seperti process.php. */
function labelMinat(array $interestOptions, array $submitted): string
{
    $valid = array_values(array_intersect($submitted, array_keys($interestOptions)));
    if ($valid === []) {
        return 'Belum memilih minat.';
    }
    $labels = [];
    foreach ($valid as $key) {
        $labels[] = $interestOptions[$key];
    }

    return implode(', ', $labels);
}

// Simulasi test 12: tambah satu fasilitas lalu render dengan loop yang sama seperti register.php.
$facilitiesTest = array_merge($facilities, ['Fasilitas Uji Baru']);
$rendered = '';
foreach ($facilitiesTest as $facility) {
    $rendered .= '<li>' . e($facility) . '</li>';
}

$processSource = (string) file_get_contents(__DIR__ . '/process.php');

$tests = [
    ['Mahasiswa, Web Dasar, 1 paket',  hitungTotal($courses, 'web', 'mahasiswa', 1),     'Rp240.000'],
    ['Guru, PHP Dasar, 1 paket',       hitungTotal($courses, 'php', 'guru', 1),          'Rp340.000'],
    ['Umum, Laravel Dasar, 1 paket',   hitungTotal($courses, 'laravel', 'umum', 1),      'Rp500.000'],
    ['Mahasiswa, Web Dasar, 2 paket',  hitungTotal($courses, 'web', 'mahasiswa', 2),     'Rp480.000'],
    ['Nama kosong',                    trim('') === '' ? 'Nama wajib diisi.' : 'Lolos',   'Nama wajib diisi.'],
    ['Email tidak valid',              !filter_var('abc', FILTER_VALIDATE_EMAIL) ? 'Email tidak valid.' : 'Lolos', 'Email tidak valid.'],
    ['Minat kosong',                   labelMinat($interestOptions, []),                 'Belum memilih minat.'],
    ['3 minat',                        labelMinat($interestOptions, ['frontend', 'backend', 'database']), 'Frontend, Backend, Database'],
    ['Metode offline',                 getLearningModeLabel('offline'),                  'Tatap Muka'],
    ['Metode hybrid',                  getLearningModeLabel('hybrid'),                   'Hybrid'],
    ['GET process.php',                (strpos($processSource, "header('Location: register.php')") !== false
                                        && strpos($processSource, "!== 'POST'") !== false)
                                        ? 'Redirect ke register.php' : 'Tidak ada redirect', 'Redirect ke register.php'],
    ['Tambah fasilitas',               strpos($rendered, 'Fasilitas Uji Baru') !== false
                                        ? 'Dirender otomatis dengan foreach' : 'Tidak tampil', 'Dirender otomatis dengan foreach'],
];

$passCount = 0;
foreach ($tests as $test) {
    if ($test[1] === $test[2]) {
        $passCount++;
    }
}
$total = count($tests);

$pageTitle   = 'Test Matrix';
$currentPage = 'test-matrix.php';
require __DIR__ . '/includes/header.php';
?>
<main class="container">
    <section class="page-intro center">
        <p class="eyebrow">Evidence Week 06</p>
        <h1>Test Matrix Pertemuan 6</h1>
        <p>Hasil pengujian skenario pendaftaran: perbandingan hasil aktual dengan hasil yang diharapkan.</p>
    </section>

    <section>
        <div class="table-wrap matrix">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Skenario</th>
                        <th>Actual</th>
                        <th>Expected</th>
                        <th class="num">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tests as $index => $test): ?>
                        <?php $pass = $test[1] === $test[2]; ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= e($test[0]) ?></td>
                            <td><?= e($test[1]) ?></td>
                            <td><?= e($test[2]) ?></td>
                            <td class="num">
                                <span class="<?= $pass ? 'badge-available' : 'badge-full' ?>"><?= $pass ? 'PASS' : 'FAIL' ?></span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" class="num">Ringkasan:</td>
                        <td class="num"><b class="<?= $passCount === $total ? 'sum-ok' : 'sum-bad' ?>"><?= $passCount ?>/<?= $total ?> Pass</b></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <p class="help center-note">Hasil dihitung otomatis dari fungsi proyek. Tetap lakukan uji manual lewat browser dan simpan screenshot di <code>evidence/week-06</code>.</p>
    </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
