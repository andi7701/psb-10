<div>
    <x-loading></x-loading>
    <x-my-card class="flex space-y-4 flex-col ">
        <h2 class="mt-3 text-xl font-bold text-slate-600">Seleksi Kesehatan</h2>
        <div class="lg:grid lg:grid-cols-3 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
            <x-select label="Kode Pendafataran" wire:model="calonSiswa" placeholder="Pilih Kode Daftar" :async-data="route('users-kode-daftar')"
                option-label="kode_daftar" option-value="id" option-description="name" />
            <x-select label="Kode Baru" wire:model="calonSiswaBaru" placeholder="Pilih Kode Daftar" :async-data="route('users-kode-daftar')"
                option-label="kode_daftar" option-value="id" option-description="name" />
            <div class="flex items-end">
                <x-button wire:click.prevent="tarik" positive label="Tarik Data" spinner="tarik" loading-delay="short"
                    class="w-auto" />
            </div>
        </div>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
            <x-input wire:model.defer="nama" label="Nama Calon Siswa" disabled />
            <x-input wire:model.defer="sekolahDasar" label="Sekolah Dasar" class="font-bold " disabled />
            <x-input wire:model.defer="sekolahAsal" label="Sekolah Asal" class="font-bold " corner-hint="(Pindahan)"
                disabled />
        </div>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
            <x-input wire:model.defer="tinggi" label="Tinggi badan" />
            <x-input wire:model.defer='berat' label='Berat badan' />
            <x-input wire:model.defer='kuku' label='Kuku' />
            <x-input wire:model.defer='rambut' label='Rambut' />
        </div>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
            <x-input wire:model.defer='butaWarna' label='Kebutaan terhadap warna' />
            <x-input wire:model.defer='minus' label='Mata minus'/>
            <x-native-select wire:model.defer='ngompol' label="Masih ngompol">
                <option value="">Pilih</option>
                <option value="0">Tidak ngompol</option>
                <option value="1">Ngompol</option>
            </x-native-select>
            <x-native-select wire:model.defer='rokok' label="Merokok">
                <option value="">Pilih</option>
                <option value="0">Tidak merokok</option>
                <option value="1">Merokok</option>
            </x-native-select>
        </div>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
            <x-input wire:model.defer='sehat' label='Punya penyakit' corner-hint="(penyakit dalam, sehat)" />
            <x-input wire:model.defer='darah' label='Golongan darah' />
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
