<?php

namespace App\Http\Livewire;
use App\Models\Target;
use Livewire\Component;
class ShowPingState extends Component
{
    public $time;
    public $target;
    protected $listeners = ['update'];
    public function mount(Target $target) {
        $this->target = $target;
        if ($this->target->IP == '8.8.8.8') {
            $target = Target::where('ip', $this->target->IP)->first();
            $data = json_decode($target->pingData);
            $this->time = $data->time;

        }
    }

    public function update() {
        if ($this->target->IP == '8.8.8.8') {
            $target = Target::where('ip', $this->target->IP)->first();
            $data = json_decode($target->pingData);
            $this->time = $data->time;
        }

    }

    public function render()
    {
        $time = $this->time;
        return view('livewire.show-ping-state',compact('time') );
    }
}
