<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use WireUi\Traits\Actions;

class ResetTes extends Component
{
    use Actions;
    public $search;

    public function render()
    {
        return view('livewire.reset-tes', [
            'listUser' =>  User::with([
                'answers',
                'jawabGaya',
                'akademik'
            ])
                ->withCount([
                    'answers as benar' => fn ($q)
                    => $q->whereIsCorrect(true),
                    'answers as salah' => fn ($q)
                    => $q->whereIsCorrect(false),
                    'jawabGaya as a' => fn ($q)
                    => $q->whereAnswer(0),
                    'jawabGaya as b' => fn ($q)
                    => $q->whereAnswer(1),
                    'jawabGaya as c' => fn ($q)
                    => $q->whereAnswer(2),
                ])
                ->when($this->search, fn ($q) => $q->where('name', 'like', '%' . $this->search . '%'))
                ->where('kode_daftar', '!=', null)
                ->whereBolehTest(true)
                ->whereSudahTest(true)
                ->paginate(10)
        ]);
    }

    public function confirmReset($id): void
    {
        $this->dialog()->confirm([

            'title'       => 'Reset Tes',
            'description' => 'Apakah Siswa Direset ?',
            'acceptLabel' => 'Ya',
            'rejectLabel' => 'Batal',
            'method'      => 'resetTest',
            'params'      => $id,

        ]);
    }

    public function resetTest($id)
    {
        $user = User::find($id);

        $user->sudah_gaya = 0;
        $user->sudah_test = 0;

        $user->save();
        $this->notification()->success(
            $title = 'Berhasil Reset',
            $description = 'Berhasil Reset'
        );

    }

}
