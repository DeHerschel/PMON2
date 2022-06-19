<?php

namespace App\Http\Livewire;

use App\Models\Target;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ShowTargets extends Component
{
    public $target;
    public $search;
    protected $listeners = ['render'];
    public function render()
    {
        if ($this->search) {
            $targets = Auth::user()->Role->Targets()
                 ->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('IP', 'like', '%' . $this->search . '%')
                ->orWhere('domain', 'like', '%' . $this->search . '%')
                ->orWhere('MAC', 'like', '%' . $this->search . '%')
                ->paginate();
            if (Auth::user()->Role->id == 1) {
                $targets = Target::where('name', 'like', '%' . $this->search . '%')
                ->orWhere('IP', 'like', '%' . $this->search . '%')
                ->orWhere('domain', 'like', '%' . $this->search . '%')
                ->orWhere('MAC', 'like', '%' . $this->search . '%')
                ->paginate(9);
            }
            return view('livewire.show-targets', compact('targets'));
        }
        // $targets = Auth::user()->Role->Targets()->orderBy('id', 'desc')->paginate(9);
        // if (Auth::user()->Role->id == 1) {
        //     $targets = Target::orderBy('id', 'desc')->paginate(9);
        // }
        $targets = Auth::user()->Role->Targets()->orderBy('id', 'desc')->paginate(9);
        if (Auth::user()->Role->id == 1) {
            $targets = Target::orderBy('id', 'desc')->paginate(9);
        }
        return view('livewire.show-targets', compact('targets'));
    }
}
