<?php
// Menerima data POST dari registration.php (Pertemuan 5).
// Belum ada penyimpanan database: data hanya dibaca lalu ditampilkan kembali.

$name            = trim($_POST['name'] ?? '');
$email           = trim($_POST['email'] ?? '');
$phone           = trim($_POST['phone'] ?? '');
$studyProgram    = trim($_POST['study_program'] ?? '');
$course          = $_POST['course'] ?? '';
$participantType = $_POST['participant_type'] ?? '';
$interests       = $_POST['interests'] ?? [];
$note            = trim($_POST['note'] ?? '');
$source          = $_POST['source'] ?? '';

// Checkbox dikirim sebagai array; gabungkan menjadi satu teks.
$interestText = implode(', ', (array) $interests);

// Escape output agar karakter khusus (<, >, ", ') tidak dieksekusi sebagai HTML.
function e($value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hasil Pendaftaran - KursusKu</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<main class="container result-page">
    <section class="alert-success">
        <h1>Pendaftaran Diterima untuk Diproses</h1>
        <p>Periksa kembali data latihan berikut.</p>
    </section>

    <section class="summary-card">
        <dl class="summary-list">
            <dt>Nama</dt><dd><?= e($name) ?></dd>
            <dt>Email</dt><dd><?= e($email) ?></dd>
            <dt>Nomor HP</dt><dd><?= e($phone) ?></dd>
            <dt>Program Studi</dt><dd><?= e($studyProgram) ?></dd>
            <dt>Kursus</dt><dd><?= e($course) ?></dd>
            <dt>Jenis Peserta</dt><dd><?= e($participantType) ?></dd>
            <dt>Minat</dt><dd><?= e($interestText) ?></dd>
            <dt>Catatan</dt><dd><?= e($note) ?></dd>
            <dt>Sumber</dt><dd><?= e($source) ?></dd>
        </dl>
        <a class="btn-link" href="registration.php">Kembali ke Form</a>
    </section>
</main>
</body>
</html>
