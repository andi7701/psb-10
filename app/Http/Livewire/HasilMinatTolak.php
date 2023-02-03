<?php

namespace App\Http\Livewire;

use App\Models\MinatBakat;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class HasilMinatTolak extends Component
{
    use WithPagination;
    use Actions;

    public $search;
    public $calonSiswa;

    public function render()
    {
        return view('livewire.hasil-minat-tolak', [
            'listUser' =>  User::with([
                'minatBakat',
                'minatBakat.user',
                'minatBakat.ekstra'
            ])
                ->whereHas('minatBakat', fn ($q) => $q->whereNilai(0))
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
            
            $data = MinatBakat::whereUserId($id)->first();
            
            $user = User::find($this->calonSiswa);

            $user->minatBakat()->updateOrCreate(
                [],
                [
                    'panitia_id' => auth()->user()->id,
                    'mapel_unggul' => $data->mapel_unggul,
                    'mapel_rendah' => $data->mapel_rendah,
                    'kehadiran' => $data->kehadiran,
                    'kenaikan' => $data->kenaikan,
                    'sikap' => $data->sikap,
                    'rata_rata' => $data->rata_rata,
                    'smt_1' => $data->smt_1,
                    'smt_2' => $data->smt_2,
                    'smt_3' => $data->smt_3,
                    'smt_4' => $data->smt_4,
                    'smt_5' => $data->smt_5,
                    'smt_6' => $data->smt_6,
                    'smt_7' => $data->smt_7,
                    'smt_8' => $data->smt_8,
                    'smt_9' => $data->smt_9,
                    'smt_10' => $data->smt_10,
                    'smt_11' => $data->smt_11,
                    'smt_12' => $data->smt_12,
                    'non_akademik' => $data->non_akademik,
                    'ekstra_id' => $data->ekstra_id,
                    'nilai' => $data->nilai,
                    'catatan' => $data->catatan
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
