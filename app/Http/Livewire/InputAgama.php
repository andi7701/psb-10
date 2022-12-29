<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use WireUi\Traits\Actions;

class InputAgama extends Component
{
    use Actions;


    public $calonSiswa;
    public $user;
    public $nama;
    public $sekolahDasar;
    public $sekolahAsal;

    public $mahroj;
    public $lancar;
    public $tajwid;
    public $qunut;
    public $tahiyat;
    public $tulisan;
    public $nilaiQuran;
    public $catatan;
    public $nilai;

    protected $rules =
    [
        'calonSiswa' => 'required',
        'mahroj' => 'required',
        'lancar' => 'required',
        'tajwid' => 'required',
        'qunut' => 'required',
        'tahiyat' => 'required',
        'tulisan' => 'required',
        'nilaiQuran' => 'required',
        'catatan' => 'required',
        'nilai' => 'required',
    ];

    public function render()
    {
        return view('livewire.input-agama');
    }

    public function updatedCalonSiswa()
    {
        $this->user = User::with(['agama', 'sekolahSd', 'sekolahAsal'])
            ->find($this->calonSiswa);

        $this->nama = $this->user->name;
        $this->sekolahAsal = $this->user->sekolahAsal->nama;
        $this->sekolahDasar = $this->user->sekolahSd->nama;
        $this->mahroj = $this->user->agama->mahroj;
        $this->lancar = $this->user->agama->lancar;
        $this->tajwid = $this->user->agama->tajwid;
        $this->qunut = $this->user->agama->qunut;
        $this->tahiyat = $this->user->agama->tahiyat;
        $this->tulisan = $this->user->agama->tulisan;
        $this->nilaiQuran = $this->user->agama->nilai_quran;
        $this->catatan = $this->user->agama->catatan;
        $this->nilai = $this->user->agama->nilai;
    }

    public function simpan()
    {
        $this->validate();

        try {

            $this->user->agama()->updateOrCreate(
                [],
                [
                    'panitia_id' => auth()->user()->id,
                    'mahroj' => $this->mahroj,
                    'lancar' => $this->lancar,
                    'tajwid' => $this->tajwid,
                    'qunut' => $this->qunut,
                    'tahiyat' => $this->tahiyat,
                    'tulisan' => $this->tulisan,
                    'nilai_quran' => $this->nilaiQuran,
                    'catatan' => $this->catatan,
                    'nilai' => $this->nilai,
                ]
            );

            $this->notification()->success(
                $title = 'Berhasil Simpan',
                $description = 'Berhasil Simpan Hasil Seleksi Agama'
            );

            $this->reset();
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
