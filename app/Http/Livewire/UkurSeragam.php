<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use WireUi\Traits\Actions;

class UkurSeragam extends Component
{

    use Actions;

    public $calonSiswa;
    public $user;
    public $nama;
    public $sekolahDasar;
    public $sekolahAsal;

    public $baju_osis;
    public $baju_batik;
    public $baju_pramuka;
    public $baju_or;

    public $bawah_osis;
    public $bawah_batik;
    public $bawah_pramuka;
    public $bawah_or;

    public $peci;

    protected $rules =
    [
        'calonSiswa' => 'required',
        'baju_osis' => 'required',
        'baju_batik' => 'required',
        'baju_pramuka' => 'required',
        'baju_or' => 'required',
        'bawah_osis' => 'required',
        'bawah_batik' => 'required',
        'bawah_pramuka' => 'required',
        'bawah_or' => 'required',
    ];

    public function render()
    {
        return view('livewire.ukur-seragam');
    }

    public function updatedCalonSiswa()
    {
        $this->user = User::with(['seragam', 'sekolahSd', 'sekolahAsal'])
            ->find($this->calonSiswa);

        $this->nama = $this->user->name;
        $this->sekolahAsal = $this->user->sekolahAsal->nama;
        $this->sekolahDasar = $this->user->sekolahSd->nama;
        $this->baju_osis = $this->user->seragam->baju_osis;
        $this->baju_batik = $this->user->seragam->baju_batik;
        $this->baju_pramuka = $this->user->seragam->baju_pramuka;
        $this->baju_or = $this->user->seragam->baju_or;
        $this->bawah_osis = $this->user->seragam->bawah_osis;
        $this->bawah_batik = $this->user->seragam->bawah_batik;
        $this->bawah_pramuka = $this->user->seragam->bawah_pramuka;
        $this->bawah_or = $this->user->seragam->bawah_or;
        $this->peci = $this->user->seragam->peci;
    }

    public function simpan()
    {
        $this->validate();

        $this->user->terukur = 1;

        $this->user->save();
        
        try {
            $this->user->seragam()->updateOrCreate(
                [],
                [
                    'baju_osis' => $this->baju_osis,
                    'baju_pramuka' => $this->baju_pramuka,
                    'baju_batik' => $this->baju_batik,
                    'baju_or' => $this->baju_or,
                    'bawah_osis' => $this->bawah_osis,
                    'bawah_pramuka' => $this->bawah_pramuka,
                    'bawah_batik' => $this->bawah_batik,
                    'bawah_or' => $this->bawah_or,
                    'peci' => $this->peci,
                    'panitia_id' => auth()->user()->id,
                ]
            );

            $this->notification()->success(
                $title = 'Berhasil Simpan',
                $description = 'Berhasil Simpan Ukuran Seragam'
            );
        } catch (\Throwable $th) {
            dd($th);
        }

        $this->reset();
    }
}
