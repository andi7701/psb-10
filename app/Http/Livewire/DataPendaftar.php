<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class DataPendaftar extends Component
{
    use Actions;
    use WithPagination;

    public $search = '';
    public $isOnline = 0;

    public function render()
    {
        return view(
            'livewire.data-pendaftar',
            [
                'listUser' => User::role('Calon Siswa')
                    ->with([
                        'panitia',
                        'alamat',
                        'alamat.village',
                        'alamat.province',
                        'alamat.city',
                        'alamat.district',
                        'biodata',
                        'sekolahSd',
                        'sekolahAsal',
                        'orangTua'
                    ])
                    ->when(
                        $this->search,
                        fn (Builder $query) => $query
                            ->where('name', 'like', "%{$this->search}%")
                            ->orWhere('kode_daftar', 'like', "%{$this->search}%")
                            ->orWhereHas(
                                'alamat.district',
                                fn ($q) => $q
                                    ->where('name', 'like', "%{$this->search}%")
                            )
                            ->orWhereHas(
                                'orangTua',
                                fn ($q) => $q
                                    ->where('nama_ayah', 'like', "%{$this->search}%")
                            )
                            ->orWhereHas(
                                'sekolahSd',
                                fn ($q) => $q
                                    ->where('nama', 'like', "%{$this->search}%")
                            )
                    )
                    ->when($this->isOnline, fn ($q) => $q->whereIsOnline($this->isOnline))
                    ->orderByDesc('tanggal_daftar')
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
