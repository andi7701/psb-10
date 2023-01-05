<div>
    <h1 class="uppercase font-bold text-slate-700 text-center text-md">
        rekapitulasi
        <br>
        per {{ hariTanggal(date('Y-m-d')) }}
        <br>
        seleksi penerimaan santri baru tahun 2023 / 2024
    </h1>
    <div class="pl-10 pt-5 text-slate-600 text-sm mb-5">
        <table class="w-full capitalize border border-slate-600">
            <tbody>
                <tr class="text-center font-bold">
                    <td class="border border-slate-600 py-1 px-1">&nbsp;</td>
                    <td class="border border-slate-600 py-1 px-1">putra</td>
                    <td class="border border-slate-600 py-1 px-1">putri</td>
                    <td class="border border-slate-600 py-1 px-1">diterima</td>
                    <td class="border border-slate-600 py-1 px-1">ditolak</td>
                    <td class="border border-slate-600 py-1 px-1">kuota</td>
                    <td class="border border-slate-600 py-1 px-1">sisa kuota</td>
                </tr>
                <tr class="font-bold">
                    <td class="pl-2 border border-slate-600 py-1 px-1">Gelombang 1</td>
                    <td class="pl-2 border border-slate-600 py-1 px-1">
                        Baru : {{ $baruPutra }}<br>
                        Pindahan : {{ $pindahanPutra }}<br>
                        Total : {{ $baruPutra + $pindahanPutra }}
                    </td>
                    <td class="pl-2 border border-slate-600 py-1 px-1">
                        Baru : {{ $baruPutri }}<br>
                        Pindahan : {{ $pindahanPutri }}<br>
                        Total : {{ $baruPutri + $pindahanPutri }}
                    </td>
                    <td class="pl-2 border border-slate-600 py-1 px-1">
                        Putra Baru : {{ $baruPutraTerima }}<br>
                        Putra Pindahan : {{ $pindahanPutraTerima }}<br>
                        Putri Baru : {{ $baruPutriTerima }}<br>
                        Putri Pindahan : {{ $pindahanPutriTerima }}<br>
                        Total : {{ $baruPutraTerima + $pindahanPutraTerima + $baruPutriTerima + $pindahanPutriTerima }}
                    </td>
                    <td class="pl-2 border border-slate-600 py-1 px-1">
                        Putra Baru : {{ $baruPutraTolak }}<br>
                        Putra Pindahan : {{ $pindahanPutraTolak }}<br>
                        Putri Baru : {{ $baruPutriTolak }}<br>
                        Putri Pindahan : {{ $pindahanPutriTolak }}<br>
                        Total : {{ $baruPutraTolak + $pindahanPutraTolak + $baruPutriTolak + $pindahanPutriTolak }}
                    </td>
                    <td class="pl-2 border border-slate-600 py-1 px-1">
                        200
                    </td>
                    <td class="pl-2 border border-slate-600 py-1 px-1">
                        {{  200 - ($baruPutraTerima + $pindahanPutraTerima + $baruPutriTerima + $pindahanPutriTerima) }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
