<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;

class RegisterUser extends Component
{
    public $username;
    public $firstname;
    public $lastname;
    public $email;
    public $password;
    public $conf_password;


    public function render()
    {
        return view('livewire.profile.register-user');
    }
}
