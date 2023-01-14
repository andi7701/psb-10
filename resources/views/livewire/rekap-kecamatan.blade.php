<div class="px-7">
    <h1 class="uppercase font-bold text-slate-700 text-center text-md">
        rekapitulasi per-kecamatan
        <br>
        per {{ hariTanggal(date('Y-m-d')) }}
        <br>
        seleksi penerimaan santri baru tahun 2023 / 2024
    </h1>
    <div class="my-3 lg:grid lg:grid-cols-4 space-y-3 lg:space-y-0 space-x-3 pl-8">
        <x-native-select wire:model='pilihan' label="Pilih Kategori">
            <option value="">Pilih Kategori</option>
            <option value="belum dikonfirmasi">Total Pendaftar</option>
            <option value="diterima">Total Diterima</option>
            <option value="ditolak">Total Ditolak</option>
        </x-native-select>
        <x-input wire:model.defer="total" label="Total" disabled/>
    </div>
    <div class="pl-10 pt-5 text-slate-600 text-sm mb-5">
        <table class="w-full capitalize border border-slate-600">
            <thead>
                <tr class="text-center font-bold">
                    <th class="border border-slate-600 py-1 px-1">No</th>
                    <th class="border border-slate-600 py-1 px-1">Nama Kecamatan</th>
                    <th class="border border-slate-600 py-1 px-1">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listKecamatan as $alamat)
                    <tr class="font-bold">
                        <td class="pl-2 border border-slate-600 py-1 px-1">{{ $loop->iteration }}</td>
                        <td class="pl-2 border border-slate-600 py-1 px-1">{{ $alamat->district->name }}</td>
                        <td class="pl-2 border border-slate-600 py-1 px-1">{{ $alamat->hitung }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
