<?php

namespace App\Http\Livewire;
use Livewire\Component;

class Click extends Component
{
    // public $msg = '';
    // public $studentId = 55;

    public function render()
    {
        return view('livewire.click');
    }

    public function clickEvt()
    {
        $this->msg = "Button has been clicked.";
    }

    public function trackClickEvt($user_id)
    {
        $this->msg = $user_id;
    }
}