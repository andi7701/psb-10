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
        @role('Admin')
            <x-sidebar-link :href="__('dashboard')" :label="__('Dashboard')" />
        @endrole
        @role('Ketua Tim')
            <x-sidebar-link :href="__('home')" :label="__('Home')" />
        @endrole
    </div>
</div>
