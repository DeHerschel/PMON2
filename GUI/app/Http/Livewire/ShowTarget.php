<?php

namespace App\Http\Livewire;

use App\Models\Target;
use Livewire\Component;

class ShowTarget extends Component {
    public $target;
    public $pingInfo;
    public $traceroute;
    public $nmap;
    public $problemsModal = false;
    protected $listeners = ['updateInfo', 'map', 'trace', 'render'];
    public function updateInfo()
    {
        $json = file_get_contents("/tmp/pmon/" . $this->target->IP . ".json");
        $this->pingInfo = json_decode($json, true);
    }

    public function mount(Target $target) {
        $this->target = $target;
        $json = file_get_contents("/tmp/pmon/" . $target->IP . ".json");
        $this->pingInfo = json_decode($json, true);
        shell_exec("nmap -sS " . $this->target->IP . " | grep -A 20 PORT | sed '1d; /./!d' | sed '$ d'   > /tmp/pmon/nmap &");
        shell_exec("traceroute -I " . $this->target->IP." | sed '1d' > /tmp/pmon/traceroute &");
    }
    public function map() {
        $this->nmap = file_get_contents("/tmp/pmon/nmap");
    }
    public function trace() {
        $this->traceroute = file_get_contents("/tmp/pmon/traceroute");
    }
    public function update()
    {
        $nproblems = $this->target->problems()->count();
        $problems = $this->target->problems()->get();
        $target = $this->target;
        $pingInfo = $this->pingInfo;
        $traceroute = $this->traceroute;
        $nmap = $this->nmap;
        return view('livewire.show-target', compact('target', 'pingInfo', 'nmap', 'traceroute','problems','nproblems'));
    }
    public function render()
    {
        $nproblems = $this->target->problems()->count();
        $problems = $this->target->problems()->get();
        $target = $this->target;
        $pingInfo = $this->pingInfo;
        $traceroute = $this->traceroute;
        $nmap = $this->nmap;
        return view('livewire.show-target', compact('target', 'pingInfo', 'nmap','traceroute', 'problems', 'nproblems'));
    }
}
