<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Print' }}</title>

    <!-- Logo -->
    <link rel="icon" href="{{ asset('images/logopsb.png') }}" type="image/png" sizes="16x16" />

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="flex justify-center p-2">
        <div class="grid grid-rows-2 grid-flow-col gap-0 text-center border-b-2 border-slate-600">
            <div class="row-span-2 place-self-center">
                <img src="{{ asset('images/logoalfahp.png') }}" alt="logo" class="w-24 h-24">
            </div>
            <div class="col-span-2">
                <span class=" uppercase tracking-wide text-slate-600 font-bold">yayasan al musyaffa'</span><br>
                <span class="text-2xl uppercase tracking-[.2em] text-slate-600 font-bold">smp al musyaffa'</span>
            </div>
            <div class="col-span-2 text-slate-600 text-sm ">
                <span>Jl. Kampir-Sudipayung, Kec. Ngampel, Kab. Kendal - Jawa Tengah</span><br>
                <span>HP. 087880001111, 082280001111 , 085780001111 E-mail: smpalmusyaffa@gmail.com</span><br>
                <span>Website : www.smpalmusyaffa.sch.id</span>
            </div>
        </div>
    </div>
    {{ $slot }}
</body>

</html>
