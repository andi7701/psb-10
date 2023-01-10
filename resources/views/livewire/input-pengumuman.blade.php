<div>
    <x-my-card class="flex space-y-4 flex-col ">
        <h2 class="mt-3 text-xl font-bold text-slate-600">Pengumuman</h2>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
            <x-select label="Kode Pendaftaran" wire:model="calonSiswa" placeholder="Pilih Kode Daftar" :async-data="route('users-kode-daftar')"
                option-label="kode_daftar" option-value="id" option-description="name" />
            <x-input wire:model.defer="nama" label="Nama Calon Siswa" disabled />
            <x-input wire:model.defer="sekolahDasar" label="Sekolah Dasar" class="font-bold " disabled />
            <x-input wire:model.defer="sekolahAsal" label="Sekolah Asal" class="font-bold " corner-hint="(Pindahan)"
                disabled />
        </div>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
            <x-native-select wire:model.defer='agama' label="Seleksi Agama" disabled>
                <option value="">Belum Seleksi</option>
                <option value="0">Tidak diterima</option>
                <option value="1">Diterima</option>
            </x-native-select>
            <x-native-select wire:model.defer='kesehatan' label="Seleksi Kesehatan" disabled>
                <option value="">Belum Seleksi</option>
                <option value="0">Tidak diterima</option>
                <option value="1">Diterima</option>
            </x-native-select>
            <x-native-select wire:model.defer='minatBakat' label="Seleksi Minat dan Bakat" disabled>
                <option value="">Belum Seleksi</option>
                <option value="0">Tidak diterima</option>
                <option value="1">Diterima</option>
            </x-native-select>
            <x-native-select wire:model.defer='wawancara' label="Seleksi Wawancara" disabled>
                <option value="">Belum Seleksi</option>
                <option value="0">Tidak diterima</option>
                <option value="1">Diterima</option>
            </x-native-select>
        </div>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
            <x-native-select wire:model.defer='akademik' label="Seleksi Akademik" disabled>
                <option value="">Belum Seleksi</option>
                <option value="0">Tidak diterima</option>
                <option value="1">Diterima</option>
            </x-native-select>
            <x-native-select wire:model.defer='lulus' label="Hasil Akhir">
                <option value="">Pilih Hasil Akhir</option>
                <option value="tidak diterima">Tidak diterima</option>
                <option value="diterima">Diterima</option>
            </x-native-select>
        </div>
        <div class="flex space-x-3 justify-end">
            @if ($user && $user->diterima)
                <x-button href="{{ route('pengumuman.print-surat-santri', ['user' => $user->slug]) }}" target="__blank"
                    cyan label="Surat Santri" icon="printer" />
                <x-button href="{{ route('pengumuman.print-surat-orang-tua', ['user' => $user->slug]) }}"
                    target="__blank" teal label="Surat Wali" icon="printer" />
                    <x-button href="{{ route('pengumuman.print-pengumuman', ['user' => $user->slug]) }}" target="__blank"
                        positive label="Pengumuman" icon="printer" />
            @endif
            @if ($user && !$user->diterima)
                <x-button href="{{ route('pengumuman.print-pengumuman', ['user' => $user->slug]) }}" target="__blank"
                    positive label="Pengumuman" icon="printer" />
            @endif
            <x-button wire:click.prevent="simpan" positive label="simpan" spinner="simpan" loading-delay="short"
                class="w-auto" />
        </div>
    </x-my-card>
</div>
