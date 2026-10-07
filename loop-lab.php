<?php
require __DIR__ . '/helpers.php';

$pageTitle   = 'Loop Lab';
$currentPage = '';
require __DIR__ . '/includes/header.php';
?>
<main class="container">
    <section class="page-intro">
        <p class="eyebrow">Latihan Wajib - Pertemuan 6</p>
        <h1>Loop Lab: for, while, do-while</h1>
        <p>Tugas kecil: ubah batas <code>5</code> menjadi <code>3</code>, lalu jelaskan bagian kode mana yang menghentikan loop.</p>
    </section>

    <section class="summary-card lab-card">
        <h2>A. for - jumlah iterasi sudah diketahui</h2>
        <pre><?php
        for ($i = 1; $i <= 5; $i++) {
            echo "Pertemuan ke-$i\n";
        }
        ?></pre>

        <h2>B. while - kondisi dicek sebelum blok</h2>
        <pre><?php
        $i = 1;
        while ($i <= 5) {
            echo "Nomor antrean: $i\n";
            $i++;
        }
        ?></pre>

        <h2>C. do-while - blok jalan dulu, kondisi dicek kemudian</h2>
        <pre><?php
        $i = 1;
        do {
            echo "Percobaan ke-$i\n";
            $i++;
        } while ($i <= 5);
        ?></pre>

        <div class="table-wrap">
            <table>
                <thead><tr><th>Loop</th><th>Karakter utama</th><th>Gunakan ketika</th></tr></thead>
                <tbody>
                    <tr><td>for</td><td>Counter jelas</td><td>Jumlah iterasi diketahui</td></tr>
                    <tr><td>while</td><td>Kondisi dicek sebelum blok</td><td>Iterasi bergantung kondisi</td></tr>
                    <tr><td>do-while</td><td>Blok jalan dulu</td><td>Proses minimal sekali</td></tr>
                    <tr><td>foreach</td><td>Baca tiap item array</td><td>Memproses daftar data</td></tr>
                </tbody>
            </table>
        </div>
    </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
