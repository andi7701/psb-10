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
                        Panitia
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
                            {{ $user->akademik->benar }}
                            <br>
                            Salah :
                            {{ $user->akademik->salah }}
                        </td>
                        <td class="py-2 px-6">
                            {{ $user->akademik->total }}
                        </td>
                        <td class="py-2 px-6">
                            @switch($user->akademik->gaya_belajar)
                                @case(1)
                                    Visual
                                @break

                                @case(2)
                                    Auditori
                                @break

                                @case(3)
                                    Kinestetik
                                @break

                                @case(4)
                                    Auditori Kinestteik
                                @break

                                @default
                            @endswitch
                        </td>
                        <td class="py-2 px-6">
                            {{ $user->akademik->user->name }}
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
