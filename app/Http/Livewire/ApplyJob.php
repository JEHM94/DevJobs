<?php

namespace App\Http\Livewire;

use App\Models\Applicant;
use Livewire\Component;
use Livewire\WithFileUploads;

class ApplyJob extends Component
{
    public $job;
    public $resume;
    public $isApplied;

    protected $rules = [
        'resume' => ['required', 'mimes:pdf'],
    ];
    
    use WithFileUploads;

    public function mount()
    {
        // Verifies wether the user already applied to the job or not
        $this->isApplied = $this->job->applicants->where('user_id', auth()->user()->id)->count();
    }

    public function apply()
    {
        // Validates the resume file
        $formData = $this->validate();

        // Save the Resume
        $resume = $this->resume->store('public/jobs/resume');
        $formData['resume'] = str_replace('public/jobs/resume/', '', $resume);

        // Create the Application
        /* Applicant::create([
            'user_id' => auth()->user()->id,
            'job_id' => $this->job->id,
            'resume' => $formData['resume']
        ]); */

        // Create the Application
        $this->job->applicants()->create([
            'user_id' => auth()->user()->id,
            'resume' => $formData['resume']
        ]);

        // Updates Livewire
        $this->isApplied = true;

        // Redirect 
        //return redirect()->back()->with('message', 'You Applied to "' . $this->job->name . '" Successfully. Good Luck!');
    }

    public function render()
    {
        return view('livewire.apply-job');
    }
}
