<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class HasilDiterima extends Component
{
    
    public $search;

    public function render()
    {
        return view('livewire.hasil-diterima', [
            'listUser' =>  User::with('akademik')
                ->when($this->search, fn ($q) => $q->where('name', 'like', '%' . $this->search . '%'))
                ->whereDiterima(true)
                ->paginate(10)
        ]);
    }
}
