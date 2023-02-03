<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Rekapitulasi extends Component
{
    public $gelombang = 1;

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
                ->whereGelombang($this->gelombang))
            ->count();
        $this->pindahanPutra = User::with(['biodata'])
            ->where('kode_daftar', 'like', 'C%')
            ->whereHas('biodata', fn ($q) => $q->whereJenisKelamin('L')
                ->whereGelombang($this->gelombang))
            ->count();

        $this->baruPutri = User::with(['biodata'])
            ->where('kode_daftar', 'like', 'B%')
            ->whereHas('biodata', fn ($q) => $q->whereJenisKelamin('P')
                ->whereGelombang($this->gelombang))
            ->count();
        $this->pindahanPutri = User::with(['biodata'])
            ->where('kode_daftar', 'like', 'D%')
            ->whereHas('biodata', fn ($q) => $q->whereJenisKelamin('P')
                ->whereGelombang($this->gelombang))
            ->count();

        $this->baruPutraTerima = User::with(['biodata'])
            ->where('kode_daftar', 'like', 'A%')
            ->whereDiterima('diterima')
            ->whereHas('biodata', fn ($q) => $q->whereJenisKelamin('L')
                ->whereGelombang($this->gelombang))
            ->count();
        $this->pindahanPutraTerima = User::with(['biodata'])
            ->where('kode_daftar', 'like', 'C%')
            ->whereDiterima('diterima')
            ->whereHas('biodata', fn ($q) => $q->whereJenisKelamin('L')
                ->whereGelombang($this->gelombang))
            ->count();

        $this->baruPutriTerima = User::with(['biodata'])
            ->where('kode_daftar', 'like', 'B%')
            ->whereDiterima('diterima')
            ->whereHas('biodata', fn ($q) => $q->whereJenisKelamin('P')
                ->whereGelombang($this->gelombang))
            ->count();
        $this->pindahanPutriTerima = User::with(['biodata'])
            ->where('kode_daftar', 'like', 'D%')
            ->whereDiterima('diterima')
            ->whereHas('biodata', fn ($q) => $q->whereJenisKelamin('P')
                ->whereGelombang($this->gelombang))
            ->count();

        $this->baruPutraTolak = User::with(['biodata'])
            ->where('kode_daftar', 'like', 'A%')
            ->whereDiterima('tidak diterima')
            ->whereHas('biodata', fn ($q) => $q->whereJenisKelamin('L')
                ->whereGelombang($this->gelombang))
            ->count();
        $this->pindahanPutraTolak = User::with(['biodata'])
            ->where('kode_daftar', 'like', 'C%')
            ->whereDiterima('tidak diterima')
            ->whereHas('biodata', fn ($q) => $q->whereJenisKelamin('L')
                ->whereGelombang($this->gelombang))
            ->count();

        $this->baruPutriTolak = User::with(['biodata'])
            ->where('kode_daftar', 'like', 'B%')
            ->whereDiterima('tidak diterima')
            ->whereHas('biodata', fn ($q) => $q->whereJenisKelamin('P')
                ->whereGelombang($this->gelombang))
            ->count();
        $this->pindahanPutriTolak = User::with(['biodata'])
            ->where('kode_daftar', 'like', 'D%')
            ->whereDiterima('tidak diterima')
            ->whereHas('biodata', fn ($q) => $q->whereJenisKelamin('P')
                ->whereGelombang($this->gelombang))
            ->count();
    }
}
