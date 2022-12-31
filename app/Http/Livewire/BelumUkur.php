<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class BelumUkur extends Component
{
    public $search;

    public function render()
    {
        return view(
            'livewire.belum-ukur',
            [
                'listUser' => User::with(['sekolahSd', 'sekolahAsal'])
                    ->whereKodeDaftar('!=', null)
                    ->whereTerukur(false)
                    ->when($this->search, fn ($q) => $q->where('name', 'like', '%' . $this->search . '%'))
                    ->paginate(10)
            ]
        );
    }
}
