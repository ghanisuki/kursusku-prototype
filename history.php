<?php
require __DIR__ . '/helpers.php';

// Data dummy (belum database) untuk melatih looping foreach.
$history = [
    ['name' => 'Alya',  'course' => 'Web Dasar',     'total' => 240000],
    ['name' => 'Bima',  'course' => 'PHP Dasar',     'total' => 340000],
    ['name' => 'Citra', 'course' => 'Laravel Dasar', 'total' => 500000],
];

$pageTitle   = 'History Dummy';
$currentPage = 'history.php';
require __DIR__ . '/includes/header.php';
?>
<main class="container">
    <section class="page-intro">
        <p class="eyebrow">Latihan Looping</p>
        <h1>History Pendaftaran (Dummy)</h1>
        <p>Halaman ini bukan CRUD dan bukan data nyata. Ia hanya latihan array + <code>foreach</code>
           sebagai jembatan menuju data database pada fase berikutnya.</p>
    </section>

    <section>
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kursus</th>
                        <th class="num">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($history as $index => $item): ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= e($item['name']) ?></td>
                            <td><?= e($item['course']) ?></td>
                            <td class="num"><?= formatRupiah($item['total']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <p><a class="btn-link" href="register.php">Daftar Kursus Baru</a></p>
    </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
