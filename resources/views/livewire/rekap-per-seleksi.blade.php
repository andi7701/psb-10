<div>
    <p class="font-bold text-lg text-slate-600 text-center uppercase">
        rekapitulasi per seleksi
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
                        Agama
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        @foreach ($agamaNilaiQuran as $nilai)
                            Nilai Al Qur'an {{ Str::upper($nilai->nilai_quran) }} : {{ $nilai->hitung }} Siswa<br>
                        @endforeach
                    </td>
                </tr>
                <tr
                    class="odd:bg-white even:bg-slate-200 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-300">
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        2
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Agama
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        @foreach ($agamaPegon as $nilai)
                            Nilai Pegon {{ Str::upper($nilai->pegon) }} : {{ $nilai->hitung }} Siswa<br>
                        @endforeach
                    </td>
                </tr>
                <tr
                    class="odd:bg-white even:bg-slate-200 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-300">
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        3
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Agama
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        @foreach ($agamaTulisan as $nilai)
                            Nilai Tulisan {{ Str::upper($nilai->tulisan) }} : {{ $nilai->hitung }} Siswa<br>
                        @endforeach
                    </td>
                </tr>
                <tr
                    class="odd:bg-white even:bg-slate-200 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-300">
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        4
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Akademik
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Nilai Kurang : {{ $akademikKurang }} Siswa <br>
                        Nilai Sedang : {{ $akademikSedang }} Siswa <br>
                        Nilai Baik : {{ $akademikBaik }} Siswa <br>
                    </td>
                </tr>
                <tr
                    class="odd:bg-white even:bg-slate-200 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-300">
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        5
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Kesehatan
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        @foreach ($kesehatan as $nilai)
                            Kesehatan Siswa {{ Str::upper($nilai->sehat) }} : {{ $nilai->hitung }} Siswa <br>
                        @endforeach
                    </td>
                </tr>
                <tr
                    class="odd:bg-white even:bg-slate-200 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-300">
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        6
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Minat Bakat : Ekstrakurikuler
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        @foreach ($minatBakat as $nilai)
                            {{ Str::upper($nilai->ekstra->nama) }} : {{ $nilai->hitung }}
                            Siswa <br>
                        @endforeach
                    </td>
                </tr>
                <tr
                    class="odd:bg-white even:bg-slate-200 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-300">
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        7
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Minat Bakat : Prestasi Non Akademik
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        @foreach ($minatBakatNonAkademik as $nilai)
                            {{ $nilai->non_akademik }} : {{ $nilai->hitung }} Siswa <br>
                        @endforeach
                    </td>
                </tr>
                <tr
                    class="odd:bg-white even:bg-slate-200 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-300">
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        8
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Minat Bakat : Rank 1 , 11 Semester
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        @forelse ($minatBakatRank as $minat)
                            {{ $loop->iteration }}. {{ $minat->siswa->name }} - {{ $minat->siswa->kode_daftar }}<br>
                        @empty
                            Belum Ada Siswa Berprestasi
                        @endforelse
                    </td>
                </tr>
                <tr
                    class="odd:bg-white even:bg-slate-200 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-300">
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        9
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Penghasilan
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Penghasilan Kurang : {{ $penghasilanKurang }} Siswa <br>
                        Penghasilan Sedang : {{ $penghasilanSedang }} Siswa <br>
                        Penghasilan Tinggi : {{ $penghasilanTinggi }} Siswa <br>
                    </td>
                </tr>
                <tr
                    class="odd:bg-white even:bg-slate-200 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-300">
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        9
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Wawancara : Kondisi Keluarga
                    </td>
                    <td scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        @foreach ($wawancara as $nilai)
                            {{ Str::upper($nilai->kondisi_keluarga) }} : {{ $nilai->hitung }}
                            Siswa <br>
                        @endforeach
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
