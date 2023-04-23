<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-lg text-gray-500 leading-tight">
            {{ __('Edit your job offers at any moment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-700">
                    <div class="flex flex-col items-center mb-2">
                        <h1 class="text-2xl font-bold mt-7">
                            {{ $job->name }}
                        </h1>
                        <div class="text-sm text-gray-600">
                            <p>
                                <span class="font-bold">{{ $job->company }}</span> {{ $job->salary->salary }}
                            </p>
                        </div>

                    </div>

                    @livewire('edit-job', ['job' => $job])
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
