<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowJob extends Component
{
    public $job;
    
    public function render()
    {
        return view('livewire.show-job');
    }
}
