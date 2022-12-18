<?php

use Carbon\Carbon;

function rupiah($angka)
{
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

function tanggal($tanggal)
{
    return Carbon::parse($tanggal)->translatedFormat('d F Y');
}

function hariTanggal($tanggal)
{
    return Carbon::parse($tanggal)->translatedFormat('l, d F Y');
}

function namaHari($hari)
{
    $nama_hari = '';

    switch ($hari) {
        case '1':
            $nama_hari = 'Senin';
            break;
        case '2':
            $nama_hari = 'Selasa';
            break;
        case '3':
            $nama_hari = 'Rabu';
            break;
        case '4':
            $nama_hari = 'Kamis';
            break;
        case '5':
            $nama_hari = 'Jumat';
            break;
        case '6':
            $nama_hari = 'Sabtu';
            break;

        default:
            # code...
            break;
    }

    return $nama_hari;
}

function namaBulan($bulan)
{
    return Carbon::parse(date('Y-' . $bulan . '-d'))->translatedFormat('F');
}