<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PrintController extends Controller
{

    public function formulir_pendaftaran(User $user)
    {
        $user->load([
            'alamat' => [
                'province',
                'city',
                'district',
                'village',
            ],
            'biodata',
            'orangTua',
            'sekolahSd' => [
                'province',
                'city',
                'district',
                'village',
            ],
            'sekolahAsal' => [
                'province',
                'city',
                'district',
                'village',
            ],
            'wali'
        ]);
        return view(
            'print.formulir-pendaftaran',
            [
                'user' => $user
            ]
        );
    }

    public function kartu_pendaftaran(User $user)
    {
        $user->load(['biodata', 'sekolahSd', 'panitia']);
        return view(
            'print.kartu-pendaftaran',
            [
                'user' => $user
            ]
        );
    }

    public function pengumuman(User $user)
    {
        $user->load(['agama', 'akademik', 'biodata', 'kesehatan', 'minatBakat', 'sekolahSd', 'wawancara']);
        return view(
            'print.pengumuman',
            [
                'user' => $user,
                'tanggal' => date('Y-m-d'),
                'tenggang' => Carbon::create(date('Y-m-d'))->addDay(7)
            ]
        );
    }

    public function surat_santri(User $user)
    {
        $user->load([
            'alamat' => [
                'village',
                'district',
                'city',
                'province'
            ],
            'biodata',
            'orangTua',
            'wali'
        ]);

        return view(
            'print.surat-santri',
            [
                'user' => $user,
            ]
        );
    }

    public function surat_orang_tua(User $user)
    {
        $user->load([
            'alamat' => [
                'village',
                'district',
                'city',
                'province'
            ],
            'biodata',
            'orangTua',
            'wali'
        ]);

        return view(
            'print.surat-orang-tua',
            [
                'user' => $user,
            ]
        );
    }

    public function kwitansi(User $user)
    {
        $user->load(['alamat', 'biodata', 'pembayaran', 'pembayaran.panitia']);
        return view(
            'print.kwitansi',
            [
                'user' => $user
            ]
        );
    }
}
