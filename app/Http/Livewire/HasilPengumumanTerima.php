<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class HasilPengumumanTerima extends Component
{
    public $search;

    public function render()
    {
        return view('livewire.hasil-pengumuman-terima', [
            'listUser' =>  User::with(['panitiaPengumuman', 'sekolahSd'])
                ->whereDiterima(true)
                ->when($this->search, fn ($q) => $q->where('name', 'like', '%' . $this->search . '%'))
                ->paginate(10)
        ]);
    }
}
