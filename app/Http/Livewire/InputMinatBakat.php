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

    public $nama;
    public $sekolahDasar;
    public $sekolahAsal;

    public $users = [];
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
        $this->users = User::role('Calon Siswa')
            ->orderBy('kode_daftar')
            ->get();

        $this->ekstras = Ekstra::orderBy('nama')->get();
    }

    public function simpan()
    {
        $this->validate();

        MinatBakat::updateOrCreate(
            [
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
            ],
            [
                'user_id' => $this->calonSiswa,
                'panitia_id' => auth()->user()->id
            ]
        );
    }
}
