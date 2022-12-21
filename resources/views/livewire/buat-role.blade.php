<div>
    <form wire:submit.prevent="simpan" class="my-5">
        <div class="lg:grid lg:grid-cols-3 lg:gap-4 my-2">
            <x-input wire:model.defer="name" label="Nama Role" />
        </div>
        <x-button wire:click.prevent="simpan" class="w-auto" positive label="Simpan" spinner="simpan" loading-delay="short"
            type="submit" />
    </form>
    <div class="overflow-x-auto relative">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        #
                    </th>
                    <th scope="col" class="py-3 px-6">
                        role
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listRole as $key => $role)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-300">
                        <td scope="row"
                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                        </td>
                        <td scope="row"
                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $role->name }}
                        </td>
                        <td class="py-4 px-6">
                            <x-button wire:click.prevent="confirm({{ $role->id }})" negative label="Hapus" />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
