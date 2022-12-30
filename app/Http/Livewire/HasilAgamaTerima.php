<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class HasilAgamaTerima extends Component
{
    public $search;

    public function render()
    {
        return view('livewire.hasil-agama-terima', [
            'listUser' =>  User::with([
                'agama',
                'agama.user'
            ])
                ->whereHas('agama', fn ($q) => $q->whereNilai(1))
                ->when($this->search, fn ($q) => $q->where('name', 'like', '%' . $this->search . '%'))
                ->paginate(10)
        ]);
    }
}
