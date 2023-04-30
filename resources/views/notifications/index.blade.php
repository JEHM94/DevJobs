<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-lg text-gray-500 leading-tight">
            {{ __('Get notified so you don\'t miss out any application ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex flex-col items-center">
                    <h1 class="text-2xl font-bold my-7">New Notifications ({{ $notifications->count() }})</h1>

                    @livewire('show-notifications', ['notifications' => $notifications, 'isNew' => true])

                    <a href="{{ route('notifications.old') }}" class="my-5 text-gray-600 font-bold hover:underline">Show
                        All ({{ $totalNotifications }})</a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
