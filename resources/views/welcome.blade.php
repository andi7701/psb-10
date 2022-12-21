<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Logo -->
    <link rel="icon" href="{{ asset('images/logopsb.png') }}" type="image/png" sizes="16x16" />


    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">
    <div class="leading-normal tracking-normal text-white bg-gradient-to-r from-emerald-800 to-green-600">
        <nav id="header" class="fixed top-0 z-30 w-full text-white border-b border-emerald-600">
            <div class="container flex flex-wrap items-center justify-between w-full py-2 mx-auto mt-0">
                <div class="flex items-center pl-4">
                    <a class="flex items-center justify-center text-2xl font-bold text-white no-underline toggleColour hover:no-underline lg:text-2xl"
                        href="#">
                        <img class="w-20 transition duration-300 transform hover:scale-105" src="/images/logopsb.png"
                            alt="logoalfa" />
                        <span class="px-4" />
                        <span class="invisible lg:visible">
                            SMP Al Musyaffa'
                        </span>
                    </a>
                </div>
                <div class="block pr-4 lg:hidden">
                    <button id="nav-toggle"
                        class="flex items-center p-1 transition duration-300 ease-in-out transform text-emerald-800 hover:text-gray-900 focus:outline-none focus:shadow-outline hover:scale-105">
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <title>Menu</title>
                            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                        </svg>
                    </button>
                </div>
                <div class="z-20 flex-grow hidden w-full p-4 mt-2 text-black bg-white lg:flex lg:items-center lg:w-auto lg:mt-0 lg:bg-transparent lg:p-0"
                    id="nav-content">
                    <ul class="items-center justify-end flex-1 list-reset lg:flex">
                        <li class="mr-3">
                            <a class="inline-block px-4 py-2 font-bold no-underline transition duration-300 ease-in-out transform text-slate-700 rounded-3xl hover:underline hover:bg-emerald-500 hover:text-white hover:scale-105"
                                href="#jadwal">Jadwal</a>
                        </li>
                        <li class="mr-3">
                            <a class="inline-block px-4 py-2 font-bold no-underline transition duration-300 ease-in-out transform text-slate-700 rounded-3xl hover:underline hover:bg-emerald-500 hover:text-white hover:scale-105"
                                href="#syarat">Syarat</a>
                        </li>
                        <li class="mr-3">
                            <a class="inline-block px-4 py-2 font-bold no-underline transition duration-300 ease-in-out transform text-slate-700 rounded-3xl hover:underline hover:bg-emerald-500 hover:text-white hover:scale-105"
                                href="#seleksi">Seleksi</a>
                        </li>
                    </ul>
                    <a id="navAction"
                        class="px-8 py-4 mx-auto mt-4 font-bold text-gray-800 transition duration-300 ease-in-out transform bg-white rounded-full shadow opacity-75 lg:mx-0 hover:underline lg:mt-0 focus:outline-none focus:shadow-outline hover:scale-105"
                        href="{{ route('login') }}">
                        Masuk
                    </a>
                </div>
            </div>
        </nav>
        <div>
            <div class="container flex flex-col flex-wrap items-center justify-between px-1 mx-auto md:flex-row">
                <div
                    class="flex flex-col items-center justify-center w-full pt-24 text-center lg:items-start md:w-2/5 md:text-left">
                    <p class="w-full uppercase tracking-loose">portal pendaftaran santri baru</p>
                    <h1 class="my-2 text-2xl font-bold leading-tight lg:text-5xl">
                        SMP Al Musyaffa'
                    </h1>
                    <p class="mb-8 leading-normal text-md lg:text-2xl">
                        Pendaftaran Santri Baru Tahun Ajaran 2023 / 2024 Belum Mulai, Silahkan Cek Jadwal Pendaftaran
                    </p>
                    {{-- <a href="{{ route('daftar') }}"
                        class="px-5 py-2 mx-auto my-6 font-bold text-gray-800 transition duration-300 ease-in-out transform bg-white rounded-full shadow-lg cursor-pointer lg:mx-0 focus:outline-none focus:shadow-outline hover:scale-105"
                        >
                        Daftar
                    </a> --}}
                </div>
                <div class="flex justify-end w-full text-center lg:pt-10 md:w-2/5">
                    <img class="w-full md:w-4/5" src="/images/3orang.png" />
                </div>
            </div>
        </div>
        <div class="relative -mt-12 lg:-mt-24">
            <svg viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg"
                xmlnsXlink="http://www.w3.org/1999/xlink">
                <g stroke="none" strokeWidth="1" fill="none" fillRule="evenodd">
                    <g transform="translate(-2.000000, 44.000000)" fill="#FFFFFF" fillRule="nonzero">
                        <path
                            d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496"
                            opacity="0.100000001" />
                        <path
                            d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                            opacity="0.100000001" />
                        <path
                            d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z"
                            id="Path-4" opacity="0.200000003" />
                    </g>
                    <g transform="translate(-4.000000, 76.000000)" fill="#FFFFFF" fillRule="nonzero">
                        <path
                            d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z">
                        </path>
                    </g>
                </g>
            </svg>
        </div>
        <section class="py-8 bg-white border-b">
            <div class="container max-w-5xl m-8 mx-auto">
                <h2 id="jadwal" class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                    Jadwal Pendaftaran
                </h2>
                <div class="w-full mb-4">
                    <div
                        class="h-1 py-0 mx-auto my-0 rounded-t opacity-25 w-72 bg-gradient-to-r from-[#064e3b] to-[#22c55e]" />
                </div>
                <div class="flex flex-wrap justify-center p-2">
                    <div class="w-5/6 sm:w-1/2">
                        <div class="mb-3 text-center border-2 border-emerald-700">
                            <h3 class="p-2 text-xl font-bold leading-none text-gray-800 bg-yellow-400">
                                GELOMBANG I
                            </h3>
                            <h3 class="p-2 text-xl font-bold leading-none text-slate-200 bg-emerald-700">6 JANUARI s.d
                                27
                                JANUARI 2023
                            </h3>
                            <h3 class="p-2 text-xl font-bold leading-none bg-white text-slate-700">BIAYA DAFTAR ULANG :
                                <span class="text-emerald-700"> Rp. 3.500.000</span>
                            </h3>
                        </div>
                        <div class="mb-3 text-center border-2 border-emerald-700">
                            <h3 class="p-2 text-xl font-bold leading-none text-gray-800 bg-yellow-400">
                                GELOMBANG II
                            </h3>
                            <h3 class="p-2 text-xl font-bold leading-none text-slate-200 bg-emerald-700">3 FEBRUARI s.d
                                24
                                FEBRUARI 2023
                            </h3>
                            <h3 class="p-2 text-xl font-bold leading-none bg-white text-slate-700">BIAYA DAFTAR ULANG :
                                <span class="text-emerald-700"> Rp. 4.000.000</span>
                            </h3>
                        </div>
                        <div class="text-center border-2 border-emerald-700">
                            <h3 class="p-2 text-xl font-bold leading-none text-gray-800 bg-yellow-400">
                                GELOMBANG III
                            </h3>
                            <h3 class="p-2 text-xl font-bold leading-none text-slate-200 bg-emerald-700">26 MEI s.d 02
                                JUNI
                                2023
                            </h3>
                            <h3 class="p-2 text-xl font-bold leading-none bg-white text-slate-700">BIAYA DAFTAR ULANG :
                                <span class="text-emerald-700"> Rp. 4.500.000</span>
                            </h3>
                        </div>
                    </div>
                    <div class="w-full p-6 sm:w-1/2">
                        <img src="images/article.png" alt="jadwal" />
                    </div>
                </div>
                <div id="syarat" class="flex flex-col-reverse flex-wrap sm:flex-row">
                    <div class="w-full p-6 mt-6 sm:w-1/2">
                        <img src="images/informed.png" alt="syarat" />
                    </div>
                    <div class="w-full p-6 mt-6 sm:w-1/2">
                        <div class="align-middle">
                            <h3
                                class="p-2 mb-2 text-xl font-bold leading-none text-center text-gray-800 bg-yellow-400 border-2 rounded-xl border-emerald-700">
                                SYARAT BERKAS PENDAFTARAN
                            </h3>
                            <div class="mb-5 ">
                                <span
                                    class="p-1 font-bold bg-yellow-400 border-2 rounded-full text-slate-700 border-emerald-700">1</span>
                                <span
                                    class="p-1 font-bold text-yellow-400 border-b-2 rounded-lg border-emerald-700 bg-emerald-700">
                                    Fotokopi
                                    <span class="text-white">Akta Kelahiran 1 Lembar</span>
                                </span>
                            </div>
                            <div class="mb-5">
                                <span
                                    class="p-1 font-bold bg-yellow-400 border-2 rounded-full text-slate-700 border-emerald-700">2</span>
                                <span
                                    class="p-1 font-bold text-yellow-400 border-b-2 rounded-lg border-emerald-700 bg-emerald-700">
                                    Fotokopi
                                    <span class="text-white">Kartu Keluarga 1 Lembar</span>
                                </span>
                            </div>
                            <div class="mb-5">
                                <span
                                    class="p-1 font-bold bg-yellow-400 border-2 rounded-full text-slate-700 border-emerald-700">3</span>
                                <span
                                    class="p-1 font-bold text-yellow-400 border-b-2 rounded-lg border-emerald-700 bg-emerald-700">
                                    Fotokopi
                                    <span class="text-white">KTP Orang Tua</span>
                                </span>
                            </div>
                            <div class="mb-5">
                                <span
                                    class="p-1 font-bold bg-yellow-400 border-2 rounded-full text-slate-700 border-emerald-700">4</span>
                                <span
                                    class="p-1 font-bold text-yellow-400 border-b-2 rounded-lg border-emerald-700 bg-emerald-700">
                                    Fotokopi
                                    <span class="text-white">Kartu NISN</span>
                                </span>
                            </div>
                            <div>
                                <span
                                    class="p-1 font-bold bg-yellow-400 border-2 rounded-full text-slate-700 border-emerald-700">5</span>
                                <span
                                    class="p-1 font-bold text-yellow-400 border-b-2 rounded-lg border-emerald-700 bg-emerald-700">
                                    Fotokopi
                                    <span class="text-white">Raport Kelas 1 s.d 6</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="seleksi" class="py-8 bg-white border-b">
            <div class="container max-w-5xl m-8 mx-auto">
                <div class="flex flex-col flex-wrap sm:flex-row">
                    <div class="w-full p-6 mt-6 sm:w-1/2">
                        <div class="align-middle">
                            <h3
                                class="p-2 mb-2 text-xl font-bold leading-none text-center text-gray-800 bg-yellow-400 border-2 rounded-xl border-emerald-700">
                                TES SELEKSI
                            </h3>
                            <div class="mb-5 ">
                                <span
                                    class="p-1 font-bold bg-yellow-400 border-2 rounded-full text-slate-700 border-emerald-700">1</span>
                                <span
                                    class="p-1 font-bold text-yellow-400 border-b-2 rounded-lg border-emerald-700 bg-emerald-700">
                                    TES
                                    <span class="text-white">AGAMA</span>
                                </span>
                            </div>
                            <div class="mb-5">
                                <span
                                    class="p-1 font-bold bg-yellow-400 border-2 rounded-full text-slate-700 border-emerald-700">2</span>
                                <span
                                    class="p-1 font-bold text-yellow-400 border-b-2 rounded-lg border-emerald-700 bg-emerald-700">
                                    TES
                                    <span class="text-white">AKADEMIK</span>
                                </span>
                            </div>
                            <div class="mb-5">
                                <span
                                    class="p-1 font-bold bg-yellow-400 border-2 rounded-full text-slate-700 border-emerald-700">3</span>
                                <span
                                    class="p-1 font-bold text-yellow-400 border-b-2 rounded-lg border-emerald-700 bg-emerald-700">
                                    TES
                                    <span class="text-white">WAWANCARA</span>
                                </span>
                            </div>
                            <div class="mb-5">
                                <span
                                    class="p-1 font-bold bg-yellow-400 border-2 rounded-full text-slate-700 border-emerald-700">4</span>
                                <span
                                    class="p-1 font-bold text-yellow-400 border-b-2 rounded-lg border-emerald-700 bg-emerald-700">
                                    TES
                                    <span class="text-white">KESEHATAN</span>
                                </span>
                            </div>
                            <div>
                                <span
                                    class="p-1 font-bold bg-yellow-400 border-2 rounded-full text-slate-700 border-emerald-700">5</span>
                                <span
                                    class="p-1 font-bold text-yellow-400 border-b-2 rounded-lg border-emerald-700 bg-emerald-700">
                                    TES
                                    <span class="text-white">BAKAT MINAT</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="w-full p-6 mt-6 sm:w-1/2">
                        <img src="images/information.png" alt="syarat" />
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="leading-normal tracking-normal text-white bg-gradient-to-r from-emerald-800 to-green-600">
        <svg class="wave-top" viewBox="0 0 1439 147" version="1.1" xmlns="http://www.w3.org/2000/svg"
            xmlnsXlink="http://www.w3.org/1999/xlink">
            <g stroke="none" strokeWidth="1" fill="none" fillRule="evenodd">
                <g transform="translate(-1.000000, -14.000000)" fillRule="nonzero">
                    <g class="wave" fill="#f8fafc">
                        <path
                            d="M1440,84 C1383.555,64.3 1342.555,51.3 1317,45 C1259.5,30.824 1206.707,25.526 1169,22 C1129.711,18.326 1044.426,18.475 980,22 C954.25,23.409 922.25,26.742 884,32 C845.122,37.787 818.455,42.121 804,45 C776.833,50.41 728.136,61.77 713,65 C660.023,76.309 621.544,87.729 584,94 C517.525,105.104 484.525,106.438 429,108 C379.49,106.484 342.823,104.484 319,102 C278.571,97.783 231.737,88.736 205,84 C154.629,75.076 86.296,57.743 0,32 L0,0 L1440,0 L1440,84 Z">
                        </path>
                    </g>
                    <g transform="translate(1.000000, 15.000000)" fill="#FFFFFF">
                        <g
                            transform="translate(719.500000, 68.500000) rotate(-180.000000) translate(-719.500000, -68.500000) ">
                            <path
                                d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496"
                                opacity="0.100000001" />
                            <path
                                d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                                opacity="0.100000001" />
                            <path
                                d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z"
                                opacity="0.200000003" />
                        </g>
                    </g>
                </g>
            </g>
        </svg>
        <section class="container py-6 mx-auto mb-12 text-center">
            <h2 class="w-full my-2 text-3xl font-bold leading-tight text-center text-white lg:text-5xl">
                DAFTAR SEGERA !
            </h2>
            <div class="w-full mb-4">
                <div class="w-1/6 h-1 py-0 mx-auto my-0 bg-white rounded-t opacity-25" />
            </div>
            <h3 class="p-3 my-4 text-2xl leading-tight text-justify lg:text-3x">
                Setiap gelombang pendaftaran memiliki kuota pendaftar. Jika kuota sudah penuh maka pendaftaran akan
                ditutup
                dan bisa mendaftar di gelombang berikutnya.
            </h3>
            <button
                class="px-8 py-4 mx-auto my-6 font-bold text-gray-800 transition duration-300 ease-in-out transform bg-white rounded-full shadow-lg lg:mx-0 hover:underline focus:outline-none focus:shadow-outline hover:scale-105">
                Daftar
            </button>
        </section>
        <footer class="bg-white">
            <div class="container px-8 mx-auto">
                <div class="flex flex-col w-full py-6 md:flex-row">
                    <div class="flex-1 mb-6 text-black">
                        <a class="text-xl font-bold no-underline text-emerald-600 hover:no-underline lg:text-2xl"
                            href="#">
                            <img class="w-32 " src="images/logoalfa2.png" alt="logo" />
                            SMP Al Musyaffa'
                        </a>
                    </div>
                    <div class="flex-1">
                        <p class="text-gray-500 uppercase md:mb-6">Links</p>
                        <ul class="mb-6 list-reset">
                            <li class="inline-block mt-2 mr-2 md:block md:mr-0">
                                <a href="#"
                                    class="px-2 py-1 text-white no-underline rounded-lg hover:underline hover:text-emerald-500 bg-emerald-700">FAQ</a>
                            </li>
                            <li class="inline-block mt-2 mr-2 md:block md:mr-0">
                                <a href="#"
                                    class="px-2 py-1 text-white no-underline rounded-lg hover:underline hover:text-emerald-500 bg-emerald-700">Help</a>
                            </li>
                            <li class="inline-block mt-2 mr-2 md:block md:mr-0">
                                <a href="#"
                                    class="px-2 py-1 text-white no-underline rounded-lg hover:underline hover:text-emerald-500 bg-emerald-700">Support</a>
                            </li>
                        </ul>
                    </div>
                    <div class="flex-1">
                        <p class="text-gray-500 uppercase md:mb-6">Legal</p>
                        <ul class="mb-6 list-reset">
                            <li class="inline-block mt-2 mr-2 md:block md:mr-0">
                                <a href="#"
                                    class="px-2 py-1 text-white no-underline rounded-lg hover:underline hover:text-emerald-500 bg-emerald-700">Terms</a>
                            </li>
                            <li class="inline-block mt-2 mr-2 md:block md:mr-0">
                                <a href="#"
                                    class="px-2 py-1 text-white no-underline rounded-lg hover:underline hover:text-emerald-500 bg-emerald-700">Privacy</a>
                            </li>
                        </ul>
                    </div>
                    <div class="flex-1">
                        <p class="text-gray-500 uppercase md:mb-6">Social</p>
                        <ul class="mb-6 list-reset">
                            <li class="inline-block mt-2 mr-2 md:block md:mr-0">
                                <a href="https://www.facebook.com/profile.php?id=100057128814679" target="__blank"
                                    class="px-2 py-1 text-white no-underline rounded-lg hover:underline hover:text-emerald-500 bg-emerald-700">Facebook</a>
                            </li>
                            <li class="inline-block mt-2 mr-2 md:block md:mr-0">
                                <a href="https://www.instagram.com/smp_almusyaffa/" target="__blank"
                                    class="px-2 py-1 text-white no-underline rounded-lg hover:underline hover:text-emerald-500 bg-emerald-700">Instagram</a>
                            </li>
                        </ul>
                    </div>
                    <div class="flex-1">
                        <p class="text-gray-500 uppercase md:mb-6">Company</p>
                        <ul class="mb-6 list-reset">
                            <li class="inline-block mt-2 mr-2 md:block md:mr-0">
                                <a href="#"
                                    class="px-2 py-1 text-white no-underline rounded-lg hover:underline hover:text-emerald-500 bg-emerald-700">Official
                                    Blog</a>
                            </li>
                            <li class="inline-block mt-2 mr-2 md:block md:mr-0">
                                <a href="#"
                                    class="px-2 py-1 text-white no-underline rounded-lg hover:underline hover:text-emerald-500 bg-emerald-700">About
                                    Us</a>
                            </li>
                            <li class="inline-block mt-2 mr-2 md:block md:mr-0">
                                <a href="#"
                                    class="px-2 py-1 text-white no-underline rounded-lg hover:underline hover:text-emerald-500 bg-emerald-700">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <a href="https://www.youtube.com/channel/UC6K2YKhHDT2y05U6GorosCQ" target="__blank"
                class="pl-3 text-gray-500">Developed By : Kendali Koding</a>
        </footer>
    </div>
    <script>
        var scrollpos = window.scrollY;
        var header = document.getElementById("header");
        var navcontent = document.getElementById("nav-content");
        var navaction = document.getElementById("navAction");
        var brandname = document.getElementById("brandname");
        var toToggle = document.querySelectorAll(".toggleColour");

        document.addEventListener("scroll", function() {
            /*Apply classes for slide in bar*/
            scrollpos = window.scrollY;

            if (scrollpos > 10) {
                header.classList.add("bg-white");
                navaction.classList.remove("bg-white");
                navaction.classList.add("bg-gradient-to-r");
                navaction.classList.add("from-emerald-700");
                navaction.classList.add("to-green-600");
                navaction.classList.remove("text-emerald-700");
                navaction.classList.add("text-white");
                //Use to switch toggleColour colours
                for (var i = 0; i < toToggle.length; i++) {
                    toToggle[i].classList.add("text-emerald-700");
                    toToggle[i].classList.remove("text-white");
                }
                header.classList.add("shadow");
                navcontent.classList.remove("bg-gray-100");
                navcontent.classList.add("bg-white");
            } else {
                header.classList.remove("bg-white");
                navaction.classList.remove("bg-gradient-to-r");
                navaction.classList.remove("from-emerald-700");
                navaction.classList.remove("to-green-600");
                navaction.classList.add("bg-white");
                navaction.classList.remove("text-white");
                navaction.classList.add("text-emerald-700");
                //Use to switch toggleColour colours
                for (var i = 0; i < toToggle.length; i++) {
                    toToggle[i].classList.add("text-white");
                    toToggle[i].classList.remove("text-emerald-700");
                }

                header.classList.remove("shadow");
                navcontent.classList.remove("bg-white");
                navcontent.classList.add("bg-gray-100");
            }
        });

        var navMenuDiv = document.getElementById("nav-content");
        var navMenu = document.getElementById("nav-toggle");

        document.onclick = check;

        function check(e) {
            var target = (e && e.target) || (event && event.srcElement);

            //Nav Menu
            if (!checkParent(target, navMenuDiv)) {
                // click NOT on the menu
                if (checkParent(target, navMenu)) {
                    // click on the link
                    if (navMenuDiv.classList.contains("hidden")) {
                        navMenuDiv.classList.remove("hidden");
                    } else {
                        navMenuDiv.classList.add("hidden");
                    }
                } else {
                    // click both outside link and outside menu, hide menu
                    navMenuDiv.classList.add("hidden");
                }
            }
        }

        function checkParent(t, elm) {
            while (t.parentNode) {
                if (t == elm) {
                    return true;
                }
                t = t.parentNode;
            }
            return false;
        }
    </script>
</body>

</html>
