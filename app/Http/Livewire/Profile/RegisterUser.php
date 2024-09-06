<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use Livewire\Component;

class RegisterUser extends Component
{
    public $username;
    public $firstname;
    public $lastname;
    public $role;
    public $email;
    public $password;
    public $conf_password;

    public function submit() {
        $user = new User();
        $user->username = $this->username;
        $user->first_name = $this->firstname;
        $user->last_name = $this->lastname;
        $user->role_id = $this->role;
        $user->email = $this->email;
        $user->password = $this->password;
    }

    public function render()
    {
        return view('livewire.profile.register-user');
    }
}
