<div class="md:flex md:justify-center p-5">

    <form action="" class="md:w-1/2 space-y-5" wire:submit.prevent='editJob'>
        <p class="text-gray-500">Change the fields you wish to edit</p>
        <!-- Job Position -->
        <div>
            <x-input-label for="name" :value="__('Job Position')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" wire:model="name" :value="old('name')"
                placeholder="e.g. Front-End Developer, Java Developer" autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Monthly Salary -->
        <div>
            <x-input-label for="salary" :value="__('Monthly Salary (USD)')" />
            <select wire:model="salary" id="salary"
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                <option value="">--Choose Salary--</option>
                @foreach ($salaries as $salary)
                    <option value="{{ $salary->id }}">{{ $salary->salary }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('salary')" class="mt-2" />
        </div>

        <!-- Category -->
        <div>
            <x-input-label for="category" :value="__('Category')" />
            <select wire:model="category" id="category"
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                <option value="">--Choose Category--</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('category')" class="mt-2" />
        </div>

        <!-- Company Name -->
        <div>
            <x-input-label for="company" :value="__('Company')" />
            <x-text-input id="company" class="block mt-1 w-full" type="text" wire:model="company" :value="old('company')"
                placeholder="e.g. Google, Netflix, Udemy" />
            <x-input-error :messages="$errors->get('company')" class="mt-2" />
        </div>

        <!-- Expiration Date -->
        <div>
            <x-input-label for="expiration_date" :value="__('Expiration Date')" />
            <x-text-input id="expiration_date" class="block mt-1 w-full" type="date" wire:model="expiration_date"
                :value="old('expiration_date')" />
            <x-input-error :messages="$errors->get('expiration_date')" class="mt-2" />
        </div>

        <!-- Job Description -->
        <div>
            <x-input-label for="description" :value="__('Description')" />
            <textarea wire:model="description" id="description" placeholder="Overall job description, Skills, Experience, etc."
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full h-32"></textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <!-- Image -->
        <div>
            <x-input-label for="image" :value="__('Image')" />
            <x-text-input id="image" class="block mt-1 w-full" type="file" wire:model="newImage"
                accept="image/*" />

            <div class="my-5 w-full flex gap-2">
                <div class="flex-1">
                    <x-input-label :value="__('Current Image')" />
                    <img class="my-2 h-96" src="{{ asset('storage/jobs/img/' . $image) }}"
                        alt="{{ 'Current Image of ' . $name }}">
                </div>
                <div class="flex-1">
                    @if (
                        $newImage &&
                            ($newImage->extension() === 'jpg' || $newImage->extension() === 'jpeg' || $newImage->extension() === 'png'))
                        <x-input-label :value="__('New Image')" />
                        <img class="my-2 h-96" src="{{ $newImage->temporaryUrl() }}" alt="">
                    @endif
                </div>


            </div>

            <x-input-error :messages="$errors->get('newImage')" class="mt-2" />
        </div>

        <div>
            <x-primary-button>
                {{ __('Save Changes') }}
            </x-primary-button>
        </div>

    </form>
</div>
