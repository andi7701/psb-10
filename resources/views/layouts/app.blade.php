<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body x-data="{ open: false }" class="font-sans antialiased">
    <div class="w-[250px] h-full py-5 px-0 fixed overflow-x-hidden overflow-y-scroll myscroll top-0 left-0 z-50 shadow-md transition duration-500 lg:translate-x-0 bg-white"
        :class="open ? 'translate-x-0 ease-in' : '-translate-x-64 ease-out'">
        <div class="px-4 space-y-2">
            <button @click="open = false"
                class="absolute p-1 bg-emerald-600 border-2 rounded-full shadow-md right-5 top-5 border-emerald-700 text-white transform transition duration-500 hover:bg-emerald-500    focus:bg-emerald-500 ">
                <svg style="width: 24px; height: 24px" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M20 6.91L17.09 4L12 9.09L6.91 4L4 6.91L9.09 12L4 17.09L6.91 20L12 14.91L17.09 20L20 17.09L14.91 12L20 6.91Z" />
                </svg>
            </button>
            <h1 class="block text-emerald-700 font-bold text-2xl py-8">{{ auth()->user()->name }}</h1>
            <div class="relative flex items-center p-2 space-x-2 rounded-md cursor-pointer hover:bg-emerald-400">
                <svg style="width: 24px; height: 24px" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M12 5.69L17 10.19V18H15V12H9V18H7V10.19L12 5.69M12 3L2 12H5V20H11V14H13V20H19V12H22" />
                </svg>
                <h1>Dashboard</h1>
            </div>
            <div x-data="dropdown" class="flex flex-col">
                <div @click="toggle('home')" id='home' 
                    class="flex items-center justify-between p-2 space-x-2 rounded-md cursor-pointer hover:bg-emerald-400 mb-2 {{ Request::routeIs('home') ? 'bg-emerald-400' : '' }}">
                    <div class="relative flex items-center space-x-2 ">
                        <svg style="width: 24px; height: 24px" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M12,5A3.5,3.5 0 0,0 8.5,8.5A3.5,3.5 0 0,0 12,12A3.5,3.5 0 0,0 15.5,8.5A3.5,3.5 0 0,0 12,5M12,7A1.5,1.5 0 0,1 13.5,8.5A1.5,1.5 0 0,1 12,10A1.5,1.5 0 0,1 10.5,8.5A1.5,1.5 0 0,1 12,7M5.5,8A2.5,2.5 0 0,0 3,10.5C3,11.44 3.53,12.25 4.29,12.68C4.65,12.88 5.06,13 5.5,13C5.94,13 6.35,12.88 6.71,12.68C7.08,12.47 7.39,12.17 7.62,11.81C6.89,10.86 6.5,9.7 6.5,8.5C6.5,8.41 6.5,8.31 6.5,8.22C6.2,8.08 5.86,8 5.5,8M18.5,8C18.14,8 17.8,8.08 17.5,8.22C17.5,8.31 17.5,8.41 17.5,8.5C17.5,9.7 17.11,10.86 16.38,11.81C16.5,12 16.63,12.15 16.78,12.3C16.94,12.45 17.1,12.58 17.29,12.68C17.65,12.88 18.06,13 18.5,13C18.94,13 19.35,12.88 19.71,12.68C20.47,12.25 21,11.44 21,10.5A2.5,2.5 0 0,0 18.5,8M12,14C9.66,14 5,15.17 5,17.5V19H19V17.5C19,15.17 14.34,14 12,14M4.71,14.55C2.78,14.78 0,15.76 0,17.5V19H3V17.07C3,16.06 3.69,15.22 4.71,14.55M19.29,14.55C20.31,15.22 21,16.06 21,17.07V19H24V17.5C24,15.76 21.22,14.78 19.29,14.55M12,16C13.53,16 15.24,16.5 16.23,17H7.77C8.76,16.5 10.47,16 12,16Z" />
                        </svg>
                        <h1>Home</h1>
                    </div>
                    <svg :class="dropOpen ? 'rotate-0' : '-rotate-90'" class="transition-all duration-700 transform"
                        style="width: 24px; height: 24px" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" />
                    </svg>
                </div>
                <div class="pl-10 space-y-3" x-show="dropOpen" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
                    >
                    <a href="{{ route('home') }}"
                        class="pl-1 rounded-md cursor-pointer block hover:bg-emerald-400 hover:text-teal-600 {{ Request::routeIs('home') ? 'bg-emerald-400' : '' }}">
                        Home</a>
                    <h1 class="pl-1 rounded-md cursor-pointer hover:bg-emerald-400 hover:text-teal-600">Item 1</h1>
                    <h1 class="pl-1 rounded-md cursor-pointer hover:bg-emerald-400 hover:text-teal-600">Item 1</h1>
                    <h1 class="pl-1 rounded-md cursor-pointer hover:bg-emerald-400 hover:text-teal-600">Item 1</h1>
                </div>
            </div>
            <div class="flex flex-col" x-data="dropdown">
                <div @click="toggle('audience')" id='audience'
                    class="flex items-center justify-between p-2 space-x-2 rounded-md cursor-pointer hover:bg-emerald-400 mb-2 ${route().current('dashboard') || route().current('landing') ? 'bg-emerald-400' : ''}">
                    <div class="relative flex items-center space-x-2">
                        <svg style="width: 24px; height: 24px" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M12,5A3.5,3.5 0 0,0 8.5,8.5A3.5,3.5 0 0,0 12,12A3.5,3.5 0 0,0 15.5,8.5A3.5,3.5 0 0,0 12,5M12,7A1.5,1.5 0 0,1 13.5,8.5A1.5,1.5 0 0,1 12,10A1.5,1.5 0 0,1 10.5,8.5A1.5,1.5 0 0,1 12,7M5.5,8A2.5,2.5 0 0,0 3,10.5C3,11.44 3.53,12.25 4.29,12.68C4.65,12.88 5.06,13 5.5,13C5.94,13 6.35,12.88 6.71,12.68C7.08,12.47 7.39,12.17 7.62,11.81C6.89,10.86 6.5,9.7 6.5,8.5C6.5,8.41 6.5,8.31 6.5,8.22C6.2,8.08 5.86,8 5.5,8M18.5,8C18.14,8 17.8,8.08 17.5,8.22C17.5,8.31 17.5,8.41 17.5,8.5C17.5,9.7 17.11,10.86 16.38,11.81C16.5,12 16.63,12.15 16.78,12.3C16.94,12.45 17.1,12.58 17.29,12.68C17.65,12.88 18.06,13 18.5,13C18.94,13 19.35,12.88 19.71,12.68C20.47,12.25 21,11.44 21,10.5A2.5,2.5 0 0,0 18.5,8M12,14C9.66,14 5,15.17 5,17.5V19H19V17.5C19,15.17 14.34,14 12,14M4.71,14.55C2.78,14.78 0,15.76 0,17.5V19H3V17.07C3,16.06 3.69,15.22 4.71,14.55M19.29,14.55C20.31,15.22 21,16.06 21,17.07V19H24V17.5C24,15.76 21.22,14.78 19.29,14.55M12,16C13.53,16 15.24,16.5 16.23,17H7.77C8.76,16.5 10.47,16 12,16Z" />
                        </svg>
                        <h1>Audience</h1>
                    </div>
                    <svg :class="dropOpen ? 'rotate-0' : '-rotate-90'" class="transition-all duration-700 transform"
                        style="width: 24px; height: 24px" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" />
                    </svg>
                </div>
                <div class="pl-10 space-y-3" {{-- :class="dropOpen ? 'block' : 'hidden'" --}} x-show="dropOpen"
                    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
                    x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">
                    <a href="{{ route('dashboard') }}"
                        class="pl-1 rounded-md cursor-pointer block hover:bg-emerald-400 hover:text-teal-600 ${route().current('dashboard') ? 'bg-emerald-400' : ''}">
                        Dashboard</a>
                    <a href={{ route('landing') }}
                        class="pl-1 rounded-md cursor-pointer block hover:bg-emerald-400 hover:text-teal-600 ${route().current('landing') ? 'bg-emerald-400' : ''}">
                        Landing</a>
                    <h1 class="pl-1 rounded-md cursor-pointer hover:bg-emerald-400 hover:text-teal-600">Item 1</h1>
                    <h1 class="pl-1 rounded-md cursor-pointer hover:bg-emerald-400 hover:text-teal-600">Item 1</h1>
                    <h1 class="pl-1 rounded-md cursor-pointer hover:bg-emerald-400 hover:text-teal-600">Item 1</h1>
                </div>
            </div>
            <p>
                Sidebar
            </p>
            <p>
                Sidebar
            </p>
            <p>
                Sidebar
            </p>
            <p>
                Sidebar
            </p>
            <p>
                Sidebar
            </p>
            <p>
                Sidebar
            </p>
            <p>
                Sidebar
            </p>
            <p>
                Sidebar
            </p>
            <p>
                Sidebar
            </p>
            <p>
                Sidebar
            </p>
            <p>
                Sidebar
            </p>
            <p>
                Sidebar
            </p>
            <p>
                Sidebar
            </p>
            <p>
                Sidebar
            </p>
            <p>
                Sidebar
            </p>
        </div>
    </div>
    <div class="transition lg:ml-64 ml-0 min-h-screen lg:max-w-7xl max-w-full xl:max-w-full">
        <div class="sticky top-0 bg-gradient-to-r from-emerald-700 to-green-600 pt-5">
            <div class="border border-slate-700 grid grid-cols-2">
                <button @click="open = true"
                    class="border-2 border-emerald-800 rounded-xl bg-emerald-600 text-white font-bold p-2 ml-2 flex items-center transform transition duration-500 hover:bg-emerald-500    focus:bg-emerald-500 place-self-start self-center">
                    <svg style="width: 24px; height: 24px" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M15.41,16.58L10.83,12L15.41,7.41L14,6L8,12L14,18L15.41,16.58Z" />
                    </svg>
                    Menu
                </button>
                <div class="mr-2 place-self-end flex justify-end items-center space-x-1">
                    <span class="text-white font-bold lg:text-2xl text-md">Sistem Informasi Akademik</span>
                    <img src="images/logoalfa2.png" alt="logo" class="w-16 h-16" />
                </div>
            </div>
            <div class="relative">
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
        </div>
        <div class="px-10 py-5 space-y-10">
            <main>
                {{ $slot ?? '' }}
            </main>
            <p>
                This Is Content very long long long long long long long long long text
            </p>
            <p>
                This Is Content very long long long long long long long long long text
            </p>
            <p>
                This Is Content very long long long long long long long long long text
            </p>
            <p>
                This Is Content very long long long long long long long long long text
            </p>
            <p>
                This Is Content very long long long long long long long long long text
            </p>
            <p>
                This Is Content very long long long long long long long long long text
            </p>
            <p>
                This Is Content very long long long long long long long long long text
            </p>
            <p>
                This Is Content very long long long long long long long long long text
            </p>
            <p>
                This Is Content very long long long long long long long long long text
            </p>
            <p>
                This Is Content very long long long long long long long long long text
            </p>
            <p>
                This Is Content very long long long long long long long long long text
            </p>
            <p>
                This Is Content very long long long long long long long long long text
            </p>
            <p>
                This Is Content very long long long long long long long long long text
            </p>
            <p>
                This Is Content very long long long long long long long long long text
            </p>
            <p>
                This Is Content very long long long long long long long long long text
            </p>
            <p>
                This Is Content very long long long long long long long long long text
            </p>
        </div>
    </div>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('dropdown', () => ({
                dropOpen: false,
                toggle() {
                    this.dropOpen = !this.dropOpen
                },
            }))
        })
    </script>
</body>

</html>
