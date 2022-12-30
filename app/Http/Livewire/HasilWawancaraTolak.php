<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class HasilWawancaraTolak extends Component
{
    public $search;

    public function render()
    {
        return view('livewire.hasil-wawancara-tolak', [
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
