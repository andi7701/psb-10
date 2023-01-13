<section class="px-7 bg-white border-b">
    <x-loading></x-loading>
    <div class="my-3 lg:grid lg:grid-cols-4 space-y-3 lg:space-y-0 space-x-3">
        <x-input wire:model.debounce.500ms="search" icon="search" placeholder="Cari ..." />
        <x-native-select wire:model='diterima'>
            <option value="">Pilih Pengumuman</option>
            <option value="belum dikonfirmasi">Belum Dikonfirmasi</option>
            <option value="tidak diterima">Tidak Diterima</option>
            <option value="diterima">Diterima</option>
        </x-native-select>
        <x-native-select wire:model='gelombang'>
            <option value="">Pilih Gelombang</option>
            <option value="1">Gelombang 1</option>
            <option value="2">Gelombang 2</option>
            <option value="3">Gelombang 3</option>
        </x-native-select>
        <x-native-select wire:model='sudahTest'>
            <option value="">Pilih</option>
            <option value="0">Test Belum Selesai</option>
            <option value="1">Test Sudah Selesai</option>
            <option value="2">Semua</option>
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
                        Sekolah Dasar
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Status
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Detail
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
                        <td class="py-2 px-6">
                            {{ $user->kode_daftar }}
                        </td>
                        <td class="py-2 px-6">
                            {{ $user->sekolahSd->nama }}
                        </td>
                        <td class="py-2 px-6">
                            {{ $user->diterima }}
                        </td>
                        <td class="py-2 px-6 whitespace-nowrap">
                            @switch($user->akademik->nilai)
                                @case('0')
                                    Akademik : Tidak diterima
                                @break

                                @case('1')
                                    Akademik : Diterima
                                @break

                                @default
                                    Akademik : Belum dikonfirmasi
                            @endswitch
                            <br>
                            Benar :
                            {{ $user->benar }}
                            <br>
                            Salah :
                            {{ $user->salah }}
                            <br>
                            Nilai : {{ $user->benar * 5 }}
                            <br>
                            @if ($user->a > $user->b && $user->a > $user->c)
                                Gaya Belajar : Visual
                            @elseif ($user->b > $user->a && $user->b > $user->c)
                                Gaya Belajar : Auditori
                            @elseif ($user->a == $user->b)
                                Gaya Belajar : Visual Auditori
                            @elseif ($user->b == $user->c)
                                Gaya Belajar : Auditori Kinestetik
                            @else
                                Gaya Belajar : Kinestetik
                            @endif
                            <br>
                            <br>
                            @switch($user->agama->nilai)
                                @case('0')
                                    Agama : Tidak diterima
                                @break

                                @case('1')
                                    Agama : Diterima
                                @break

                                @default
                                    Agama : Belum dikonfirmasi
                            @endswitch
                            <br>
                            Catatan : {{ $user->agama->catatan }}
                            <br>
                            <br>
                            @switch($user->kesehatan->nilai)
                                @case('0')
                                    Kesehatan : Tidak diterima
                                @break

                                @case('1')
                                    Kesehatan : Diterima
                                @break

                                @default
                                    Kesehatan : Belum dikonfirmasi
                            @endswitch
                            <br>
                            Catatan : {{ $user->kesehatan->catatan }}
                            <br>
                            <br>
                            @switch($user->minatBakat->nilai)
                                @case('0')
                                    Minat Bakat : Tidak diterima
                                @break

                                @case('1')
                                    Minat Bakat : Diterima
                                @break

                                @default
                                    Minat Bakat : Belum dikonfirmasi
                            @endswitch
                            <br>
                            Catatan : {{ $user->minatBakat->catatan }}
                            <br>
                            <br>
                            @switch($user->wawancara->nilai)
                                @case('0')
                                    Wawancara : Tidak diterima
                                @break

                                @case('1')
                                    Wawancara : Diterima
                                @break

                                @default
                                    Wawancara : Belum dikonfirmasi
                            @endswitch
                            <br>
                            Catatan : {{ $user->wawancara->catatan }}
                            <br>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-5 overflow-x-auto py-2">
        {{ $listUser->onEachSide(1)->links() }}
    </div>
</section>
