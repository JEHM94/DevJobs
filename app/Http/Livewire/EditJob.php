<?php

namespace App\Http\Livewire;

use App\Models\Job;
use App\Models\Salary;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditJob extends Component
{
    public $job_id;
    public $name;
    public $salary;
    public $category;
    public $company;
    public $expiration_date;
    public $description;
    public $image;
    public $newImage;

    use WithFileUploads;

    protected $rules = [
        'name' => ['required', 'string'],
        'salary' => ['required', 'numeric', 'between:1,9'],
        'category' => ['required', 'numeric', 'between:1,7'],
        'company' => ['required', 'string'],
        'expiration_date' => ['required'],
        'description' => ['required', 'string'],
        // Nullable allows the input to be empty, however, if the input is not empty then it validates the inpout
        'newImage' => ['nullable', 'image', 'max:1024']
    ];

    public function mount(Job $job)
    {
        $this->job_id = $job->id;
        $this->name = $job->name;
        $this->salary = $job->salary_id;
        $this->category = $job->category_id;
        $this->company = $job->company;
        $this->expiration_date = $job->expiration_date;
        $this->description = $job->description;
        $this->image = $job->image;
    }

    public function editJob(Job $job)
    {
        // If the validation is completed successfuly, saves the data in formData
        // if not then show validation errors
        $formData = $this->validate();

        if ($this->newImage) {
            // Save the Image
            $image = $this->newImage->store('public/jobs/img');
            $formData['imageName'] = str_replace('public/jobs/img/', '', $image);

            // Delete the old image
            Storage::delete('public/jobs/img/' . $this->image);
        }

        // Find the Job to be edited
        $job = Job::find($this->job_id);

        // Updates the model
        $job->name = $formData['name'];
        $job->salary_id = $formData['salary'];
        $job->category_id = $formData['category'];
        $job->company = $formData['company'];
        $job->expiration_date = $formData['expiration_date'];
        $job->description = $formData['description'];
        $job->image = $formData['imageName'] ?? $job->image;

        // Saves the model
        $job->save();

        // Redirect to dashboard
        return redirect()->route('jobs.index')->with('message', 'The Offer "' . $job->name . '" Was Updated Successfully');
    }

    public function render()
    {
        // Gets Salaries from the DB
        $salaries = Salary::all();
        // Gets Categories from the DB
        $categories = Category::all();

        return view('livewire.edit-job', [
            'salaries' => $salaries,
            'categories' => $categories
        ]);
    }
}
