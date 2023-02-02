<div>
    <x-loading></x-loading>
    <div class="my-3 lg:grid lg:grid-cols-4 space-y-3 lg:space-y-0 space-x-3">
        <x-input wire:model.debounce.500ms="search" icon="search" placeholder="Cari ..." class="text-slate-600" />
        <x-native-select wire:model='isOnline'>
            <option value="">Pilih</option>
            <option value="2">Offline</option>
            <option value="1">Online</option>
        </x-native-select>
        <x-native-select wire:model='isJateng'>
            <option value="">Semua</option>
            @foreach ($listJateng as $jateng)
                <option value="{{ $jateng->code }}">Luar Jateng</option>
            @endforeach
        </x-native-select>
    </div>
    <div class="overflow-x-auto">
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
                        Kode Daftar
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Aksi
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Sekolah SD
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Keterangan
                    </th>
                    <th scope="col" class="py-3 px-6">
                        panitia
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listUser as $key => $user)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-300">
                        <td scope="row"
                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $listUser->firstItem() + $key }}
                        </td>
                        <td scope="row"
                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->name }} <br>
                            <span class="text-slate-500 text-xs">
                                Tanggal Daftar : {{ hariTanggal($user->tanggal_daftar) }}
                            </span>
                        </td>
                        <td class="py-4 px-6">
                            {{ $user->kode_daftar }}
                        </td>
                        <td scope="row"
                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <x-button wire:click.prevent="confirmKedua({{ $user->id }})" cyan label="Gel. 2" />
                        </td>
                        <td class="py-4 px-6">
                            {{ $user->sekolahSd->nama ?? '' }}
                        </td>
                        <td class="py-4 px-6 whitespace-nowrap">
                            Provinsi : {{ $user->alamat->province->name ?? '' }} <br>
                            Kabupaten : {{ $user->alamat->city->name ?? '' }} <br>
                            Kecamatan : {{ $user->alamat->district->name ?? '' }} <br>
                            Desa : {{ $user->alamat->village->name ?? '' }} <br>
                            Telepon : {{ $user->orangTua->telelpon ?? '' }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $user->panitia->name }}
                            @switch($user->is_online)
                                @case(2)
                                    (Offline)
                                @break

                                @case(1)
                                    (Online)
                                @break

                                @default
                            @endswitch
                        </td>
                        <td class="py-4 px-6 flex flex-col space-y-3 items-center">
                            @role('Admin')
                                <x-button href="{{ route('admin.detail-pendaftar', ['user' => $user->slug]) }}" teal
                                    label="Detail" />
                                <x-button wire:click.prevent="confirm({{ $user->id }})" negative label="Hapus" />
                            @endrole
                            @role('Kepala Sekolah')
                                <x-button href="{{ route('kepala-sekolah.detail-pendaftar', ['user' => $user->slug]) }}"
                                    teal label="Detail" />
                            @endrole
                            @role('Ketua')
                                <x-button href="{{ route('ketua.detail-pendaftar', ['user' => $user->slug]) }}" teal
                                    label="Detail" />
                                <x-button wire:click.prevent="confirm({{ $user->id }})" negative label="Hapus" />
                            @endrole
                            @role('Pendaftaran')
                                <x-button
                                    href="{{ route('pendaftaran.print-formulir-pendaftaran', ['user' => $user->slug]) }}"
                                    target="__blank" cyan label="Formulir" icon="printer" />
                                <x-button
                                    href="{{ route('pendaftaran.print-kartu-pendaftaran', ['user' => $user->slug]) }}"
                                    target="__blank" teal label="Kartu" icon="printer" />
                                <x-button href="{{ route('pendaftaran.detail-pendaftar', ['user' => $user->slug]) }}"
                                    positive label="Detail" />
                                <x-button wire:click.prevent="confirm({{ $user->id }})" negative label="Hapus" />
                            @endrole
                            @role('Sekretaris')
                                <x-button href="{{ route('sekretaris.detail-pendaftar', ['user' => $user->slug]) }}" teal
                                    label="Detail" />
                                <x-button wire:click.prevent="confirm({{ $user->id }})" negative label="Hapus" />
                            @endrole
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-5 overflow-x-auto py-2">
        {{ $listUser->onEachSide(1)->links() }}
    </div>
</div>
