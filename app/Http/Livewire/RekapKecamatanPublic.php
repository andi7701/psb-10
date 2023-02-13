<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Target;
use Livewire\Component;
use App\Models\SekolahSd;

class RekapKecamatanPublic extends Component
{
    public function render()
    {
        $listKecamatan = Target::with(['district', 'user', 'user.pembayaran'])
            ->withCount([
                'user as diterima' => fn ($q)
                => $q
                    ->whereDiterima('diterima')
                    ->where(fn ($q)
                    => $q
                        ->where('kode_daftar', 'like', 'A%')
                        ->orWhere('kode_daftar', 'like', 'B%')),
                'user as ditolak' => fn ($q)
                => $q
                    ->whereDiterima('tidak diterima')
                    ->where(fn ($q)
                    => $q
                        ->where('kode_daftar', 'like', 'A%')
                        ->orWhere('kode_daftar', 'like', 'B%')),
                'user as daftar_ulang' => fn ($q)
                => $q
                    ->whereHas('pembayaran')
                    ->where(fn ($q)
                    => $q
                        ->where('kode_daftar', 'like', 'A%')
                        ->orWhere('kode_daftar', 'like', 'B%')),
                'user as total' => fn ($q)
                => $q
                    ->where(fn ($q)  => $q
                        ->where('kode_daftar', 'like', 'A%')
                        ->orWhere('kode_daftar', 'like', 'B%')),
            ])
            ->get()
            ->sortBy('district.name');
        $idKecamatan = Target::pluck('kecamatan');
        return view(
            'livewire.rekap-kecamatan-public',
            [
                'listKecamatan' => $listKecamatan,
                'luarDiterima' => SekolahSd::whereNotIn('kecamatan', $idKecamatan)
                    ->with(['user'])
                    ->whereHas('user', fn ($q) => $q
                        ->whereDiterima('diterima')
                        ->where(fn ($q)  => $q
                            ->where('kode_daftar', 'like', 'A%')
                            ->orWhere('kode_daftar', 'like', 'B%')))
                    ->count(),
                'luarDitolak' => SekolahSd::whereNotIn('kecamatan', $idKecamatan)
                    ->with(['user'])
                    ->whereHas('user', fn ($q) => $q
                        ->whereDiterima('tidak diterima')
                        ->where(fn ($q)  => $q
                            ->where('kode_daftar', 'like', 'A%')
                            ->orWhere('kode_daftar', 'like', 'B%')))
                    ->count(),
                'luarDaftarUlang' => SekolahSd::whereNotIn('kecamatan', $idKecamatan)
                    ->with(['user', 'user.pembayaran'])
                    ->whereHas('user', fn ($q) => $q
                        ->whereHas('pembayaran')
                        ->where(fn ($q)  => $q
                            ->where('kode_daftar', 'like', 'A%')
                            ->orWhere('kode_daftar', 'like', 'B%')))
                    ->count(),
                'luarTotal' => SekolahSd::whereNotIn('kecamatan', $idKecamatan)
                    ->with(['user'])
                    ->whereHas('user', fn ($q) => $q
                        ->whereDiterima('tidak diterima')
                        ->where(fn ($q)  => $q
                            ->where('kode_daftar', 'like', 'A%')
                            ->orWhere('kode_daftar', 'like', 'B%')))
                    ->count(),
                'diterima' => User::whereDiterima('diterima')
                    ->where(fn ($q)
                    => $q
                        ->where('kode_daftar', 'like', 'A%')
                        ->orWhere('kode_daftar', 'like', 'B%'))
                    ->count(),
                'ditolak' => User::whereDiterima('tidak diterima')
                    ->where(fn ($q)  => $q
                        ->where('kode_daftar', 'like', 'A%')
                        ->orWhere('kode_daftar', 'like', 'B%'))
                    ->count(),
                'totalPendaftar' => User::role('Calon Siswa')->count(),
                'totalDaftarUlang' => User::whereHas('pembayaran')->count(),
            ]
        )->layout('layouts.guest');
    }
}
