<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="overflow-hidden bg-white border-2 rounded-lg shadow-lg ">
        <div class="p-6 text-gray-900">
            You're logged in!
            <x-input label="Name" placeholder="your name" />
        </div>
    </div>
</x-app-layout>
