<?php

namespace App\Http\Livewire;

use App\Http\Controllers\TargetController;
use App\Models\Target;
use Livewire\Component;

class AddTarget extends Component
{
    public $modal = false;
    public $added = false;
    public $name;
    public $ip;
    public $domain;
    public $mac;

    protected $rules = [
        'name' => 'required|max:10|unique:targets,name|alpha_dash',
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
        $this->added = true;
        $this->modal = false;

    }

    public function render() {
        if ($this->added == true) {
            $added = true;
            return view('livewire.add-target', compact('added'));
        }
        return view('livewire.add-target');
    }
}
