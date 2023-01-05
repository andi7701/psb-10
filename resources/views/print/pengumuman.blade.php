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
    <div class=" text-slate-600 px-10 text-sm">
        Berdasarkan hasil tes seleksi penerimaan peserta didik baru tahun ajaran 2023 / 2024 SMP Al Musyaffa', yang
        meliputi :
    </div>
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
    <div class="pl-20 pt-5 text-slate-600 text-sm mb-5">
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
    @if ($user->diterima)
        <div class=" text-slate-600 pl-10 pt-5 text-sm text-justify">
            Sebagai Peserta Didik Baru di SMP Al Musyaffa', mohon segera melakukan proses
            <span class="font-bold">
                Daftar Ulang
            </span>
            sebesar
            <span class="font-bold">
                @switch($user->biodata->gelombang)
                    @case(1)
                        Rp. 3.500.000
                    @break

                    @case(2)
                        RP. 4.000.000
                    @break

                    @case(3)
                        RP. 4.500.000
                    @break

                    @default
                @endswitch
            </span>
            dan mengembalikan surat pernyataan kesanggupan siswa dan orang tua/wali yang sudah ditanda tangani, mulai
            <span class="font-bold">
                {{ hariTanggal($user->tanggal_daftar) }}
            </span>
            sampai dengan
            <span class="font-bold">
                {{ hariTanggal($tenggang) }}, pukul. 08.00 - 13.00 WIB.
            </span>
            Apabila sampai dengan batas waktu yang telah ditentukan tidak melakukan daftar ulang maka dinyatakan
            <span class="font-bold">"Mengundurkan Diri"</span>
        </div>
    @endif
    <div class=" text-slate-600 pl-10 text-sm mt-5">
        Demikian pengumuman ini kami sampaikan, atas perhatian dan kerjasamanya kami sampaikan terimakasih.
    </div>
    <div class="pl-10 text-slate-600 text-sm">
        <div class="flex justify-end mr-10 mt-5">
            <div class="flex flex-col space-y-10">
                <span class="text-center">
                    Ngampel, {{ tanggal($user->tanggal_daftar) }}
                    <br>
                    Kepala Sekolah
                </span>
                <span class="text-center underline font-bold">
                    Abdul Khalim,S.Pd
                </span>
            </div>
        </div>
    </div>
</x-layout-print>
