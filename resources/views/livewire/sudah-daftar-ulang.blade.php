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
                        Tanggal Bayar
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Keterangan
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Asal Sekolah
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Jumlah
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
                            {{ hariTanggal($user->pembayaran->tanggal) }}
                        </td>
                        <td class="py-2 px-6">
                            Gelombang : {{ $user->biodata->gelombang }}
                        </td>
                        <td class="py-2 px-6">
                            {{$user->sekolahSd->nama }}
                        </td>
                        <td class="py-2 px-6">
                            {{ rupiah($user->pembayaran->jumlah) }}
                        </td>
                    </tr>
                @endforeach
                <tr class="font-bold text-lg border-b border-slate-600">
                    <td scope="row"
                            class="py-2 px-6 text-slate-800 whitespace-nowrap dark:text-white" colspan="5">
                            Total Pembayaran Masuk
                    </td>
                    <td scope="row"
                            class="py-2 px-6 text-slate-800 whitespace-nowrap dark:text-white">
                            {{ rupiah($total) }}
                    </td>
                </tr>
                <tr class="font-bold text-lg border-b border-slate-600">
                    <td scope="row"
                            class="py-2 px-6 text-slate-800 whitespace-nowrap dark:text-white" colspan="5">
                            Total Masuk Infaq
                    </td>
                    <td scope="row"
                            class="py-2 px-6 text-slate-800 whitespace-nowrap dark:text-white">
                            {{ rupiah($infaq) }}
                    </td>
                </tr>
                <tr class="font-bold text-lg border-b border-slate-600">
                    <td scope="row"
                            class="py-2 px-6 text-slate-800 whitespace-nowrap dark:text-white" colspan="5">
                            Total Masuk Adm. PSB
                    </td>
                    <td scope="row"
                            class="py-2 px-6 text-slate-800 whitespace-nowrap dark:text-white">
                            {{ rupiah($adm_psb) }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="mt-3">
        {{ $listUser->links() }}
    </div>
</section>
