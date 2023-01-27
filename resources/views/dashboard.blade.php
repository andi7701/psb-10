<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="overflow-hidden bg-white border-2 rounded-lg shadow-lg ">
        <div class="p-6 text-gray-900">
            @role('Calon Siswa')
                <p class="text-slate-600 text-justify">
                    Selamat anda berhasil melakukan pendaftaran! <br>
                    <br>
                    Nomor Pendaftaran anda :
                    <span class="text-lg font-bold">
                        {{ auth()->user()->kode_daftar }}
                    </span>
                    <br>
                    <br>
                    Catat dan simpan nomor pendaftaran untuk konfirmasi dan tes seleksi di kampus SMP Al Musyaffa'
                </p>
                <br>
                <p class="text-slate-600 text-justify">
                    Jadwal Tes Seleksi dan Pendaftaran Offline<br>
                    <br>
                <ul class="text-slate-600 font-bold">
                    @if (auth()->user()->tanggal_daftar < date('2023-01-26'))
                    <li class="list-disc">Gelombang I : Tanggal 6 Januari 2023 - 27 Januari 2023</li>
                    @elseif(auth()->user()->tanggal_daftar < date('2023-02-25'))
                    <li class="list-disc">Gelombang II : Tanggal 3 Februari 2023 - 24 Februari 2023</li>
                    @else
                    <li class="list-disc">Gelombang III : Tanggal 26 Mei 2023 - 02 Juni 2023</li>
                    @endif
                    <li class="list-disc">Waktu : Setiap jum'at pukul 07.30 - 12.30 WIB</li>
                </ul>
                </p>
            @else
                <p class="text-slate-600 text-justify">
                    Selamat datang di dashboard Sistem Seleksi Penerimaan Santri Baru SMP Al Musyaffa'<br>
                    Tahun Ajaran 2023 / 2024
                    <br>
                    <br>
                    Silahkan klik Menu untuk memilih menu seleksi
                </p>
            @endrole
        </div>
    </div>
</x-app-layout>
