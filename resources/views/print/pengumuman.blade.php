<x-layout-print>
    <x-slot name="title">
        Pengumuman
    </x-slot>
    <h1 class="uppercase font-bold text-slate-700 text-center text-md mb-3">
        pengumuman
        <br>
        no : psb/smp-alfa/2023/2024
    </h1>
    <h1 class="uppercase text-slate-600 text-center text-sm">tentang</h1>
    <h1 class="uppercase font-bold text-slate-700 text-center text-sm mb-10">
        penerimaan santri baru
        <br>
        smp al musyaffa'
        tahun 2023 / 2024
    </h1>
    <span class=" text-slate-600 pl-10 text-sm">
        Berdasarkan hasil tes seleksi penerimaan peserta didik baru tahun ajaran 2023 / 2024 SMP Al Musyaffa',yang
        meliputi :
    </span>
    <div class="pl-10 pt-5 text-slate-600 text-sm mb-5">
        <table class="w-full capitalize border border-slate-600">
            <tbody>
                <tr class="text-center font-bold">
                    <td class="border border-slate-600 py-3 px-3 w-[5%]">no.</td>
                    <td class="border border-slate-600 py-3 px-3">jenis tes</td>
                    <td class="border border-slate-600 py-3 px-3">hasil</td>
                </tr>
                <tr>
                    <td class="border border-slate-600 py-2 px-3 w-[5%] text-center">1.</td>
                    <td class="pl-5 border border-slate-600 py-2 px-3">hasil tes agama</td>
                    <td class="pl-5 border border-slate-600 py-2 px-3">
                        @if ($user->agama->nilai)
                            lulus
                        @else
                            tidak lulus
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="border border-slate-600 py-2 px-3 w-[5%] text-center">2.</td>
                    <td class="pl-5 border border-slate-600 py-2 px-3">hasil tes akademik</td>
                    <td class="pl-5 border border-slate-600 py-2 px-3">
                        @if ($user->akademik->nilai)
                            lulus
                        @else
                            tidak lulus
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="border border-slate-600 py-2 px-3 w-[5%] text-center">3.</td>
                    <td class="pl-5 border border-slate-600 py-2 px-3">hasil tes kesehatan</td>
                    <td class="pl-5 border border-slate-600 py-2 px-3">
                        @if ($user->kesehatan->nilai)
                            lulus
                        @else
                            tidak lulus
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="border border-slate-600 py-2 px-3 w-[5%] text-center">4.</td>
                    <td class="pl-5 border border-slate-600 py-2 px-3">hasil tes minat dan bakat</td>
                    <td class="pl-5 border border-slate-600 py-2 px-3">
                        @if ($user->minatBakat->nilai)
                            lulus
                        @else
                            tidak lulus
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="border border-slate-600 py-2 px-3 w-[5%] text-center">5.</td>
                    <td class="pl-5 border border-slate-600 py-2 px-3">hasil tes wawancara</td>
                    <td class="pl-5 border border-slate-600 py-2 px-3">
                        @if ($user->wawancara->nilai)
                            lulus
                        @else
                            tidak lulus
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <span class=" text-slate-600 pl-10 text-sm">
        Dengan ini memutuskan bahwa :
    </span>
    <div class="pl-10 pt-5 text-slate-600 text-sm">
        <table class="w-full">
            <tbody>
                <tr>
                    <td class="capitalize w-2/5 pl-5">nama</td>
                    <td class="uppercase font-bold">: {{ $user->name }}</td>
                </tr>
                <tr>
                    <td class="capitalize w-[30%] pl-5">tempat, tanggal lahir</td>
                    <td class="uppercase font-bold">: {{ $user->biodata->tempat_lahir }},
                        {{ tanggal($user->biodata->tanggal_lahir) }}</td>
                </tr>
                <tr>
                    <td class="capitalize w-[30%] pl-5">no. pendaftaran</td>
                    <td class="uppercase font-bold">: {{ $user->kode_daftar }}</td>
                </tr>
                <tr>
                    <td class="capitalize w-2/5 pl-5">asal sekolah</td>
                    <td class="uppercase font-bold">: {{ $user->sekolahSd->nama }}</td>
                </tr>
                <tr>
                    <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="2" class="capitalize text-center">dinyatakan :</td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center uppercase font-bold text-xl">
                        @if ($user->diterima)
                            diterima
                        @else
                            tidak diterima
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <h1 class="uppercase font-bold text-slate-700 pl-10 pt-5 text-md">
        keterangan
    </h1>
    <span class=" text-slate-600 pl-10 pt-5 text-sm">
        Kartu ini jangan sampai rusak / hilang. Dibawa ketika melakukan tes seleksi dan daftar ulang (bagi yang lolos
        seleksi) serta pengambilang seragam
    </span>
    <div class="pl-10 text-slate-600 text-sm">
        <table class="w-full border-separate border-spacing-5">
            <tbody>
                <tr>
                    <td class="font-bold uppercase " colspan="5">a. tes seleksi</td>
                </tr>
                <tr>
                    <td class="w-[10%]">&nbsp;</td>
                    <td class="w-[25%] capitalize whitespace-nowrap">1. tes agama</td>
                    <td class="w-1/5 capitalize whitespace-nowrap border-b-2 border-slate-600 border-dotted">:</td>
                    <td class="w-[25%] capitalize whitespace-nowrap pl-5">4. tes minat dan bakat</td>
                    <td class="w-1/5 capitalize whitespace-nowrap border-b-2 border-slate-600 border-dotted">:</td>
                </tr>
                <tr>
                    <td class="w-[10%]">&nbsp;</td>
                    <td class="w-[25%] capitalize whitespace-nowrap">2. tes akademik</td>
                    <td class="w-1/5 capitalize whitespace-nowrap border-b-2 border-slate-600 border-dotted">:</td>
                    <td class="w-[25%] capitalize whitespace-nowrap pl-5">5. tes wawancara</td>
                    <td class="w-1/5 capitalize whitespace-nowrap border-b-2 border-slate-600 border-dotted">:</td>
                </tr>
                <tr>
                    <td class="w-[10%]">&nbsp;</td>
                    <td class="w-[25%] capitalize whitespace-nowrap">3. tes kesehatan</td>
                    <td class="w-1/5 capitalize whitespace-nowrap border-b-2 border-slate-600 border-dotted">:</td>
                </tr>
                <tr>
                    <td class="font-bold uppercase whitespace-nowrap" colspan="2">b. pembayaran daftar ulang</td>
                    <td class="w-1/5 capitalize whitespace-nowrap border-b-2 border-slate-600 border-dotted"
                        colspan="2">:</td>
                </tr>
                <tr>
                    <td class="font-bold uppercase " colspan="5">c. pengambilan seragam</td>
                </tr>
                <tr>
                    <td class="w-[10%]">&nbsp;</td>
                    <td class="w-[25%] capitalize whitespace-nowrap">1. baju osis</td>
                    <td class="w-1/5 capitalize whitespace-nowrap border-b-2 border-slate-600 border-dotted">:</td>
                    <td class="w-[25%] capitalize whitespace-nowrap pl-5">7. kaos olah raga</td>
                    <td class="w-1/5 capitalize whitespace-nowrap border-b-2 border-slate-600 border-dotted">:</td>
                </tr>
                <tr>
                    <td class="w-[10%]">&nbsp;</td>
                    <td class="w-[25%] capitalize whitespace-nowrap">2. baju batik</td>
                    <td class="w-1/5 capitalize whitespace-nowrap border-b-2 border-slate-600 border-dotted">:</td>
                    <td class="w-[25%] capitalize whitespace-nowrap pl-5">8. celana olah raga</td>
                    <td class="w-1/5 capitalize whitespace-nowrap border-b-2 border-slate-600 border-dotted">:</td>
                </tr>
                <tr>
                    <td class="w-[10%]">&nbsp;</td>
                    <td class="w-[25%] capitalize whitespace-nowrap">3. baju pramuka</td>
                    <td class="w-1/5 capitalize whitespace-nowrap border-b-2 border-slate-600 border-dotted">:</td>
                    <td class="w-[25%] capitalize whitespace-nowrap pl-5">9. peci / jilbab</td>
                    <td class="w-1/5 capitalize whitespace-nowrap border-b-2 border-slate-600 border-dotted">:</td>
                </tr>
                <tr>
                    <td class="w-[10%]">&nbsp;</td>
                    <td class="w-[25%] capitalize whitespace-nowrap">4. celana / rok osis</td>
                    <td class="w-1/5 capitalize whitespace-nowrap border-b-2 border-slate-600 border-dotted">:</td>
                    <td class="w-[25%] capitalize whitespace-nowrap pl-5">10. handsduk</td>
                    <td class="w-1/5 capitalize whitespace-nowrap border-b-2 border-slate-600 border-dotted">:</td>
                </tr>
                <tr>
                    <td class="w-[10%]">&nbsp;</td>
                    <td class="w-[25%] capitalize whitespace-nowrap">5. celana / rok batik</td>
                    <td class="w-1/5 capitalize whitespace-nowrap border-b-2 border-slate-600 border-dotted">:</td>
                    <td class="w-[25%] capitalize whitespace-nowrap pl-5">11. ikat pinggang</td>
                    <td class="w-1/5 capitalize whitespace-nowrap border-b-2 border-slate-600 border-dotted">:</td>
                </tr>
                <tr>
                    <td class="w-[10%]">&nbsp;</td>
                    <td class="w-[25%] capitalize whitespace-nowrap">6. celana / rok pramuka</td>
                    <td class="w-1/5 capitalize whitespace-nowrap border-b-2 border-slate-600 border-dotted">:</td>
                    <td class="w-[25%] capitalize whitespace-nowrap pl-5">12. kaos kaki</td>
                    <td class="w-1/5 capitalize whitespace-nowrap border-b-2 border-slate-600 border-dotted">:</td>
                </tr>
            </tbody>
        </table>
        <div class="flex justify-end mr-10 mt-5">
            <div class="flex flex-col space-y-10">
                <span class="text-center">
                    Ngampel, {{ tanggal($user->tanggal_daftar) }}
                    <br>
                    Petugas Pendaftaran
                </span>
                <span class="text-center underline font-bold">
                    {{ $user->panitia->name }}
                </span>
            </div>
        </div>
    </div>
</x-layout-print>
