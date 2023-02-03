<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class HasilAgamaTolak extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        return view('livewire.hasil-agama-tolak', [
            'listUser' =>  User::with([
                'agama',
                'agama.user'
            ])
                ->whereHas('agama', fn ($q) => $q->whereNilai(0))
                ->when($this->search, fn ($q) => $q->where('name', 'like', '%' . $this->search . '%'))
                ->paginate(10)
        ]);
    }
}
