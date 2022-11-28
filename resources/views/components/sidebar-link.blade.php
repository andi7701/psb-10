@props(['href', 'label'])
<a href="{{ route($href) }}" class="relative flex items-center p-2 space-x-2 rounded-md cursor-pointer hover:bg-emerald-400 hover:text-white {{ request()->routeIs($href) ? 'bg-emerald-400 text-white' : '' }}">
    <h1>{{ $label }}</h1>
</a>