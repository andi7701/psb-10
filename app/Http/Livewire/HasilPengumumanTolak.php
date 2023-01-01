<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class HasilPengumumanTolak extends Component
{
    use WithPagination;
    
    public $search;

    public function render()
    {
        return view('livewire.hasil-pengumuman-tolak', [
            'listUser' =>  User::with(['panitiaPengumuman', 'sekolahSd'])
                ->whereDiterima(false)
                ->when($this->search, fn ($q) => $q->where('name', 'like', '%' . $this->search . '%'))
                ->paginate(10)
        ]);
    }
}
