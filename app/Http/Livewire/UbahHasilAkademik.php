<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class UbahHasilAkademik extends Component
{

    use WithPagination;
    use Actions;
    
    public $search;

    public function render()
    {
        return view('livewire.ubah-hasil-akademik', [
            'listUser' =>  User::with([
                'akademik',
                'akademik.user'
            ])
                ->whereHas('akademik', fn ($q) => $q->whereNilai(0))
                ->when($this->search, fn ($q) => $q->where('name', 'like', '%' . $this->search . '%'))
                ->paginate(10)
        ]);
    }

    public function confirmTerima($id): void
    {
        $this->dialog()->confirm([

            'title'       => 'Terima Siswa',
            'description' => 'Apakah Siswa Akan Diterima ?',
            'acceptLabel' => 'Ya',
            'rejectLabel' => 'Batal',
            'method'      => 'simpanTerima',
            'params'      => $id,

        ]);
    }

    public function simpanTerima($id)
    {
        $user = User::find($id);

        $user->akademik()->updateOrCreate(
            [],
            [
                'nilai' => 1
            ]
        );
    }
}
