<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class HasilTesGlobal extends Component
{
    use WithPagination;
    
    public $search;

    public function render()
    {
        return view('livewire.hasil-tes-global', [
            'listUser' =>  User::with([
                'answers',
                'jawabGaya',
                'akademik',
                'agama',
                'kesehatan',
                'minatBakat',
                'wawancara',
                'sekolahSd',
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
                ->paginate(5)
        ]);
    }
}
