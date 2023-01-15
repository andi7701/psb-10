<div>
    <x-my-card class="flex space-y-4 flex-col ">
        <h2 class="mt-3 text-xl font-bold text-slate-600">Input Target Sosialisasi Per Kecamatan</h2>
        <form wire:submit.prevent="simpan">
            <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
                <x-native-select wire:model.defer='kecamatan' label="Kecamatan Sosialisasi">
                    <option value="">Pilih</option>
                    @foreach ($listKecamatan as $kecamatan)
                        <option value="{{ $kecamatan->code }}">{{ $kecamatan->name }}</option>
                    @endforeach
                </x-native-select>
                <x-input wire:model.defer='jumlah' label='Jumlah Target' />
            </div>
            <div>
                <x-button wire:click.prevent="simpan" positive label="simpan" spinner="simpan" loading-delay="short" />
            </div>
        </form>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            #
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Nama Kecamatan
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Jumlah Target
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Jumlah Diterima
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listTarget as $target)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-300">
                            <td scope="row"
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $loop->iteration }}
                            </td>
                            <td scope="row"
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $target->district->name }}
                            </td>
                            <td class="py-4 px-6">
                                {{ $target->jumlah }}
                            </td>
                            <td class="py-4 px-6">
                                {{ $target->diterima }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-my-card>
</div>
