<div>
    <div class="overflow-hidden shadow-sm sm:rounded-lg flex flex-col items-center">

        @forelse ($jobs as $job)
            <div
                class="bg-white shadow-md p-6 mb-4 w-11/12 text-gray-900 rounded-md md:flex md:justify-between md:items-center border hover:border-indigo-500">
                <div class="space-y-2">
                    <a href="{{ route('jobs.show', ['job' => $job->id]) }}" class="text-xl font-bold">
                        {{ $job->name }}
                    </a>

                    <p class="text-sm text-gray-600 ">
                        <span class="font-bold">{{ $job->company }}</span> {{ $job->salary->salary }}
                    </p>
                    <p class="text-sm text-gray-500 ">
                        Expiration Date: {{ $job->expiration_date->toFormattedDateString() }}
                    </p>
                </div>

                <div class="flex gap-3 items-center mt-5 md:mt-0">
                    <a href="#"
                        class="flex items-center gap-1 bg-indigo-500 py-2 px-4 rounded-lg text-white text-xs text-center font-bold uppercase flex-1 ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                        </svg>

                        Applicants
                    </a>

                    <a href="{{ route('jobs.edit', ['job' => $job->id]) }}"
                        class="flex items-center gap-1 bg-blue-700 py-2 px-4 rounded-lg text-white text-xs text-center font-bold uppercase flex-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>
                        Edit
                    </a>

                    <button wire:click="$emit('deleteAlert', [{{ $job->id }}, '{{ $job->name }}'])"
                        class="flex items-center gap-1 bg-red-600 py-2 px-4 rounded-lg text-white text-xs text-center font-bold uppercase flex-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                        Delete
                    </button>
                </div>
            </div>
        @empty
            <p class="p-6 text-center text-sm text-gray-500 bg-white w-11/12 rounded-md">Job Offer List currently empty
            </p>
        @endforelse

        <div class="mt-8 w-11/12">
            {{ $jobs->links() }}
        </div>
    </div>

</div>

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Livewire.on('deleteAlert', ([jobId, jobName]) => {
            Swal.fire({
                title: `Are you sure you want to delete "${jobName}"?`,
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Calls de delete event
                    Livewire.emit('deleteJob', jobId);
                    Swal.fire(
                        'Deleted!',
                        'The Job Offer has been removed.',
                        'success'
                    )
                }
            })
        });
    </script>
@endpush
