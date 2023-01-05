<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class BelumDaftarUlang extends Component
{
    public $search;

    public function render()
    {
        return view(
            'livewire.belum-daftar-ulang',
            [
                'listUser' =>  User::with([
                    'biodata',
                    'sekolahSd'
                ])
                    ->whereDiterima(true)
                    ->whereDoesntHave('pembayaran')
                    ->when($this->search, fn ($q) => $q->where('name', 'like', '%' . $this->search . '%'))
                    ->paginate(10),
            ]
        );
    }
}
