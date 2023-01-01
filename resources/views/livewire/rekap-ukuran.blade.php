<div>
    <p class="font-bold text-lg text-slate-600 text-center uppercase">
        rekapitulasi hasil ukur seragam
    </p>
    <p class="font-bold text-sm text-slate-600 text-center uppercase flex justify-between p-5">
        <span>Total Putra : {{ $siswaPutra }}</span>
        <span>Total Putri : {{ $siswaPutri }}</span>
    </p>
    <div class="overflow-x-auto relative">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        no
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Keterangan
                    </th>
                    <th scope="col" class="py-3 px-6">
                        jumlah
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr
                    class="odd:bg-white even:bg-slate-200 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-300">
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        1
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Baju OSIS Putra

                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        @foreach ($osisPutra as $osis)
                            {{ Str::upper($osis->baju_osis) }} : {{ $osis->hitung }} <br>
                        @endforeach
                    </td>
                </tr>
                <tr
                    class="odd:bg-white even:bg-slate-200 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-300">
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        2
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Baju Batik Putra
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        @foreach ($batikPutra as $batik)
                            {{ Str::upper($batik->baju_batik) }} : {{ $batik->hitung }} <br>
                        @endforeach
                    </td>
                </tr>
                <tr
                    class="odd:bg-white even:bg-slate-200 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-300">
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        3
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Baju Pramuka Putra
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        @foreach ($pramukaPutra as $pramuka)
                            {{ Str::upper($pramuka->baju_pramuka) }} : {{ $pramuka->hitung }} <br>
                        @endforeach
                    </td>
                </tr>
                <tr
                    class="odd:bg-white even:bg-slate-200 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-300">
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        4
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Baju OSIS Putri
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        @foreach ($osisPutri as $osis)
                            {{ Str::upper($osis->baju_osis) }} : {{ $osis->hitung }} <br>
                        @endforeach
                    </td>
                </tr>
                <tr
                    class="odd:bg-white even:bg-slate-200 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-300">
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        5
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Baju Batik Putri
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        @foreach ($batikPutri as $batik)
                            {{ Str::upper($batik->baju_batik) }} : {{ $batik->hitung }} <br>
                        @endforeach
                    </td>
                </tr>
                <tr
                    class="odd:bg-white even:bg-slate-200 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-300">
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        6
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Baju Pramuka Putri
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        @foreach ($pramukaPutri as $pramuka)
                            {{ Str::upper($pramuka->baju_pramuka) }} : {{ $pramuka->hitung }} <br>
                        @endforeach
                    </td>
                </tr>
                <tr
                    class="odd:bg-white even:bg-slate-200 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-300">
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        7
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Celana OSIS Putra
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        @foreach ($osisCelanaPutra as $osisCelana)
                            {{ Str::upper($osisCelana->bawah_osis) }} : {{ $osisCelana->hitung }} <br>
                        @endforeach
                    </td>
                </tr>
                <tr
                    class="odd:bg-white even:bg-slate-200 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-300">
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        8
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Celana Batik Putra
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        @foreach ($batikCelanaPutra as $batikCelana)
                            {{ Str::upper($batikCelana->bawah_batik) }} : {{ $batikCelana->hitung }} <br>
                        @endforeach
                    </td>
                </tr>
                <tr
                    class="odd:bg-white even:bg-slate-200 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-300">
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        9
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Celana Pramuka Putra
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        @foreach ($pramukaCelanaPutra as $pramukaCelana)
                            {{ Str::upper($pramukaCelana->bawah_pramuka) }} : {{ $pramukaCelana->hitung }} <br>
                        @endforeach
                    </td>
                </tr>
                <tr
                    class="odd:bg-white even:bg-slate-200 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-300">
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        10
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Rok OSIS Putri
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        @foreach ($osisRokPutri as $osisRok)
                            {{ Str::upper($osisRok->bawah_osis) }} : {{ $osisRok->hitung }} <br>
                        @endforeach
                    </td>
                </tr>
                <tr
                    class="odd:bg-white even:bg-slate-200 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-300">
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        11
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Rok Batik Putri
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        @foreach ($batikRokPutri as $batikRok)
                            {{ Str::upper($batikRok->bawah_batik) }} : {{ $batikRok->hitung }} <br>
                        @endforeach
                    </td>
                </tr>
                <tr
                    class="odd:bg-white even:bg-slate-200 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-300">
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        12
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Rok Pramuka Putri
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        @foreach ($pramukaRokPutri as $pramukaRok)
                            {{ Str::upper($pramukaRok->bawah_pramuka) }} : {{ $pramukaRok->hitung }} <br>
                        @endforeach
                    </td>
                </tr>
                <tr
                    class="odd:bg-white even:bg-slate-200 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-300">
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        13
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Kaos Olah Raga Putra
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        @foreach ($orPutra as $or)
                            {{ Str::upper($or->baju_or) }} : {{ $or->hitung }} <br>
                        @endforeach
                    </td>
                </tr>
                <tr
                    class="odd:bg-white even:bg-slate-200 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-300">
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        14
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Celana Olah Raga Putra
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        @foreach ($orCelanaPutra as $orCelana)
                            {{ Str::upper($orCelana->bawah_or) }} : {{ $orCelana->hitung }} <br>
                        @endforeach
                    </td>
                </tr>
                <tr
                    class="odd:bg-white even:bg-slate-200 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-300">
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        15
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Kaos Olah Raga Putri
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        @foreach ($orPutri as $or)
                            {{ Str::upper($or->baju_or) }} : {{ $or->hitung }} <br>
                        @endforeach
                    </td>
                </tr>
                <tr
                    class="odd:bg-white even:bg-slate-200 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-300">
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        16
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Celana Olah Raga Putri
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        @foreach ($orCelanaPutri as $orCelana)
                            {{ Str::upper($orCelana->bawah_or) }} : {{ $orCelana->hitung }} <br>
                        @endforeach
                    </td>
                </tr>
                <tr
                    class="odd:bg-white even:bg-slate-200 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-300">
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        17
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Peci
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        @foreach ($peci as $item)
                            {{ Str::upper($item->peci) }} : {{ $item->hitung }} <br>
                        @endforeach
                    </td>
                </tr>
                <tr
                    class="odd:bg-white even:bg-slate-200 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-300">
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        16
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Kerudung
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Putih : <br>
                        Dongker : <br>
                        Coklat : <br>
                    </td>
                </tr>
                <tr
                    class="odd:bg-white even:bg-slate-200 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-300">
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        17
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Lain - lain
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Ikat pinggang : <br>
                        Handsduk dan kolongan : <br>
                        Kaos kaki hitam : <br>
                        Kaos kaki putih : <br>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
