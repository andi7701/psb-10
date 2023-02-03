<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Wawancara;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class HasilWawancaraTolak extends Component
{
    use WithPagination;
    use Actions;

    public $search;
    public $calonSiswa;

    public function render()
    {
        return view('livewire.hasil-wawancara-tolak', [
            'listUser' =>  User::with([
                'wawancara',
                'wawancara.user',
            ])
                ->whereHas('wawancara', fn ($q) => $q->whereNilai(0))
                ->when($this->search, fn ($q) => $q->where('name', 'like', '%' . $this->search . '%'))
                ->paginate(10)
        ]);
    }

    public function confirm($id): void
    {
        $this->dialog()->confirm([

            'title'       => 'Tarik Data Lama',
            'description' => 'Anda Yakin ?',
            'acceptLabel' => 'Yakin',
            'method'      => 'simpan',
            'params'      => $id,

        ]);
    }

    public function simpan($id)
    {
        try {
            
            $data = Wawancara::whereUserId($id)->first();
            
            $user = User::find($this->calonSiswa);

            $user->wawancara()->updateOrCreate(
                [],
                [
                    'panitia_id' => auth()->user()->id,
                    'sumber_informasi' => $this->sumber_informasi,
                    'alasan' => $this->alasan,
                    'alasan_orang_tua' => $this->alasan_orang_tua,
                    'minat_lain' => $this->minat_lain,
                    'pilihan_ke' => $this->pilihan_ke,
                    'jumlah_anak' => $this->jumlah_anak,
                    'status_ayah' => $this->status_ayah,
                    'status_ibu' => $this->status_ibu,
                    'kondisi_keluarga' => $this->kondisi_keluarga,
                    'kondisi_ayah' => $this->kondisi_ayah,
                    'kondisi_ibu' => $this->kondisi_ibu,
                    'tinggal_bersama' => $this->tinggal_bersama,
                    'penanggung_jawab' => $this->penanggung_jawab,
                    'penjamin_biaya' => $this->penjamin_biaya,
                    'pekerjaan_penjamin' => $this->pekerjaan_penjamin,
                    'kesopanan' => $this->kesopanan,
                    'nilai' => $this->nilai,
                    'catatan' => $this->catatan,
                ]
            );

            $this->notification()->success(
                $title = 'Berhasil Tarik Data',
                $description = 'Berhasil Tarik Data Calon Siswa'
            );


        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
