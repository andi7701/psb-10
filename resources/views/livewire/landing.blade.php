<div>
    <div class="leading-normal tracking-normal text-white bg-gradient-to-r from-emerald-700 to-green-500">
        <nav id="header" class="fixed top-0 z-30 w-full text-white border-b border-emerald-600">
            <div class="container flex flex-wrap items-center justify-between w-full py-2 mx-auto mt-0">
                <div class="flex justify-between items-center">
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
                    <div class="px-3 lg:hidden block">
                        <button id="nav-toggle"
                            class="flex items-center p-1 transition duration-300 ease-in-out transform text-slate-700 hover:text-slate-800 focus:outline-none focus:shadow-outline hover:scale-105 border border-white rounded-lg bg-slate-200 hover:bg-white justify-between space-x-2">
                            <span>Menu </span>
                            <svg class="w-6 h-6 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <title>Menu</title>
                                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="z-20 flex-grow hidden w-full p-4 mt-2 text-black bg-white lg:flex lg:items-center lg:w-auto lg:mt-0 lg:bg-transparent lg:p-0"
                    id="nav-content">
                    <ul class="items-center justify-end flex-1 list-reset lg:flex">
                        <li class="mr-3">
                            <a class="inline-block px-4 py-2 font-bold no-underline transition duration-300 ease-in-out transform text-slate-700 rounded-3xl hover:underline hover:bg-emerald-500 hover:text-white hover:scale-105"
                                href="#profil">Profil</a>
                        </li>
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

        @include('partials.banner-atas')

        @include('partials.gelombang-atas')

        {{-- Table Pendaftar --}}
        @include('partials.table-pendaftar-landing')

        {{-- Section --}}
        @include('partials.jadwal')
        @include('partials.seleksi')
        @include('partials.alur-pendaftaran')
        @include('partials.beasiswa')
        @include('partials.profil')
    </div>
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

    @include('partials.segera-daftar')

    @include('partials.footer')

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
</div>
