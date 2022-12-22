<?php

namespace App\Http\Livewire;

use App\Models\Biodata;
use App\Models\User;
use App\Models\Wawancara;
use Livewire\Component;
use WireUi\Traits\Actions;

class InputWawancara extends Component
{
    use Actions;

    public $calonSiswa;
    public $user;
    public $nama;
    public $sekolahDasar;
    public $sekolahAsal;

    public $sumberInformasi;
    public $alasan;
    public $alasanOrangTua;
    public $minatLain;
    public $pilihanKe;
    public $jumlahAnak;
    public $statusAyah;
    public $statusIbu;
    public $kondisiKeluarga;
    public $kondisiAyah;
    public $kondisiIbu;
    public $tinggalBersama;
    public $penanggungJawab;
    public $penjaminBiaya;
    public $pekerjaanPenjamin;
    public $kesopanan;
    public $nilai;
    public $catatan;

    public $statusAnak;
    public $pekerjaanAyah;
    public $pekerjaanIbu;

    protected $rules =
    [
        'calonSiswa' => 'required',
        'sumberInformasi' => 'required',
        'alasan' => 'required',
        'alasanOrangTua' => 'required',
        'minatLain' => 'required',
        'pilihanKe' => 'required',
        'jumlahAnak' => 'required',
        'statusAyah' => 'required',
        'statusIbu' => 'required',
        'kondisiKeluarga' => 'required',
        'kondisiAyah' => 'required',
        'kondisiIbu' => 'required',
        'tinggalBersama' => 'required',
        'penanggungJawab' => 'required',
        'penjaminBiaya' => 'required',
        'pekerjaanPenjamin' => 'required',
        'kesopanan' => 'required',
        'nilai' => 'required',
        'catatan' => 'required',
        'statusAnak' => 'required',
        'pekerjaanAyah' => 'required',
        'pekerjaanIbu' => 'required'
    ];
    
    public function render()
    {
        return view('livewire.input-wawancara');
    }

    public function simpan()
    {
        $this->validate();

        try {

            $this->user->wawancara()->updateOrCreate(
                [],
                [
                    'panitia_id' => auth()->user()->id,
                    'sumber_informasi' => $this->sumberInformasi,
                    'alasan' => $this->alasan,
                    'alasan_orang_tua' => $this->alasanOrangTua,
                    'minat_lain' => $this->minatLain,
                    'pilihan_ke' => $this->pilihanKe,
                    'jumlah_anak' => $this->jumlahAnak,
                    'status_ayah' => $this->statusAyah,
                    'status_ibu' => $this->statusIbu,
                    'kondisi_keluarga' => $this->kondisiKeluarga,
                    'kondisi_ayah' => $this->kondisiAyah,
                    'kondisi_ibu' => $this->kondisiIbu,
                    'tinggal_bersama' => $this->tinggalBersama,
                    'penanggung_jawab' => $this->penanggungJawab,
                    'penjamin_biaya' => $this->penjaminBiaya,
                    'pekerjaan_penjamin' => $this->pekerjaanPenjamin,
                    'kesopanan' => $this->kesopanan,
                    'nilai' => $this->nilai,
                    'catatan' => $this->catatan,
                ]
            );

            $this->user->biodata()->updateOrCreate(
                [],
                [
                    'status' => $this->statusAnak
                ]
            );

            $this->user->orangTua()->updateOrCreate(
                [],
                [
                    'pekerjaan_ayah' => $this->pekerjaanAyah,
                    'pekerjaan_ibu' => $this->pekerjaanIbu
                ]
            );

            $this->notification()->success(
                $title = 'Berhasil Simpan',
                $description = 'Berhasil Simpan Hasil Seleksi Wawancara'
            );
            $this->reset();
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function updatedCalonSiswa()
    {
        $this->user = User::with(['biodata', 'orangTua', 'sekolahAsal', 'sekolahSd'])
            ->find($this->calonSiswa);

        $this->nama = $this->user->name ?? '';
        $this->sekolahAsal = $this->user->sekolahAsal->nama ?? '';
        $this->sekolahDasar = $this->user->sekolahSd->nama ?? '';
        $this->sumberInformasi = $this->user->wawancara->sumber_informasi ?? '';
        $this->alasan = $this->user->wawancara->alasan ?? '';
        $this->alasanOrangTua = $this->user->wawancara->alasan_orang_tua ?? '';
        $this->minatLain = $this->user->wawancara->minat_lain ?? '';
        $this->pilihanKe = $this->user->wawancara->pilihan_ke ?? '';
        $this->jumlahAnak = $this->user->wawancara->jumlah_anak ?? '';
        $this->statusAyah = $this->user->wawancara->status_ayah ?? '';
        $this->statusIbu = $this->user->wawancara->status_ibu ?? '';
        $this->kondisiKeluarga = $this->user->wawancara->kondisi_keluarga ?? '';
        $this->kondisiAyah = $this->user->wawancara->kondisi_ayah ?? '';
        $this->kondisiIbu = $this->user->wawancara->kondisi_ibu ?? '';
        $this->tinggalBersama = $this->user->wawancara->tinggal_bersama ?? '';
        $this->penanggungJawab = $this->user->wawancara->penanggung_jawab ?? '';
        $this->penjaminBiaya = $this->user->wawancara->penjamin_biaya ?? '';
        $this->pekerjaanPenjamin = $this->user->wawancara->pekerjaan_penjamin ?? '';
        $this->kesopanan = $this->user->wawancara->kesopanan ?? '';
        $this->nilai = $this->user->wawancara->nilai ?? '';
        $this->catatan = $this->user->wawancara->catatan ?? '';
        $this->statusAnak = $this->user->biodata->status ?? '';
        $this->pekerjaanAyah = $this->user->orangTua->pekerjaan_ayah ?? '';
        $this->pekerjaanIbu = $this->user->orangTua->pekerjaan_ibu ?? '';
    }
}
