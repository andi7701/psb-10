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
    <!-- SideBar LeftCol-->
    <div class="w-[250px] h-full py-5 px-0 fixed overflow-x-hidden overflow-y-scroll myscroll top-0 left-0 z-50 shadow-md transition duration-500 lg:translate-x-0 bg-white"
        :class="open ? 'translate-x-0 ease-in' : '-translate-x-64 ease-out'">
        <div class="px-4 space-y-2">
            <button @click="open = false"
                class="absolute p-1 text-white transition duration-500 transform border-2 rounded-full shadow-md bg-emerald-600 right-5 top-5 border-emerald-700 hover:bg-emerald-500 focus:bg-emerald-500 lg:invisible">
                <svg style="width: 24px; height: 24px" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M20 6.91L17.09 4L12 9.09L6.91 4L4 6.91L9.09 12L4 17.09L6.91 20L12 14.91L17.09 20L20 17.09L14.91 12L20 6.91Z" />
                </svg>
            </button>
            <h1 class="block py-8 text-2xl font-bold text-emerald-700">{{ auth()->user()->name }}</h1>
            <div class="relative flex items-center p-2 space-x-2 rounded-md cursor-pointer hover:bg-emerald-400">
                <svg style="width: 24px; height: 24px" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M12 5.69L17 10.19V18H15V12H9V18H7V10.19L12 5.69M12 3L2 12H5V20H11V14H13V20H19V12H22" />
                </svg>
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>

    <!-- Right Col -->
    <div class="max-w-full min-h-screen ml-0 transition lg:ml-64 lg:max-w-7xl xl:max-w-full">

        <!-- NavBar -->
        <div class="sticky top-0 pt-5 bg-gradient-to-r from-emerald-700 to-green-600">
            <div class="grid grid-cols-2">
                <button @click="open = true"
                    class="flex items-center self-center py-1 pr-2 ml-2 font-bold text-white transition duration-500 transform border-2 border-emerald-800 rounded-xl bg-emerald-600 hover:bg-emerald-500 focus:bg-emerald-500 place-self-start lg:invisible">
                    <svg style="width: 24px; height: 24px" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M15.41,16.58L10.83,12L15.41,7.41L14,6L8,12L14,18L15.41,16.58Z" />
                    </svg>
                    Menu
                </button>
                <div class="flex items-center justify-end mr-2 space-x-1 place-self-end">
                    <img src="images/logoalfa2.png" alt="logo" class="w-12 h-12 lg:w-16 lg:h-16" />
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

        <!-- Main Content -->
        <div class="px-2 py-2 container-fluid">
            <main>
                {{ $slot ?? '' }}
            </main>
        </div>
    </div>
    {{-- <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('dropdown', () => ({
                dropOpen: false,
                toggle() {
                    this.dropOpen = !this.dropOpen
                },
            }))
        })
    </script> --}}
</body>

</html>
