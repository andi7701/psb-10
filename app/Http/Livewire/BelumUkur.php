<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class BelumUkur extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        return view(
            'livewire.belum-ukur',
            [
                'listUser' => User::with(['sekolahSd', 'sekolahAsal'])
                    ->whereDiterima(true)
                    ->whereTerukur(false)
                    ->when($this->search, fn ($q) => $q->where('name', 'like', '%' . $this->search . '%'))
                    ->paginate(10)
            ]
        );
    }
}
