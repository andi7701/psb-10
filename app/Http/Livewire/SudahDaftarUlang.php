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

    public function render()
    {
        if ($this->jenisKelamin == 'semua') {
            $list_user = Pembayaran::with([
                'user',
                'biodata'
            ])
                ->whereHas('biodata', fn ($q) => $q->whereGelombang($this->gelombang))
                ->when(
                    $this->search,
                    fn ($q) => $q->whereHas('user', fn ($q) => $q->where('name', 'like', '%' . $this->search . '%'))
                )
                ->orderByDesc('tanggal')
                ->paginate(5);
            $totale = Pembayaran::whereGelombang($this->gelombang)
                ->get()->sum('jumlah');
            $infaqe = Pembayaran::whereGelombang($this->gelombang)
                ->get()->sum('infaq');
            $admPsb = Pembayaran::whereGelombang($this->gelombang)
                ->get()->sum('adm_psb');
        } else {
            $list_user = Pembayaran::with([
                'user',
                'biodata'
            ])
                ->whereHas('biodata', fn ($q) => $q->whereJenisKelamin($this->jenisKelamin)
                    ->whereGelombang($this->gelombang))
                ->when(
                    $this->search,
                    fn ($q) => $q->whereHas('user', fn ($q) => $q->where('name', 'like', '%' . $this->search . '%'))
                )
                ->orderByDesc('tanggal')
                ->paginate(5);
            $totale = Pembayaran::whereHas('biodatas', fn ($q) => $q->whereJenisKelamin($this->jenisKelamin)
                ->whereGelombang($this->gelombang))
                ->get()->sum('jumlah');
            $infaqe = Pembayaran::whereHas('biodatas', fn ($q) => $q->whereJenisKelamin($this->jenisKelamin)
                ->whereGelombang($this->gelombang))
                ->get()->sum('infaq');
            $admPsb = Pembayaran::whereHas('biodatas', fn ($q) => $q->whereJenisKelamin($this->jenisKelamin)
                ->whereGelombang($this->gelombang))
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
