<?php

namespace App\Http\Livewire;

use App\Models\Akademik;
use Livewire\Component;

class RekapPerSeleksi extends Component
{
    public $akademik;

    public function render()
    {
        $this->akademik = Akademik::with(['siswa'])
            ->whereHas('siswa', fn ($q) => $q->whereDiterima('diterima'))
            ->groupBy('total')
            ->selectRaw('total, count(total) as hitung')
            ->get();
        return view('livewire.rekap-per-seleksi');
    }
}
