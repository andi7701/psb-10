<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class DataPendaftar extends Component
{
    use Actions;
    use WithPagination;

    public $search = '';

    public function render()
    {
        return view(
            'livewire.data-pendaftar',
            [
                'listUser' => User::role('Calon Siswa')
                    ->where('name', 'like', '%' . $this->search . '%')
                    ->with(['panitia', 'alamat', 'alamat.village', 'biodata', 'sekolahSd', 'sekolahAsal', 'orangTua'])
                    ->orderBy('name')
                    ->paginate(5)
            ]
        );
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function confirm($id): void
    {
        $this->dialog()->confirm([

            'title'       => 'Menghapus Data',
            'description' => 'Anda Yakin ?',
            'acceptLabel' => 'Hapus',
            'method'      => 'delete',
            'params'      => $id,

        ]);
    }

    public function delete($id)
    {
        User::find($id)->delete();
        $this->notification()->error(
            $title = 'Hapus Calon Siswa',
            $description = 'Berhasil Hapus Data Calon Siswa'
        );
    }
}
