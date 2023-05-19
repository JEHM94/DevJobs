<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto">

            @livewire('job-filter')

            <h3 class="font-extrabold text-4xl text-gray-700 mb-6 p-3 ">
                Available Job Offers
            </h3>

            @livewire('show-jobs', ['job' => $job])

            {{-- <div class="bg-white shadow-sm rounded-lg p-6 divide-y divide-gray-200">
                @forelse ($jobs as $job)
                    <div class="md:flex md:justify-between md:items-center py-5">
                        <div>
                            <a href="{{ route('jobs.show', ['job' => $job]) }}"
                                class="text-3xl font-extrabold text-gray-600">
                                {{ $job->name }}
                            </a>
                            <p class="text-base text-gray-600 mb-1">
                                {{ $job->company }}
                            </p>
                            <p class="font-bold text-xs text-gray-6000">
                                Expiration Date: <span
                                    class="font-normal">{{ $job->expiration_date->toFormattedDateString() }}</span>
                            </p>
                        </div>

                        <div class="mt-5">
                            <a href="{{ route('jobs.show', ['job' => $job]) }}"
                                class="flex justify-center items-center gap-1 bg-indigo-500 mt-5 md:mt-0 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                                </svg>

                                Show Details
                            </a>
                        </div>

                    </div>
                @empty
                    <p class="p-6 text-center text-sm text-gray-500 bg-white w-11/12 rounded-md">Job Offer List
                        currently
                        empty
                    </p>
                @endforelse
            </div> --}}


        </div>

    </div>
</div>
