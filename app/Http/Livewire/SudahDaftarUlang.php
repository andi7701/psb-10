<?php

namespace App\Http\Livewire;

use App\Models\Pembayaran;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class SudahDaftarUlang extends Component
{
    use WithPagination;

    public $search;
    public $jenisKelamin;
    public $gelombang;

    public function render()
    {
        return view(
            'livewire.sudah-daftar-ulang',
            [
                'listUser' => Pembayaran::with([
                    'user',
                    'biodata'
                ])
                    ->whereHas('biodata', fn ($q) => $q->whereJenisKelamin($this->jenisKelamin)
                        ->whereGelombang($this->gelombang))
                    ->when(
                        $this->search,
                        fn ($q) => $q->whereHas('user', fn ($q) => $q->where('name', 'like', '%' . $this->search . '%'))
                    )
                    ->orderByDesc('tanggal')
                    ->paginate(5),
                'total' => Pembayaran::whereHas('biodatas', fn ($q) => $q->whereJenisKelamin($this->jenisKelamin)
                    ->whereGelombang($this->gelombang))
                    ->get()->sum('jumlah'),
                'infaq' => Pembayaran::whereHas('biodatas', fn ($q) => $q->whereJenisKelamin($this->jenisKelamin)
                    ->whereGelombang($this->gelombang))
                    ->get()->sum('infaq'),
                'adm_psb' => Pembayaran::whereHas('biodatas', fn ($q) => $q->whereJenisKelamin($this->jenisKelamin)
                    ->whereGelombang($this->gelombang))
                    ->get()->sum('adm_psb'),
            ]
        );
    }
}
