<?php
/**
 * data.php - sumber data tunggal untuk form pendaftaran (Pertemuan 6).
 * Ubah data di sini, semua halaman yang memakainya ikut berubah.
 *
 * Catatan: katalog lengkap di index.php (Pertemuan 4) tetap berdiri sendiri.
 * Array di file ini khusus untuk alur register.php -> process.php.
 */

$courses = [
    [
        'code' => 'web',
        'name' => 'Web Dasar',
        'fee'  => 300000,
    ],
    [
        'code' => 'php',
        'name' => 'PHP Dasar',
        'fee'  => 400000,
    ],
    [
        'code' => 'laravel',
        'name' => 'Laravel Dasar',
        'fee'  => 500000,
    ],
];

$interestOptions = [
    'frontend' => 'Frontend',
    'backend'  => 'Backend',
    'database' => 'Database',
    'uiux'     => 'UI/UX',
];

$facilities = [
    'Modul digital',
    'Sertifikat penyelesaian',
    'Forum diskusi kelas',
];
