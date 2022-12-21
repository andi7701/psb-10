<div>
    <x-my-card class="flex space-y-4 flex-col ">
        <h2 class="mt-3 text-xl font-bold text-slate-600">Seleksi Minat dan Bakat</h2>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
            <x-native-select wire:model="calonSiswa" label="Kode Daftar">
                <option value="">Pilih Kode Daftar</option>
                @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->kode_daftar }}</option>
                @endforeach
            </x-native-select>
            <x-input wire:model.defer="nama" label="Nama Calon Siswa" disabled/>
            <x-input wire:model.defer="kodePendaftaran" label="Kode Pendaftaran" class="font-bold " disabled />
            <x-input wire:model.defer="kodePendaftaran" label="Sekolah Dasar" class="font-bold " disabled />
        </div>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
            <x-input wire:model.defer="kodePendaftaran" label="Sekolah Asal Pindahan" class="font-bold " disabled />
        </div>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
        </div>
    </x-my-card>
</div>
