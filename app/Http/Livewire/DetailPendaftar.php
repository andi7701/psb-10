<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Traits\GetData;
use Livewire\Component;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\Village;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Province;
use WireUi\Traits\Actions;

class DetailPendaftar extends Component
{
    use Actions;
    use GetData;

    public User $user;

    // Identitas Calon Siswa
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
        'kodePendaftaran' => 'required',
        'tingkat' => 'required',
        'nama' => 'required|string',
        'nisn' => 'required|numeric',
        'jenisKelamin' => 'required',
        'tempatLahir' => 'required',
        'tanggalLahir' => 'required',
        'status' => 'required',
        'anakKe' => 'required',
        'nik' => 'required|numeric',
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
        'penghasilan' => 'required',
        'telepon' => 'required',
    ];

    public function render()
    {
        return view('livewire.detail-pendaftar');
    }

    public function mount()
    {
        $this->tahun = $this->get_data_tahun();
        $this->tanggalLahir = date('Y-m-d');
        $this->listProvinsi = Province::orderBy('name')->get();
        $this->listProvinsiSekolahAsal = Province::orderBy('name')->get();
        $this->listProvinsiSekolahDasar = Province::orderBy('name')->get();

        $this->kodePendaftaran = $this->user->kode_daftar;
        $this->nama = $this->user->name;
        $this->tingkat = $this->user->biodata->tingkat;
        $this->nik = $this->user->biodata->nik;
        $this->tempatLahir = $this->user->biodata->tempat_lahir;
        $this->tanggalLahir = $this->user->biodata->tanggal_lahir;
        $this->jenisKelamin = $this->user->biodata->jenis_kelamin;
        $this->nisn = $this->user->biodata->nisn;
        $this->status = $this->user->biodata->status;
        $this->anakKe = $this->user->biodata->anak_ke;

        $this->keterangan = $this->user->alamat->keterangan;
        $this->provinsi = $this->user->alamat->provinsi;
        $this->updatedProvinsi();
        $this->kabupaten = $this->user->alamat->kabupaten;
        $this->updatedKabupaten();
        $this->kecamatan = $this->user->alamat->kecamatan;
        $this->updatedKecamatan();
        $this->desa = $this->user->alamat->desa;

        $this->rt = $this->user->alamat->rt;
        $this->rw = $this->user->alamat->rw;
        $this->kodePos = $this->user->alamat->kode_pos;

        $this->namaSekolahDasar = $this->user->sekolahSd->nama;
        $this->provinsiSekolahDasar = $this->user->sekolahSd->provinsi;
        $this->updatedProvinsiSekolahDasar();
        $this->kabupatenSekolahDasar = $this->user->sekolahSd->kabupaten;
        $this->updatedKabupatenSekolahDasar();
        $this->kecamatanSekolahDasar = $this->user->sekolahSd->kecamatan;
        $this->updatedKecamatanSekolahDasar();
        $this->desaSekolahDasar = $this->user->sekolahSd->desa;

        $this->namaSekolahAsal = $this->user->sekolahAsal->nama;
        $this->provinsiSekolahAsal = $this->user->sekolahAsal->provinsi;
        $this->updatedProvinsiSekolahAsal();
        $this->kabupatenSekolahAsal = $this->user->sekolahAsal->kabupaten;
        $this->updatedKabupatenSekolahAsal();
        $this->kecamatanSekolahAsal = $this->user->sekolahAsal->kecamatan;
        $this->updatedKecamatanSekolahAsal();
        $this->desaSekolahAsal = $this->user->sekolahAsal->desa;

        $this->namaAyah = $this->user->orangTua->nama_ayah;
        $this->pekerjaanAyah = $this->user->orangTua->pekerjaan_ayah;
        $this->namaIbu = $this->user->orangTua->nama_ibu;
        $this->pekerjaanIbu = $this->user->orangTua->pekerjaan_ibu;
        $this->telepon = $this->user->orangTua->telepon;
        $this->penghasilan = $this->user->orangTua->penghasilan;
        $this->noKps = $this->user->orangTua->no_kps;
        $this->noKip = $this->user->orangTua->no_kip;

        $this->namaWali = $this->user->wali->nama;
        $this->pekerjaanWali = $this->user->wali->pekerjaan;
        $this->teleponWali = $this->user->wali->telepon;
        $this->alamatWali = $this->user->wali->alamat;
    }

    public function simpan()
    {

        $this->validate();

        try {

            // DB::beginTransaction();

            $user = User::updateOrCreate(
                [
                    'kode_daftar' => $this->kodePendaftaran,
                ],
                [
                    'name' => $this->nama,
                    'username' => $this->kodePendaftaran,
                    'password' => bcrypt('123456789'),
                    'tanggal_daftar' => date('Y-m-d'),
                    'user_id' => auth()->user()->id,
                ]
            );

            $user->alamat()->updateOrCreate(
                [],
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

            $user->biodata()->updateOrCreate(
                [],
                [
                    // this tanggal daftar must be create
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

            $user->orangTua()->updateOrCreate(
                [],
                [
                    'nama_ayah' => $this->namaAyah,
                    'pekerjaan_ayah' => $this->pekerjaanAyah,
                    'nama_ibu' => $this->namaIbu,
                    'pekerjaan_ibu' => $this->pekerjaanIbu,
                    'penghasilan' => $this->penghasilan,
                    'telepon' => $this->telepon,
                    'no_kps' => $this->noKps,
                    'no_kip' => $this->noKip
                ]
            );

            // if ($this->kategoriPendaftar == 'C' || $this->kategoriPendaftar == 'D') {
            $user->sekolahAsal()->updateOrCreate(
                [],
                [
                    'nama' => $this->namaSekolahAsal,
                    'desa' => $this->desaSekolahAsal,
                    'kecamatan' => $this->kecamatanSekolahAsal,
                    'kabupaten' => $this->kabupatenSekolahAsal,
                    'provinsi' => $this->provinsiSekolahAsal
                ]
            );
            // }

            $user->sekolahSd()->updateOrCreate(
                [],
                [
                    'nama' => $this->namaSekolahDasar,
                    'desa' => $this->desaSekolahDasar,
                    'kecamatan' => $this->kecamatanSekolahDasar,
                    'kabupaten' => $this->kabupatenSekolahDasar,
                    'provinsi' => $this->provinsiSekolahDasar
                ]
            );

            $user->wali()->updateOrCreate(
                [],
                [
                    'nama' => $this->namaWali,
                    'pekerjaan' => $this->pekerjaanWali,
                    'alamat' => $this->alamatWali,
                    'telepon' => $this->teleponWali
                ]
            );


            // DB::commit();

            $user->assignRole('Calon Siswa');

            $this->notification()->success(
                $title = 'Berhasil Simpan',
                $description = 'Data Calon Siswa Berhasil diUpdate'
            );
        } catch (\Throwable $th) {

            // DB::rollBack();

            dd($th);
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
