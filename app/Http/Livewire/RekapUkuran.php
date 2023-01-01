<?php

namespace App\Http\Livewire;

use App\Models\Seragam;
use App\Models\User;
use Livewire\Component;

class RekapUkuran extends Component
{

    public $siswaPutra;
    public $siswaPutri;

    public $batikPutra;
    public $osisPutra;
    public $pramukaPutra;
    
    public $batikPutri;
    public $osisPutri;
    public $pramukaPutri;

    public function render()
    {
        return view('livewire.rekap-ukuran');
    }

    public function mount()
    {
        $this->siswaPutra = User::with(['biodatas'])
            ->whereDiterima(true)
            ->whereHas('biodatas', fn ($q) => $q->whereJenisKelamin('L'))
            ->count();

        $this->siswaPutri = User::with(['biodatas'])
            ->whereDiterima(true)
            ->whereHas('biodatas', fn ($q) => $q->whereJenisKelamin('P'))
            ->count();

        //Putra Osis
        $this->osisPutra = Seragam::with(['biodata', 'siswa'])
            ->whereHas(
                'biodata',
                fn ($q) => $q->whereJenisKelamin('L')
            )
            ->whereHas(
                'siswa',
                fn ($q) => $q->whereDiterima(true)
            )
            ->groupBy('baju_osis')
            ->selectRaw('baju_osis, count(baju_osis) as hitung')
            ->orderByRaw("field(baju_osis,'s','m','l','xl','xxl','jumbo')")
            ->get();


        //Putra Batik
        $this->batikPutra = Seragam::with(['biodata', 'siswa'])
            ->whereHas(
                'biodata',
                fn ($q) => $q->whereJenisKelamin('L')
            )
            ->whereHas(
                'siswa',
                fn ($q) => $q->whereDiterima(true)
            )
            ->groupBy('baju_batik')
            ->selectRaw('baju_batik, count(baju_batik) as hitung')
            ->orderByRaw("field(baju_batik,'s','m','l','xl','xxl','jumbo')")
            ->get();
        //Putra Pramuka
        $this->pramukaPutra = Seragam::with(['biodata', 'siswa'])
            ->whereHas(
                'biodata',
                fn ($q) => $q->whereJenisKelamin('L')
            )
            ->whereHas(
                'siswa',
                fn ($q) => $q->whereDiterima(true)
            )
            ->groupBy('baju_pramuka')
            ->selectRaw('baju_pramuka, count(baju_pramuka) as hitung')
            ->orderByRaw("field(baju_pramuka,'s','m','l','xl','xxl','jumbo')")
            ->get();

        //Putri Osis
        $this->osisPutri = Seragam::with(['biodata', 'siswa'])
            ->whereHas(
                'biodata',
                fn ($q) => $q->whereJenisKelamin('P')
            )
            ->whereHas(
                'siswa',
                fn ($q) => $q->whereDiterima(true)
            )
            ->groupBy('baju_osis')
            ->selectRaw('baju_osis, count(baju_osis) as hitung')
            ->orderByRaw("field(baju_osis,'s','m','l','xl','xxl','jumbo')")
            ->get();


        //Putri Batik
        $this->batikPutri = Seragam::with(['biodata', 'siswa'])
            ->whereHas(
                'biodata',
                fn ($q) => $q->whereJenisKelamin('P')
            )
            ->whereHas(
                'siswa',
                fn ($q) => $q->whereDiterima(true)
            )
            ->groupBy('baju_batik')
            ->selectRaw('baju_batik, count(baju_batik) as hitung')
            ->orderByRaw("field(baju_batik,'s','m','l','xl','xxl','jumbo')")
            ->get();
        //Putri Pramuka
        $this->pramukaPutri = Seragam::with(['biodata', 'siswa'])
            ->whereHas(
                'biodata',
                fn ($q) => $q->whereJenisKelamin('P')
            )
            ->whereHas(
                'siswa',
                fn ($q) => $q->whereDiterima(true)
            )
            ->groupBy('baju_pramuka')
            ->selectRaw('baju_pramuka, count(baju_pramuka) as hitung')
            ->orderByRaw("field(baju_pramuka,'s','m','l','xl','xxl','jumbo')")
            ->get();

        }
}
