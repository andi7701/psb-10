<div>
    <x-my-card class="flex space-y-4 flex-col">
        <form wire:submit.prevent="simpan">
            <h2 class="mt-3 text-xl font-bold text-slate-600">Pembayaran Daftar Ulang</h2>
            <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
                <x-select label="Kode Pendaftaran / Nama Siswa" wire:model="calonSiswa" placeholder="Pilih Kode Daftar"
                    :async-data="route('users-diterima')" option-label="kode_daftar" option-value="id" option-description="name" />
                <x-input wire:model.defer="nama" label="Nama Calon Siswa" class="font-bold" disabled />
                <x-input wire:model.defer="sekolahDasar" label="Sekolah Dasar" class="font-bold" disabled />
                <x-input wire:model.defer="sekolahAsal" label="Sekolah Asal" class="font-bold" corner-hint="(Pindahan)"
                    disabled />
            </div>
            <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
                <x-input wire:model.defer="provinsi" class="font-bold" label="Provinsi" disabled />
                <x-input wire:model.defer="kabupaten" class="font-bold" label="Kabupaten" disabled />
                <x-input wire:model.defer="kecamatan" class="font-bold" label="Kecamatan" disabled />
                <x-input wire:model.defer="desa" class="font-bold" label="Desa" disabled />
            </div>
            <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
                <x-input wire:model.defer="gelombang" class="font-bold" label="Gelombang" disabled />
                <x-inputs.currency label="Biaya Daftar Ulang" prefix="Rp." thousands="." decimal=","
                    precision="4" wire:model.defer="wajibBayar" class="font-bold" disabled />
                <x-inputs.currency label="Jumlah" prefix="Rp." thousands="." decimal="," precision="4"
                    wire:model.defer="jumlah" class="font-bold" />
            </div>
            <div class="flex justify-end">
                <x-button wire:click.prevent="simpan" positive label="simpan" spinner="simpan" loading-delay="short"
                    class="w-auto" type="submit" />
            </div>
        </form>
    </x-my-card>
    <x-my-card class="my-5">
        <h2 class="mt-3 text-xl font-bold text-slate-600">Data Pembayaran</h2>
        <div class="overflow-x-auto relative">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            #
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Nama
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Tanggal Bayar
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Jumlah
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Bendahara
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($user)
                        @foreach ($user->pembayarans as $pembayaran)
                            <tr
                                class="odd:bg-white even:bg-slate-200 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-300">
                                <td scope="row"
                                    class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $loop->iteration }}
                                </td>
                                <td scope="row"
                                    class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $nama }}
                                </td>
                                <td class="py-2 px-6">
                                    {{ hariTanggal($pembayaran->tanggal) }}
                                </td>
                                <td class="py-2 px-6">
                                    {{ rupiah($pembayaran->jumlah) }}
                                </td>
                                <td class="py-2 px-6">
                                    {{ $pembayaran->panitia->name }}
                                </td>
                                <td class="py-2 px-6">
                                    <x-button wire:click.prevent="confirm({{ $pembayaran->id }})" negative
                                        label="Hapus" />
                                </td>
                            </tr>
                        @endforeach
                        <tr
                            class="odd:bg-white even:bg-slate-200 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-300 ">
                            <td scope="row" colspan="4"
                                class="py-2 px-6 text-gray-900 whitespace-nowrap dark:text-white font-bold">
                                Total
                            </td>
                            <td scope="row" colspan="3"
                                class="py-2 px-6 text-gray-900 whitespace-nowrap dark:text-white font-bold">
                                {{ rupiah($user->total) }}
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </x-my-card>
</div>
