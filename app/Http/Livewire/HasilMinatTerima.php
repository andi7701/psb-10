<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class HasilMinatTerima extends Component
{
    public $search;

    public function render()
    {
        return view('livewire.hasil-minat-terima', [
            'listUser' =>  User::with([
                'minatBakat',
                'minatBakat.user',
                'minatBakat.ekstra'
            ])
                ->whereHas('minatBakat', fn ($q) => $q->whereNilai(1))
                ->when($this->search, fn ($q) => $q->where('name', 'like', '%' . $this->search . '%'))
                ->paginate(10)
        ]);
    }
}
