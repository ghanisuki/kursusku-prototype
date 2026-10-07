<?php
/**
 * helpers.php
 * Kumpulan function reusable untuk proyek KursusKu.
 * Pertemuan 4 - Sub-CPMK3 (fungsi string, date/time, function/procedure)
 *
 * Catatan: file ini TIDAK boleh menghasilkan output sendiri ketika di-include.
 */

function rupiah(int $amount): string
{
    return 'Rp ' . number_format($amount, 0, ',', '.');
}

function statusKursus(int $quota, int $registered): string
{
    return $registered >= $quota ? 'Penuh' : 'Tersedia';
}

function sisaKursi(int $quota, int $registered): int
{
    return max(0, $quota - $registered);
}

function formatTanggal(string $date): string
{
    $value = new DateTimeImmutable($date);
    return $value->format('d-m-Y');
}

/* ==========================================================
 * Tambahan Pertemuan 6 - helper untuk form lanjutan
 * ========================================================== */

/** Escape output teks (htmlspecialchars). Biasakan untuk semua data dari pengguna. */
function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

/** Format rupiah tanpa spasi, contoh: Rp320.000 */
function formatRupiah(int $amount): string
{
    return 'Rp' . number_format($amount, 0, ',', '.');
}

/** Cari satu kursus berdasarkan code (foreach). Mengembalikan null jika tidak ada. */
function findCourse(array $courses, string $code): ?array
{
    foreach ($courses as $course) {
        if ($course['code'] === $code) {
            return $course;
        }
    }

    return null;
}

/** Aturan diskon (if/elseif): mahasiswa 20%, guru 15%, lainnya 0%. */
function getDiscountPercent(string $participantType): int
{
    if ($participantType === 'mahasiswa') {
        return 20;
    } elseif ($participantType === 'guru') {
        return 15;
    }

    return 0;
}

/** Label metode belajar (switch). */
function getLearningModeLabel(string $mode): string
{
    switch ($mode) {
        case 'offline':
            return 'Tatap Muka';
        case 'online':
            return 'Online';
        case 'hybrid':
            return 'Hybrid';
        default:
            return 'Tidak diketahui';
    }
}

/**
 * Ambil satu field teks dari $_POST dengan aman.
 * - ?? memberi nilai default jika key tidak dikirim
 * - is_string() menolak input bertipe array (mis. name[]=x) agar trim() tidak error
 */
function postString(string $key, string $default = ''): string
{
    $value = $_POST[$key] ?? $default;

    return is_string($value) ? trim($value) : $default;
}
