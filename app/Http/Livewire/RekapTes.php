<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Traits\GetData;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class RekapTes extends Component
{
    use Actions;
    use GetData;
    use WithPagination;

    public $search;

    public function render()
    {
        return view('livewire.rekap-tes', [
            'listUser' =>  User::with('akademik')
            ->when($this->search, fn ($q) => $q->where('name', 'like', '%' . $this->search . '%'))
                ->where('kode_daftar', '!=', null)
                ->paginate(10)
        ]);
    }
}
