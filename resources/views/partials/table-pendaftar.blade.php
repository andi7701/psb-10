<section class="py-8 px-7 bg-white border-b">
    <div class="flex justify-center">
        <h1 class="text-slate-700 font-bold text-2xl">Data Pendaftar</h1>
    </div>
    <div class="my-5">
        <x-input wire:model.debounce.500ms="search" icon="search" placeholder="Cari Nama..."
            class="w-auto text-slate-600" />
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
                        Asal Sekolah
                    </th>
                    <th scope="col" class="py-3 px-6">
                        kecamatan
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Desa
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listUser as $key => $user)
                    <tr
                        class="odd:bg-white even:bg-slate-200 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-300">
                        <td scope="row"
                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                        </td>
                        <td scope="row"
                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->name }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $user->sekolahSd->nama ?? '' }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $user->alamat->district->name ?? '' }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $user->alamat->village->name ?? '' }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>