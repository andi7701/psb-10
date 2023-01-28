<?php

namespace App\Http\Livewire;

use App\Models\Agama;
use App\Models\Akademik;
use App\Models\Kesehatan;
use App\Models\MinatBakat;
use App\Models\OrangTua;
use Livewire\Component;

class RekapPerSeleksi extends Component
{
    public $agamaNilaiQuran;
    public $agamaPegon;
    public $agamaTulisan;
    public $akademik;
    public $kesehatan;
    public $minatBakat;
    public $penghasilan;
    public $wawancara;

    public function render()
    {
        $this->agamaNilaiQuran = Agama::with('siswa')
            ->whereHas('siswa', fn ($q) => $q->whereDiterima('diterima'))
            ->groupBy('nilai_quran')
            ->selectRaw('nilai_quran, count(nilai_quran) as hitung')
            ->get();

        $this->agamaPegon = Agama::with('siswa')
            ->whereHas('siswa', fn ($q) => $q->whereDiterima('diterima'))
            ->groupBy('pegon')
            ->selectRaw('pegon, count(pegon) as hitung')
            ->get();

        $this->agamaTulisan = Agama::with('siswa')
            ->whereHas('siswa', fn ($q) => $q->whereDiterima('diterima'))
            ->groupBy('tulisan')
            ->selectRaw('tulisan, count(tulisan) as hitung')
            ->get();

        $this->akademik = Akademik::with(['siswa'])
            ->whereHas('siswa', fn ($q) => $q->whereDiterima('diterima'))
            ->groupBy('total')
            ->selectRaw('total, count(total) as hitung')
            ->get();

        $this->kesehatan = Kesehatan::with(['siswa'])
            ->whereHas('siswa', fn ($q) => $q->whereDiterima('diterima'))
            ->groupBy('sehat')
            ->selectRaw('sehat, count(sehat) as hitung')
            ->get();

        $this->minatBakat = MinatBakat::with(['siswa', 'ekstra'])
            ->whereHas('siswa', fn ($q) => $q->whereDiterima('diterima'))
            ->groupBy('ekstra_id')
            ->selectRaw('ekstra_id, count(ekstra_id) as hitung')
            ->get();

        $this->penghasilan = OrangTua::with(['siswa'])
            ->whereHas('siswa', fn ($q) => $q->whereDiterima('diterima'))
            ->groupBy('penghasilan')
            ->selectRaw('penghasilan, count(penghasilan) as hitung')
            ->get();

        // $this->wawancara = Kesehatan::with(['siswa'])
        // ->whereHas('siswa', fn ($q) => $q->whereDiterima('diterima'))
        // ->groupBy('sehat')
        // ->selectRaw('sehat, count(sehat) as hitung')
        // ->get();

        return view('livewire.rekap-per-seleksi');
    }
}
