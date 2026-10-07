<?php
require_once __DIR__ . '/helpers.php';

// Nilai dasar situs (Pertemuan 2)
$siteName = 'KursusKu';
$tagline  = 'Belajar, daftar, dan kelola kursus dalam satu tempat.';
$year     = date('Y');

// Data katalog kursus (Pertemuan 4) - minimal 6 record, key konsisten
$courses = [
    ['code' => 'WEB-01', 'name' => 'Web Dasar',           'fee' => 200000, 'quota' => 30, 'registered' => 12, 'start_date' => '2026-09-21'],
    ['code' => 'PHP-01', 'name' => 'PHP Dasar',           'fee' => 250000, 'quota' => 30, 'registered' => 18, 'start_date' => '2026-09-22'],
    ['code' => 'PHP-02', 'name' => 'PHP Lanjutan',        'fee' => 300000, 'quota' => 25, 'registered' => 24, 'start_date' => '2026-09-24'],
    ['code' => 'LAR-01', 'name' => 'Laravel Fundamental', 'fee' => 350000, 'quota' => 25, 'registered' => 25, 'start_date' => '2026-09-28'],
    ['code' => 'DB-01',  'name' => 'MySQL Dasar',         'fee' => 275000, 'quota' => 20, 'registered' => 0,  'start_date' => '2026-10-01'],
    ['code' => 'UI-01',  'name' => 'UI Web Dasar',        'fee' => 225000, 'quota' => 35, 'registered' => 9,  'start_date' => '2026-10-03'],
];
?>
<?php
$pageTitle   = 'Beranda';
$currentPage = 'index.php';
require __DIR__ . '/includes/header.php';
?>
<main class="container">
    <section id="hero" class="hero">
        <p class="eyebrow">Platform Kursus Teknologi</p>
        <h1><?= htmlspecialchars($tagline) ?></h1>
        <p>Temukan kursus teknologi yang relevan untuk meningkatkan keterampilan Anda.</p>
        <div class="hero-actions">
            <a class="btn-primary" href="register.php">Daftar Kursus</a>
            <a class="btn-outline" href="#katalog">Lihat Katalog Kursus</a>
            <a class="btn-outline" href="fee-calculator.php">Lihat Estimasi Biaya</a>
        </div>
    </section>

    <?php
    $totalCourses   = count($courses);
    $availableCount = 0;
    $seatsLeft      = 0;
    foreach ($courses as $c) {
        if (statusKursus($c['quota'], $c['registered']) === 'Tersedia') {
            $availableCount++;
        }
        $seatsLeft += sisaKursi($c['quota'], $c['registered']);
    }
    ?>
    <div class="stats" aria-label="Ringkasan katalog">
        <div class="stat"><b><?= $totalCourses ?></b><span>Kursus tersedia di katalog</span></div>
        <div class="stat"><b><?= $availableCount ?></b><span>Kursus masih menerima peserta</span></div>
        <div class="stat"><b><?= $seatsLeft ?></b><span>Total sisa kursi</span></div>
    </div>

    <section id="keunggulan">
        <h2>Mengapa Memilih KursusKu?</h2>
        <div class="card-grid">
            <article class="card">
                <h3>Materi Terarah</h3>
                <p>Materi disusun bertahap dari dasar hingga praktik.</p>
            </article>
            <article class="card">
                <h3>Belajar dengan Proyek</h3>
                <p>Setiap tahap menghasilkan bagian nyata dari aplikasi.</p>
            </article>
            <article class="card">
                <h3>Pendampingan Praktik</h3>
                <p>Mahasiswa belajar melalui demonstrasi, latihan, dan evaluasi.</p>
            </article>
        </div>
    </section>

    <section id="katalog">
        <h2>Katalog Kursus</h2>
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Biaya</th>
                        <th>Mulai</th>
                        <th>Sisa</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($courses as $course): ?>
                        <?php
                        $status = statusKursus($course['quota'], $course['registered']);
                        $statusClass = $status === 'Penuh' ? 'badge-full' : 'badge-available';
                        ?>
                        <tr>
                            <td><?= htmlspecialchars($course['code']) ?></td>
                            <td><?= htmlspecialchars(trim($course['name'])) ?></td>
                            <td><?= rupiah($course['fee']) ?></td>
                            <td><?= formatTanggal($course['start_date']) ?></td>
                            <td><?= sisaKursi($course['quota'], $course['registered']) ?></td>
                            <td><span class="<?= $statusClass ?>"><?= $status ?></span></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>

    <section id="alur">
        <h2>Cara Mendaftar</h2>
        <ol class="steps">
            <li>Pilih kursus yang diminati.</li>
            <li>Isi <a href="register.php">form pendaftaran</a>.</li>
            <li>Periksa kembali data.</li>
            <li>Kirim pendaftaran dan tunggu konfirmasi.</li>
        </ol>
    </section>

    <section id="media">
        <h2>Kenali Program Kami</h2>
        <img
            src="assets/images/hero-kursus.jpg"
            alt="Mahasiswa sedang mengikuti kegiatan kursus komputer"
            width="640">
        <h3>Video Singkat</h3>
        <video controls width="640">
            <source src="assets/video/intro-kursus.mp4" type="video/mp4">
            Browser Anda tidak mendukung video HTML5.
        </video>
        <p>
            Pelajari juga
            <a href="https://www.php.net/" target="_blank" rel="noopener">dokumentasi PHP</a>.
        </p>
    </section>

    <section id="kontak">
        <h2>Kontak</h2>
        <p>Email: kursusku@example.test</p>
        <p>Alamat: Laboratorium Komputer - data latihan</p>
    </section>
</main>

<?php require __DIR__ . '/includes/footer.php'; ?>
