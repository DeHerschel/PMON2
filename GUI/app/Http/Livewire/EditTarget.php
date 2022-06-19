<?php

namespace App\Http\Livewire;

use App\Models\Target;
use Livewire\Component;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;

class EditTarget extends Component
{
    public $modal = false;
    public $added = false;
    public $selowner = false;
    public $name;
    public $ip;
    public $domain;
    public $mac;
    public $rol;
    public $target;

    protected $rules = [
        'name' => 'required|max:10|unique:targets,name|alpha_dash',
        'ip' => 'required|ip',
        'domain' => 'nullable|max:255',
        'mac' => 'nullable|mac_address|unique:targets,MAC'
    ];
    protected $validationAttributes = [
        'ip' => 'IP',
        'mac' => 'MAC'
    ];
    public function mount(Target $target){
        $this->target = $target;
        $this->name = $target->name;
        $this->ip = $target->IP;
        $this->domain = $target->domain;
        $this->mac = $target->MAC;

    }
    public function submit()
    {
        $this->validate();
        $this->target->name = $this->name;
        $this->target->IP = $this->ip;
        $this->target->domain = $this->domain;
        $this->target->MAC = $this->mac;

        $this->target->save();
        $this->added = true;
        $this->modal = false;
        $this->emit('added');
    }

    public function render()
    {

        $target = $this->target;
        return view('livewire.edit-target', compact('target'));
    }
}
