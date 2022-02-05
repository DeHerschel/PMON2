<?php

namespace App\Http\Livewire;

use App\Models\Target;
use Livewire\Component;

class SearchTargets extends Component
{
    public $search;

    public function render()
    {
        if ($this->search) {
            $targets = Target::where('name', 'like', '%' . $this->search . '%')
                ->orWhere('IP', 'like', '%' . $this->search . '%')
                ->orWhere('domain', 'like', '%' . $this->search . '%')
                ->orWhere('MAC', 'like', '%' . $this->search . '%')
                ->get();
            return view('livewire.search-targets', compact('targets'));
        }
        return view('livewire.search-targets');
    }
}
