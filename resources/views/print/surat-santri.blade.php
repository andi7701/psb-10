<x-layout-print>
    <x-slot name="title">
        Surat Santri
    </x-slot>
    <h1 class="uppercase font-bold text-slate-700 text-center text-md mb-3">
        surat pernyataan santri baru
        <br>
        tahun ajaran {{ $user->biodata->tahun }}
    </h1>
    <div class=" text-slate-600 px-10 text-sm">
        Saya yang bertanda tangan di bawah ini :
    </div>
    <div class="pl-20 pt-5 text-slate-600 text-sm mb-5">
        <table class="w-full capitalize ">
            <tbody>
                <tr>
                    <td class=" py-1 px-3">nama lengkap</td>
                    <td class=" py-1 px-3 uppercase">: {{ $user->name }}</td>
                </tr>
                <tr>
                    <td class=" py-1 px-3">tempat, tanggal lahir</td>
                    <td class=" py-1 px-3 uppercase">: {{ $user->biodata->tempat_lahir }},
                        {{ tanggal($user->biodata->tanggal_lahir) }}</td>
                </tr>
                <tr>
                    <td class=" py-1 px-3">jenis kelamin</td>
                    <td class=" py-1 px-3 uppercase">:
                        @switch($user->biodata->jenis_kelamin)
                            @case('P')
                                perempuan
                            @break

                            @case('L')
                                laki-laki
                            @break

                            @default
                        @endswitch
                    </td>
                </tr>
                <tr>
                    <td class=" py-1 px-3">nama orang tua</td>
                    <td class=" py-1 px-3 uppercase">: {{ $user->orangTua->nama_ayah }}</td>
                </tr>
                <tr>
                    <td class=" py-1 px-3">nama wali</td>
                    <td class=" py-1 px-3 uppercase">: {{ $user->wali->nama ?? '-' }}</td>
                </tr>
                <tr>
                    <td class=" py-1 px-3">alamat</td>
                    <td class=" py-1 px-3 uppercase">: {{ $user->alamat->keterangan }},
                        Rt : {{ $user->alamat->rt }} Rw : {{ $user->alamat->rw }} 
                        {{ $user->alamat->village->name }} -
                        {{ $user->alamat->district->name }} ,
                        {{ $user->alamat->city->name }} -
                        {{ $user->alamat->province->name }}

                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class=" text-slate-600 px-10 text-sm text-justify">
        Dengan sungguh-sungguh dan penuh kesadaran menyatakan bahwa selama menjadi peserta didik di SMP Al Musyaffa',
        saya :
    </div>
    <div class="text-slate-600 px-14 text-sm text-justify">
        <ul class="list-outside list-decimal">
            <li>
                Akan mentaati dan mematuhi semua peraturan yang telah ditetapkan sekolah, pondok, dan kebijakan dari
                pengasuh PP Al Musyaffa'
            </li>
            <li>
                Akan belajar dengan tekun dan penuh semangat
            </li>
            <li>
                Akan menjaga nama baik diri sendiri, keluarga, dan sekolah
            </li>
            <li>
                Sanggup mengikuti kegiatan MPLS (masa pengenalan lingkungan sekolah) dengan sebaik-baiknya, dengan
                segala peraturan dan konsekuensinya
            </li>
            <li>
                Apabila saya tidak mentaati ketentuan yang ditentukan oleh sekolah, saya sanggup menerima sanksi, berupa
                :
                <div class="pl-1">
                    a. Menerima sanksi sesuai ketentuan yang berlaku
                    <br>
                    b. Dikembalikan kepada Orang Tua / Wali saya
                </div>
            </li>
            <li>
                Akan mengikuti kegiatan ekstrakurikuler yang dilaksanakan oleh sekolah
            </li>
        </ul>
    </div>
    <div class=" text-slate-600 pl-10 text-sm mt-5">
        Demikian pernyataan ini saya buat dengan penuh tanggungjawab tanpa tekanan dari siapapun serta diketahui orang
        tua / wali.
    </div>
    <div class="pl-10 text-slate-600 text-sm">
        <div class="flex justify-between px-20 mt-5">
            <div class="flex flex-col space-y-10">
                <span class="text-center">
                    Mengetahui,
                    <br>
                    Orang Tua / Wali
                </span>
                <span class="text-center underline font-bold">
                    {{ $user->name }}
                </span>
            </div>
            <div class="flex flex-col space-y-10">
                <span class="text-center">
                    Ngampel, {{ tanggal($user->tanggal_daftar) }}
                    <br>
                    Yang membuat Pernyataan
                </span>
                <span class="text-center underline font-bold">
                    {{ $user->name }}
                </span>
            </div>
        </div>
    </div>
</x-layout-print>
