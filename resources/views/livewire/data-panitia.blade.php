<div x-data="{ tambahPanitia: false }">
    <div class="my-5 lg:flex lg:justify-between space-x-2 space-y-2">
        <x-input wire:model.debounce.500ms="search" icon="search" placeholder="Cari ..." class="w-auto" />
        <x-button x-on:click="tambahPanitia = ! tambahPanitia" positive label="Tambah" right-icon="user-circle" />
    </div>

    <div x-show="tambahPanitia" class="my-5" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90">
        <x-my-card>
            <form wire:submit.prevent="simpan" class="space-y-2">
                <div class="lg:grid lg:grid-cols-4 lg:gap-4">
                    <x-input wire:model.defer="name" label="Nama" />
                    <x-input wire:model.defer="username" label="Username" />
                    <x-native-select wire:model.defer="role" label="Sebagai Panitia Seleksi">
                        <option value="">Pilih Role</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                        @endforeach
                    </x-native-select>
                </div>
                <x-button wire:click.prevent="simpan" positive label="Simpan" spinner="simpan" loading-delay="short"
                    type="submit" />
            </form>
        </x-my-card>
    </div>

    <div class="overflow-x-auto relative">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        #
                    </th>
                    <th scope="col" class="py-3 px-6">
                        nama
                    </th>
                    <th scope="col" class="py-3 px-6">
                        username
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
                            {{ $user->username }}
                        </td>
                        <td class="py-4 px-6">
                            @foreach ($user->roles as $role)
                                {{ $role->name }}
                            @endforeach
                        </td>
                        <td class="py-4 px-6">
                            <x-button wire:click.prevent="edit({{ $user->id }})" @click="tambahPanitia = true" positive label="Edit" />
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
