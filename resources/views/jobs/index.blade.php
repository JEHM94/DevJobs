<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-lg text-gray-500 leading-tight">
            {{ __('My Job Offers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('message'))
                <div class="bg-green-500 p-2 rounded-lg mb-6 text-white text-center uppercase font-bold">
                    {{ session('message') }}
                </div>
            @endif

            @livewire('show-jobs')
        </div>
    </div>
</x-app-layout>
