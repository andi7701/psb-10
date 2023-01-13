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
    public $orPutra;

    public $batikCelanaPutra;
    public $osisCelanaPutra;
    public $pramukaCelanaPutra;
    public $orCelanaPutra;

    public $batikPutri;
    public $osisPutri;
    public $pramukaPutri;
    public $orPutri;

    public $batikRokPutri;
    public $osisRokPutri;
    public $pramukaRokPutri;
    public $orCelanaPutri;

    public $peci;

    public function render()
    {
        return view('livewire.rekap-ukuran');
    }

    public function mount()
    {
        $this->siswaPutra = User::with(['biodatas'])
            ->whereDiterima('diterima')
            ->whereHas('biodatas', fn ($q) => $q->whereJenisKelamin('L'))
            ->count();

        $this->siswaPutri = User::with(['biodatas'])
            ->whereDiterima('diterima')
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
                fn ($q) => $q->whereDiterima('diterima')
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
                fn ($q) => $q->whereDiterima('diterima')
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
                fn ($q) => $q->whereDiterima('diterima')
            )
            ->groupBy('baju_pramuka')
            ->selectRaw('baju_pramuka, count(baju_pramuka) as hitung')
            ->orderByRaw("field(baju_pramuka,'s','m','l','xl','xxl','jumbo')")
            ->get();
        //Putra or
        $this->orPutra = Seragam::with(['biodata', 'siswa'])
            ->whereHas(
                'biodata',
                fn ($q) => $q->whereJenisKelamin('L')
            )
            ->whereHas(
                'siswa',
                fn ($q) => $q->whereDiterima('diterima')
            )
            ->groupBy('baju_or')
            ->selectRaw('baju_or, count(baju_or) as hitung')
            ->orderByRaw("field(baju_or,'s','m','l','xl','xxl','jumbo')")
            ->get();

        //Celana Osis Putra
        $this->osisCelanaPutra = Seragam::with(['biodata', 'siswa'])
            ->whereHas(
                'biodata',
                fn ($q) => $q->whereJenisKelamin('L')
            )
            ->whereHas(
                'siswa',
                fn ($q) => $q->whereDiterima('diterima')
            )
            ->groupBy('bawah_osis')
            ->selectRaw('bawah_osis, count(bawah_osis) as hitung')
            ->get();
        //Celana batik Putra
        $this->batikCelanaPutra = Seragam::with(['biodata', 'siswa'])
            ->whereHas(
                'biodata',
                fn ($q) => $q->whereJenisKelamin('L')
            )
            ->whereHas(
                'siswa',
                fn ($q) => $q->whereDiterima('diterima')
            )
            ->groupBy('bawah_batik')
            ->selectRaw('bawah_batik, count(bawah_batik) as hitung')
            ->get();
        //Celana pramuka Putra
        $this->pramukaCelanaPutra = Seragam::with(['biodata', 'siswa'])
            ->whereHas(
                'biodata',
                fn ($q) => $q->whereJenisKelamin('L')
            )
            ->whereHas(
                'siswa',
                fn ($q) => $q->whereDiterima('diterima')
            )
            ->groupBy('bawah_pramuka')
            ->selectRaw('bawah_pramuka, count(bawah_pramuka) as hitung')
            ->get();
        //Celana or Putra
        $this->orCelanaPutra = Seragam::with(['biodata', 'siswa'])
            ->whereHas(
                'biodata',
                fn ($q) => $q->whereJenisKelamin('L')
            )
            ->whereHas(
                'siswa',
                fn ($q) => $q->whereDiterima('diterima')
            )
            ->groupBy('bawah_or')
            ->selectRaw('bawah_or, count(bawah_or) as hitung')
            ->get();



        //Putri Osis
        $this->osisPutri = Seragam::with(['biodata', 'siswa'])
            ->whereHas(
                'biodata',
                fn ($q) => $q->whereJenisKelamin('P')
            )
            ->whereHas(
                'siswa',
                fn ($q) => $q->whereDiterima('diterima')
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
                fn ($q) => $q->whereDiterima('diterima')
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
                fn ($q) => $q->whereDiterima('diterima')
            )
            ->groupBy('baju_pramuka')
            ->selectRaw('baju_pramuka, count(baju_pramuka) as hitung')
            ->orderByRaw("field(baju_pramuka,'s','m','l','xl','xxl','jumbo')")
            ->get();
        //Putri or
        $this->orPutri = Seragam::with(['biodata', 'siswa'])
            ->whereHas(
                'biodata',
                fn ($q) => $q->whereJenisKelamin('P')
            )
            ->whereHas(
                'siswa',
                fn ($q) => $q->whereDiterima('diterima')
            )
            ->groupBy('baju_or')
            ->selectRaw('baju_or, count(baju_or) as hitung')
            ->orderByRaw("field(baju_or,'s','m','l','xl','xxl','jumbo')")
            ->get();

        //Celana Osis Putri
        $this->osisRokPutri = Seragam::with(['biodata', 'siswa'])
            ->whereHas(
                'biodata',
                fn ($q) => $q->whereJenisKelamin('P')
            )
            ->whereHas(
                'siswa',
                fn ($q) => $q->whereDiterima('diterima')
            )
            ->groupBy('bawah_osis')
            ->selectRaw('bawah_osis, count(bawah_osis) as hitung')
            ->get();
        //Rok batik Putri
        $this->batikRokPutri = Seragam::with(['biodata', 'siswa'])
            ->whereHas(
                'biodata',
                fn ($q) => $q->whereJenisKelamin('P')
            )
            ->whereHas(
                'siswa',
                fn ($q) => $q->whereDiterima('diterima')
            )
            ->groupBy('bawah_batik')
            ->selectRaw('bawah_batik, count(bawah_batik) as hitung')
            ->get();
        //Rok pramuka Putri
        $this->pramukaRokPutri = Seragam::with(['biodata', 'siswa'])
            ->whereHas(
                'biodata',
                fn ($q) => $q->whereJenisKelamin('P')
            )
            ->whereHas(
                'siswa',
                fn ($q) => $q->whereDiterima('diterima')
            )
            ->groupBy('bawah_pramuka')
            ->selectRaw('bawah_pramuka, count(bawah_pramuka) as hitung')
            ->get();
        //Rok or Putri
        $this->orCelanaPutri = Seragam::with(['biodata', 'siswa'])
            ->whereHas(
                'biodata',
                fn ($q) => $q->whereJenisKelamin('P')
            )
            ->whereHas(
                'siswa',
                fn ($q) => $q->whereDiterima('diterima')
            )
            ->groupBy('bawah_or')
            ->selectRaw('bawah_or, count(bawah_or) as hitung')
            ->get();


        //Peci
        $this->peci = Seragam::with(['biodata', 'siswa'])
            ->whereHas(
                'biodata',
                fn ($q) => $q->whereJenisKelamin('L')
            )
            ->whereHas(
                'siswa',
                fn ($q) => $q->whereDiterima('diterima')
            )
            ->groupBy('peci')
            ->selectRaw('peci, count(peci) as hitung')
            ->get();
    }
}
