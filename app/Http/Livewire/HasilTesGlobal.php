<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class HasilTesGlobal extends Component
{
    use WithPagination;

    public $search;
    public $diterima;
    public $gelombang;
    public $sudahTest;
    public function render()
    {
        if ($this->sudahTest == 0) {
            $listUser = User::with([
                'akademik',
                'agama',
                'alamat',
                'alamat.district',
                'answers',
                'biodata',
                'jawabGaya',
                'kesehatan',
                'minatBakat',
                'sekolahSd',
                'orangTua',
                'wawancara',
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
                ->where('kode_daftar', '!=', null)
                ->where(
                    fn ($q) => $q->whereDoesntHave('akademik')
                        ->orWhereDoesntHave('agama')
                        ->orWhereDoesntHave('kesehatan')
                        ->orWhereDoesntHave('minatBakat')
                        ->orWhereDoesntHave('wawancara')
                )
                ->when($this->diterima, fn ($q) => $q->whereDiterima($this->diterima))
                ->when($this->gelombang, fn ($q) => $q->whereHas('biodata', fn ($q) => $q->whereGelombang($this->gelombang)))
                ->when($this->search, fn ($q) => $q->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('kode_daftar', 'like', '%' . $this->search . '%')
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
                    ))
                ->orderBy('kode_daftar')
                ->orderBy('name')
                ->paginate(2);
        } elseif ($this->sudahTest == 1) {
            $listUser =  User::with([
                'akademik',
                'agama',
                'alamat',
                'alamat.district',
                'answers',
                'biodata',
                'jawabGaya',
                'kesehatan',
                'minatBakat',
                'sekolahSd',
                'orangTua',
                'wawancara',
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
                ->where('kode_daftar', '!=', null)
                ->whereHas('agama')
                ->whereHas('akademik')
                ->whereHas('kesehatan')
                ->whereHas('minatBakat')
                ->whereHas('wawancara')
                ->when($this->diterima, fn ($q) => $q->whereDiterima($this->diterima))
                ->when($this->gelombang, fn ($q) => $q->whereHas('biodata', fn ($q) => $q->whereGelombang($this->gelombang)))
                ->when($this->search, fn ($q) => $q->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('kode_daftar', 'like', '%' . $this->search . '%')
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
                    ))
                ->orderBy('kode_daftar')
                ->orderBy('name')
                ->paginate(2);
        } else {
            $listUser = User::with([
                'akademik',
                'agama',
                'alamat',
                'alamat.district',
                'answers',
                'biodata',
                'jawabGaya',
                'kesehatan',
                'minatBakat',
                'sekolahSd',
                'orangTua',
                'wawancara',
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
                ->where('kode_daftar', '!=', null)
                ->when($this->diterima, fn ($q) => $q->whereDiterima($this->diterima))
                ->when($this->gelombang, fn ($q) => $q->whereHas('biodata', fn ($q) => $q->whereGelombang($this->gelombang)))
                ->when($this->search, fn ($q) => $q->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('kode_daftar', 'like', '%' . $this->search . '%')
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
                    ))
                ->orderBy('kode_daftar')
                ->orderBy('name')
                ->paginate(2);
        }
        return view('livewire.hasil-tes-global', [
            'listUser' =>  $listUser
        ]);
    }
}
