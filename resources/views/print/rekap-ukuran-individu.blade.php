<div style="page-break-before: always">
    <x-layout-print>
        <x-slot name="title">
            Print Rekap Ukuran
        </x-slot>
        <h1 class="uppercase font-bold text-slate-700 text-center text-sm mb-3">
            data ukuran seragam siswa
        </h1>
        <h1 class="uppercase font-bold text-slate-700 text-sm pl-16">
            <table class="text-slate-700 text-left text-sm">
                <thead>
                    <tr>
                        <th>kode daftar</th>
                        <th>:</th>
                        <th class="pl-3">{{ $user->kode_daftar }}</th>
                    </tr>
                    <tr>
                        <th>nama</th>
                        <th>:</th>
                        <th class="pl-3">{{ $user->name }}</th>
                    </tr>
                    <tr>
                        <th>jenis kelamin</th>
                        <th>:</th>
                        <th class="pl-3">
                            @switch($user->biodata->jenis_kelamin)
                                @case('P')
                                    Perempuan
                                @break

                                @default
                                    Laki - Laki
                            @endswitch
                        </th>
                    </tr>
                    <tr>
                        <th>sekolah dasar</th>
                        <th>:</th>
                        <th class="pl-3">{{ $user->sekolahSd->nama }}</th>
                    </tr>
                </thead>
            </table>
        </h1>
        <h1 class="uppercase font-bold text-slate-700 text-sm px-10 pt-10">
            <table class="text-slate-700 text-left text-sm w-full border border-slate-5">
                <thead>
                    <tr class="border border-slate-700">
                        <th colspan="3" class="text-center border border-slate-700">baju</th>
                        <th class="text-center border border-slate-700">ket.</th>
                        <th colspan="3" class="text-center border border-slate-700">
                            @switch($user->biodata->jenis_kelamin)
                                @case('P')
                                    rok
                                @break

                                @default
                                    celana
                            @endswitch
                        </th>
                        <th class="text-center border border-slate-700">ket.</th>
                    </tr>
                    <tr class="border border-slate-700">
                        <th class="pl-7">baju osis</th>
                        <th>:</th>
                        <th>{{ $user->seragam->baju_osis }}</th>
                        <th class="border border-slate-700">

                        </th>
                        <th class="pl-7">
                            @switch($user->biodata->jenis_kelamin)
                                @case('P')
                                    rok
                                @break

                                @default
                                    celana
                            @endswitch
                            osis
                        </th>
                        <th>:</th>
                        <th>{{ $user->seragam->bawah_osis }}</th>
                        <th class="border border-slate-700">

                        </th>
                    </tr>
                    <tr class="border border-slate-700">
                        <th class="pl-7">baju batik</th>
                        <th>:</th>
                        <th>{{ $user->seragam->baju_batik }}</th>
                        <th class="border border-slate-700">

                        </th>
                        <th class="pl-7">
                            @switch($user->biodata->jenis_kelamin)
                                @case('P')
                                    rok
                                @break

                                @default
                                    celana
                            @endswitch
                            batik
                        </th>
                        <th>:</th>
                        <th>{{ $user->seragam->bawah_batik }}</th>
                        <th class="border border-slate-700">

                        </th>
                    </tr>
                    <tr class="border border-slate-700">
                        <th class="pl-7">baju pramuka</th>
                        <th>:</th>
                        <th>{{ $user->seragam->baju_pramuka }}</th>
                        <th class="border border-slate-700">

                        </th>
                        <th class="pl-7">
                            @switch($user->biodata->jenis_kelamin)
                                @case('P')
                                    rok
                                @break

                                @default
                                    celana
                            @endswitch
                            pramuka
                        </th>
                        <th>:</th>
                        <th>{{ $user->seragam->bawah_pramuka }}</th>
                        <th class="border border-slate-700">

                        </th>
                    </tr>
                    <tr class="border border-slate-700">
                        <th class="pl-7">baju olahraga</th>
                        <th>:</th>
                        <th>{{ $user->seragam->baju_or }}</th>
                        <th class="border border-slate-700">

                        </th>
                        <th class="pl-7">
                            celana olahraga
                        </th>
                        <th>:</th>
                        <th>{{ $user->seragam->bawah_or }}</th>
                        <th class="border border-slate-700">

                        </th>
                    </tr>
                    <tr class="border border-slate-700">
                        @switch($user->biodata->jenis_kelamin)
                            @case('L')
                                <th class="pl-7">peci</th>
                                <th>:</th>
                                <th>{{ $user->seragam->peci }}</th>
                                <th class="border border-slate-700">

                                </th>
                                <th class="pl-7">

                                </th>
                                <th></th>
                                <th></th>
                                <th class="border border-slate-700">

                                </th>
                            @break

                            @default
                                <th class="pl-7">

                                </th>
                                <th></th>
                                <th></th>
                                <th class="border border-slate-700">

                                </th>
                                <th class="pl-7">

                                </th>
                                <th></th>
                                <th></th>
                                <th class="border border-slate-700">

                                </th>
                        @endswitch
                    </tr>
                </thead>
            </table>
        </h1>
        <div class="flex justify-end pr-10 pt-10">
            <div class="flex flex-col text-center">
                <div>
                    Ngampel, {{ tanggal($user->seragam->created_at) }}
                </div>
                <div>
                    Panitia
                </div>
                <div>

                </div>
                <div class="mt-10">
                    {{ $user->seragam->user->name }}
                </div>
            </div>
        </div>
    </x-layout-print>
</div>
