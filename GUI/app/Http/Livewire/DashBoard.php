<?php

namespace App\Http\Livewire;

use App\Models\Target;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class DashBoard extends Component


{
    public function render()
    {
        $targets = Auth::user()->Role->Targets()->orderBy('id', 'desc')->paginate(5);
        if (Auth::user()->Role->id == 1) {
            $targets = Target::orderBy('id', 'desc')->paginate(5);
        }
        $targetsNoPag = Auth::user()->Role->Targets()->orderBy('id', 'desc')->get();
        if (Auth::user()->Role->id == 1) {
            $targetsNoPag = Target::orderBy('id', 'desc')->get();
        }

        $noTargetsMsg = "There are not targets yet";

        return view('livewire.dash-board', compact('targetsNoPag', 'targets', 'noTargetsMsg'));
    }
}
