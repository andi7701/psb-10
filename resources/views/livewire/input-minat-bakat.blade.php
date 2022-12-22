<div>
    <x-loading></x-loading>
    <x-my-card class="flex space-y-4 flex-col ">
        <h2 class="mt-3 text-xl font-bold text-slate-600">Seleksi Minat dan Bakat</h2>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
            {{-- <x-native-select wire:model="calonSiswa" label="Kode Daftar">
                <option value="">Pilih Kode Daftar</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->kode_daftar }}</option>
                @endforeach
            </x-native-select> --}}
            <x-select label="Calon Siswa" wire:model="calonSiswa" placeholder="Pilih Kode Daftar" :async-data="route('users-kode-daftar')"
                option-label="kode_daftar" option-value="id" />
            <x-input wire:model.defer="nama" label="Nama Calon Siswa" disabled />
            <x-input wire:model.defer="sekolahDasar" label="Sekolah Dasar" class="font-bold " disabled />
            <x-input wire:model.defer="sekolahAsal" label="Sekolah Asal" class="font-bold " corner-hint="(Pindahan)"
                disabled />
        </div>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
            <x-input wire:model.defer="mapelUnggul" label="Mapel yang Unggul" placeholder='IPA, Matematika... ' />
            <x-input wire:model.defer='mapelRendah' label='Mapel yang Rendah' placeholder='IPA, Matematika... ' />
            <x-input wire:model.defer='kehadiran' label='Kehadiran' placeholder='Rajin ... ' />
            <x-input wire:model.defer='kenaikan' label='Riwayat kenaikan kelas'
                placeholder='Selalu Naik, Pernah tidak naik... ' />
        </div>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
            <x-input wire:model.defer='sikap' label='Sikap' placeholder='A,B,C...' />
            <x-input wire:model.defer='rataRata' label='Rata - rata nilai raport' placeholder='75, 80, 90,... '
                corner-hint='KKM 75' />
            <x-input wire:model.defer='nonAkademik' label='Prestasi Non Akademik' placeholder='Juara lomba ....' />
            <x-native-select wire:model.defer='ekstra' label='Rekomendasi Ekstrakurikuler'>
                <option value="">Pilih Ekstrakurikuler</option>
                @foreach ($ekstras as $ekstra)
                    <option value="{{ $ekstra->id }}">{{ $ekstra->nama }}</option>
                @endforeach
            </x-native-select>
        </div>
        <h2 class="mt-3 text-xl font-bold text-slate-600">Prestasi Akademik</h2>
        <div class="lg:grid lg:grid-cols-6 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
            <x-input wire:model.defer='smt1' label='Semester 1' placeholder='1, 2, 3, ... ' />
            <x-input wire:model.defer='smt2' label='Semester 2' placeholder='1, 2, 3, ... ' />
            <x-input wire:model.defer='smt3' label='Semester 3' placeholder='1, 2, 3, ... ' />
            <x-input wire:model.defer='smt4' label='Semester 4' placeholder='1, 2, 3, ... ' />
            <x-input wire:model.defer='smt5' label='Semester 5' placeholder='1, 2, 3, ... ' />
            <x-input wire:model.defer='smt6' label='Semester 6' placeholder='1, 2, 3, ... ' />
        </div>
        <div class="lg:grid lg:grid-cols-6 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
            <x-input wire:model.defer='smt7' label='Semester 7' placeholder='1, 2, 3, ... ' />
            <x-input wire:model.defer='smt8' label='Semester 8' placeholder='1, 2, 3, ... ' />
            <x-input wire:model.defer='smt9' label='Semester 9' placeholder='1, 2, 3, ... ' />
            <x-input wire:model.defer='smt10' label='Semester 10' placeholder='1, 2, 3, ... ' />
            <x-input wire:model.defer='smt11' label='Semester 11' placeholder='1, 2, 3, ... ' />
            <x-input wire:model.defer='smt12' label='Semester 12' placeholder='1, 2, 3, ... ' />
        </div>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
            <div class="lg:col-span-3">
                <x-input wire:model.defer="catatan" label='catatan' />
            </div>
            <x-native-select wire:model.defer='nilai' label="Rekomendasi Penilaian">
                <option value="">Pilih Penilaian</option>
                <option value="0">Tidak diterima</option>
                <option value="1">Diterima</option>
            </x-native-select>
        </div>
        <div class="flex justify-end">
            <x-button wire:click.prevent="simpan" positive label="simpan" spinner="simpan" loading-delay="short"
                class="w-auto" />
        </div>
    </x-my-card>
</div>
