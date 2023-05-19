<x-app-layout>
    <div class="py-5 bg-gray-50 overflow-hidden lg:py-24">
        <div class=" max-w-xl mx-auto px-4 sm:px-6 lg:px-8 lg:max-w-7xl">
            <div class="relative">
                <h2
                    class="mt-4 text-center text-4xl leading-8 font-extrabold tracking-tight text-indigo-600 sm:text-6xl">
                    Find
                    Tech Jobs remotely </h2>
                <p class="mt-4 max-w-3xl mx-auto text-center text-xl text-gray-500">Find your dream job with
                    International Tech Companies</p>
                <p class="mb-4 max-w-3xl mx-auto text-center text-xl text-gray-500">Job offers for Front End Developers,
                    Backend Developers, DevOps,
                    Mobile and much more!</p>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto">

            @livewire('job-filter')

            <h3 class="text-2xl md:text-4xl text-gray-600 text-center font-extrabold mb-5">
                Available Job Offers
            </h3>

            @livewire('show-jobs', [
                /* 'jobs' => $jobs, */
                'home' => true,
            ])

        </div>

    </div>
</x-app-layout>
