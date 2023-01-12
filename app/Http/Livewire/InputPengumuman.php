<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use WireUi\Traits\Actions;

class InputPengumuman extends Component
{
    use Actions;

    public $calonSiswa;
    public $user;
    public $nama;
    public $sekolahAsal;
    public $sekolahDasar;

    public $agama;
    public $kesehatan;
    public $minatBakat;
    public $wawancara;
    public $akademik;
    
    public $lulus;

    protected $rules = [
        'lulus' => 'required',
        'agama' => 'required',
        // 'kesehatan' => 'required',
        // 'minatBakat' => 'required',
        // 'wawancara' => 'required',
        'akademik' => 'required'
    ];

    public function render()
    {
        return view('livewire.input-pengumuman');
    }

    public function updatedCalonSiswa()
    {
        $this->user = User::with(['agama', 'kesehatan', 'minatBakat', 'sekolahAsal', 'sekolahSd', 'wawancara'])
            ->find($this->calonSiswa);

        $this->nama = $this->user->name ?? '';
        $this->sekolahAsal = $this->user->sekolahAsal->nama ?? '';
        $this->sekolahDasar = $this->user->sekolahSd->nama ?? '';
        $this->agama = $this->user->agama->nilai ?? '';
        $this->kesehatan = $this->user->kesehatan->nilai ?? '';
        $this->minatBakat = $this->user->minatBakat->nilai ?? '';
        $this->wawancara = $this->user->wawancara->nilai ?? '';
        $this->akademik = $this->user->akademik->nilai ?? '';

        $this->lulus = $this->user->diterima ?? '';

        // if ($this->agama && $this->kesehatan && $this->minatBakat && $this->wawancara && $this->akademik) {
        //     $this->lulus = 1;
        // } else {
        //     $this->lulus = '';
        // }
    }

    public function simpan()
    {
        $this->validate();

        try {

            $this->user->diterima = $this->lulus;
            $this->user->pengumuman = auth()->user()->id;
            $this->user->save();

            $this->notification()->success(
                $title = 'Berhasil Simpan',
                $description = 'Berhasil Simpan Hasil Akhir'
            );

            $this->reset();
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
