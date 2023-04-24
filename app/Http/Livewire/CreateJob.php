<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Job;
use App\Models\Salary;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateJob extends Component
{
    public $name;
    public $salary;
    public $category;
    public $company;
    public $expiration_date;
    public $description;
    public $image;

    use WithFileUploads;

    protected $rules = [
        'name' => ['required', 'string'],
        'salary' => ['required', 'numeric', 'between:1,9'],
        'category' => ['required', 'numeric', 'between:1,7'],
        'company' => ['required', 'string'],
        'expiration_date' => ['required', 'date'],
        'description' => ['required', 'string'],
        'image' => ['required', 'image', 'max:1024']
    ];


    public function createJob()
    {
        // If the validation is completed successfuly, saves the data in formData
        // if not then show validation errors
        $formData = $this->validate();

        // Save the Image
        $image = $this->image->store('public/jobs/img');
        $formData['imageName'] = str_replace('public/jobs/img/', '', $image);

        // Create the Job Offer
        Job::create([
            'name' => $formData['name'],
            'salary_id' => $formData['salary'],
            'category_id' => $formData['category'],
            'company' => $formData['company'],
            'expiration_date' => $formData['expiration_date'],
            'description' => $formData['description'],
            'image' => $formData['imageName'],
            'user_id' => auth()->user()->id
        ]);

        // Redirect to dashboard
        return redirect()->route('jobs.index')->with('message', 'The Offer "' . $this->name . '" Was Posted Successfully');
    }



    public function render()
    {
        // Gets Salaries from the DB
        $salaries = Salary::all();
        // Gets Categories from the DB
        $categories = Category::all();

        return view('livewire.create-job', [
            'salaries' => $salaries,
            'categories' => $categories
        ]);
    }
}
