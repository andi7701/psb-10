<?php

namespace App\Http\Livewire;

use App\Models\Agama;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class HasilAgamaTerima extends Component
{
    use WithPagination;
    use Actions;
    
    public $search;
    public $calonSiswa;

    public function render()
    {
        return view('livewire.hasil-agama-terima', [
            'listUser' =>  User::with([
                'agama',
                'agama.user'
            ])
                ->whereHas('agama', fn ($q) => $q->whereNilai(1))
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
            
            $data = Agama::whereUserId($id)->first();
            
            $user = User::find($this->calonSiswa);

            $user->agama()->updateOrCreate(
                [],
                [
                    'panitia_id' => auth()->user()->id,
                    'mahroj' => $data->mahroj,
                    'lancar' => $data->lancar,
                    'tajwid' => $data->tajwid,
                    'qunut' => $data->qunut,
                    'tahiyat' => $data->tahiyat,
                    'tulisan' => $data->tulisan,
                    'nilai_quran' => $data->nilai_quran,
                    'pegon' => $data->pegon,
                    'catatan' => $data->catatan,
                    'nilai' => $data->nilai,
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
