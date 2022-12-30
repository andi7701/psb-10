<div>
    <x-loading></x-loading>
    <x-my-card class="flex space-y-4 flex-col ">
        <h2 class="mt-3 text-xl font-bold text-slate-600">Seleksi Wawancara</h2>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
            <x-select label="Kode Pendaftaran" wire:model="calonSiswa" placeholder="Pilih Kode Daftar" :async-data="route('users-kode-daftar')"
                option-label="kode_daftar" option-value="id" />
            <x-input wire:model.defer="nama" label="Nama Calon Siswa" disabled />
            <x-input wire:model.defer="sekolahDasar" label="Sekolah Dasar" class="font-bold " disabled />
            <x-input wire:model.defer="sekolahAsal" label="Sekolah Asal" class="font-bold " corner-hint="(Pindahan)"
                disabled />
        </div>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
            <x-input wire:model.defer="sumberInformasi" label="Sumber informasi"  />
            <x-input wire:model.defer='alasan' label='Alasan memilih sekolah' />
            <x-input wire:model.defer='alasanOrangTua' label='Jika karna orang tua'  />
            <x-input wire:model.defer='minatLain' label='Minat ke Sekolah lain' />
        </div>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
            <x-input wire:model.defer='pilihanKe' label='SMP Almusyaffa Pilihan Ke -' />
            <x-native-select wire:model.defer='kondisiKeluarga' label="Kondisi Keluarga">
                <option value="">Pilih Kondisi</option>
                @foreach (App\Enums\KondisiKeluarga::cases() as $item)
                <option value="{{ $item->value }}">{{ Str::ucfirst($item->value) }}</option>
                @endforeach
            </x-native-select>
            <x-input wire:model.defer='statusAnak' label='Status anak' corner-hint="(Kandung, Tiri)" />
            <x-input wire:model.defer='jumlahAnak' label='Jumlah Saudara' />
        </div>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
            <x-input wire:model.defer='tinggalBersama' label='Tinggal bersama'  />
            <x-input wire:model.defer='statusAyah' label='Status ayah' corner-hint="(Kandung, Tiri)" />
            <x-input wire:model.defer='statusIbu' label='Status ibu'  corner-hint="(Kandung, Tiri)" />
            <x-input wire:model.defer='penanggungJawab' label='Penanggung Jawab'  />
        </div>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
            <x-input wire:model.defer='pekerjaanAyah' label='Pekerjaan ayah'  />
            <x-input wire:model.defer='pekerjaanIbu' label='Pekerjaan ibu' />
            <x-native-select wire:model.defer='kondisiAyah' label="Kondisi Ayah">
                <option value="">Pilih Kondisi</option>
                @foreach (App\Enums\KondisiOrangTua::cases() as $item)
                <option value="{{ $item->value }}">{{ Str::ucfirst($item->value) }}</option>
                @endforeach
            </x-native-select>
            <x-native-select wire:model.defer='kondisiIbu' label="Kondisi Ibu">
                <option value="">Pilih Kondisi</option>
                @foreach (App\Enums\KondisiOrangTua::cases() as $item)
                <option value="{{ $item->value }}">{{ Str::ucfirst($item->value) }}</option>
                @endforeach
            </x-native-select>
        </div>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
            <x-input wire:model.defer='penjaminBiaya' label='Penjamin biaya'  />
            <x-input wire:model.defer='pekerjaanPenjamin' label='Pekerjaan penjamin biaya' />
            <x-input wire:model.defer='kesopanan' label='Kesopanan Siswa' />
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
