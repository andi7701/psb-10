@props(['href', 'label'])
<a href="{{ route($href) }}" class="relative font-bold flex items-center p-2 space-x-2 rounded-md text-slate-600 cursor-pointer hover:bg-emerald-400 hover:text-white hover:shadow-lg hover:shadow-emerald-300 hover:border-white hover:border {{ request()->routeIs($href) ? 'bg-emerald-400 text-white shadow-lg shadow-emerald-300 border border-white' : '' }}">
    <h1>{{ Str::title($label) }}</h1>
</a>