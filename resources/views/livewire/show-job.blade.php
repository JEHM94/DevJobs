<div class="p-10">
    <div class="mb-5">
        <h3 class="font-bold text-3xl text-gray-800 my-3">
            {{ $job->name }}
        </h3>

        <div class="md:grid md:grid-cols-2 bg-gray-50 p-4 my-5">
            <p class="font-bold text-sm uppercase text-gray-800 my-3">
                Company: <span class="normal-case font-normal">{{ $job->company }}</span>
            </p>

            <p class="font-bold text-sm uppercase text-gray-800 my-3">
                Last day to Apply: <span
                    class="normal-case font-normal">{{ $job->expiration_date->toFormattedDateString() }}</span>
            </p>

            <p class="font-bold text-sm uppercase text-gray-800 my-3">
                Category: <span class="normal-case font-normal">{{ $job->category->category }}</span>
            </p>

            <p class="font-bold text-sm uppercase text-gray-800 my-3">
                Monthly Salary (USD): <span class="normal-case font-normal">{{ $job->salary->salary }}</span>
            </p>
        </div>
    </div>

    <div class="md:grid md:grid-cols-6 gap-4">
        <div class="md:col-span-2">
            <img src="{{ asset('storage/jobs/img/' . $job->image) }}"alt="{{ 'Current Image of ' . $job->name }}">
        </div>

        <div class="md:col-span-4">
            <h2 class="text-2xl font-bold mb-5">About the Job</h2>
            <p>{{ $job->description }}</p>
        </div>
    </div>

    @guest()
        <div class="mt-5 bg-gray-50 border border-dashed p-5 text-center">
            <p>
                Apply to this offer and many more by creating an account. <a class="font-bold text-indigo-600"
                    href="{{ route('register') }}">Register on DevJobs now!</a>
            </p>
        </div>
    @endguest
</div>
