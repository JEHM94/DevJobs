<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-lg text-gray-500 leading-tight">
            {{ __('Create new job offers within seconds') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold text-center my-7">Create a New Job Offer</h1>
                    
                    @livewire('create-job')
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
