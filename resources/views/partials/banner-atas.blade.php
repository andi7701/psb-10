<div class="container flex flex-col flex-wrap items-center justify-between px-1 mx-auto md:flex-row">
    <div class="flex flex-col items-center justify-center w-full pt-24 text-center lg:items-start md:w-2/5 md:text-left">
        <p class="w-full uppercase tracking-loose">portal pendaftaran santri baru</p>
        <h1 class="my-2 text-2xl font-bold leading-tight lg:text-5xl">
            SMP Al Musyaffa'
        </h1>
        <p class="mb-3 leading-normal text-md lg:text-2xl">
            Tahun Pelajaran 2023 / 2024
            <br>
            Pendaftarn Gelombang 1 terakhir pada hari juma't tanggal 27 januri 2023 pukul 07.30 - 12.30 WIB
            {{-- Pendaftaran offline dibuka setiap Jum'at : pukul 07.30 - 12.30 WIB --}}
            <br>
            {{-- @if ($totalPendaftar > 330)
                Kuota Pendaftaran Gelombang 1 telah terpenuhi, Silahkan mendaftar digelombang 2 mulai 3 Februari s/d 24
                Februari 2023
            @else --}}
            Untuk pendaftaran online silahkan klik tombol Daftar berikut
            {{-- @endif --}}
        </p>
        @if ($totalPendaftar > 330)
        @else
            <a href="{{ route('daftar') }}"
                class="px-5 py-2 mx-auto my-6 font-bold text-gray-800 transition duration-300 ease-in-out transform bg-white rounded-full shadow-lg cursor-pointer lg:mx-0 focus:outline-none focus:shadow-outline hover:scale-105">
                Daftar
            </a>
        @endif
    </div>
    <div class="flex justify-end w-full text-center lg:pt-10 md:w-2/5">
        <img class="w-full md:w-4/5" src="/images/3orang.png" />
    </div>
</div>
