<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Target;
use Livewire\Component;
use App\Models\SekolahSd;

class RekapKecamatan extends Component
{

    public function render()
    {

        $listKecamatan = Target::with(['district', 'user', 'user.pembayaran'])
            ->withCount([
                'user as diterima' => fn ($q) => $q->whereDiterima('diterima'),
                'user as ditolak' => fn ($q) => $q->whereDiterima('tidak diterima'),
                'user as daftar_ulang' => fn ($q) => $q->whereHas('pembayaran'),
                'user as total',
            ])
            ->get()
            ->sortBy('district.name');
        $idKecamatan = Target::pluck('kecamatan');
        return view(
            'livewire.rekap-kecamatan',
            [
                'listKecamatan' => $listKecamatan,
                'luarDiterima' => SekolahSd::whereNotIn('kecamatan', $idKecamatan)
                    ->with(['user'])
                    ->whereHas('user', fn ($q) => $q->whereDiterima('diterima'))
                    ->count(),
                'luarDitolak' => SekolahSd::whereNotIn('kecamatan', $idKecamatan)
                    ->with(['user'])
                    ->whereHas('user', fn ($q) => $q->whereDiterima('tidak diterima'))
                    ->count(),
                'luarDaftarUlang' => SekolahSd::whereNotIn('kecamatan', $idKecamatan)
                    ->with(['user', 'user.pembayaran'])
                    ->whereHas('user', fn ($q) => $q->whereHas('pembayaran'))
                    ->count(),
                'luarTotal' => SekolahSd::whereNotIn('kecamatan', $idKecamatan)
                    ->count(),
                'diterima' => User::whereDiterima('diterima')->count(),
                'ditolak' => User::whereDiterima('tidak diterima')->count(),
                'totalPendaftar' => User::role('Calon Siswa')->count(),
                'totalDaftarUlang' => User::whereHas('pembayaran')->count(),
            ]
        );
    }
}
