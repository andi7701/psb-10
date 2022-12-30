<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class HasilDitolak extends Component
{
    public $search;

    public function render()
    {
        return view('livewire.hasil-ditolak', [
            'listUser' =>  User::with('akademik')
                ->when($this->search, fn ($q) => $q->where('name', 'like', '%' . $this->search . '%'))
                ->whereDiterima(false)
                ->paginate(10)
        ]);
    }
}
