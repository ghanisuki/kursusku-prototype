# Langkah Pembuatan KursusKu (Pertemuan 2 - 5)

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

## Kalimat yang harus bisa dijelaskan
"Form mengirim pasangan key-value. Key berasal dari atribut `name`. Untuk alur pendaftaran saya memakai POST; PHP membaca data melalui `$_POST` dan output ditampilkan kembali setelah di-escape. CSS mengatur konsistensi dan responsive layout, sedangkan hosting memindahkan aplikasi dari lingkungan lokal ke server publik yang harus dikonfigurasi lebih aman."
