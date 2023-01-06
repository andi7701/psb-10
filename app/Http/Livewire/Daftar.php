<?php

namespace App\Http\Livewire;


use App\Models\User;
use App\Traits\GetData;
use Livewire\Component;
use WireUi\Traits\Actions;
use Laravolt\Indonesia\Models\City;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Laravolt\Indonesia\Models\Village;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Province;

class Daftar extends Component
{

    use Actions;
    use GetData;

    // Identitas Calon Siswa
    public $kategoriPendaftar;
    public $kodePendaftaran;
    public $tahun;
    public $tingkat;
    public $nama;
    public $nik;
    public $nisn;
    public $tempatLahir;
    public $tanggalLahir;
    public $jenisKelamin;
    public $status;
    public $anakKe;
    public $gelombang;

    // Alamat
    public $keterangan;
    public $provinsi;
    public $kabupaten;
    public $kecamatan;
    public $desa;
    public $rt;
    public $rw;
    public $kodePos;

    // List Alamat
    public $listProvinsi = [];
    public $listKabupaten = [];
    public $listKecamatan = [];
    public $listDesa = [];

    // Sekolah Dasar
    public $namaSekolahDasar;
    public $provinsiSekolahDasar;
    public $kabupatenSekolahDasar;
    public $kecamatanSekolahDasar;
    public $desaSekolahDasar;

    // List Sekolah Dasar
    public $listProvinsiSekolahDasar = [];
    public $listKabupatenSekolahDasar = [];
    public $listKecamatanSekolahDasar = [];
    public $listDesaSekolahDasar = [];

    // Sekolah Asal
    public $namaSekolahAsal;
    public $provinsiSekolahAsal;
    public $kabupatenSekolahAsal;
    public $kecamatanSekolahAsal;
    public $desaSekolahAsal;

    // List Sekolah Asal
    public $listProvinsiSekolahAsal = [];
    public $listKabupatenSekolahAsal = [];
    public $listKecamatanSekolahAsal = [];
    public $listDesaSekolahAsal = [];

    //Orang Tua
    public $namaAyah;
    public $pekerjaanAyah;
    public $namaIbu;
    public $pekerjaanIbu;
    public $penghasilan;
    public $telepon;
    public $noKps;
    public $noKip;

    //Wali
    public $namaWali;
    public $pekerjaanWali;
    public $alamatWali;
    public $teleponWali;

    protected $rules = [
        'kategoriPendaftar' => 'required',
        'kodePendaftaran' => 'required|unique:users,kode_daftar',
        'tingkat' => 'required',
        'nama' => 'required|string',
        'nisn' => 'required|numeric|digits:10|unique:biodatas,nisn',
        'jenisKelamin' => 'required',
        'tempatLahir' => 'required',
        'tanggalLahir' => 'required',
        'status' => 'required',
        'anakKe' => 'required',
        'nik' => 'required|numeric|unique:biodatas,nik',
        'keterangan' => 'required',
        'rt' => 'required|numeric',
        'rw' => 'required|numeric',
        'desa' => 'required',
        'kecamatan' => 'required',
        'kabupaten' => 'required',
        'provinsi' => 'required',
        'namaSekolahDasar' => 'required',
        'desaSekolahDasar' => 'required',
        'kecamatanSekolahDasar' => 'required',
        'kabupatenSekolahDasar' => 'required',
        'provinsiSekolahDasar' => 'required',
        'namaAyah' => 'required',
        'namaIbu' => 'required',
        'pekerjaanAyah' => 'required',
        'pekerjaanIbu' => 'required',
        'penghasilan' => 'required|numeric',
        'telepon' => 'required',
    ];

    protected $messages = [
        'kategoriPendaftar.required' => 'harus diisi',
        'kodePendaftaran.required' => 'harus diisi',
        'kodePendaftaran.unique' => 'sudah dipakai',
        'tingkat.required' => 'harus diisi',
        'nama.required' => 'harus diisi',
        'nama.string' => 'harus berupa huruf',
        'nisn.required' => 'harus diisi',
        'nisn.numeric' => 'harus berupa angka',
        'nisn.unique' => 'nisn sudah dipakai',
        'nisn.digits' => 'minimal 10 angka',
        'jenisKelamin.required' => 'harus diisi',
        'tempatLahir.required' => 'harus diisi',
        'tanggalLahir.required' => 'harus diisi',
        'status.required' => 'harus diisi',
        'anakKe.required' => 'harus diisi',
        'nik.required' => 'harus diisi',
        'nik.numeric' => 'harus berupa angka',
        'nik.unique' => 'nik sudah mendaftar',
        'keterangan.required' => 'harus diisi',
        'rt.required' => 'harus diisi',
        'rt.numeric' => 'harus berupa angka',
        'rw.required' => 'harus diisi',
        'rw.numeric' => 'harus berupa angka',
        'desa.required' => 'harus diisi',
        'kecamatan.required' => 'harus diisi',
        'kabupaten.required' => 'harus diisi',
        'provinsi.required' => 'harus diisi',
        'namaSekolahDasar.required' => 'harus diisi',
        'desaSekolahDasar.required' => 'harus diisi',
        'kecamatanSekolahDasar.required' => 'harus diisi',
        'kabupatenSekolahDasar.required' => 'harus diisi',
        'provinsiSekolahDasar.required' => 'harus diisi',
        'namaAyah.required' => 'harus diisi',
        'namaIbu.required' => 'harus diisi',
        'pekerjaanAyah.required' => 'harus diisi',
        'pekerjaanIbu.required' => 'harus diisi',
        'penghasilan.required' => 'harus diisi',
        'penghasilan.numeric' => 'harus berupa angka',
        'telepon.required' => 'harus diisi',
    ];

    public function render()
    {
        return view('livewire.daftar')->layout('layouts.guest');
    }

    public function mount()
    {
        $this->tahun = $this->get_data_tahun();
        $this->tanggalLahir = date('Y-m-d');
        $this->listProvinsi = Province::orderBy('name')->get();
        $this->listProvinsiSekolahAsal = Province::orderBy('name')->get();
        $this->listProvinsiSekolahDasar = Province::orderBy('name')->get();
    }

    public function simpan()
    {

        $this->validate();

        try {

            // DB::beginTransaction();
            $this->kodePendaftaran = $this->kategoriPendaftar . $this->get_kode_pendaftaran();

            $user = User::create(
                [
                    'name' => $this->nama,
                    'username' => $this->kodePendaftaran,
                    'kode_daftar' => $this->kodePendaftaran,
                    'password' => bcrypt('123456789'),
                    'tanggal_daftar' => date('Y-m-d'),
                    'user_id' => 0
                ]
            );

            $user->alamat()->create(
                [
                    'keterangan' => $this->keterangan,
                    'rt' => $this->rt,
                    'rw' => $this->rw,
                    'kode_pos' => $this->kodePos,
                    'desa' => $this->desa,
                    'kecamatan' => $this->kecamatan,
                    'kabupaten' => $this->kabupaten,
                    'provinsi' => $this->provinsi
                ]
            );

            if (now() < date('2023-01-28')) {
                $this->gelombang = 1;
            } elseif (now() < date('2023-02-25')) {
                $this->gelombang = 2;
            } else {
                $this->gelombang = 3;
            }

            $user->biodata()->create(
                [
                    'gelombang' => $this->gelombang,
                    'tahun' => $this->tahun,
                    'tingkat' => $this->tingkat,
                    'nik' => $this->nik,
                    'nisn' => $this->nisn,
                    'jenis_kelamin' => $this->jenisKelamin,
                    'tempat_lahir' => $this->tempatLahir,
                    'tanggal_lahir' => $this->tanggalLahir,
                    'status' => $this->status,
                    'anak_ke' => $this->anakKe
                ]
            );

            $user->orangTua()->create(
                [
                    'nama_ayah' => $this->namaAyah,
                    'pekerjaan_ayah' => $this->pekerjaanAyah,
                    'nama_ibu' => $this->namaIbu,
                    'pekerjaan_ibu' => $this->pekerjaanIbu,
                    'penghasilan' => $this->penghasilan,
                    'telepon' => $this->telepon,
                    'no_kps' => $this->noKps,
                    'no_kip' => $this->noKip,
                ]
            );

            if ($this->kategoriPendaftar == 'C' || $this->kategoriPendaftar == 'D') {
                $user->sekolahAsal()->create(
                    [
                        'nama' => $this->namaSekolahAsal,
                        'desa' => $this->desaSekolahAsal,
                        'kecamatan' => $this->kecamatanSekolahAsal,
                        'kabupaten' => $this->kabupatenSekolahAsal,
                        'provinsi' => $this->provinsiSekolahAsal
                    ]
                );
            }

            $user->sekolahSd()->create(
                [
                    'nama' => $this->namaSekolahDasar,
                    'desa' => $this->desaSekolahDasar,
                    'kecamatan' => $this->kecamatanSekolahDasar,
                    'kabupaten' => $this->kabupatenSekolahDasar,
                    'provinsi' => $this->provinsiSekolahDasar
                ]
            );

            $user->wali()->create(
                [
                    'nama' => $this->namaWali,
                    'pekerjaan' => $this->pekerjaanWali,
                    'alamat' => $this->alamatWali,
                    'telepon' => $this->teleponWali
                ]
            );


            // DB::commit();

            $user->assignRole('Calon Siswa');

            event(new Registered($user));

            Auth::login($user);

            return redirect(RouteServiceProvider::HOME);
        } catch (\Throwable $th) {

            // DB::rollBack();

            dd($th);
        }
    }

    // Updated For Kategori Pendaftar
    public function updatedKategoriPendaftar()
    {
        // $this->kodePendaftaran = $this->kategoriPendaftar . $this->get_kode_pendaftaran();

        if ($this->kategoriPendaftar == 'A' || $this->kategoriPendaftar == 'C') {
            $this->jenisKelamin = 'L';
        } else {
            $this->jenisKelamin = 'P';
        }

        if ($this->kategoriPendaftar == 'A' || $this->kategoriPendaftar == 'B') {
            $this->tingkat = 7;
        } else {
            $this->tingkat = '';
        }
    }

    // Updated Property For Alamat
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

    // Updated Property For Sekolah Asal
    public function updatedProvinsiSekolahAsal()
    {
        $this->listKabupatenSekolahAsal = City::where('province_code', $this->provinsiSekolahAsal)->orderBy('name')->get();
    }
    public function updatedKabupatenSekolahAsal()
    {
        $this->listKecamatanSekolahAsal = District::where('city_code', $this->kabupatenSekolahAsal)->orderBy('name')->get();
    }
    public function updatedKecamatanSekolahAsal()
    {
        $this->listDesaSekolahAsal = Village::where('district_code', $this->kecamatanSekolahAsal)->orderBy('name')->get();
    }

    // Updated Property For Sekolah Dasar
    public function updatedProvinsiSekolahDasar()
    {
        $this->listKabupatenSekolahDasar = City::where('province_code', $this->provinsiSekolahDasar)->orderBy('name')->get();
    }
    public function updatedKabupatenSekolahDasar()
    {
        $this->listKecamatanSekolahDasar = District::where('city_code', $this->kabupatenSekolahDasar)->orderBy('name')->get();
    }
    public function updatedKecamatanSekolahDasar()
    {
        $this->listDesaSekolahDasar = Village::where('district_code', $this->kecamatanSekolahDasar)->orderBy('name')->get();
    }
}
