<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Traits\GetData;
use Livewire\Component;
use WireUi\Traits\Actions;

class AturTes extends Component
{
    use GetData;
    use Actions;

    public $search;

    public function render()
    {
        return view('livewire.atur-tes', [
            'listUser' =>  User::with([
                'sekolahSd',
                'sekolahAsal'
            ])
                // ->whereHas('biodata', fn($q) => $q->whereTahun($this->tahun))
                ->when($this->search, fn ($q) => $q->where('name', 'like', '%' . $this->search . '%'))
                ->where('kode_daftar', '!=', null)
                ->whereBolehTest(false)
                ->whereSudahTest(false)
                ->take(10)
                ->get()
        ]);
    }


    public function confirm($id): void
    {
        $this->dialog()->confirm([

            'title'       => 'Izinkan Siswa',
            'description' => 'Izinkan Siswa Test ?',
            'acceptLabel' => 'Ya',
            'rejectLabel' => 'Batal',
            'method'      => 'simpan',
            'params'      => $id,

        ]);
    }

    public function simpan($id)
    {
        $user = User::find($id);

        $user->update([
            'boleh_test' => 1
        ]);

        $this->notification()->success(
            $title = 'Berhasil',
            $description = 'Berhasil Izinkan Siswa Test'
        );
    }
}
