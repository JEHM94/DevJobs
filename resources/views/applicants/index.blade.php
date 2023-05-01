<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-lg text-gray-500 leading-tight">
            {{ __('Review job applications from anywhere') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
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

                    <div class="flex flex-col items-center">
                        @forelse ($job->applicants as $applicant)
                            <div
                                class="bg-white shadow-md p-6 mb-4 w-11/12 text-gray-900 rounded-md md:flex md:gap-1 md:justify-between md:items-center border hover:border-indigo-500">

                                <div>
                                    <p class="text-xl font-medium text-gray-800">
                                        {{ $applicant->user->name }}
                                    </p>
                                    <p class="text-sm text-gray-600">
                                        {{ $applicant->user->email }}
                                    </p>

                                    <p class="text-sm font-medium text-gray-600">
                                        Applied <span
                                            class="font-normal">{{ $applicant->user->created_at->diffForHumans() }}</span>
                                    </p>
                                </div>


                                <a href="{{ asset('storage/jobs/resume/' . $applicant->resume) }}" target="_blank"
                                    rel="noreferrer noopener"
                                    class="flex justify-center items-center gap-1 bg-indigo-500 mt-5 md:mt-0 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                                    </svg>
                                    Show Resume
                                </a>
                            </div>
                        @empty
                            <p class="text-center text-gray-600 my-5">This job offer doesn't have applications yet</p>
                        @endforelse
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
