<?php

namespace App\Http\Livewire;

use App\Models\Target;
use Livewire\Component;
use App\Http\Controllers\TargetController;

class DeleteTarget extends Component
{
    public $target;
    public $delModal = false;
    public $listeners = ['delete'];
    public function showDelModal() {
        $this->emit('delModal');
    }
    public function delete()
    {
        TargetController::destroy($this->target);
        return redirect()->route('targets.index');
    }
    public function mount(Target $target)
    {
        $this->target = $target;
    }
}
