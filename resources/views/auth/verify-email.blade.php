<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 text-sm bg-green-100 border-l-4 border-green-600 text-green-600 font-bold p-2">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf

        <x-primary-button class="w-full justify-center mt-3">
            {{ __('Resend Verification Email') }}
        </x-primary-button>
    </form>

    <div class="flex justify-around">
        <a href="{{ route('profile.edit') }}"
            class="hover:underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mt-3">
            {{ __('Show Profile') }}
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit"
                class="hover:underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 w-full justify-center mt-3">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>

</x-guest-layout>
