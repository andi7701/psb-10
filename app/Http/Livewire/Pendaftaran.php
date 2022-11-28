<?php

namespace App\Http\Livewire;

use App\Models\User;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\Province;
use Livewire\Component;

class Pendaftaran extends Component
{
    // Identitas Calon Siswa
    public $kategoriPendaftar;
    public $kodePendaftaran;
    public $nama;
    public $nisn;
    public $tempat;
    public $tanggalLahir;

    // Identitas Sekolah Dasar
    public $provinsi;
    public $kabupaten;
    public $kecamatan;
    public $desa;

    // List Sekolah Dasar
    public $listProvinsi = [];
    public $listKabupaten = [];
    public $listKecamatan = [];
    public $listDesa = [];

    protected $rules = [
        'nama' => 'required',
        'nisn' => 'required',
    ];
    public function render()
    {
        return view('livewire.pendaftaran');
    }

    public function mount()
    {
        $this->tanggalLahir = date('Y-m-d');
        $this->listProvinsi = Province::orderBy('name')->get();
    }

    public function simpan()
    {
        $this->validate();
    }
    // Updated Some Property
    public function updatedKategoriPendaftar()
    {
        $cek_kode_terakhir = User::selectRaw('max(kode_daftar) as kode_daftar')
            ->where('kode_daftar', 'like', $this->kategoriPendaftar . '%')
            ->first();
        $kode_selanjutnya = substr($cek_kode_terakhir->kode_daftar, 1, 4);
        $kode_selanjutnya++;
        $this->kodePendaftaran = $this->kategoriPendaftar . sprintf('%04s', $kode_selanjutnya);
    }

    public function updatedProvinsi()
    {
        $this->listKabupaten = City::where('province_code', $this->provinsi)->orderBy('name')->get();
    }
    public function updatedKabupaten()
    {
        $this->listKecamatan = City::where('province_code', $this->kabupaten)->orderBy('name')->get();
    }
    public function updatedKecamatan()
    {
        $this->listDesa = City::where('province_code', $this->kecamatan)->orderBy('name')->get();
    }
}
