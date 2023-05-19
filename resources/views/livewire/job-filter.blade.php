<div class="bg-gray-100 mb-10 md:mb-0">
    <h2 class="text-2xl md:text-4xl text-gray-600 text-center font-extrabold mb-5">Find Jobs</h2>

    <div class="max-w-7xl mx-auto">
        <form wire:submit.prevent='search' class="w-11/12 mx-auto md:w-full">
            <div class="md:grid md:grid-cols-3 gap-5">
                <div class="mb-5">
                    <label class="block mb-1 text-sm text-gray-700 uppercase font-bold " for="search">Search title or
                        skill
                    </label>
                    <input id="search" type="text" placeholder="e.g Laravel, React Dev, Techlead"
                        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
                        wire:model='search' />
                </div>

                <div class="mb-5">
                    <label class="block mb-1 text-sm text-gray-700 uppercase font-bold" for="category">Category</label>
                    <select wire:model='category' id="category" class="border-gray-300 p-2 w-full">
                        <option value="0">--Choose Category--</option>

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-5">
                    <label class="block mb-1 text-sm text-gray-700 uppercase font-bold" for="salary">Monthly Salary
                        (USD)</label>
                    <select wire:model='salary' class="border-gray-300 p-2 w-full" id="salary">
                        <option value="0">--Choose Salary--</option>
                        @foreach ($salaries as $salary)
                            <option value="{{ $salary->id }}">{{ $salary->salary }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex justify-end">
                <input type="submit"
                    class="bg-indigo-500 hover:bg-indigo-600 transition-colors text-white text-sm font-bold px-10 py-2 rounded cursor-pointer uppercase w-full md:w-auto"
                    value="Search" />
            </div>
        </form>
    </div>
</div>
