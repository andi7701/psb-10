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
                    <th class="border border-slate-600 py-1 px-1">Target</th>
                    <th class="border border-slate-600 py-1 px-1">Diterima</th>
                    <th class="border border-slate-600 py-1 px-1">Ditolak</th>
                    <th class="border border-slate-600 py-1 px-1">Total Pendaftar</th>
                    <th class="border border-slate-600 py-1 px-1">Daftar Ulang</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listKecamatan as $target)
                    @if ($target->daftar_ulang >= $target->jumlah)
                        @php
                            $isTarget = true;
                        @endphp
                    @else
                        @php
                            $isTarget = false;
                        @endphp
                    @endif
                    <tr  @class(['font-bold odd:bg-slate-100','bg-green-500 odd:bg-green-500 text-white' => $isTarget])>
                        <td class="pl-2 border border-slate-600 py-1 px-1">{{ $loop->iteration }}</td>
                        <td class="pl-2 border border-slate-600 py-1 px-1">{{ $target->district->name }}</td>
                        <td class="pl-2 border border-slate-600 py-1 px-1 text-center">{{ $target->jumlah }}</td>
                        <td class="pl-2 border border-slate-600 py-1 px-1 text-center">{{ $target->diterima }}</td>
                        <td class="pl-2 border border-slate-600 py-1 px-1 text-center">{{ $target->ditolak }}</td>
                        <td class="pl-2 border border-slate-600 py-1 px-1 text-center">{{ $target->total }}</td>
                        <td class="pl-2 border border-slate-600 py-1 px-1 text-center">{{ $target->daftar_ulang }}</td>
                    </tr>
                @endforeach
                <tr class="font-bold">
                    <td class="pl-2 border border-slate-600 py-1 px-1">{{ $listKecamatan->count() + 1 }}</td>
                    <td class="pl-2 border border-slate-600 py-1 px-1">LUAR KOTA</td>
                    <td class="pl-2 border border-slate-600 py-1 px-1 text-center">-</td>
                    <td class="pl-2 border border-slate-600 py-1 px-1 text-center">{{ $luarDiterima }}</td>
                    <td class="pl-2 border border-slate-600 py-1 px-1 text-center">{{ $luarDitolak }}</td>
                    <td class="pl-2 border border-slate-600 py-1 px-1 text-center">{{ $luarTotal }}</td>
                    <td class="pl-2 border border-slate-600 py-1 px-1 text-center">{{ $luarDaftarUlang }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
