<?php

namespace App\Http\Livewire;

use App\Models\Target;
use Laravolt\Indonesia\Models\District;
use Livewire\Component;
use WireUi\Traits\Actions;

class InputTarget extends Component
{
    use Actions;

    public $kecamatan;
    public $jumlah;

    public $listKecamatan = [];

    protected $rules = [
        'kecamatan' => 'required',
        'jumlah' => 'required'
    ];
    public function mount()
    {
        $this->listKecamatan = District::with([
            'city'
        ])
            ->whereHas('city', fn ($q) => $q->whereName('KABUPATEN KENDAL'))
            ->orWhereHas('city', fn ($q) => $q->whereName('KABUPATEN BATANG'))
            ->orWhereHas('city', fn ($q) => $q->whereName('KOTA SEMARANG'))
            ->orderBy('name')
            ->get();
    }
    public function render()
    {
        return view(
            'livewire.input-target',
            [
                'listTarget' => Target::with(['district', 'user'])
                    ->withCount(['user as diterima' => fn ($q) => $q->whereDiterima('diterima')])
                    ->get()
                    ->sortBy('district.name')
            ]
        );
    }

    public function simpan()
    {
        $this->validate();

        Target::updateOrCreate(
            [
                'kecamatan' => $this->kecamatan
            ],
            [
                'jumlah' => $this->jumlah
            ]
        );

        $this->notification()->success(
            $title = 'Berhasil Simpan',
            $description = 'Data Target Kecamatan Berhasil Disimpan'
        );
    }
}
