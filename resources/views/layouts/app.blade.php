<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Logo -->
    <link rel="icon" href="{{ asset('images/logoalfa.png') }}" type="image/png" sizes="16x16" />

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body x-data="{ open: false }" class="font-sans antialiased">
    
    <!-- SideBar LeftCol-->
    <x-sidebar />

    <!-- Right Col -->
    <div class="max-w-full min-h-screen ml-0 transition lg:ml-64 lg:max-w-7xl xl:max-w-full">

        <!-- NavBar -->
        <x-navbar />

        <!-- Main Content -->
        <div class="px-2 py-2 container-fluid">
            <main>
                {{ $slot }}
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
