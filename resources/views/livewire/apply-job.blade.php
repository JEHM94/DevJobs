<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-2xl font-bold my-4">Apply to {{ $job->name }}</h3>

    @if ($isApplied)
        <div class="flex justify-center my-6 w-full">
            <p class="shadow-md w-11/12 bg-green-100 border-l-4 p-2 border-green-600 text-green-600 text-center uppercase font-bold text-sm">
                You Applied to "{{ $job->name }}" Successfully. Good Luck!
            </p>
        </div>
    @else
        <form class="w-96 mt-2" wire:submit.prevent='apply'>
            <div class="mb-4">
                <x-input-label for="resume" :value="__('Attach your Resume')" />

                <x-text-input id="resume" class="block mt-1 w-full" type="file" wire:model="resume"
                    accept=".pdf" />
            </div>
            <x-input-error :messages="$errors->get('resume')" class="my-4" />


            <x-primary-button>
                {{ __('Apply') }}
            </x-primary-button>
        </form>
    @endif


</div>
