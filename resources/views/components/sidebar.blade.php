<div class="w-[250px] z-40 h-full py-5 px-0 fixed overflow-x-hidden overflow-y-scroll myscroll top-0 left-0 shadow-md transition duration-500 lg:translate-x-0 bg-white"
    :class="open ? 'translate-x-0 ease-in' : '-translate-x-64 ease-out'">
    <div class="px-4 space-y-2">
        <button @click="open = false"
            class="absolute p-1 text-white transition duration-500 transform border-2 rounded-full shadow-md bg-emerald-600 right-5 top-5 border-emerald-700 hover:bg-emerald-500 focus:bg-emerald-500 lg:invisible">
            <svg style="width: 24px; height: 24px" viewBox="0 0 24 24">
                <path fill="currentColor"
                    d="M20 6.91L17.09 4L12 9.09L6.91 4L4 6.91L9.09 12L4 17.09L6.91 20L12 14.91L17.09 20L20 17.09L14.91 12L20 6.91Z" />
            </svg>
        </button>
        <h1 class="block py-8 text-2xl font-bold text-emerald-700">{{ auth()->user()->name }}</h1>

        <x-sidebar-link :href="__('dashboard')" :label="__('dashboard')" />

        @role('Admin')
            <x-sidebar-link :href="__('admin.atur-test')" :label="__('atur tes')" />
            <x-sidebar-link :href="__('admin.buat-role')" :label="__('buat role')" />
            <x-sidebar-link :href="__('admin.data-panitia')" :label="__('data panitia')" />
            <x-sidebar-link :href="__('admin.data-pendaftar')" :label="__('data pendaftar')" />
            <x-sidebar-link :href="__('admin.input-agama')" :label="__('input agama')" />
            <x-sidebar-link :href="__('admin.input-kesehatan')" :label="__('input kesehatan')" />
            <x-sidebar-link :href="__('admin.input-minat-bakat')" :label="__('input minat bakat')" />
            <x-sidebar-link :href="__('admin.input-pengumuman')" :label="__('Input pengumuman')" />
            <x-sidebar-link :href="__('admin.input-wawancara')" :label="__('Input Wawancara')" />
            <x-sidebar-link :href="__('admin.pendaftaran')" :label="__('pendaftaran siswa')" />
        @endrole

        @role('Calon Siswa')
            @if (auth()->user()->boleh_test)
                <x-sidebar-link :href="__('exam')" :label="__('mulai tes')" />
            @endif
        @endrole

        @role('Pendaftaran')
            <x-sidebar-link :href="__('pendaftaran.data-pendaftar')" :label="__('data pendaftar')" />
            <x-sidebar-link :href="__('pendaftaran.pendaftaran')" :label="__('pendaftaran siswa')" />
        @endrole

        @role('Agama')
            <x-sidebar-link :href="__('agama.input-agama')" :label="__('input agama')" />
            <x-sidebar-link :href="__('agama.hasil-diterima')" :label="__('hasil diterima')" />
            <x-sidebar-link :href="__('agama.hasil-ditolak')" :label="__('hasil ditolak')" />
        @endrole

        @role('Akademik')
            <x-sidebar-link :href="__('akademik.atur-test')" :label="__('atur tes')" />
            <x-sidebar-link :href="__('akademik.hasil-test')" :label="__('hasil tes')" />
            <x-sidebar-link :href="__('akademik.hasil-diterima')" :label="__('hasil diterima')" />
            <x-sidebar-link :href="__('akademik.hasil-ditolak')" :label="__('hasil ditolak')" />
        @endrole

        @role('Kepala Sekolah')
            <x-sidebar-link :href="__('kepala-sekolah.data-pendaftar')" :label="__('data pendaftar')" />
            <x-sidebar-link :href="__('kepala-sekolah.hasil-test-akademik')" :label="__('hasil tes akademik')" />
            <x-sidebar-link :href="__('kepala-sekolah.hasil-agama')" :label="__('hasil agama')" />
            <x-sidebar-link :href="__('kepala-sekolah.hasil-akademik')" :label="__('hasil akademik')" />
            <x-sidebar-link :href="__('kepala-sekolah.hasil-kesehatan')" :label="__('hasil kesehatan')" />
            <x-sidebar-link :href="__('kepala-sekolah.hasil-minat-bakat')" :label="__('hasil minat bakat')" />
            <x-sidebar-link :href="__('kepala-sekolah.hasil-pengumuman')" :label="__('hasil pengumuman')" />
            <x-sidebar-link :href="__('kepala-sekolah.hasil-wawancara')" :label="__('hasil Wawancara')" />
        @endrole

        @role('Kesehatan')
            <x-sidebar-link :href="__('kesehatan.input-kesehatan')" :label="__('input kesehatan')" />
            <x-sidebar-link :href="__('kesehatan.hasil-diterima')" :label="__('hasil diterima')" />
            <x-sidebar-link :href="__('kesehatan.hasil-ditolak')" :label="__('hasil ditolak')" />
        @endrole

        @role('Ketua')
            <x-sidebar-link :href="__('ketua.atur-test')" :label="__('atur tes akademik')" />
            <x-sidebar-link :href="__('ketua.data-pendaftar')" :label="__('data pendaftar')" />
            <x-sidebar-link :href="__('ketua.hasil-test-akademik')" :label="__('hasil tes akademik')" />
            <x-sidebar-link :href="__('ketua.input-agama')" :label="__('input agama')" />
            <x-sidebar-link :href="__('ketua.input-kesehatan')" :label="__('input kesehatan')" />
            <x-sidebar-link :href="__('ketua.input-minat-bakat')" :label="__('input minat bakat')" />
            <x-sidebar-link :href="__('ketua.input-pengumuman')" :label="__('Input pengumuman')" />
            <x-sidebar-link :href="__('ketua.input-wawancara')" :label="__('Input Wawancara')" />
            <x-sidebar-link :href="__('ketua.pendaftaran')" :label="__('pendaftaran siswa')" />
        @endrole

        @role('Minat Bakat')
            <x-sidebar-link :href="__('minat-bakat.input-minat-bakat')" :label="__('input minat bakat')" />
            <x-sidebar-link :href="__('minat-bakat.hasil-diterima')" :label="__('hasil diterima')" />
            <x-sidebar-link :href="__('minat-bakat.hasil-ditolak')" :label="__('hasil ditolak')" />
        @endrole

        @role('Pengumuman')
            <x-sidebar-link :href="__('pengumuman.input-pengumuman')" :label="__('input pengumuman')" />
            <x-sidebar-link :href="__('pengumuman.hasil-diterima')" :label="__('hasil diterima')" />
            <x-sidebar-link :href="__('pengumuman.hasil-ditolak')" :label="__('hasil ditolak')" />
        @endrole

        @role('Sekretaris')
            <x-sidebar-link :href="__('sekretaris.atur-test')" :label="__('atur tes akademik')" />
            <x-sidebar-link :href="__('sekretaris.data-pendaftar')" :label="__('data pendaftar')" />
            <x-sidebar-link :href="__('sekretaris.hasil-test-akademik')" :label="__('hasil tes akademik')" />
            <x-sidebar-link :href="__('sekretaris.input-agama')" :label="__('input agama')" />
            <x-sidebar-link :href="__('sekretaris.input-kesehatan')" :label="__('input kesehatan')" />
            <x-sidebar-link :href="__('sekretaris.input-minat-bakat')" :label="__('input minat bakat')" />
            <x-sidebar-link :href="__('sekretaris.input-pengumuman')" :label="__('Input pengumuman')" />
            <x-sidebar-link :href="__('sekretaris.input-wawancara')" :label="__('Input Wawancara')" />
            <x-sidebar-link :href="__('sekretaris.pendaftaran')" :label="__('pendaftaran siswa')" />
        @endrole

        @role('Ukur Seragam')
            <x-sidebar-link :href="__('ukur-seragam.ukur-seragam')" :label="__('ukur seragam')" />
            <x-sidebar-link :href="__('ukur-seragam.belum-ukur')" :label="__('belum ukur')" />
            <x-sidebar-link :href="__('ukur-seragam.sudah-ukur')" :label="__('sudah ukur')" />
            <x-sidebar-link :href="__('ukur-seragam.rekap-ukuran')" :label="__('rekap ukuran')" />
        @endrole

        @role('Wawancara')
            <x-sidebar-link :href="__('wawancara.input-wawancara')" :label="__('Input Wawancara')" />
            <x-sidebar-link :href="__('wawancara.hasil-diterima')" :label="__('hasil diterima')" />
            <x-sidebar-link :href="__('wawancara.hasil-ditolak')" :label="__('hasil ditolak')" />
        @endrole
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button
                class="relative font-bold flex items-center p-2 space-x-2 rounded-md text-slate-600 cursor-pointer hover:bg-emerald-400 hover:text-white hover:shadow-lg hover:shadow-emerald-300 hover:border-white hover:border"
                type="submit">Log Out</button>
        </form>

    </div>
</div>
