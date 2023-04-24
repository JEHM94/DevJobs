<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-lg text-gray-500 leading-tight">
            {{ __("Don't miss your chance to apply for our job offers") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @livewire('show-job', ['job' => $job])
            </div>
        </div>
    </div>
</x-app-layout>
