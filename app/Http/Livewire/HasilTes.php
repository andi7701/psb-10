<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class HasilTes extends Component
{
    use Actions;
    use WithPagination;

    public $search;
    public $gayaBelajar;

    public function render()
    {
        return view('livewire.hasil-tes', [
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
                ->whereDoesntHave('akademik')
                ->when($this->search, fn ($q) => $q->where('name', 'like', '%' . $this->search . '%'))
                ->where('kode_daftar', '!=', null)
                ->whereBolehTest(true)
                ->whereSudahTest(true)
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

    public function confirmTolak($id): void
    {
        $this->dialog()->confirm([

            'title'       => 'Tidak Diterima',
            'description' => 'Apakah Siswa Tidak Diterima ?',
            'acceptLabel' => 'Ya',
            'rejectLabel' => 'Batal',
            'method'      => 'simpanTolak',
            'params'      => $id,

        ]);
    }

    public function simpanTerima($id)
    {
        $user = User::with([
            'answers',
            'jawabGaya'
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
            ->find($id);

        if ($user->a > $user->b && $user->a > $user->c) {
            $this->gayaBelajar = 1;
        } elseif ($user->b > $user->a && $user->b > $user->c) {
            $this->gayaBelajar = 2;
        } elseif ($user->b == $user->c) {
            $this->gayaBelajar = 4;
        } elseif ($user->a == $user->b) {
            $this->gayaBelajar = 5;
        } else {
            $this->gayaBelajar = 3;
        }

        $user->akademik()->create([
            'panitia_id' => auth()->user()->id,
            'benar' => $user->benar,
            'salah' => $user->salah,
            'total' => ($user->benar * 5),
            'gaya_belajar' => $this->gayaBelajar,
            'nilai' => 1
        ]);
    }

    public function simpanTolak($id)
    {
        $user = User::with([
            'answers',
            'jawabGaya'
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
            ->find($id);

        if ($user->a > $user->b && $user->a > $user->c) {
            $this->gayaBelajar = 1;
        } elseif ($user->b > $user->a && $user->b > $user->c) {
            $this->gayaBelajar = 2;
        } elseif ($user->b == $user->c) {
            $this->gayaBelajar = 4;
        } else {
            $this->gayaBelajar = 3;
        }

        $user->akademik()->create([
            'panitia_id' => auth()->user()->id,
            'benar' => $user->benar,
            'salah' => $user->salah,
            'total' => ($user->benar * 5),
            'gaya_belajar' => $this->gayaBelajar,
            'nilai' => 0
        ]);
    }
}
