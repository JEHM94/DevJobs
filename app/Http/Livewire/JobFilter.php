<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Salary;
use Livewire\Component;

class JobFilter extends Component
{
    public $search;
    public $category;
    public $salary;

    public function search()
    {
        $this->emit('searchJob', $this->search, $this->category, $this->salary);
    }

    public function render()
    {
        $salaries = Salary::all();
        $categories = Category::all();

        return view('livewire.job-filter', [
            'salaries' => $salaries,
            'categories' => $categories
        ]);
    }
}
