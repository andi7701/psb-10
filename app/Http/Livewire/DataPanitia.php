<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;


class DataPanitia extends Component
{
    use Actions;
    use WithPagination;

    public $name;
    public $username;

    public $search = '';

    protected $rules = 
    [
        'name' => 'required',
        'username' => 'required|unique:users'
    ];

    public function render()
    {
        return view(
            'livewire.data-panitia',
            [
                'listUser' => User::role('Admin')
                    ->where('name', 'like', '%' . $this->search . '%')
                    ->orderBy('name')
                    ->paginate(5)
            ]
        );
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function simpan()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'username' => $this->username,
            'password' => bcrypt('12345678')
        ]);

        $user->assignRole('Admin');
        
        $this->notification()->success(
            $title = 'Berhasil !',
            $description = 'Berhasil Menambah Panitia'
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
        User::find($id)->delete();
        $this->notification()->error(
            $title = 'Hapus Calon Siswa',
            $description = 'Berhasil Hapus Data Calon Siswa'
        );
    }

    
}
