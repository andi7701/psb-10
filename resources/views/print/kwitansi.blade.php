<x-layout-print>
    <x-slot name="title">
        Kwitansi
    </x-slot>
    <h1 class="uppercase font-bold text-slate-700 text-center text-sm mb-3">
        kwitansi daftar ulang
        <br>
        penerimaan santri baru
        <br>
        smp al musyaffa' tahun ajaran {{ $user->biodata->tahun }}
        <br>
        gelombang {{ $user->biodata->gelombang }}
    </h1>
    <div class="pl-20 pt-5 text-slate-600 text-sm mb-5">
        <table class="w-full capitalize ">
            <tbody>
                <tr>
                    <td class=" py-1 px-3">kode pendaftaran</td>
                    <td class=" py-1 px-3 uppercase">: {{ $user->kode_daftar }}</td>
                </tr>
                <tr>
                    <td class=" py-1 px-3">terima dari</td>
                    <td class=" py-1 px-3 uppercase">: {{ $user->name }}</td>
                </tr>
                <tr>
                    <td class=" py-1 px-3">alamat</td>
                    <td class=" py-1 px-3 uppercase">: {{ $user->alamat->keterangan }},
                        {{ $user->alamat->village->name }} -
                        {{ $user->alamat->district->name }} ,
                        {{ $user->alamat->city->name }} -
                        {{ $user->alamat->province->name }}

                    </td>
                </tr>
                <tr>
                    <td class=" py-1 px-3">uang sebesar</td>
                    <td class=" py-1 px-3 uppercase">: {{ rupiah($user->pembayaran->jumlah) }}</td>
                </tr>
                <tr>
                    <td class=" py-1 px-3">guna membayar</td>
                    <td class=" py-1 px-3 ">: Pendaftaran peserta didik baru gelombang {{ $user->biodata->gelombang }}
                    <br>
                    <div class="pl-2">
                        SMP Al Musyaffa' Tahun Ajaran {{ $user->biodata->tahun }}
                    </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class=" text-slate-600 px-10 text-justify text-xs">
        Keterangan : <br>
        Uang <span class="font-bold">DAFTAR ULANG</span> yang sudah dibayarkan <span class="font-bold">TIDAK BISA DI AMBIL KEMBALI</span>,
        kecuali pendaftar tersebut di atas <span class="font-bold">TIDAK LULUS</span> di jenjang Sekolah Dasar terkait
    </div>
    <div class="pl-10 text-slate-600 text-sm">
        <div class="flex justify-end px-20 mt-5">
            <div class="flex flex-col space-y-10">
                <span class="text-center">
                    Ngampel, {{ tanggal($user->pembayaran->tanggal) }}
                    <br>
                    Bendahara
                </span>
                <span class="text-center underline font-bold">
                    {{ $user->pembayaran->panitia->name }}
                </span>
            </div>
        </div>
    </div>
</x-layout-print>
