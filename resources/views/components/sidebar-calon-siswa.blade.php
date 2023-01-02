@role('Calon Siswa')
    @if (auth()->user()->boleh_test)
        <x-sidebar-link :href="__('exam')" :label="__('mulai tes')" />
    @endif
@endrole
