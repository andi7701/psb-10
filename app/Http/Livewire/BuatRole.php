<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use WireUi\Traits\Actions;

class BuatRole extends Component
{
    use Actions;

    public $name;

    public function render()
    {
        return view(
            'livewire.buat-role',
            [
                'listRole' => Role::orderBy('name')->get()
            ]
        );
    }

    public function simpan()
    {
        $validasi = $this->validate(
            [
                'name' => 'required'
            ],
            [
                'name.required' => 'Harus di isi'
            ]
        );
        Role::create($validasi);

        $this->notification()->success(
            $title = 'Berhasil Simpan',
            $description = 'Berhasil Membuat Role'
        );
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
        Role::find($id)->delete();
        $this->notification()->error(
            $title = 'Hapus Role',
            $description = 'Berhasil Hapus Data Role'
        );
    }
}
