<div class="flex flex-col space-y-7 mb-10">
    <x-loading-simpan></x-loading-simpan>

    <h2 class="text-2xl font-bold text-slate-600 text-center">
        Form Pendaftaran Calon Siswa SMP Al Musyaffa' <br>
        Tahun Ajaran 2023 / 2024
    </h2>


    {{-- Identitas Siswa --}}
    <x-my-card class="flex space-y-4 flex-col ">
        <h2 class="mt-3 text-xl font-bold text-slate-600">A. Identitas Calon Siswa</h2>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
            <x-native-select wire:model="kategoriPendaftar" label="Pendaftaran Siswa">
                <option value="">Pilih Kategori</option>
                <option value="A">Baru Putra</option>
                <option value="B">Baru Putri</option>
                <option value="C">Pindahan Putra</option>
                <option value="D">Pindahan Putri</option>
            </x-native-select>
            <x-native-select wire:model.defer="tingkat" label="Pendaftaran Kelas">
                <option value="">Pilih Tingkat</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
            </x-native-select>
            <x-input wire:model.defer="nama" label="Nama Lengkap" />
            {{-- <x-input wire:model.defer="kodePendaftaran" label="Kode Pendaftaran" class="font-bold " disabled /> --}}
        </div>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
            <x-input wire:model.defer="nik" label="NIK" />
            <x-input wire:model.defer="tempatLahir" label="Tempat Lahir" />
            <x-input wire:model.defer="tanggalLahir" label="Tanggal Lahir" type="date" />
            <x-native-select wire:model.defer="jenisKelamin" label="Jenis Kelamin" disabled>
                <option value="">Jenis Kelamin</option>
                <option value="L">Laki - Laki</option>
                <option value="P">Perempuan</option>
            </x-native-select>
        </div>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
            <x-input wire:model.defer="nisn" label="NISN" corner-hint="10 Angka" />
            <x-input wire:model.defer="status" label="Status" placeholder="Anak Kandung / Tiri"
                corner-hint="contoh : Anak Kandung" />
            <x-input wire:model.defer="anakKe" label="Anak Ke - Berapa" placeholder="1 , 2 , 3 ..."
                corner-hint="contoh : 1 , 2, 3 ..." />
        </div>
    </x-my-card>

    {{-- Alamat Siswa --}}
    <x-my-card class="flex space-y-4 flex-col ">
        <h2 class="mt-3 text-xl font-bold text-slate-600">B. Alamat Calon Siswa</h2>
        <div>
            <x-textarea wire:model.defer="keterangan" label="Alamat"
                placeholder="Jl. Hidayah No.7 , Perum Asri Blok A No. 6 ..."
                corner-hint="contoh : Perum Asri Blok A No. 7" />
        </div>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
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
        <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
            <x-input wire:model.defer="rt" label='Rt' corner-hint="contoh : 1, 2, 3 ..." />
            <x-input wire:model.defer="rw" label='Rw' corner-hint="contoh : 1, 2, 3 ..." />
            <x-input wire:model.defer="kodePos" label='Kode Pos (*optional)' />
        </div>
    </x-my-card>

    {{-- Data Sekolah SD --}}
    <x-my-card class="flex space-y-4 flex-col ">
        <h2 class="mt-2 text-xl font-bold text-slate-600">C. Data Sekolah Dasar</h2>
        <div class="lg:grid lg:grid-cols-2 lg:gap-2">
            <x-input wire:model.defer="namaSekolahDasar" label="Nama Sekolah Dasar" />
        </div>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
            <x-native-select wire:model="provinsiSekolahDasar" label="Provinsi">
                <option value="">Pilih Provinsi</option>
                @foreach ($listProvinsiSekolahDasar as $prov)
                    <option value="{{ $prov->code }}">{{ $prov->name }}</option>
                @endforeach
            </x-native-select>
            <x-native-select wire:model="kabupatenSekolahDasar" label="Kabupaten">
                <option value="">Piih Kabupaten</option>
                @foreach ($listKabupatenSekolahDasar as $kab)
                    <option value="{{ $kab->code }}">{{ $kab->name }}</option>
                @endforeach
            </x-native-select>
            <x-native-select wire:model="kecamatanSekolahDasar" label="Kecamatan">
                <option value="">Pilih Kecamatan</option>
                @foreach ($listKecamatanSekolahDasar as $kec)
                    <option value="{{ $kec->code }}">{{ $kec->name }}</option>
                @endforeach
            </x-native-select>
            <x-native-select wire:model="desaSekolahDasar" label="Desa">
                <option value="">Pilih Desa</option>
                @foreach ($listDesaSekolahDasar as $des)
                    <option value="{{ $des->code }}">{{ $des->name }}</option>
                @endforeach
            </x-native-select>
        </div>
    </x-my-card>

    {{-- Data Sekolah Asal --}}
    <x-my-card
        class="{{ $kategoriPendaftar == 'A' || $kategoriPendaftar == 'B' || $kategoriPendaftar == '' ? 'hidden' : 'flex space-y-4 flex-col' }}">
        <h2 class="mt-2 text-xl font-bold text-slate-600">Data Sekolah Asal Pindahan</h2>
        <div class="llg:grid lg:grid-cols-2 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
            <x-input wire:model.defer="namaSekolahAsal" label="Nama Sekolah Asal" />
        </div>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
            <x-native-select wire:model="provinsiSekolahAsal" label="Provinsi">
                <option value="">Pilih Provinsi</option>
                @foreach ($listProvinsiSekolahAsal as $prov)
                    <option value="{{ $prov->code }}">{{ $prov->name }}</option>
                @endforeach
            </x-native-select>
            <x-native-select wire:model="kabupatenSekolahAsal" label="Kabupaten">
                <option value="">Piih Kabupaten</option>
                @foreach ($listKabupatenSekolahAsal as $kab)
                    <option value="{{ $kab->code }}">{{ $kab->name }}</option>
                @endforeach
            </x-native-select>
            <x-native-select wire:model="kecamatanSekolahAsal" label="Kecamatan">
                <option value="">Pilih Kecamatan</option>
                @foreach ($listKecamatanSekolahAsal as $kec)
                    <option value="{{ $kec->code }}">{{ $kec->name }}</option>
                @endforeach
            </x-native-select>
            <x-native-select wire:model="desaSekolahAsal" label="Desa">
                <option value="">Pilih Desa</option>
                @foreach ($listDesaSekolahAsal as $des)
                    <option value="{{ $des->code }}">{{ $des->name }}</option>
                @endforeach
            </x-native-select>
        </div>
    </x-my-card>

    {{-- Data Orang Tua --}}
    <x-my-card class="flex space-y-4 flex-col ">
        <h2 class="mt-2 text-xl font-bold text-slate-600">D. Data Orang Tua / Wali</h2>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
            <x-input wire:model.defer="namaAyah" label='Nama Ayah' />
            <x-input wire:model.defer='pekerjaanAyah' label='Pekerjaan Ayah' />
            <x-input wire:model.defer='namaIbu' label='Nama Ibu' />
            <x-input wire:model.defer='pekerjaanIbu' label='Pekerjaan Ibu' />
        </div>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2  lg:space-y-0 flex flex-col space-y-4">
            <x-input wire:model.defer='telepon' label='Nomor Telepon Orang Tua' placeholder="6281xxxxxx" />
            <x-inputs.currency label="Penghasilan" prefix="Rp." placeholder=" 10.000.000" thousands="." decimal="," precision="4"
                wire:model.defer="penghasilan" />
            <x-input wire:model.defer='noKps' label='Nomor KPS (*jika punya)' />
            <x-input wire:model.defer='noKip' label='Nomor KIP (*jika punya)' />
        </div>
        <h2 class="mt-2 text-xl font-bold text-slate-600">Data Wali (jika ikut orang tua kosongi saja)</h2>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
            <x-input wire:model.defer='namaWali' label='Nama Wali' />
            <x-input wire:model.defer='pekerjaanWali' label='Pekerjaan Wali' />
            <x-input wire:model.defer='teleponWali' label='Telepon Wali' placeholder="6281xxxxxx" />
        </div>
        <div>
            <x-textarea wire:model.defer='alamatWali' label='Alamat Wali' />
        </div>
    </x-my-card>
    <div class="flex justify-end space-x-3">
        <a href="{{ route('landing') }}"
            class="w-auto bg-slate-500 rounded-md py-2 px-3  hover:bg-slate-600 focus:ring focus:ring-white focus:border-white active:ring-slate-500 active:border-slate-500 flex justify-center items-center space-x-1 disabled:bg-slate-400"
            role="button">
            <span class="text-white">Batal</span>
        </a>
        <button wire:click.prevent="simpan" wire:target="simpan" wire:loading.attr='disabled'
            class="w-auto bg-emerald-500 rounded-md py-2 px-3  hover:bg-emerald-600 focus:ring focus:ring-white focus:border-white active:ring-emerald-500 active:border-emerald-500 flex justify-center items-center space-x-1 disabled:bg-slate-400">
            <span class="text-white">Daftar</span>
        </button>
    </div>
</div>
