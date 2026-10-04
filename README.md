# KursusKu - Proyek Semester Pemrograman Web III

Proyek berjalan melalui Laragon di `C:\laragon\www\kursusku-prototype`
(buka: `http://kursusku-prototype.test/` atau `http://localhost/kursusku-prototype/`).

## Struktur Proyek

```
kursusku-prototype/
|-- index.php                 (P2 + P4 + P5: landing page, katalog data-driven, navigasi)
|-- server-time.php           (P2)
|-- fee-calculator.php        (P3: kalkulator biaya, kini memakai CSS global)
|-- helpers.php               (P4: rupiah, statusKursus, sisaKursi, formatTanggal)
|-- test-functions.php        (P4: 6 test case)
|-- registration.php          (P5: form pendaftaran, 9 kontrol, method POST)
|-- process-registration.php  (P5: membaca $_POST + escape output)
|-- README.md
|-- LANGKAH-PEMBUATAN.md      (panduan langkah demi langkah P2-P5)
|-- assets/
|   |-- css/style.css         (P5: CSS global + form + responsif)
|   |-- images/hero-kursus.jpg
|   `-- video/intro-kursus.mp4
`-- evidence/
    |-- week-02/ week-03/ week-04/
    `-- week-05/ (screenshot, test-matrix.txt, local-vs-hosting.txt)
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

## Belum diwajibkan

Database MySQL, CRUD, login, Laravel MVC, Ajax, dan hosting publik.
