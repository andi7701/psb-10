<div>
    <x-loading></x-loading>
    <x-my-card class="flex space-y-4 flex-col ">
        <h2 class="mt-3 text-xl font-bold text-slate-600">Seleksi Agama</h2>
        <div class="lg:grid lg:grid-cols-3 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
            <x-select label="Kode Pendaftaran" wire:model="calonSiswa" placeholder="Pilih Kode Daftar" :async-data="route('users-kode-daftar')"
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
            <x-native-select wire:model.defer='mahroj' label="Makhrojul huruf">
                <option value="">Pilih Penilaian</option>
                <option value="baik">Baik</option>
                <option value="sedang">Sedang</option>
                <option value="kurang">Kurang</option>
                <option value="sangat kurang">Sangat Kurang</option>
            </x-native-select>
            <x-native-select wire:model.defer='lancar' label="Tingkat Kelancaran">
                <option value="">Pilih Penilaian</option>
                <option value="baik">Baik</option>
                <option value="sedang">Sedang</option>
                <option value="kurang">Kurang</option>
                <option value="sangat kurang">Sangat Kurang</option>
            </x-native-select>
            <x-native-select wire:model.defer='tajwid' label="Tajwid">
                <option value="">Pilih Penilaian</option>
                <option value="baik">Baik</option>
                <option value="sedang">Sedang</option>
                <option value="kurang">Kurang</option>
                <option value="sangat kurang">Sangat Kurang</option>
            </x-native-select>
            <x-native-select wire:model.defer='qunut' label="Do'a qunut">
                <option value="">Pilih Penilaian</option>
                <option value="baik">Baik</option>
                <option value="sedang">Sedang</option>
                <option value="kurang">Kurang</option>
                <option value="sangat kurang">Sangat Kurang</option>
            </x-native-select>
        </div>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
            <x-native-select wire:model.defer='tahiyat' label="Tahiyat">
                <option value="">Pilih Penilaian</option>
                <option value="baik">Baik</option>
                <option value="sedang">Sedang</option>
                <option value="kurang">Kurang</option>
                <option value="sangat kurang">Sangat Kurang</option>
            </x-native-select>
            <x-native-select wire:model.defer='tulisan' label="Tulisan">
                <option value="">Pilih Penilaian</option>
                <option value="baik">Baik</option>
                <option value="sedang">Sedang</option>
                <option value="kurang">Kurang</option>
            </x-native-select>
            <x-native-select wire:model.defer='pegon' label="Pegon">
                <option value="">Pilih Penilaian</option>
                <option value="bisa">Bisa</option>
                <option value="belum bisa">Belum Bisa</option>
            </x-native-select>
            <x-native-select wire:model.defer='nilaiQuran' label="Nilai Al-Qur'an">
                <option value="">Pilih Penilaian</option>
                <option value="baik">Baik</option>
                <option value="sedang">Sedang</option>
                <option value="kurang">Kurang</option>
                <option value="sangat kurang">Sangat Kurang</option>
            </x-native-select>
        </div>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
            <x-native-select wire:model.defer='nilai' label="Rekomendasi Penilaian">
                <option value="">Pilih Penilaian</option>
                <option value="0">Tidak diterima</option>
                <option value="1">Diterima</option>
            </x-native-select>
            <div class="col-span-3">
                <x-input wire:model.defer="catatan" label='catatan' />
            </div>
        </div>
        <div class="flex justify-end">
            <x-button wire:click.prevent="simpan" positive label="simpan" spinner="simpan" loading-delay="short"
                class="w-auto" />
        </div>
    </x-my-card>
</div>
