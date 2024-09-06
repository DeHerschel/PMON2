<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Tools extends Component
{
    public $traceTarget = "";
    public $traceroute;
    public $mapTarget;
    public $nmap;
    public $whoisTarget;
    public $whois;
    public $lookupTarget;
    public $lookup;
    public $listeners = ['updateTrace', 'updateMap'];
    public function mount()
    {
        if (file_exists('/tmp/pmon/traceroute-tools')) {
           unlink('/tmp/pmon/traceroute-tools');
        }
        if (file_exists('/tmp/pmon/nmap-tools')) {
            unlink('/tmp/pmon/nmap-tools');
        }
    }
    public function trace() {
        $this->traceroute = '';
        shell_exec(escapeshellcmd('traceroute -I '.$this->traceTarget).' > /tmp/pmon/traceroute-tools &');
    }
    public function map()
    {
        $this->nmap = '';
        shell_exec(escapeshellcmd('nmap ' . $this->mapTarget) . ' > /tmp/pmon/nmap-tools &');
    }
    public function whoIs()
    {
        $this->whois = shell_exec(escapeshellcmd('whois ' . $this->whoisTarget));
    }
    public function lookUp()
    {
        $this->lookup = shell_exec(escapeshellcmd('nslookup ' . $this->lookupTarget));
    }
    public function updateTrace() {
        if (file_exists('/tmp/pmon/traceroute-tools')) {
            $this->traceroute = file_get_contents('/tmp/pmon/traceroute-tools');
        }
    }
    public function updateMap() {
        if (file_exists('/tmp/pmon/nmap-tools')) {
            $this->nmap = file_get_contents('/tmp/pmon/nmap-tools');
        }
    }
    public function render()
    {
        $traceroute = $this->traceroute;
        $nmap = $this->nmap;
        $whois = $this->whois;
        $lookup = $this->lookup;
        return view('livewire.tools', compact('traceroute', 'nmap', 'whois', 'lookup'));

    }
}
