<x-layout-print>
    <x-slot name="title">
        Formulir Pendaftaran
    </x-slot>
    <h1 class="uppercase font-bold text-slate-700 text-center text-md">
        formulir pendaftaran penerimaan santri baru
        <br>
        tahun ajaran {{ $user->biodata->tahun }}
    </h1>
    <div class="flex justify-end text-slate-600 mr-10 text-right">
        <div class="flex flex-col">
            <span class="capitalize">no. pendaftaran :
                <span class="font-bold">{{ $user->kode_daftar }}</span>
            </span>
            <span class="capitalize">
                @switch(substr($user->kode_daftar,0,1))
                    @case('A')
                        pendaftaran siswa baru kelas : {{ $user->biodata->tingkat }}
                    @break

                    @case('B')
                        pendaftaran siswi baru kelas : {{ $user->biodata->tingkat }}
                    @break

                    @case('C')
                        pendaftaran siswa pindahan kelas : {{ $user->biodata->tingkat }}
                    @break

                    @case('D')
                        pendaftaran siswi pindahan kelas : {{ $user->biodata->tingkat }}
                    @break

                    @default
                @endswitch

            </span>
        </div>
    </div>
    <div class="pl-10 text-slate-600 text-sm">
        <table class="w-full">
            <tbody>
                <tr>
                    <th class="font-bold uppercase text-left" colspan="2">a. identitas calon siswa</th>
                </tr>
                <tr>
                    <td class="capitalize w-2/5 pl-5">1. nama lengkap</td>
                    <td class="uppercase">: {{ $user->name }}</td>
                </tr>
                <tr>
                    <td class="capitalize w-2/5 pl-5">2. nik</td>
                    <td class="uppercase">: {{ $user->biodata->nik }}</td>
                </tr>
                <tr>
                    <td class="capitalize w-2/5 pl-5">3. nisn</td>
                    <td class="uppercase">: {{ $user->biodata->nisn }}</td>
                </tr>
                <tr>
                    <td class="capitalize w-2/5 pl-5">4. tempat, tanggal lahir</td>
                    <td class="uppercase">: {{ $user->biodata->tempat_lahir }},
                        {{ tanggal($user->biodata->tanggal_lahir) }}</td>
                </tr>
                <tr>
                    <td class="capitalize w-2/5 pl-5">5. alamat </td>
                    <td class="uppercase">: {{ $user->alamat->keterangan }}</td>
                </tr>
                <tr>
                    <td class="capitalize w-2/5 pl-10">kelurahan / desa </td>
                    <td class="uppercase">: {{ $user->alamat->village->name }}</td>
                </tr>
                <tr>
                    <td class="capitalize w-2/5 pl-10">kecamatan </td>
                    <td class="uppercase">: {{ $user->alamat->district->name }}</td>
                </tr>
                <tr>
                    <td class="capitalize w-2/5 pl-10">kabupaten / kota </td>
                    <td class="uppercase">: {{ $user->alamat->city->name }}</td>
                </tr>
                <tr>
                    <td class="capitalize w-2/5 pl-10">provinsi </td>
                    <td class="uppercase">: {{ $user->alamat->province->name }}</td>
                </tr>
                <tr>
                    <th class="font-bold uppercase text-left" colspan="2">&nbsp;</th>
                </tr>
                <tr>
                    <th class="font-bold uppercase text-left" colspan="2">b. data sekolah asal</th>
                </tr>
                <tr>
                    <td class="capitalize w-2/5 pl-5">1. nama sekolah dasar</td>
                    <td class="uppercase">: {{ $user->sekolahSd->nama }}</td>
                </tr>
                <tr>
                    <td class="capitalize w-2/5 pl-5">2. alamat sekolah</td>
                    <td class="uppercase"></td>
                </tr>
                <tr>
                    <td class="capitalize w-2/5 pl-10">kelurahan / desa </td>
                    <td class="uppercase">: {{ $user->sekolahSd->village->name }}</td>
                </tr>
                <tr>
                    <td class="capitalize w-2/5 pl-10">kecamatan </td>
                    <td class="uppercase">: {{ $user->sekolahSd->district->name }}</td>
                </tr>
                <tr>
                    <td class="capitalize w-2/5 pl-10">kabupaten / kota </td>
                    <td class="uppercase">: {{ $user->sekolahSd->city->name }}</td>
                </tr>
                <tr>
                    <td class="capitalize w-2/5 pl-10">provinsi </td>
                    <td class="uppercase">: {{ $user->sekolahSd->province->name }}</td>
                </tr>
                <tr>
                    <th class="font-bold uppercase text-left" colspan="2">&nbsp;</th>
                </tr>
                <tr>
                    <th class="font-bold uppercase text-left" colspan="2">c. data orang tua / wali</th>
                </tr>
                <tr>
                    <td class="capitalize w-2/5 pl-5">1. nama ayah</td>
                    <td class="uppercase">: {{ $user->orangTua->nama_ayah }}</td>
                </tr>
                <tr>
                    <td class="capitalize w-2/5 pl-10">pekerjaan ayah</td>
                    <td class="uppercase">: {{ $user->orangTua->pekerjaan_ayah }}</td>
                </tr>
                <tr>
                    <td class="capitalize w-2/5 pl-5">2. nama ibu</td>
                    <td class="uppercase">: {{ $user->orangTua->nama_ibu }}</td>
                </tr>
                <tr>
                    <td class="capitalize w-2/5 pl-10">pekerjaan ibu</td>
                    <td class="uppercase">: {{ $user->orangTua->pekerjaan_ibu }}</td>
                </tr>
                <tr>
                    <td class="capitalize w-2/5 pl-5">3. kontak orang tua</td>
                    <td class="uppercase">: {{ $user->orangTua->telepon }}</td>
                </tr>
                <tr>
                    <td class="capitalize w-2/5 pl-5">4. nama wali</td>
                    <td class="uppercase">: {{ $user->wali->nama }}</td>
                </tr>
                <tr>
                    <td class="capitalize w-2/5 pl-10">kontak wali</td>
                    <td class="uppercase">: {{ $user->wali->telepon }}</td>
                </tr>
                <tr>
                    <td class="capitalize w-2/5 pl-5">5. no kps / kip</td>
                    <td class="uppercase">: {{ $user->orangTua->no_kps ?? '-' }} /
                        {{ $user->orangTua->no_kip ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="capitalize w-2/5 pl-5">6. penghasilan orang tua</td>
                    <td class="uppercase">: {{ rupiah($user->orangTua->penghasilan) }}</td>
                </tr>
            </tbody>
        </table>
        <div class="flex justify-end mr-10 mt-5">
            <div class="flex flex-col space-y-10">
                <span class="text-center">
                    {{ hariTanggal($user->tanggal_daftar) }}
                    <br>
                    Calon Santri
                </span>
                <span class="text-center underline font-bold">
                    {{ $user->name }}
                </span>
            </div>
        </div>
    </div>
</x-layout-print>
