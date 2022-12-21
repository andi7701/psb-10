<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use WireUi\Traits\Actions;

class Landing extends Component
{
    use Actions;

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
                    ->get()
            ]
        )->layout('layouts.guest');
    }
}
