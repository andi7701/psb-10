<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class SudahUkur extends Component
{

    use WithPagination;
    
    public $search;

    public function render()
    {
        return view(
            'livewire.sudah-ukur',
            [
                'listUser' => User::with(['seragam'])
                    ->whereTerukur(true)
                    ->when($this->search, fn ($q) => $q->where('name', 'like', '%' . $this->search . '%'))
                    ->paginate(10)
            ]
        );
    }
}
