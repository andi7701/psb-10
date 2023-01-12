<div>
    <x-loading></x-loading>
    <x-my-card class="flex space-y-4 flex-col ">
        <h2 class="mt-3 text-xl font-bold text-slate-600">Ukur Seragam</h2>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
            <x-select label="Kode Pendaftaran" wire:model="calonSiswa" placeholder="Pilih Kode Daftar" :async-data="route('users-diterima')"
                option-label="kode_daftar" option-value="id" />
            <x-input wire:model.defer="nama" label="Nama Calon Siswa" disabled />
            <x-input wire:model.defer="sekolahDasar" label="Sekolah Dasar" class="font-bold " disabled />
            <x-input wire:model.defer="sekolahAsal" label="Sekolah Asal" class="font-bold " corner-hint="(Pindahan)"
                disabled />
        </div>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
            <x-native-select wire:model.defer='baju_osis' label="Baju Osis">
                <option value="">Pilih Ukuran</option>
                @foreach (App\Enums\Ukuran::cases() as $item)
                    <option value="{{ $item->value }}">{{ Str::upper($item->value) }}</option>
                @endforeach
            </x-native-select>
            <x-native-select wire:model.defer='baju_batik' label="Baju Batik">
                <option value="">Pilih Ukuran</option>
                @foreach (App\Enums\Ukuran::cases() as $item)
                    <option value="{{ $item->value }}">{{ Str::upper($item->value) }}</option>
                @endforeach
            </x-native-select>
            <x-native-select wire:model.defer='baju_pramuka' label="Baju Pramuka">
                <option value="">Pilih Ukuran</option>
                @foreach (App\Enums\Ukuran::cases() as $item)
                    <option value="{{ $item->value }}">{{ Str::upper($item->value) }}</option>
                @endforeach
            </x-native-select>
            <x-native-select wire:model.defer='baju_or' label="Baju Olah Raga">
                <option value="">Pilih Ukuran</option>
                @foreach (App\Enums\Ukuran::cases() as $item)
                    <option value="{{ $item->value }}">{{ Str::upper($item->value) }}</option>
                @endforeach
            </x-native-select>
        </div>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
            <x-native-select wire:model.defer='bawah_osis' label="Bawah Osis">
                <option value="">Pilih Ukuran</option>
                @for ($i = 24; $i < 43; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </x-native-select>
            <x-native-select wire:model.defer='bawah_batik' label="Bawah Batik">
                <option value="">Pilih Ukuran</option>
                @for ($i = 24; $i < 43; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </x-native-select>
            <x-native-select wire:model.defer='bawah_pramuka' label="Bawah Pramuka">
                <option value="">Pilih Ukuran</option>
                @for ($i = 24; $i < 43; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </x-native-select>
            <x-native-select wire:model.defer='bawah_or' label="Celana Olah Raga">
                <option value="">Pilih Ukuran</option>
                @foreach (App\Enums\Ukuran::cases() as $item)
                    <option value="{{ $item->value }}">{{ Str::upper($item->value) }}</option>
                @endforeach
            </x-native-select>
        </div>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
            <x-native-select wire:model.defer='peci' label="Peci">
                <option value="">Pilih Ukuran</option>
                @for ($i = 2; $i < 9; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </x-native-select>
        </div>
        <div class="flex justify-end">
            <x-button wire:click.prevent="simpan" positive label="simpan" spinner="simpan" loading-delay="short"
                class="w-auto" />
        </div>
    </x-my-card>
</div>
