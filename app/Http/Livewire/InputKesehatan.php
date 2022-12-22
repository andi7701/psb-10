<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use WireUi\Traits\Actions;

class InputKesehatan extends Component
{

    use Actions;

    public $calonSiswa;
    public $user;
    public $nama;
    public $sekolahDasar;
    public $sekolahAsal;

    public $tinggi;
    public $berat;
    public $kuku;
    public $rambut;
    public $butaWarna;
    public $minus;
    public $ngompol;
    public $rokok;
    public $sehat;
    public $darah;
    public $kesopanan;
    public $nilai;
    public $catatan;

    protected $rules =
    [
        'calonSiswa' => 'required',
        'tinggi' => 'required',
        'berat' => 'required',
        'kuku' => 'required',
        'rambut' => 'required',
        'butaWarna' => 'required',
        'minus' => 'required',
        'ngompol' => 'required',
        'rokok' => 'required',
        'sehat' => 'required',
        'darah' => 'required',
        'kesopanan' => 'required',
        'nilai' => 'required',
        'catatan' => 'required',
    ];

    public function render()
    {
        return view('livewire.input-kesehatan');
    }

    public function updatedCalonSiswa()
    {
        $this->user = User::with(['kesehatan', 'sekolahAsal', 'sekolahSd'])
            ->find($this->calonSiswa);

        $this->nama = $this->user->name ?? '';
        $this->sekolahAsal = $this->user->sekolahAsal->nama ?? '';
        $this->sekolahDasar = $this->user->sekolahSd->nama ?? '';
        $this->tinggi = $this->user->kesehatan->tinggi ?? '';
        $this->berat = $this->user->kesehatan->berat ?? '';
        $this->kuku = $this->user->kesehatan->kuku ?? '';
        $this->rambut = $this->user->kesehatan->rambut ?? '';
        $this->butaWarna = $this->user->kesehatan->buta_warna ?? '';
        $this->minus = $this->user->kesehatan->minus ?? '';
        $this->sehat = $this->user->kesehatan->sehat ?? '';
        $this->ngompol = $this->user->kesehatan->ngompol ?? '';
        $this->rokok = $this->user->kesehatan->rokok ?? '';
        $this->darah = $this->user->kesehatan->darah ?? '';
        $this->kesopanan = $this->user->kesehatan->kesopanan ?? '';
        $this->nilai = $this->user->kesehatan->nilai ?? '';
        $this->catatan = $this->user->kesehatan->catatan ?? '';
    }

    public function simpan()
    {
        $this->validate();

        try {

            $this->user->kesehatan()->updateOrCreate(
                [],
                [
                    'panitia_id' => auth()->user()->id,
                    'tinggi' => $this->tinggi,
                    'berat' => $this->berat,
                    'kuku' => $this->kuku,
                    'rambut' => $this->rambut,
                    'buta_warna' => $this->butaWarna,
                    'minus' => $this->minus,
                    'ngompol' => $this->ngompol,
                    'rokok' => $this->rokok,
                    'sehat' => $this->sehat,
                    'darah' => $this->darah,
                    'kesopanan' => $this->kesopanan,
                    'nilai' => $this->nilai,
                    'catatan' => $this->catatan,
                ]
            );

            $this->notification()->success(
                $title = 'Berhasil Simpan',
                $description = 'Berhasil Simpan Hasil Seleksi Kesehatan'
            );
            $this->reset();
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
