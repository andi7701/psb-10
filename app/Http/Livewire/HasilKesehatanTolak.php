<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Kesehatan;
use WireUi\Traits\Actions;
use Livewire\WithPagination;

class HasilKesehatanTolak extends Component
{
    use WithPagination;
    use Actions;

    public $search;
    public $calonSiswa;

    public function render()
    {
        return view('livewire.hasil-kesehatan-tolak', [
            'listUser' =>  User::with([
                'kesehatan',
                'kesehatan.user'
            ])
                ->whereHas('kesehatan', fn ($q) => $q->whereNilai(0))
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
            
            $data = Kesehatan::whereUserId($id)->first();
            
            $user = User::find($this->calonSiswa);

            $user->kesehatan()->updateOrCreate(
                [],
                [
                    'panitia_id' => auth()->user()->id,
                    'tinggi' => $data->tinggi,
                    'berat' => $data->berat,
                    'kuku' => $data->kuku,
                    'rambut' => $data->rambut,
                    'buta_warna' => $data->buta_warna,
                    'minus' => $data->minus,
                    'ngompol' => $data->ngompol,
                    'rokok' => $data->rokok,
                    'sehat' => $data->sehat,
                    'darah' => $data->darah,
                    'nilai' => $data->nilai,
                    'catatan' => $data->catatan,
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
