<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class Landing extends Component
{
    use Actions;
    use WithPagination;

    public $search = '';

    public function render()
    {
        return view(
            'livewire.landing',
            [
                'listUser' => User::role('Calon Siswa')
                    ->where('name', 'like', '%' . $this->search . '%')
                    ->with(['alamat', 'alamat.village', 'alamat.district', 'sekolahSd'])
                    ->orderBy('name')
                    ->paginate(10)
            ]
        )->layout('layouts.guest');
    }
}
