<x-layout-print>
    <x-slot name="title">
        Kartu Pendaftaran
    </x-slot>
    <h1 class="uppercase font-bold text-slate-700 text-center text-md">
        kartu pendaftaran
        <br>
        seleksi penerimaan santri baru
        tahun ajaran {{ $user->biodata->tahun }}
    </h1>

    <div class="pl-10 pt-5 text-slate-600 text-sm">
        <table class="w-full">
            <tbody>
                <tr>
                    <td class="capitalize w-[30%] pl-5">no. pendaftaran</td>
                    <td class="uppercase font-bold">: {{ $user->kode_daftar }}</td>
                </tr>
                <tr>
                    <td class="capitalize w-2/5 pl-5">nama</td>
                    <td class="uppercase font-bold">: {{ $user->name }}</td>
                </tr>
                <tr>
                    <td class="capitalize w-2/5 pl-5">asal sekolah</td>
                    <td class="uppercase font-bold">: {{ $user->sekolahSd->nama }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <h1 class="uppercase font-bold text-slate-700 pl-10 pt-5 text-md">
        keterangan
    </h1>
    <span class=" text-slate-600 pl-10 pt-5 text-sm">
        Kartu ini jangan sampai rusak / hilang. Dibawa ketika melakukan tes seleksi dan daftar ulang (bagi yang lolos seleksi) serta pengambilang seragam
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
                    <td class="w-1/5 capitalize whitespace-nowrap border-b-2 border-slate-600 border-dotted" colspan="2">:</td>
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
                    Ngampel,  {{ tanggal($user->tanggal_daftar) }}
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
