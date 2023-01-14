<?php

namespace App\Http\Livewire;

use App\Models\Alamat;
use App\Models\User;
use Livewire\Component;

class RekapKecamatan extends Component
{

    public $pilihan;
    public $total;

    public function mount()
    {
        $this->pilihan = 'diterima';
    }
    public function render()
    {
        if ($this->pilihan == 'diterima') {

            $listKecamatan = Alamat::with([
                'user',
                'district'
            ])
                ->whereHas('user', fn ($q) => $q->whereDiterima('diterima'))
                ->groupBy('kecamatan')
                ->selectRaw('kecamatan, count(kecamatan) as hitung')
                ->get()
                ->sortBy('district.name');
            $this->total = User::whereDiterima('diterima')->count();
        } elseif ($this->pilihan == 'ditolak') {

            $listKecamatan = Alamat::with([
                'user',
                'district'
            ])
                ->whereHas('user', fn ($q) => $q->whereDiterima('tidak diterima'))
                ->groupBy('kecamatan')
                ->selectRaw('kecamatan, count(kecamatan) as hitung')
                ->get()
                ->sortBy('district.name');
            $this->total = User::whereDiterima('tidak diterima')->count();
        } else {
            $listKecamatan = Alamat::with([
                'user',
                'district'
            ])
                ->groupBy('kecamatan')
                ->selectRaw('kecamatan, count(kecamatan) as hitung')
                ->get()
                ->sortBy('district.name');
            $this->total = User::role('Calon Siswa')->count();
        }
        return view(
            'livewire.rekap-kecamatan',
            [
                'listKecamatan' => $listKecamatan
            ]
        );
    }
}
