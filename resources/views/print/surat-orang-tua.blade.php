<x-layout-print>
    <x-slot name="title">
        Surat Orang Tua
    </x-slot>
    <h1 class="uppercase font-bold text-slate-700 text-center text-md mb-3">
        surat pernyataan orang tua / wali
        <br>
        santri baru smp al musyaffa'
        <br>
        tahun ajaran {{ $user->biodata->tahun }}
    </h1>
    <div class=" text-slate-600 px-10 text-sm">
        Saya yang bertanda tangan di bawah ini :
    </div>
    <div class="pl-20 pt-5 text-slate-600 text-sm mb-5">
        <table class="capitalize ">
            <tbody>
                <tr>
                    <td class="py-2 px-3 w-1/2">nama lengkap</td>
                    <td class="py-2 uppercase border-b-2 border-dotted">: </td>
                </tr>
                <tr>
                    <td class="py-2 px-3">pekerjaan</td>
                    <td class="py-2 uppercase border-b-2 border-dotted">: </td>
                </tr>
                <tr>
                    <td class=" py-2 px-3">alamat</td>
                    <td class=" py-2 uppercase">: {{ $user->alamat->keterangan }},
                        Rt : {{ $user->alamat->rt }} Rw : {{ $user->alamat->rw }} 
                        {{ $user->alamat->village->name }} -
                        {{ $user->alamat->district->name }} ,
                        {{ $user->alamat->city->name }} -
                        {{ $user->alamat->province->name }}

                    </td>
                </tr>
                <tr>
                    <td class="py-2 px-3">nama peserta didik</td>
                    <td class="py-2 uppercase border-b-2 border-dotted">: </td>
                </tr>
                <tr>
                    <td class=" py-2 px-3">jenis kelamin</td>
                    <td class=" py-2 uppercase">:
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
                    <td class=" py-2 px-3">hubungan dengan peserta didik</td>
                    <td class=" py-2 uppercase border-b-2 border-dotted">:</td>
                </tr>
                <tr>
                    <td class=" py-2 px-3">telepon</td>
                    <td class=" py-2 uppercase">: {{ $user->orangTua->telepon ?? '' }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class=" text-slate-600 px-10 text-sm text-justify">
        Dengan sadar dan tanpa paksaan dari pihak manapun, menyatakan bahwa saya :
    </div>
    <div class="text-slate-600 px-14 text-sm text-justify">
        <ul class="list-outside list-decimal">
            <li>
                Bersedia membimbing dan mengawasi peserta didik tersebut di atas untuk mematuhi dan mentaati setiap kegiatan sekolah, tatatertib sekolah, dan kebijakan sekolah
            </li>
            <li>
                Bersedia bekerjasama dan berkoordinasi dengan pihak sekolah untuk pengawasn dan pembimbingan
            </li>
            <li>
                Bersedia memenuhi semua kewajiban saya kaitannya dengan pembayaran administrasi dan biaya sekolah tepat waktu
            </li>
            <li>
                Bersedia memberikan pemahaman kepada peserta didik tersebut di atas, untuk mengikuti semua aturan sekolah, aturan pondok, maupun kebijakan yang dibuat ketua yayasan Al Musyaffa' 
            </li>
            <li>
                Tidak keberatan peserta didik tersebut di atas menerima sanksi antara lain
                :
                <div class="pl-1">
                    a. Jika melanggar peraturan sekolah dan pondok pesantren , menerima sanksi sesuai ketentuan yang berlaku
                    <br>
                    b. Dikembalikan kepada saya, apabila saya tidak membimbing dan mengawasinya, sehingga peserta didik tersebut di atas tidak mentaati ketentuan yang ditetapkan oleh pondok pensantren, sekolah, maupun kebijakan dari ketua yayasan Al Musyaffa'
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
