<div>
    <div class="my-5">
        <x-input wire:model.debounce.500ms="search" icon="search" placeholder="Cari ..." class="w-auto" />
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
                        Sekolah SD
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Alamat
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
                            {{ $user->name }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $user->kode_daftar }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $user->sekolahSd->nama ?? '' }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $user->alamat->village->name ?? '' }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $user->panitia->name }}
                        </td>
                        <td class="py-4 px-6 space-x-3 space-y-3">
                            <a href="{{ route('admin.detail-pendaftar',[ 'name' => $user->slug ]) }}" target="__blank" class=" border-2 border-emerald-400 p-2 rounded-md bg-emerald-400 text-white hover:bg-emerald-500 hover:border-emerald-500 focus:border-emerald-600" role="button">Detail</a>
                            <x-button wire:click.prevent="confirm({{ $user->id }})" negative label="Hapus" />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="my-2">
        {{ $listUser->links() }}
    </div>
</div>
