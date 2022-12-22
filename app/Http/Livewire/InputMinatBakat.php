<?php

namespace App\Http\Livewire;

use App\Models\Ekstra;
use App\Models\MinatBakat;
use App\Models\User;
use Livewire\Component;
use WireUi\Traits\Actions;

class InputMinatBakat extends Component
{
    use Actions;

    public $calonSiswa;
    public $user;
    public $nama;
    public $sekolahDasar;
    public $sekolahAsal;

    public $mapelUnggul;
    public $mapelRendah;
    public $kehadiran;
    public $kenaikan;
    public $sikap;
    public $rataRata;
    public $smt1;
    public $smt2;
    public $smt3;
    public $smt4;
    public $smt5;
    public $smt6;
    public $smt7;
    public $smt8;
    public $smt9;
    public $smt10;
    public $smt11;
    public $smt12;
    public $nonAkademik;
    public $ekstra;
    public $nilai;
    public $catatan;

    public $ekstras = [];

    protected $rules =
    [
        'calonSiswa' => 'required',
        'mapelUnggul' => 'required',
        'mapelRendah' => 'required',
        'kehadiran' => 'required',
        'kenaikan' => 'required',
        'sikap' => 'required',
        'rataRata' => 'required',
        'ekstra' => 'required',
        'nilai' => 'required',
        'catatan' => 'required'
    ];

    public function render()
    {
        return view('livewire.input-minat-bakat');
    }

    public function mount()
    {
        $this->ekstras = Ekstra::orderBy('nama')->get();
    }

    public function simpan()
    {
        $this->validate();

        try {

            $this->user->minatBakat()->updateOrCreate(
                [],
                [
                    'panitia_id' => auth()->user()->id,
                    'mapel_unggul' => $this->mapelUnggul,
                    'mapel_rendah' => $this->mapelRendah,
                    'kehadiran' => $this->kehadiran,
                    'kenaikan' => $this->kenaikan,
                    'sikap' => $this->sikap,
                    'rata_rata' => $this->rataRata,
                    'smt_1' => $this->smt1,
                    'smt_2' => $this->smt2,
                    'smt_3' => $this->smt3,
                    'smt_4' => $this->smt4,
                    'smt_5' => $this->smt5,
                    'smt_6' => $this->smt6,
                    'smt_7' => $this->smt7,
                    'smt_8' => $this->smt8,
                    'smt_9' => $this->smt9,
                    'smt_10' => $this->smt10,
                    'smt_11' => $this->smt11,
                    'smt_12' => $this->smt12,
                    'non_akademik' => $this->nonAkademik,
                    'ekstra_id' => $this->ekstra,
                    'nilai' => $this->nilai,
                    'catatan' => $this->catatan
                ]
            );
            $this->notification()->success(
                $title = 'Berhasil Simpan',
                $description = 'Berhasil Simpan Hasil Seleksi Minat dan Bakat'
            );
            $this->reset();
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function updatedCalonSiswa()
    {
        $this->user = User::with(['sekolahSd', 'sekolahAsal', 'minatBakat'])
            ->find($this->calonSiswa);
        $this->nama = $this->user->name ?? '';
        $this->sekolahDasar = $this->user->sekolahSd->nama ?? '';
        $this->sekolahAsal = $this->user->sekolahAsal->nama ?? '';
        $this->mapelUnggul = $this->user->minatBakat->mapel_unggul ?? '';
        $this->mapelRendah = $this->user->minatBakat->mapel_rendah ?? '';
        $this->kehadiran = $this->user->minatBakat->kehadiran ?? '';
        $this->kenaikan = $this->user->minatBakat->kenaikan ?? '';
        $this->sikap = $this->user->minatBakat->sikap ?? '';
        $this->rataRata = $this->user->minatBakat->rata_rata ?? '';
        $this->nonAkademik = $this->user->minatBakat->non_akademik ?? '';
        $this->ekstra = $this->user->minatBakat->ekstra_id ?? '';
        $this->smt1 = $this->user->minatBakat->smt_1 ?? '';
        $this->smt2 = $this->user->minatBakat->smt_2 ?? '';
        $this->smt3 = $this->user->minatBakat->smt_3 ?? '';
        $this->smt4 = $this->user->minatBakat->smt_4 ?? '';
        $this->smt5 = $this->user->minatBakat->smt_5 ?? '';
        $this->smt6 = $this->user->minatBakat->smt_6 ?? '';
        $this->smt7 = $this->user->minatBakat->smt_7 ?? '';
        $this->smt8 = $this->user->minatBakat->smt_8 ?? '';
        $this->smt9 = $this->user->minatBakat->smt_9 ?? '';
        $this->smt10 = $this->user->minatBakat->smt_10 ?? '';
        $this->smt11 = $this->user->minatBakat->smt_11 ?? '';
        $this->smt12 = $this->user->minatBakat->smt_12 ?? '';
        $this->catatan = $this->user->minatBakat->catatan ?? '';
        $this->nilai = $this->user->minatBakat->nilai ?? '';
    }
}
