<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Rekapitulasi extends Component
{
    public $baruPutra;
    public $baruPutri;
    public $pindahanPutra;
    public $pindahanPutri;

    public $baruPutraTerima;
    public $baruPutraTolak;
    public $pindahanPutraTerima;
    public $pindahanPutraTolak;

    public $baruPutriTerima;
    public $baruPutriTolak;
    public $pindahanPutriTerima;
    public $pindahanPutriTolak;

    public function render()
    {
        $this->hitung_data();
        return view('livewire.rekapitulasi');
    }

    public function mount()
    {
        $this->hitung_data();
    }
    public function hitung_data()
    {
        $this->baruPutra = User::with(['biodata'])
            ->where('kode_daftar', 'like', 'A%')
            ->whereHas('biodata', fn ($q) => $q->whereJenisKelamin('L')
                ->whereGelombang(1))
            ->count();
        $this->pindahanPutra = User::with(['biodata'])
            ->where('kode_daftar', 'like', 'C%')
            ->whereHas('biodata', fn ($q) => $q->whereJenisKelamin('L')
                ->whereGelombang(1))
            ->count();

        $this->baruPutri = User::with(['biodata'])
            ->where('kode_daftar', 'like', 'B%')
            ->whereHas('biodata', fn ($q) => $q->whereJenisKelamin('P')
                ->whereGelombang(1))
            ->count();
        $this->pindahanPutri = User::with(['biodata'])
            ->where('kode_daftar', 'like', 'D%')
            ->whereHas('biodata', fn ($q) => $q->whereJenisKelamin('P')
                ->whereGelombang(1))
            ->count();

        $this->baruPutraTerima = User::with(['biodata'])
            ->where('kode_daftar', 'like', 'A%')
            ->whereDiterima(true)
            ->whereHas('biodata', fn ($q) => $q->whereJenisKelamin('L')
                ->whereGelombang(1))
            ->count();
        $this->pindahanPutraTerima = User::with(['biodata'])
            ->where('kode_daftar', 'like', 'C%')
            ->whereDiterima(true)
            ->whereHas('biodata', fn ($q) => $q->whereJenisKelamin('L')
                ->whereGelombang(1))
            ->count();

        $this->baruPutriTerima = User::with(['biodata'])
            ->where('kode_daftar', 'like', 'B%')
            ->whereDiterima(true)
            ->whereHas('biodata', fn ($q) => $q->whereJenisKelamin('P')
                ->whereGelombang(1))
            ->count();
        $this->pindahanPutriTerima = User::with(['biodata'])
            ->where('kode_daftar', 'like', 'D%')
            ->whereDiterima(true)
            ->whereHas('biodata', fn ($q) => $q->whereJenisKelamin('P')
                ->whereGelombang(1))
            ->count();

        $this->baruPutraTolak = User::with(['biodata'])
            ->where('kode_daftar', 'like', 'A%')
            ->whereDiterima(false)
            ->whereHas('biodata', fn ($q) => $q->whereJenisKelamin('L')
                ->whereGelombang(1))
            ->count();
        $this->pindahanPutraTolak = User::with(['biodata'])
            ->where('kode_daftar', 'like', 'C%')
            ->whereDiterima(false)
            ->whereHas('biodata', fn ($q) => $q->whereJenisKelamin('L')
                ->whereGelombang(1))
            ->count();

        $this->baruPutriTolak = User::with(['biodata'])
            ->where('kode_daftar', 'like', 'B%')
            ->whereDiterima(false)
            ->whereHas('biodata', fn ($q) => $q->whereJenisKelamin('P')
                ->whereGelombang(1))
            ->count();
        $this->pindahanPutriTolak = User::with(['biodata'])
            ->where('kode_daftar', 'like', 'D%')
            ->whereDiterima(false)
            ->whereHas('biodata', fn ($q) => $q->whereJenisKelamin('P')
                ->whereGelombang(1))
            ->count();
    }
}
