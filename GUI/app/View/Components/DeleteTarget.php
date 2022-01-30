<?php

namespace App\View\Components;

use App\Models\Target;
use Illuminate\View\Component;

class DeleteTarget extends Component
{
    public $target;
    public $error;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Target $target = null, $error = null)
    {
        $this->target = $target;
        $this->error = $error;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.delete-target');
    }
}
