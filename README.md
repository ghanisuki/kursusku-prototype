# KursusKu - Proyek Semester Pemrograman Web III

Proyek berjalan melalui Laragon di `C:\laragon\www\kursusku-prototype`
(buka: `http://kursusku-prototype.test/` atau `http://localhost/kursusku-prototype/`).

## Struktur Proyek

```
kursusku-prototype/
|-- index.php                 (P2 + P4 + P5: landing page, katalog data-driven, navigasi)
|-- server-time.php           (P2)
|-- fee-calculator.php        (P3: kalkulator biaya, kini memakai CSS global)
|-- helpers.php               (P4: rupiah, statusKursus, sisaKursi, formatTanggal; P6: e, formatRupiah, findCourse, getDiscountPercent, getLearningModeLabel, postString)
|-- test-functions.php        (P4: 6 test case)
|-- registration.php          (P5: form pendaftaran dasar, arsip - tidak ada di navigasi)
|-- process-registration.php  (P5: membaca $_POST + escape output, arsip)
|-- register.php              (P6: form lanjutan, data dari array, tautan di navigasi)
|-- process.php               (P6: validasi, diskon if/elseif, switch, ringkasan)
|-- data.php                  (P6: array kursus, minat, fasilitas)
|-- history.php               (P6: history dummy + foreach)
|-- test-matrix.php           (P6: halaman evidence test matrix 12 skenario)
|-- loop-lab.php              (P6: for, while, do-while)
|-- includes/header.php, footer.php, theme.php  (kepala + navigasi bersama, pemilih warna tema)
|-- README.md
|-- LANGKAH-PEMBUATAN.md      (panduan langkah demi langkah P2-P5)
|-- assets/
|   |-- css/style.css         (P5: CSS global + form + responsif)
|   |-- images/hero-kursus.jpg
|   `-- video/intro-kursus.mp4
`-- evidence/
    |-- week-02/ week-03/ week-04/
    |-- week-05/ (screenshot, test-matrix.txt, local-vs-hosting.txt)
    `-- week-06/ (screenshot, test-matrix.txt, ai-usage-log.txt, refleksi.txt)
```

## Rumus Biaya (Minggu 3)

```
subtotal = fee x participantCount
discount = subtotal x discountPercent / 100
total    = subtotal - discount + adminFee
```

Semua nilai uang disimpan sebagai integer rupiah.

## Milestone

- Milestone 2: Landing page KursusKu v1 (HTML semantik + PHP dasar).
- Milestone 3: Kalkulator estimasi biaya, tervalidasi 5 test case.
- Milestone 4: Katalog data-driven (array 6 kursus + foreach + 4 function + 6 test).
- Milestone 5: Form pendaftaran (POST), CSS global responsif, evidence GET vs POST, tabel local vs hosting.

- Milestone 6: Alur utuh landing -> register -> process -> ringkasan + history dummy, tanpa database.

## Aturan Diskon (Minggu 6)

| Tipe peserta | Diskon |
|---|---|
| Mahasiswa | 20% |
| Guru | 15% |
| Umum | 0% |

```
total = (fee x paket) - intdiv((fee x paket) x diskon, 100)
```

## Belum diwajibkan

Database MySQL, CRUD, login, Laravel MVC, Ajax, dan hosting publik.
