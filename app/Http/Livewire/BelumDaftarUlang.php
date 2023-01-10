<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class BelumDaftarUlang extends Component
{
    use WithPagination;
    
    public $search;
    public $jenisKelamin;
    public $gelombang;

    public function render()
    {
        return view(
            'livewire.belum-daftar-ulang',
            [
                'listUser' =>  User::with([
                    'biodata',
                    'sekolahSd'
                ])
                    ->whereDiterima('diterima')
                    ->whereDoesntHave('pembayaran')
                    ->whereHas('biodata', fn ($q) => $q->whereJenisKelamin($this->jenisKelamin)
                        ->whereGelombang($this->gelombang))
                    ->when($this->search, fn ($q) => $q->where('name', 'like', '%' . $this->search . '%'))
                    ->orderBy('kode_daftar')
                    ->paginate(5),
            ]
        );
    }
}
