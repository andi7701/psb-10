<div class="px-7">
    <h1 class="uppercase font-bold text-slate-700 text-center text-md">
        rekapitulasi per-kecamatan
        <br>
        per {{ hariTanggal(date('Y-m-d')) }}
        <br>
        seleksi penerimaan santri baru tahun 2023 / 2024
    </h1>
    <div class="pl-10 pt-5 text-slate-600 text-sm mb-5 overflow-x-auto">
        <table class="w-full capitalize border border-slate-600">
            <thead>
                <tr class="text-center font-bold">
                    <th class="border border-slate-600 py-1 px-1">No</th>
                    <th class="border border-slate-600 py-1 px-1">Nama Kecamatan</th>
                    <th class="border border-slate-600 py-1 px-1">Nama Kabupaten</th>
                    <th class="border border-slate-600 py-1 px-1">Nama Provinsi</th>
                    <th class="border border-slate-600 py-1 px-1">Total Putra</th>
                    <th class="border border-slate-600 py-1 px-1">Total Putri</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listKecamatan as $kecamatan)
                    <tr class="font-bold">
                        <td class="pl-2 border border-slate-600 py-1 px-1 text-center">{{ $loop->iteration }}</td>
                        <td class="pl-2 border border-slate-600 py-1 px-1">{{ $kecamatan->name }}</td>
                        <td class="pl-2 border border-slate-600 py-1 px-1">{{ $kecamatan->city->name }}</td>
                        <td class="pl-2 border border-slate-600 py-1 px-1">{{ $kecamatan->city->province->name }}</td>
                        <td class="pl-2 border border-slate-600 py-1 px-1">{{ $kecamatan->hitungPutra }}</td>
                        <td class="pl-2 border border-slate-600 py-1 px-1">{{ $kecamatan->hitungPutri }}</td>
                    </tr>
                @endforeach
                <tr class="font-bold">
                    <td class="pl-2 border border-slate-600 py-1 px-1" colspan="4">Total</td>
                    <td class="pl-2 border border-slate-600 py-1 px-1">{{ $totalPutra }}</td>
                    <td class="pl-2 border border-slate-600 py-1 px-1">{{ $totalPutri }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
