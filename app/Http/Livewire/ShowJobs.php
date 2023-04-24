<?php

namespace App\Http\Livewire;

use App\Models\Job;
use Livewire\Component;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ShowJobs extends Component
{
    protected $listeners = [
        'deleteJob'
    ];
    use AuthorizesRequests;

    public function deleteJob(Job $job)
    {
        // JobPolicy to authorize Job Deletion
        $this->authorize('delete', $job);
        
        // Delete the job
        $job->delete();

        // Remove the Job Image
        Storage::delete('public/jobs/img/' . $job->image);
    }

    public function render()
    {
        $jobs = Job::where('user_id', auth()->user()->id)->paginate(10);

        return view('livewire.show-jobs', [
            'jobs' => $jobs
        ]);
    }
}
