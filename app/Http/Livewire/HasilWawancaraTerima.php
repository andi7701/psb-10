<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class HasilWawancaraTerima extends Component
{
    use WithPagination;
    
    public $search;

    public function render()
    {
        return view('livewire.hasil-wawancara-terima', [
            'listUser' =>  User::with([
                'wawancara',
                'wawancara.user',
            ])
                ->whereHas('wawancara', fn ($q) => $q->whereNilai(1))
                ->when($this->search, fn ($q) => $q->where('name', 'like', '%' . $this->search . '%'))
                ->paginate(10)
        ]);
    }
}
