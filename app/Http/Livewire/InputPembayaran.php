<?php

namespace App\Http\Livewire;

use App\Models\Pembayaran;
use App\Models\User;
use Livewire\Component;
use WireUi\Traits\Actions;

class InputPembayaran extends Component
{
    use Actions;

    public $calonSiswa;
    public $user;
    public $nama;
    public $sekolahAsal;
    public $sekolahDasar;
    public $provinsi;
    public $kabupaten;
    public $kecamatan;
    public $desa;

    public $gelombang;
    public $wajibBayar;
    public $jumlah;

    protected $rules =
    [
        'calonSiswa' => 'required',
        'jumlah' => 'required|numeric',
    ];
    public function render()
    {
        $this->updatedCalonSiswa();
        return view('livewire.input-pembayaran');
    }

    public function updatedCalonSiswa()
    {
        $this->user = User::with(['alamat.village', 'alamat.district', 'alamat.city', 'alamat.province', 'biodata', 'pembayarans', 'sekolahAsal', 'sekolahSd',])
            ->withSum('pembayarans as total', 'jumlah')
            ->find($this->calonSiswa);

        $this->nama = $this->user->name ?? '';
        $this->sekolahAsal = $this->user->sekolahAsal->nama ?? '';
        $this->sekolahDasar = $this->user->sekolahSd->nama ?? '';
        $this->provinsi = $this->user->alamat->province->name ?? '';
        $this->kabupaten = $this->user->alamat->city->name ?? '';
        $this->kecamatan = $this->user->alamat->district->name ?? '';
        $this->desa = $this->user->alamat->village->name ?? '';

        $this->gelombang = $this->user->biodata->gelombang ?? '';
        switch ($this->gelombang) {
            case 1:
                $this->wajibBayar = 3500000;
                break;
            case 2:
                $this->wajibBayar = 4000000;
                break;
            case 3:
                $this->wajibBayar = 4500000;
                break;

            default:
                break;
        }
    }

    public function simpan()
    {
        $this->validate();

        try {
            $this->user->pembayarans()->create(
                [
                    'panitia_id' => auth()->user()->id,
                    'tanggal' => date('Y-m-d'),
                    'jumlah' => $this->jumlah,
                    'gelombang' => $this->gelombang,
                    'wajib_bayar' => $this->wajibBayar
                ]
            );
            $this->notification()->success(
                $title = "Berhasil Simpan",
                $description = "Berhasil Simpan Pembayaran"
            );
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function confirm($id): void
    {
        $this->dialog()->confirm([

            'title'       => 'Menghapus Data',
            'description' => 'Anda Yakin ?',
            'acceptLabel' => 'Hapus',
            'method'      => 'delete',
            'params'      => $id,

        ]);
    }

    public function delete($id)
    {
        Pembayaran::find($id)->delete();
        $this->notification()->error(
            $title = 'Hapus Data Pembayaran',
            $description = 'Berhasil Hapus Data Pembayaran'
        );
    }
}
