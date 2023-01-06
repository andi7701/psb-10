<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Traits\GetData;
use Livewire\Component;
use WireUi\Traits\Actions;

class RekapTes extends Component
{
    use Actions;
    use GetData;

    public $search;

    public function render()
    {
        return view('livewire.rekap-tes', [
            'listUser' =>  User::when($this->search, fn ($q) => $q->where('name', 'like', '%' . $this->search . '%'))
                ->where('kode_daftar', '!=', null)
                ->take(10)
                ->get()
        ]);
    }
}
