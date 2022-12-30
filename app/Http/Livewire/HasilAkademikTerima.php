<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class HasilAkademikTerima extends Component
{
    public $search;

    public function render()
    {
        return view('livewire.hasil-akademik-terima', [
            'listUser' =>  User::with([
                'akademik',
                'akademik.user'
            ])
                ->whereHas('akademik', fn ($q) => $q->whereNilai(1))
                ->when($this->search, fn ($q) => $q->where('name', 'like', '%' . $this->search . '%'))
                ->paginate(10)
        ]);
    }
}
