<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithPagination;

class RekapHasilAkademik extends Component
{
    use Actions;
    use WithPagination;

    public $search;

    public function render()
    {
        return view('livewire.rekap-hasil-akademik', [
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
                ->orderBy('name')
                ->paginate(10)
        ]);
    }
}
