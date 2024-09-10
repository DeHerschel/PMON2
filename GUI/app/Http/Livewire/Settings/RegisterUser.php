<?php

namespace App\Http\Livewire\Settings;

use Livewire\Component;

class RegisterUser extends Component
{
    public $registerModal = false;
    public function render()
    {
        return view('livewire.settings.register-user');
    }
}
