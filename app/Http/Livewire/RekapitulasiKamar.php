<?php

namespace App\Http\Livewire;

use App\Models\User;
use Laravolt\Indonesia\Models\District;
use Livewire\Component;

class RekapitulasiKamar extends Component
{
    public function render()
    {
        return view(
            'livewire.rekapitulasi-kamar',
            [
                'listKecamatan' => District::with([
                    'alamat',
                    'alamat.user',
                    'city',
                    'city.province'
                ])
                    ->whereHas(
                        'alamat',
                        fn ($q) => $q
                            ->whereHas('user', fn ($q) => $q->whereDiterima('diterima'))
                    )
                    ->withCount([
                        'alamat as hitungPutra' =>
                        fn ($q) => $q
                            ->whereHas(
                                'user',
                                fn ($q) => $q->whereDiterima('diterima')
                                    ->whereHas('biodata', fn ($q) => $q->whereJenisKelamin('L'))
                            ),
                        'alamat as hitungPutri' =>
                        fn ($q) => $q
                            ->whereHas(
                                'user',
                                fn ($q) => $q->whereDiterima('diterima')
                                    ->whereHas('biodata', fn ($q) => $q->whereJenisKelamin('P'))
                            ),
                    ])
                    ->groupBy('code')
                    ->orderBy('name')
                    ->get(),
                'totalPutra' => User::with(['biodata'])
                    ->whereHas('biodata', fn ($q) => $q->whereJenisKelamin('L'))
                    ->whereDiterima('diterima')
                    ->count(),
                'totalPutri' => User::with(['biodata'])
                    ->whereHas('biodata', fn ($q) => $q->whereJenisKelamin('P'))
                    ->whereDiterima('diterima')
                    ->count(),
            ]
        );
    }
}
