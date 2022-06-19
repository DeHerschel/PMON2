<?php

namespace App\Http\Livewire;

use App\Models\Target;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TargetController;

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
            ->paginate();
            return view('livewire.search-targets', compact('targets'));
        }
        // $targets = Auth::user()->Role->Targets()->orderBy('id', 'desc')->paginate(9);
        // if (Auth::user()->Role->id == 1) {
        //     $targets = Target::orderBy('id', 'desc')->paginate(9);
        // }
        return view('livewire.search-targets');
    }
}
