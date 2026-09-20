<?php

function rupiah($angka)
{
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

function sisaKursi($quota, $registered)
{
    return max(0, $quota - $registered);
}

function statusKursus($quota, $registered)
{
    return sisaKursi($quota, $registered) === 0 ? 'Penuh' : 'Tersedia';
}

function formatTanggal($tanggal)
{
    return date('d-m-Y', strtotime($tanggal));
}