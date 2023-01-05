<?php

namespace App\Http\Livewire;

use App\Models\Pembayaran;
use App\Models\User;
use Livewire\Component;

class SudahDaftarUlang extends Component
{
    public $search;

    public function render()
    {
        return view(
            'livewire.sudah-daftar-ulang',
            [
                'listUser' =>  User::with([
                    'biodata',
                    'pembayaran',
                    'sekolahSd'
                ])
                    ->whereHas('pembayaran')
                    ->when($this->search, fn ($q) => $q->where('name', 'like', '%' . $this->search . '%'))
                    ->paginate(10),
                'total' => Pembayaran::get()->sum('jumlah'),
                'infaq' => Pembayaran::get()->sum('infaq'),
                'adm_psb' => Pembayaran::get()->sum('adm_psb'),
            ]
        );
    }
}
