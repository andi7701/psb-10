<div class="flex flex-col space-y-5">
    <h2 class="text-2xl font-bold text-slate-600">Form Pendaftaran Calon Siswa</h2> <x-button label="Simpan" primary wire:click.prevent="simpan"/>
    <x-my-card class="shadow-lg">
        <h2 class="mt-3 text-xl font-bold text-slate-600">A. Identitas Calon Siswa</h2>
        <div class="grid grid-cols-2 gap-4 lg:flex lg:flex-row">
            <x-radio id="baru-putra" label="Baru Putra" wire:model="kategoriPendaftar" value="A" />
            <x-radio id="baru-putri" label="Baru Putri" wire:model="kategoriPendaftar" value="B" />
            <x-radio id="pindah-putra" label="Pindahan Putra" wire:model="kategoriPendaftar" value="C" />
            <x-radio id="pindah-putri" label="Pindahan Putri" wire:model="kategoriPendaftar" value="D" />
        </div>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2">
            <x-input wire:model="kodePendaftaran" label="Kode Pendaftaran" class="font-bold " disabled />
        </div>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2">
            <x-input wire:model.defer="nama" label="Nama Calon Siswa" />
            <x-input wire:model.defer="nisn" label="NISN" />
            <x-input wire:model.defer="tempat" label="Tempat Lahir" />
            <x-input wire:model.defer="tanggalLahir" label="Tanggal Lahir" type="date" />
        </div>
    </x-my-card>
    <x-my-card class="shadow-lg">
        <h2 class="mt-2 text-xl font-bold text-slate-600">B. Data Sekolah Asal</h2>
        <div class="lg:grid lg:grid-cols-2 lg:gap-2">
            <x-input wire:model.defer="namaSd" label="Nama Sekolah Dasar" />
        </div>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2">
            <x-native-select wire:model="provinsi" label="Provinsi">
                <option value="">PILIH PROVINSI</option>
                @foreach ($listProvinsi as $prov)
                    <option value="{{ $prov->code }}">{{ $prov->name }}</option>
                @endforeach
            </x-native-select>
            <x-native-select wire:model="kabupaten" label="Kabupaten">
                <option value="">PILIH KABUPATEN</option>
                @foreach ($listKabupaten as $kab)
                    <option value="{{ $kab->code }}">{{ $kab->name }}</option>
                @endforeach
            </x-native-select>
            <x-native-select wire:model="kecamatan" label="Kecamatan">
                <option value="">PILIH KECAMATAN</option>
                @foreach ($listKecamatan as $kec)
                    <option value="{{ $kec->code }}">{{ $kec->name }}</option>
                @endforeach
            </x-native-select>
            <x-native-select wire:model="desa" label="Desa">
                <option value="">PILIH DESA</option>
                @foreach ($listDesa as $des)
                    <option value="{{ $des->code }}">{{ $des->name }}</option>
                @endforeach
            </x-native-select>
        </div>
    </x-my-card>
</div>
