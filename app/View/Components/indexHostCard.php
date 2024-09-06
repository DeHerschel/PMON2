<?php

namespace App\View\Components;

use Illuminate\View\Component;

class indexHostCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Target $target = null, $error = null)
    {
        $this->target = $target;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.index-host-card');
    }
}
