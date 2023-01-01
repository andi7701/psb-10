<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;
use Illuminate\Contracts\Database\Eloquent\Builder;

class Landing extends Component
{
    use Actions;
    use WithPagination;

    public $search = '';
    public $page = 1;
    protected $queryString = [

        'search' => ['except' => ''],

        'page' => ['except' => 1],

    ];
    public function render()
    {
        return view(
            'livewire.landing',
            [
                'listUser' => User::role('Calon Siswa')
                    ->when(
                        $this->search,
                        fn (Builder $query) => $query
                            ->where('name', 'like', "%{$this->search}%")
                    )
                    // ->where('name', 'like', '%' . $this->search . '%')
                    ->with(['alamat', 'alamat.village', 'alamat.district', 'sekolahSd'])
                    ->orderBy('name')
                    ->paginate(5)
            ]
        )->layout('layouts.guest');
    }

    public function updatingSearch()
    {

        $this->resetPage();
    }
}
