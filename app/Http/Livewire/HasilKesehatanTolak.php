<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class HasilKesehatanTolak extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        return view('livewire.hasil-kesehatan-tolak', [
            'listUser' =>  User::with([
                'kesehatan',
                'kesehatan.user'
            ])
                ->whereHas('kesehatan', fn ($q) => $q->whereNilai(0))
                ->when($this->search, fn ($q) => $q->where('name', 'like', '%' . $this->search . '%'))
                ->paginate(10)
        ]);
    }

}
