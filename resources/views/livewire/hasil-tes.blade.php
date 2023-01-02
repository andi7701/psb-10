<section class="px-7 bg-white border-b">
    <div class="my-3">
        <x-input wire:model.debounce.500ms="search" icon="search" placeholder="Cari ..." class="w-auto text-slate-600" />
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
                        Hasil Tes Akademik
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Nilai Akademik
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Gaya Belajar
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listUser as $key => $user)
                    <tr
                        class="odd:bg-white even:bg-slate-200 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-300">
                        <td scope="row"
                            class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                        </td>
                        <td scope="row"
                            class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->name }}
                        </td>
                        <td class="py-2 px-6">
                            {{ $user->kode_daftar }}
                        </td>
                        <td class="py-2 px-6">
                            Benar :
                            {{ $user->benar }}
                            <br>
                            Salah :
                            {{ $user->salah }}
                        </td>
                        <td class="py-2 px-6">
                            {{ $user->benar * 5 }}
                        </td>
                        <td class="py-2 px-6">
                            A : {{ $user->a }} <br>
                            B : {{ $user->b }} <br>
                            C : {{ $user->c }} <br>
                            @if ($user->a > $user->b && $user->a > $user->c)
                                Gaya Belajar : Visual
                            @elseif ($user->b > $user->a && $user->b > $user->c)
                                Gaya Belajar : Auditori
                            @elseif ($user->b == $user->c)
                                Gaya Belajar : Auditori Kinestetik
                            @else
                                Gaya Belajar : Kinestetik
                            @endif
                        </td>
                        <td class="py-2 px-6 space-x-3 flex items-center">
                            @role('Akademik')
                                <x-button wire:click.prevent="confirmTolak({{ $user->id }})" negative label="Tidak" />
                                <x-button wire:click.prevent="confirmTerima({{ $user->id }})" positive
                                    label="Terima" />
                            @endrole
                            @role('Sekretaris')
                                <x-button wire:click.prevent="confirmTolak({{ $user->id }})" negative label="Tidak" />
                                <x-button wire:click.prevent="confirmTerima({{ $user->id }})" positive
                                    label="Terima" />
                            @endrole
                            @role('Ketua')
                                <x-button wire:click.prevent="confirmTolak({{ $user->id }})" negative label="Tidak" />
                                <x-button wire:click.prevent="confirmTerima({{ $user->id }})" positive
                                    label="Terima" />
                            @endrole
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
