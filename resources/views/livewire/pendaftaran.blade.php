<div class="flex flex-col space-y-5">
    {{-- <h2 class="text-2xl font-bold text-slate-600">Form Pendaftaran Calon Siswa</h2> <x-button label="Simpan" primary wire:click.prevent="simpan"/> --}}
    <x-my-card class="shadow-lg">
        <h2 class="mt-3 text-xl font-bold text-slate-600">A. Identitas Calon Siswa</h2>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2">
            <x-native-select wire:model="kategoriPendaftar" label="Pendaftaran Siswa" class="text-2xl">
                <option value="">Pilih Kategori</option>
                <option value="A">Baru Putra</option>
                <option value="B">Baru Putri</option>
                <option value="C">Pindahan Putra</option>
                <option value="D">Pindahan Putri</option>
            </x-native-select>
            <x-native-select wire:model="tingkat" label="Pendaftaran Kelas">
                <option value="">Pilih Kategori</option>
                <option value="A">Baru Putra</option>
                <option value="B">Baru Putri</option>
                <option value="C">Pindahan Putra</option>
                <option value="D">Pindahan Putri</option>
            </x-native-select>
            <x-input wire:model.defer="nama" label="Nama Lengkap" />
            <x-input wire:model="kodePendaftaran" label="Kode Pendaftaran" class="font-bold " disabled />
        </div>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2">
            <x-input wire:model.defer="nik" label="NIK" />
            <x-input wire:model.defer="tempatLahir" label="Tempat Lahir" />
            <x-input wire:model.defer="tanggalLahir" label="Tanggal Lahir" type="date" />
            <x-native-select wire:model.defer="jenisKelamin" label="Jenis Kelamin">
                <option value="">Jenis Kelamin</option>
                <option value="L">Laki - Laki</option>
                <option value="P">Perempuan</option>
            </x-native-select>
        </div>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2">
            <x-input wire:model="nisn" label="NISN" />
            {{-- <x-inputs wire:model="inputs">Provinsi</x-inputs>
            <x-selects :options="$options" wire:model="selects">Pilh</x-selects>
            {{ $selects }} --}}
        </div>
    </x-my-card>
    <x-my-card class="shadow-lg">
        <h2 class="mt-2 text-xl font-bold text-slate-600">B. Data Sekolah Asal</h2>
        <div class="lg:grid lg:grid-cols-2 lg:gap-2">
            <x-input wire:model.defer="namaSd" label="Nama Sekolah Dasar" />
        </div>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2">
            <x-native-select wire:model="provinsi" label="Provinsi">
                <option value="">Pilih Provinsi</option>
                @foreach ($listProvinsi as $prov)
                    <option value="{{ $prov->code }}">{{ $prov->name }}</option>
                @endforeach
            </x-native-select>
            <x-native-select wire:model="kabupaten" label="Kabupaten">
                <option value="">Piih Kabupaten</option>
                @foreach ($listKabupaten as $kab)
                    <option value="{{ $kab->code }}">{{ $kab->name }}</option>
                @endforeach
            </x-native-select>
            <x-native-select wire:model="kecamatan" label="Kecamatan">
                <option value="">Pilih Kecamatan</option>
                @foreach ($listKecamatan as $kec)
                    <option value="{{ $kec->code }}">{{ $kec->name }}</option>
                @endforeach
            </x-native-select>
            <x-native-select wire:model="desa" label="Desa">
                <option value="">Pilih Desa</option>
                @foreach ($listDesa as $des)
                    <option value="{{ $des->code }}">{{ $des->name }}</option>
                @endforeach
            </x-native-select>
        </div>
    </x-my-card>
</div>
