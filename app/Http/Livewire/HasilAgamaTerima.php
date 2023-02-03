<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class HasilAgamaTerima extends Component
{
    use WithPagination;

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
                ->orderByDesc('created_at')
                ->paginate(10)

        ]);
    }

}
