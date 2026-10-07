# Langkah Pembuatan KursusKu (Pertemuan 2 - 6)

Satu proyek yang sama dikembangkan setiap minggu: `kursusku-prototype`.

## 0. Persiapan
1. Aktifkan **Laragon** (Start All).
2. Ekstrak proyek ke `C:\laragon\www\kursusku-prototype`.
3. Buka **folder** proyek (bukan satu file) di VS Code.
4. Tambahkan file gambar `assets/images/hero-kursus.jpg` dan video `assets/video/intro-kursus.mp4` (sesuai Pertemuan 2).

## Pertemuan 2 - Landing page (sudah ada)
- `index.php`: section hero, keunggulan, katalog, cara daftar, media, kontak.
- `server-time.php`: menampilkan waktu server.
- Evidence: `evidence/week-02/`.

## Pertemuan 3 - Kalkulator biaya (sudah ada)
- `fee-calculator.php`: variabel PHP, `number_format`, rumus subtotal - diskon + admin.
- Pembaruan P5: halaman memakai header/nav dan CSS global yang sama.

## Pertemuan 4 - Katalog dan fungsi (sudah ada)
- `helpers.php`: `rupiah()`, `statusKursus()`, `sisaKursi()`, `formatTanggal()`.
- `index.php`: array `$courses` (6 data) ditampilkan dengan `foreach`.
- `test-functions.php`: 6 test case (buka di browser, semua harus PASS).

## Pertemuan 5 - Form, CSS, GET/POST, Hosting

### Langkah 1 - Backup kondisi minggu 4
Salin folder proyek atau commit Git dengan pesan `Praktikum-04` sebelum mengubah apa pun.

### Langkah 2 - Buat struktur baru
Buat `assets/css/`, `evidence/week-05/`, dan file `registration.php`, `process-registration.php`, `assets/css/style.css`.

### Langkah 3 - CSS global
Isi `assets/css/style.css` (variabel warna, reset, container, navbar, hero, card, tabel, form, tombol, alert, media query 640 px).
Hubungkan di `<head>` setiap halaman:
```html
<link rel="stylesheet" href="assets/css/style.css">
```

### Langkah 4 - Navigasi Landing -> Katalog -> Daftar
Pada `index.php`, `fee-calculator.php`, dan `registration.php` gunakan:
```html
<a href="index.php">Beranda</a>
<a href="index.php#katalog">Katalog</a>
<a href="registration.php">Daftar Kursus</a>
```

### Langkah 5 - Form `registration.php`
`<form action="process-registration.php" method="POST">` berisi 9 kontrol:
text, email, tel, select, radio, checkbox (`interests[]`), textarea, hidden, button.
Setiap input punya `label for` = `id`, dan `name` = key yang dibaca PHP.

### Langkah 6 - Uji validasi HTML
Kirim form kosong, isi nama 2 huruf, isi email `abc`. Browser harus menahan submit.

### Langkah 7 - Eksperimen GET
1. Ubah sementara `method="POST"` menjadi `method="GET"`, submit data latihan.
2. Screenshot address bar -> `evidence/week-05/04-get-url.png`.
3. **Kembalikan ke `method="POST"`** lalu submit lagi.

### Langkah 8 - `process-registration.php`
Ambil `$_POST` dengan `trim()` dan `?? ''`, gabungkan checkbox dengan `implode()`, tampilkan lewat fungsi `e()` (`htmlspecialchars`).

### Langkah 9 - Uji mobile
F12 -> Device Toolbar -> sekitar 360 px: form satu kolom, tanpa horizontal scroll.

### Langkah 10 - Tabel local vs hosting
Lengkapi `evidence/week-05/local-vs-hosting.txt` (sudah ada isinya; pelajari dan jelaskan dengan bahasa sendiri).

### Langkah 11 - Evidence
Simpan di `evidence/week-05/`:
```
01-form-desktop.png   02-form-mobile.png   03-post-result.png
04-get-url.png        05-navigation.png    test-matrix.txt   local-vs-hosting.txt
```
Isi kolom STATUS dan CATATAN pada `test-matrix.txt` setelah menguji sendiri.

### Langkah 12 - Commit ke GitHub
```
git add .
git commit -m "Praktikum-05"
git push origin main
```

## Pertemuan 6 - Percabangan, Looping, Form Lanjutan

Alur akhir: `index.php` -> `register.php` -> `process.php` -> ringkasan -> `history.php`. Tanpa database.

### Langkah 1 - Siapkan folder
Buat `evidence/week-06/` dan folder `includes/`. Jangan membuat proyek baru.
File P5 (`registration.php`, `process-registration.php`) dibiarkan sebagai arsip evidence minggu 5; navigasi kini menuju `register.php`.

### Langkah 2 - `data.php` (array sumber data)
`$courses` (code, name, fee), `$interestOptions`, `$facilities`. Checkpoint: ubah satu nama kursus, refresh, cukup ubah di satu tempat.

### Langkah 3 - Tambahkan helper di `helpers.php`
Fungsi P4 tidak dihapus. Tambahkan satu per satu dan uji tiap fungsi:
`e()`, `formatRupiah()`, `findCourse()` (foreach), `getDiscountPercent()` (if/elseif), `getLearningModeLabel()` (switch), `postString()` (?? + is_string).

### Langkah 4 - `includes/header.php` dan `footer.php`
Kepala halaman + navigasi dipakai bersama agar konsisten (Beranda, Estimasi Biaya, Daftar Kursus, History Dummy).

### Langkah 5 - `register.php`
- Select kursus dengan `foreach ($courses ...)`.
- Radio `participant_type` (satu nama, `required` pada satu radio).
- Checkbox `interests[]` dengan `foreach ($interestOptions ...)`.
- Select metode belajar, select jumlah paket dengan `for ($i = 1; $i <= 3; $i++)`, textarea catatan.
- Daftar fasilitas dengan `foreach`.

### Langkah 6 - `process.php`
1. Jika bukan POST: `header('Location: register.php'); exit;` (sebelum output HTML).
2. Baca data (`??`, `trim`, `(int)` untuk paket), saring minat dengan `array_intersect`.
3. Validasi -> array `$errors`; jika tidak kosong tampilkan error lalu `exit`.
4. Hitung: `$grossTotal = fee x paket`; `$discountAmount = intdiv($grossTotal * persen, 100)`; `$finalTotal = $grossTotal - $discountAmount`.
5. Tampilkan ringkasan (semua teks pengguna lewat `e()`).

### Langkah 7 - `history.php` dan `loop-lab.php`
History dummy dengan `foreach`; loop-lab berisi contoh `for`, `while`, `do-while`.

### Langkah 8 - Integrasi
Tombol "Daftar Kursus" di landing page menuju `register.php`; semua halaman tersambung lewat navigasi.

### Langkah 9 - Uji dan evidence
Jalankan 12 skenario di `evidence/week-06/test-matrix.txt` (isi Actual dan Status sendiri), ambil 6 screenshot (lihat `README-screenshot.txt`), isi `refleksi.txt` dan, jika memakai AI, `ai-usage-log.txt`.

### Langkah 10 - Commit
```
git add .
git commit -m "Praktikum-06"
git push origin main
```

## Pembaruan Tampilan - Hitam, Putih + Warna Aksen yang Bisa Diganti Langsung
- Warna aksen (tombol, status, fokus, garis) kini diganti **langsung dari navbar** lewat lima titik warna: hijau, biru, ungu, oranye, merah. Tidak perlu lagi mengedit blok `:root`.
- Cara kerja (tanpa JavaScript, memakai konsep GET + cookie + PHP):
  1. Klik titik warna -> halaman membuka `halaman.php?theme=blue` (GET).
  2. `includes/theme.php` memvalidasi nilai dengan whitelist `$themes`, menyimpan cookie `kursusku_theme` selama 1 tahun, lalu redirect ke halaman bersih.
  3. `includes/header.php` memasang `<html data-theme="blue">`; `style.css` mengubah variabel `--accent-*` sesuai blok `[data-theme="blue"]`.
- Menambah warna baru: tambahkan satu baris di array `$themes` (`includes/theme.php`), satu blok `[data-theme="..."]` dan satu kelas `.swatch-...` di `style.css`.
- `index.php` dan `fee-calculator.php` sekarang memakai `includes/header.php` dan `footer.php` seperti halaman Pertemuan 6 lainnya. `registration.php` dan `process-registration.php` (arsip Pertemuan 5) tetap memakai warna default.
- Header, hero, dan footer tetap hitam; konten tetap putih.

## Halaman Test Matrix (Navigasi "Test Matrix")
- File: `test-matrix.php`, tautan ada di navbar semua halaman (`includes/header.php`).
- Menampilkan 12 skenario Pertemuan 6 dengan kolom No, Skenario, Actual, Expected, Status (PASS/FAIL), dan ringkasan `12/12 Pass`.
- Kolom Actual dihitung langsung dengan fungsi proyek (`findCourse`, `getDiscountPercent`, `formatRupiah`, `getLearningModeLabel`); test 5-7 memakai ekspresi yang sama seperti `process.php`; test 11 memeriksa adanya guard redirect di `process.php`; test 12 merender loop fasilitas dengan satu item tambahan.
- Jika ada fungsi yang rusak, barisnya otomatis berubah menjadi FAIL.
- Halaman ini pelengkap evidence: uji manual di browser dan screenshot tetap wajib (`evidence/week-06`).

## Kalimat yang harus bisa dijelaskan
"Form mengirim pasangan key-value. Key berasal dari atribut `name`. Untuk alur pendaftaran saya memakai POST; PHP membaca data melalui `$_POST` dan output ditampilkan kembali setelah di-escape. CSS mengatur konsistensi dan responsive layout, sedangkan hosting memindahkan aplikasi dari lingkungan lokal ke server publik yang harus dikonfigurasi lebih aman."
