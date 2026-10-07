<?php
require __DIR__ . '/data.php';
require __DIR__ . '/helpers.php';

$pageTitle   = 'Daftar Kursus';
$currentPage = 'register.php';
require __DIR__ . '/includes/header.php';
?>
<main class="container">
    <section class="page-intro">
        <p class="eyebrow">Pendaftaran Kursus - Pertemuan 6</p>
        <h1>Daftar Kursus KursusKu</h1>
        <p>Gunakan data latihan (email contoh: nama@example.test). Biaya dan diskon dihitung otomatis setelah form dikirim.</p>
    </section>

    <!-- Looping foreach: fasilitas dirender dari array -->
    <section class="facility-box">
        <h2>Fasilitas semua kursus</h2>
        <ul>
            <?php foreach ($facilities as $facility): ?>
                <li><?= e($facility) ?></li>
            <?php endforeach; ?>
        </ul>
    </section>

    <section class="form-card">
        <form method="POST" action="process.php">

            <div class="form-grid">
                <div class="form-group">
                    <label for="name">Nama lengkap</label>
                    <input id="name" name="name" type="text"
                           maxlength="100" autocomplete="name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email"
                           maxlength="120" autocomplete="email" required>
                </div>
            </div>

            <!-- Select kursus dirender dari array dengan foreach -->
            <div class="form-group">
                <label for="course_code">Pilih kursus</label>
                <select id="course_code" name="course_code" required>
                    <option value="">-- Pilih kursus --</option>
                    <?php foreach ($courses as $course): ?>
                        <option value="<?= e($course['code']) ?>">
                            <?= e($course['name']) ?> - <?= formatRupiah($course['fee']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Radio: satu pilihan, name sama = satu grup -->
            <fieldset class="form-group">
                <legend>Tipe peserta</legend>
                <label class="choice">
                    <input type="radio" name="participant_type" value="mahasiswa" required>
                    Mahasiswa
                </label>
                <label class="choice">
                    <input type="radio" name="participant_type" value="guru">
                    Guru
                </label>
                <label class="choice">
                    <input type="radio" name="participant_type" value="umum">
                    Umum
                </label>
                <small class="help">Diskon: mahasiswa 20%, guru 15%, umum 0%.</small>
            </fieldset>

            <!-- Checkbox: banyak pilihan, name memakai [] -->
            <fieldset class="form-group">
                <legend>Minat belajar</legend>
                <?php foreach ($interestOptions as $value => $label): ?>
                    <label class="choice">
                        <input type="checkbox" name="interests[]" value="<?= e($value) ?>">
                        <?= e($label) ?>
                    </label>
                <?php endforeach; ?>
            </fieldset>

            <div class="form-grid">
                <div class="form-group">
                    <label for="learning_mode">Metode belajar</label>
                    <select id="learning_mode" name="learning_mode" required>
                        <option value="">-- Pilih metode --</option>
                        <option value="offline">Tatap muka</option>
                        <option value="online">Online</option>
                        <option value="hybrid">Hybrid</option>
                    </select>
                </div>

                <!-- Looping for: opsi 1-3 paket -->
                <div class="form-group">
                    <label for="package_count">Jumlah paket</label>
                    <select id="package_count" name="package_count" required>
                        <?php for ($i = 1; $i <= 3; $i++): ?>
                            <option value="<?= $i ?>"><?= $i ?> paket</option>
                        <?php endfor; ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="notes">Catatan tambahan</label>
                <textarea id="notes" name="notes" rows="4" maxlength="300"></textarea>
                <small class="help">Opsional, maksimal 300 karakter.</small>
            </div>

            <button class="btn-primary" type="submit">Proses Pendaftaran</button>
        </form>
    </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
