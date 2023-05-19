<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-lg text-gray-500 leading-tight">
            {{ __('My Job Offers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('message'))
                <div class="flex justify-center mb-6">

                    <p
                        class="shadow-md w-11/12 bg-green-100 border-l-4 p-2 border-green-600 text-green-600 text-center uppercase font-bold text-sm">
                        {{ session('message') }}
                    </p>
                </div>
            @endif

            @livewire('show-jobs', [
                'jobs' => $jobs,
                'home' => false,
            ])
        </div>
    </div>
</x-app-layout>
