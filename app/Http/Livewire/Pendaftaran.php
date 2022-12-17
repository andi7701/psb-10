<?php

namespace App\Http\Livewire;

use App\Models\User;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\Village;
use Livewire\Component;

class Pendaftaran extends Component
{
    // Identitas Calon Siswa
    public $kategoriPendaftar;
    public $kodePendaftaran;
    public $tingkat;
    public $nama;
    public $nik;
    public $nisn;
    public $tempatLahir;
    public $tanggalLahir;

    // Alamat

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
        'kodeDaftar' => 'required|unique:users,kode_daftar',
        'tingkat' => 'required',
        'nama' => 'required',
        'nisn' => 'required',
        'jenisKelamin' => 'required',
        'tempatLahir' => 'required',
        'tanggalLahir' => 'required',
        'status' => 'required',
        'anakKe' => 'required',
        'nik' => 'required',
        'rt' => 'required',
        'rw' => 'required',
        'desa' => 'required',
        'kecamatan' => 'required',
        'kabupaten' => 'required',
        'provinsi' => 'required',
        'namaSekolah' => 'required',
        'desaSekolah' => 'required',
        'kecamatanSekolah' => 'required',
        'kabupatenSekolah' => 'required',
        'provinsiSekolah' => 'required',
        'namaAyah' => 'required',
        'namaIbu' => 'required',
        'pekerjaanAyah' => 'required',
        'pekerjaanIbu' => 'required',
        'penghasilan' => 'required',
        'telepon' => 'required',
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
        $this->listKecamatan = District::where('city_code', $this->kabupaten)->orderBy('name')->get();
    }
    public function updatedKecamatan()
    {
        $this->listDesa = Village::where('district_code', $this->kecamatan)->orderBy('name')->get();
    }
}
