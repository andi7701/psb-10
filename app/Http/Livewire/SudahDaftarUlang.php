<?php

namespace App\Http\Livewire;

use App\Models\Pembayaran;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class SudahDaftarUlang extends Component
{
    use WithPagination;

    public $search;
    public $jenisKelamin;
    public $gelombang;
    public $tanggalAwal;
    public $tanggalAkhir;

    public function mount()
    {
        $this->tanggalAwal = date('Y-m-d');
        $this->tanggalAkhir = date('Y-m-d');
    }
    public function render()
    {
        if ($this->gelombang == 'semua' && $this->jenisKelamin == 'semua') {
            $list_user = Pembayaran::with([
                'user',
                'biodata'
            ])
                ->when(
                    $this->search,
                    fn ($q) => $q->whereHas('user', fn ($q) => $q->where('name', 'like', '%' . $this->search . '%'))
                )
                ->orderByDesc('tanggal')
                ->paginate(10);
            $totale = Pembayaran::get()->sum('jumlah');
            $infaqe = Pembayaran::get()->sum('infaq');
            $admPsb = Pembayaran::get()->sum('adm_psb');
        } elseif ($this->gelombang == 'semua' && $this->jenisKelamin != 'semua') {
            $list_user = Pembayaran::with([
                'user',
                'biodata'
            ])
                ->whereHas('biodata', fn ($q) => $q->whereJenisKelamin($this->jenisKelamin))
                ->when(
                    $this->search,
                    fn ($q) => $q->whereHas('user', fn ($q) => $q->where('name', 'like', '%' . $this->search . '%'))
                )
                ->orderByDesc('tanggal')
                ->paginate(10);
            $totale = Pembayaran::whereGelombang($this->gelombang)
                ->whereHas('biodata', fn ($q) => $q->whereJenisKelamin($this->jenisKelamin))
                ->get()->sum('jumlah');
            $infaqe = Pembayaran::whereGelombang($this->gelombang)
                ->whereHas('biodata', fn ($q) => $q->whereJenisKelamin($this->jenisKelamin))
                ->get()->sum('infaq');
            $admPsb = Pembayaran::whereGelombang($this->gelombang)
                ->whereHas('biodata', fn ($q) => $q->whereJenisKelamin($this->jenisKelamin))
                ->get()->sum('adm_psb');
        } elseif ($this->jenisKelamin == 'semua') {
            $list_user = Pembayaran::with([
                'user',
                'biodata'
            ])
                ->whereBetween('tanggal', [$this->tanggalAwal, $this->tanggalAkhir])
                ->whereHas('biodata', fn ($q) => $q->whereGelombang($this->gelombang))
                ->when(
                    $this->search,
                    fn ($q) => $q->whereHas('user', fn ($q) => $q->where('name', 'like', '%' . $this->search . '%'))
                )
                ->orderByDesc('tanggal')
                ->paginate(10);
            $totale = Pembayaran::whereGelombang($this->gelombang)
                ->whereBetween('tanggal', [$this->tanggalAwal, $this->tanggalAkhir])
                ->get()->sum('jumlah');
            $infaqe = Pembayaran::whereGelombang($this->gelombang)
                ->whereBetween('tanggal', [$this->tanggalAwal, $this->tanggalAkhir])
                ->get()->sum('infaq');
            $admPsb = Pembayaran::whereGelombang($this->gelombang)
                ->whereBetween('tanggal', [$this->tanggalAwal, $this->tanggalAkhir])
                ->get()->sum('adm_psb');
        } else {
            $list_user = Pembayaran::with([
                'user',
                'biodata'
            ])
                ->whereBetween('tanggal', [$this->tanggalAwal, $this->tanggalAkhir])
                ->whereHas('biodata', fn ($q) => $q->whereJenisKelamin($this->jenisKelamin)
                    ->whereGelombang($this->gelombang))
                ->when(
                    $this->search,
                    fn ($q) => $q->whereHas('user', fn ($q) => $q->where('name', 'like', '%' . $this->search . '%'))
                )
                ->orderByDesc('tanggal')
                ->paginate(10);
            $totale = Pembayaran::whereHas('biodatas', fn ($q) => $q->whereJenisKelamin($this->jenisKelamin)
                ->whereGelombang($this->gelombang))
                ->whereBetween('tanggal', [$this->tanggalAwal, $this->tanggalAkhir])
                ->get()->sum('jumlah');
            $infaqe = Pembayaran::whereHas('biodatas', fn ($q) => $q->whereJenisKelamin($this->jenisKelamin)
                ->whereGelombang($this->gelombang))
                ->whereBetween('tanggal', [$this->tanggalAwal, $this->tanggalAkhir])
                ->get()->sum('infaq');
            $admPsb = Pembayaran::whereHas('biodatas', fn ($q) => $q->whereJenisKelamin($this->jenisKelamin)
                ->whereGelombang($this->gelombang))
                ->whereBetween('tanggal', [$this->tanggalAwal, $this->tanggalAkhir])
                ->get()->sum('adm_psb');
        }

        return view(
            'livewire.sudah-daftar-ulang',
            [
                'listUser' => $list_user,
                'total' => $totale,
                'infaq' => $infaqe,
                'adm_psb' => $admPsb,
            ]
        );
    }
}
