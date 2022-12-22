<div>
    <x-loading></x-loading>
    <x-my-card class="flex space-y-4 flex-col ">
        <h2 class="mt-3 text-xl font-bold text-slate-600">Seleksi Agama</h2>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
            <x-select label="Kode Pendaftaran" wire:model="calonSiswa" placeholder="Pilih Kode Daftar" :async-data="route('users-kode-daftar')"
                option-label="kode_daftar" option-value="id" />
            <x-input wire:model.defer="nama" label="Nama Calon Siswa" disabled />
            <x-input wire:model.defer="sekolahDasar" label="Sekolah Dasar" class="font-bold " disabled />
            <x-input wire:model.defer="sekolahAsal" label="Sekolah Asal" class="font-bold " corner-hint="(Pindahan)"
                disabled />
        </div>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
            <x-input wire:model.defer="mahroj" label="Makhrojul huruf" />
            <x-input wire:model.defer='lancar' label='Tingkat kelancaran' />
            <x-input wire:model.defer='tajwid' label='Tajwid' />
            <x-input wire:model.defer='qunut' label="Do'a qunut" />
        </div>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
            <x-input wire:model.defer='tahiyat' label='Tahiyat akhir' />
            <x-input wire:model.defer='kesopanan' label='Kesopanan' />
            <x-native-select wire:model.defer='nilai' label="Rekomendasi Penilaian">
                <option value="">Pilih Penilaian</option>
                <option value="0">Tidak diterima</option>
                <option value="1">Diterima</option>
            </x-native-select>
        </div>
        <div>
            <x-input wire:model.defer="catatan" label='catatan' />
        </div>
        <div class="flex justify-end">
            <x-button wire:click.prevent="simpan" positive label="simpan" spinner="simpan" loading-delay="short"
                class="w-auto" />
        </div>
    </x-my-card>
</div>
