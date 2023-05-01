<div class="flex flex-col items-center">
    @forelse ($notifications as $notification)
        <div
            class="bg-white shadow-md p-6 mb-4 w-11/12 text-gray-900 rounded-md md:flex md:gap-1 md:justify-between md:items-center border hover:border-indigo-500">

            <div class="flex items-center gap-2">
                @if (!$notification->read_at || $isNew)
                    <div class=" bg-green-400 rounded-xl p-2"></div>
                @endif

                <div>
                    <p>Your job offer <span class="font-bold">{{ $notification->data['job_name'] }}</span>
                        has
                        received a New
                        Application</p>
                    <p class="text-sm text-gray-500">
                        {{ $notification->created_at->diffForHumans() }}
                    </p>
                </div>
            </div>


            <a href="{{ route('applicants.index', ['job' => $notification->data['job_id']]) }}"
                class="flex justify-center items-center gap-1 bg-indigo-500 mt-5 md:mt-0 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                </svg>

                Show
            </a>
        </div>
    @empty
        <p class="text-center text-gray-600 my-5">You don't have notifications</p>
    @endforelse
</div>
