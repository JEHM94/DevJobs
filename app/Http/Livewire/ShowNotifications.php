<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowNotifications extends Component
{
    public $notifications;
    public $isNew;

    public function render()
    {
        return view('livewire.show-notifications');
    }
}
