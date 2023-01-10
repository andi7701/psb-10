<section class="px-7 bg-white border-b">
    <div class="my-3 lg:grid lg:grid-cols-4 space-y-3 lg:space-y-0 space-x-3">
        <x-input wire:model.debounce.500ms="search" icon="search" placeholder="Cari Nama..." class="text-slate-600" />
        <x-native-select wire:model='gelombang'>
            <option value="">Pilih Gelombang</option>
            <option value="1">Gelombang 1</option>
            <option value="2">Gelombang 2</option>
            <option value="3">Gelombang 3</option>
        </x-native-select>
        <x-native-select wire:model='jenisKelamin'>
            <option value="">Jenis Kelamin</option>
            <option value="L">Putra</option>
            <option value="P">Putri</option>
        </x-native-select>
    </div>
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
                        Kode Daftar
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Tenggang Bayar
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Keterangan
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Asal Sekolah
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listUser as $key => $user)
                    <tr
                        class="odd:bg-white even:bg-slate-200 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-300">
                        <td scope="row"
                            class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $listUser->firstItem() + $key }}
                        </td>
                        <td scope="row"
                            class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->name }}
                        </td>
                        <td scope="row"
                            class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->kode_daftar }}
                        </td>
                        <td class="py-2 px-6">
                            {{ hariTanggal($user->biodata->tanggal_daftar) }}
                        </td>
                        <td class="py-2 px-6">
                            Gelombang : {{ $user->biodata->gelombang }}
                        </td>
                        <td class="py-2 px-6">
                            {{ $user->sekolahSd->nama }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-3">
        {{ $listUser->links() }}
    </div>
</section>
