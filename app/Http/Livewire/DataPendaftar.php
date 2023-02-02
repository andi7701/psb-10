<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Traits\GetData;
use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;
use Laravolt\Indonesia\Models\Province;

class DataPendaftar extends Component
{
    use Actions;
    use WithPagination;
    use GetData;
    
    public $search = '';
    public $isOnline;
    public $isJateng;

    public function render()
    {
        return view(
            'livewire.data-pendaftar',
            [
                'listUser' => User::role('Calon Siswa')
                    ->with([
                        'panitia',
                        'alamat',
                        'alamat.village',
                        'alamat.province',
                        'alamat.city',
                        'alamat.district',
                        'biodata',
                        'sekolahSd',
                        'sekolahAsal',
                        'orangTua'
                    ])
                    ->when(
                        $this->search,
                        fn (Builder $query) => $query
                            ->where('name', 'like', "%{$this->search}%")
                            ->orWhere('kode_daftar', 'like', "%{$this->search}%")
                            ->orWhereHas(
                                'alamat.district',
                                fn ($q) => $q
                                    ->where('name', 'like', "%{$this->search}%")
                            )
                            ->orWhereHas(
                                'orangTua',
                                fn ($q) => $q
                                    ->where('nama_ayah', 'like', "%{$this->search}%")
                            )
                            ->orWhereHas(
                                'sekolahSd',
                                fn ($q) => $q
                                    ->where('nama', 'like', "%{$this->search}%")
                            )
                    )
                    ->when($this->isOnline, fn ($q) => $q->whereIsOnline($this->isOnline))
                    ->whereHas('alamat.province', fn ($q) => $q->where('code', '!=', $this->isJateng))
                    ->orderByDesc('tanggal_daftar')
                    ->paginate(5),
                'listJateng' => Province::whereName('JAWA TENGAH')->get(),
            ]
        );
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function confirm($id): void
    {
        $this->dialog()->confirm([

            'title'       => 'Menghapus Data',
            'description' => 'Anda Yakin ?',
            'acceptLabel' => 'Hapus',
            'method'      => 'delete',
            'params'      => $id,

        ]);
    }
    public function confirmKedua($id): void
    {
        $this->dialog()->confirm([

            'title'       => 'Daftarkan Siswa ke Gelombang 2',
            'description' => 'Anda Yakin ?',
            'acceptLabel' => 'Yakin',
            'method'      => 'daftar',
            'params'      => $id,

        ]);
    }
    public function daftar($id)
    {

        try {

            $data = User::with([
                'alamat',
                'biodata',
                'orangTua',
                'sekolahAsal',
                'sekolahSd',
                'wali'
            ])
            ->find($id);

            $this->kodePendaftaran = $this->kategoriPendaftar . $this->get_kode_pendaftaran();
            $user = User::create(
                [
                    'name' => $this->nama,
                    'username' => $this->kodePendaftaran,
                    'kode_daftar' => $this->kodePendaftaran,
                    'password' => bcrypt('123456789'),
                    'tanggal_daftar' => date('Y-m-d'),
                    'user_id' => auth()->user()->id,
                    'is_online' => 2
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
                    'no_kip' => $this->noKip
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



            $user->assignRole('Calon Siswa');

            $this->notification()->success(
                $title = 'Berhasil Simpan',
                $description = 'Data Calon Siswa Berhasil Disimpan'
            );

            $this->slug = $user;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->biodata()->delete();
        $user->alamat()->delete();
        $user->sekolahSd()->delete();
        $user->delete();
        $this->notification()->error(
            $title = 'Hapus Calon Siswa',
            $description = 'Berhasil Hapus Data Calon Siswa'
        );
    }
}
