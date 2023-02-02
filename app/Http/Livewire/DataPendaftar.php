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
    public $kategoriPendaftar;

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

            $this->kategoriPendaftar = substr($data->kode_daftar, 0, 1);

            $kodePendaftaran = $this->kategoriPendaftar . $this->get_kode_pendaftaran();

            $user = User::create(
                [
                    'name' => $data->name,
                    'username' => $kodePendaftaran,
                    'kode_daftar' => $kodePendaftaran,
                    'password' => bcrypt('123456789'),
                    'tanggal_daftar' => date('Y-m-d'),
                    'user_id' => auth()->user()->id,
                    'is_online' => 2
                ]
            );

            $user->alamat()->create(
                [
                    'keterangan' => $data->alamat->keterangan,
                    'rt' => $data->alamat->rt,
                    'rw' => $data->alamat->rw,
                    'kode_pos' => $data->alamat->kode_pos,
                    'desa' => $data->alamat->desa,
                    'kecamatan' => $data->alamat->kecamatan,
                    'kabupaten' => $data->alamat->kabupaten,
                    'provinsi' => $data->alamat->provinsi
                ]
            );

            if (now() < date('2023-01-28')) {
                $gelombang = 1;
            } elseif (now() < date('2023-02-25')) {
                $gelombang = 2;
            } else {
                $gelombang = 3;
            }
            $user->biodata()->create(
                [
                    'gelombang' => $gelombang,
                    'tahun' => $data->biodata->tahun,
                    'tingkat' => $data->biodata->tingkat,
                    'nik' => $data->biodata->nik,
                    'nisn' => $data->biodata->nisn,
                    'jenis_kelamin' => $data->biodata->jenis_kelamin,
                    'tempat_lahir' => $data->biodata->tempat_lahir,
                    'tanggal_lahir' => $data->biodata->tanggal_lahir,
                    'status' => $data->biodata->status,
                    'anak_ke' => $data->biodata->anak_ke
                ]
            );

            $user->orangTua()->create(
                [
                    'nama_ayah' => $data->orangTua->nama_ayah,
                    'pekerjaan_ayah' => $data->orangTua->pekerjaan_ayah,
                    'nama_ibu' => $data->orangTua->nama_ibu,
                    'pekerjaan_ibu' => $data->orangTua->pekerjaan_ibu,
                    'penghasilan' => $data->orangTua->penghasilan,
                    'telepon' => $data->orangTua->telepon,
                    'no_kps' => $data->orangTua->no_kps,
                    'no_kip' => $data->orangTua->no_kip
                ]
            );

            if ($this->kategoriPendaftar == 'C' || $this->kategoriPendaftar == 'D') {
                $user->sekolahAsal()->create(
                    [
                        'nama' => $data->sekolahAsal->nama,
                        'desa' => $data->sekolahAsal->desa,
                        'kecamatan' => $data->sekolahAsal->kecamatan,
                        'kabupaten' => $data->sekolahAsal->kabupaten,
                        'provinsi' => $data->sekolahAsal->provinsi
                    ]
                );
            }

            $user->sekolahSd()->create(
                [
                    'nama' => $data->sekolahSd->nama,
                    'desa' => $data->sekolahSd->desa,
                    'kecamatan' => $data->sekolahSd->kecamatan,
                    'kabupaten' => $data->sekolahSd->kabupaten,
                    'provinsi' => $data->sekolahSd->provinsi,
                ]
            );

            $user->wali()->create(
                [
                    'nama' => $data->wali->nama,
                    'pekerjaan' => $data->wali->pekerjaan,
                    'alamat' => $data->wali->alamat,
                    'telepon' => $data->wali->telepon
                ]
            );



            $user->assignRole('Calon Siswa');

            $this->notification()->success(
                $title = 'Berhasil Simpan',
                $description = 'Data Calon Siswa Berhasil Disimpan'
            );
            
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
