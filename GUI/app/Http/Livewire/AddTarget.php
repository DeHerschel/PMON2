<?php

namespace App\Http\Livewire;

use App\Http\Controllers\TargetController;
use App\Models\Permission;
use App\Models\Target;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddTarget extends Component
{
    public $modal = false;
    public $added = false;
    public $selowner = false;
    public $name;
    public $ip;
    public $domain;
    public $mac;
    public $rol;

    protected $rules = [
        'name' => 'required|max:100|unique:targets,name|regex:/^[a-z0-9 .\-]+$/i',
        'ip' => 'required|ip|unique:targets,IP',
        'domain' => 'nullable|max:255',
        'mac' => 'nullable|mac_address|unique:targets,MAC'
    ];
    protected $validationAttributes = [
            'ip' => 'IP',
            'mac' => 'MAC'
    ];

    public function submit() {
        $this->validate();
        $target = new Target();
        $target->name = $this->name;
        $target->IP = $this->ip;
        $target->domain = $this->domain;
        $target->MAC = $this->mac;
        TargetController::store($target);
        $permission = new Permission;
        if ($this->selowner == true) {
            if ($this->rol == 0) {
                for ($i=1; $i < 4; $i++) {
                    $permission->role_id = $i;
                    $permission->target_id = $target->id;
                }
            } else {
                $permission->role_id = $this->rol;
                $permission->target_id = $target->id;
            }
        } else {
            $permission->role_id = Auth::User()->Role->id;
            $permission->target_id = $target->id;
        }
        $permission->save();

        system("service pmon restart");
        $this->added = true;
        $this->modal = false;
        $this->emit('render');
        $this->emit('added');
    }

    public function render() {
        if (Auth::User()->Role->id == 1) {
            $this->selowner = true;
        }
        if ($this->added == true) {
            $added = true;
            return view('livewire.add-target', compact('added'));
        }
        return view('livewire.add-target');
    }
}
