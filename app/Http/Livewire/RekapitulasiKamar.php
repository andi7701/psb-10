<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\District;
class RekapitulasiKamar extends Component
{
    public function render()
    {
        return view(
            'livewire.rekapitulasi-kamar',
            [
                'listKecamatan' => District::with([
                    'sekolahSd',
                    'sekolahSd.user',
                    'city',
                    'city.province'
                ])
                    ->whereHas(
                        'sekolahSd',
                        fn ($q) => $q
                            ->whereHas('user', fn ($q) => $q->whereDiterima('diterima'))
                    )
                    ->withCount([
                        'sekolahSd as hitungPutra' =>
                        fn ($q) => $q
                            ->whereHas(
                                'user',
                                fn ($q) => $q->whereDiterima('diterima')
                                    ->whereHas('biodata', fn ($q) => $q->whereJenisKelamin('L'))
                            ),
                        'sekolahSd as hitungPutri' =>
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
