<?php

namespace App\Http\Livewire;

use App\Models\Job;
use Livewire\Component;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ShowJobs extends Component
{
    protected $jobs;
    public $home;
    public $search;
    public $category;
    public $salary;

    protected $listeners = [
        'deleteJob',
        'searchJob'
    ];
    use AuthorizesRequests;

    public function mount($home)
    {
        $this->home = $home;
    }

    public function deleteJob(Job $job)
    {
        // JobPolicy to authorize Job Deletion
        $this->authorize('delete', $job);

        // Delete the job
        $job->delete();

        // Remove the Job Image
        Storage::delete('public/jobs/img/' . $job->image);

        // Upload Jobs List
        $this->jobs = Job::where('user_id', auth()->user()->id)->paginate(10);
    }

    public function searchJob($search, $category, $salary)
    {
        $this->search = $search;
        $this->category = $category;
        $this->salary = $salary;
    }

    public function render()
    {
        $this->jobs = Job::when($this->search, function ($query) {
            $query->where('name', 'LIKE', '%' . $this->search . '%');
        })
            ->when($this->search, function ($query) {
                $query->orWhere('company', 'LIKE', '%' . $this->search . '%');
            })
            ->when($this->category, function ($query) {
                $query->where('category_id', $this->category);
            })
            ->when($this->salary, function ($query) {
                $query->where('salary_id', $this->salary);
            })
            ->paginate(10);

        return view('livewire.show-jobs', [
            'jobs' => $this->jobs
        ]);
    }
}
