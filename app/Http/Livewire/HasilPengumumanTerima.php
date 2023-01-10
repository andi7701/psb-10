<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class HasilPengumumanTerima extends Component
{
    use WithPagination;
    
    public $search;

    public function render()
    {
        return view('livewire.hasil-pengumuman-terima', [
            'listUser' =>  User::with(['panitiaPengumuman', 'sekolahSd'])
                ->whereDiterima('diterima')
                ->when($this->search, fn ($q) => $q->where('name', 'like', '%' . $this->search . '%'))
                ->paginate(10)
        ]);
    }
}
