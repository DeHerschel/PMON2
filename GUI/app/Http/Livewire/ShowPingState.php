<?php

namespace App\Http\Livewire;
use App\Models\Target;
use Livewire\Component;
class ShowPingState extends Component
{
    public $time;
    public $target;
    public $state;
    protected $listeners = ['update'];
    public function mount(Target $target) {
        $this->target = $target;
        if (file_exists("/tmp/pmon/" . $target->IP . ".json")){
            $json = file_get_contents("/tmp/pmon/".$target->IP.".json");
            $json = json_decode($json);
            if ($json) {
                $this->time = $json->TIME;
                $this->state = $json->STATE;
            }
        }
        else {
            $this->state = 'DOWN';
        }
        //     $target = Target::where('ip', $this->target->IP)->first();
        //     $data = json_decode($target->pingData);
        //     $this->time = $data->time;

        // }

    }

    public function update() {
        if (file_exists("/tmp/pmon/" . $this->target->IP . ".json")) {
            $json = file_get_contents("/tmp/pmon/" . $this->target->IP . ".json");
            $json = json_decode($json);
            if ($json) {
                $this->time = $json->TIME;
                $this->state = $json->STATE;
            }
        }

    }

    public function render()
    {
        $state = $this->state;
        $time = $this->time;
        return view('livewire.show-ping-state',compact('time', 'state') );
    }
}
