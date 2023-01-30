<?php

namespace App\Http\Livewire;

use App\Models\Agama;
use App\Models\Akademik;
use App\Models\Kesehatan;
use App\Models\MinatBakat;
use App\Models\OrangTua;
use App\Models\User;
use App\Models\Wawancara;
use Livewire\Component;

class RekapPerSeleksi extends Component
{
    public $agamaNilaiQuran;
    public $agamaPegon;
    public $agamaTulisan;
    public $akademikBaik;
    public $akademikSedang;
    public $akademikKurang;
    public $kesehatan;
    public $minatBakat;
    public $penghasilanKurang;
    public $penghasilanSedang;
    public $penghasilanTinggi;
    public $wawancara;

    public $minatBakatRank = [];
    public $minatBakatNonAkademik;

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

        $this->akademikKurang = Akademik::with(['siswa'])
            ->whereHas('siswa', fn ($q) => $q->whereDiterima('diterima'))
            ->where('total', '<', 51)
            ->count();

        $this->akademikSedang = Akademik::with(['siswa'])
            ->whereHas('siswa', fn ($q) => $q->whereDiterima('diterima'))
            ->whereBetween('total', [51, 75])
            ->count();

        $this->akademikBaik = Akademik::with(['siswa'])
            ->whereHas('siswa', fn ($q) => $q->whereDiterima('diterima'))
            ->where('total', '>', 80)
            ->count();

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

        $this->minatBakatNonAkademik = MinatBakat::with(['siswa'])
            ->whereHas('siswa', fn ($q) => $q->whereDiterima('diterima'))
            ->groupBy('non_akademik')
            ->selectRaw('non_akademik, count(non_akademik) as hitung')
            ->get();

        $this->minatBakatRank = MinatBakat::with(['siswa'])
            ->where('smt_1', '1')
            ->where('smt_2', '1')
            ->where('smt_3', '1')
            ->where('smt_4', '1')
            ->where('smt_5', '1')
            ->where('smt_6', '1')
            ->where('smt_7', '1')
            ->where('smt_8', '1')
            ->where('smt_9', '1')
            ->where('smt_10', '1')
            ->where('smt_11', '1')
            ->whereHas('siswa', fn ($q) => $q->whereDiterima('diterima'))
            ->get();

        $this->penghasilanKurang = OrangTua::with(['siswa'])
            ->whereHas('siswa', fn ($q) => $q->whereDiterima('diterima'))
            ->where('penghasilan', '<', 2000000)
            ->count();
        $this->penghasilanSedang = OrangTua::with(['siswa'])
            ->whereHas('siswa', fn ($q) => $q->whereDiterima('diterima'))
            ->whereBetween('penghasilan', [2000000, 4000000])
            ->count();

        $this->penghasilanTinggi = OrangTua::with(['siswa'])
            ->whereHas('siswa', fn ($q) => $q->whereDiterima('diterima'))
            ->where('penghasilan', '>', 4000000)
            ->count();

        $this->wawancara = MinatBakat::with(['siswa'])
            ->whereHas('siswa', fn ($q) => $q->whereDiterima('diterima'))
            ->groupBy('kondisi_keluarga')
            ->selectRaw('kondisi_keluarga, count(kondisi_keluarga) as hitung')
            ->get();

        return view('livewire.rekap-per-seleksi');
    }
}
