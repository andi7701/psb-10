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
