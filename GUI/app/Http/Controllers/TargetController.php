<?php

namespace App\Http\Controllers;

use App\Models\Target;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreTarget as RequestStoreTarget;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Http\Requests\UpdateTarget as RequestUpdateTarget;

class TargetController extends Controller {

    public function index() {
        $targets = Auth::user()->Roll->Targets()->orderBy('id', 'desc')->paginate(4);
        if (Auth::user()->Roll->id == 1){
            $targets = Target::orderBy('id', 'desc')->paginate(4);
        }
        return view('Targets.index', compact('targets'));
    }
    public function show(Target $target) {
        return view('Targets.show', compact('target'));
    }

    public function store(RequestStoreTarget $request) {
        $target = new Target();
        $target->IP = $request->targetIp;
        $target->domain = $request->targetDom;
        $target->MAC = $request->targetMac;
        $target->name = $request->targetName;
        $target->save();
        return redirect()->route('targets.show', $target);
    }

    public function edit(Target $target) {
        return view('Targets.edit', compact('target'));
    }

    public function update(RequestUpdateTarget $request,Target $target) {
        $target->IP = $request->targetIp;
        $target->domain = $request->targetDom;
        $target->MAC = $request->targetMac;
        $target->name = $request->targetName;
        $target->save();
        return redirect()->route('targets.show', $target);
    }
    public function destroy(Target $target){
        $target->delete();
        return redirect()->route('settings.index');
    }
    public static function search(Request $request) {
        $target = Target::where('name', '=', $request->targetSearch)->get();
        if ($target->count()) {
            return $target[0];
        }
        $target = Target::where('IP', '=', $request->targetSearch)->get();
        if ($target->count()) {
            return $target[0];
        }
        $target = Target::where('domain', '=', $request->targetSearch)->get();
        if ($target->count()) {
            return $target[0];
        }
        $target = Target::where('MAC', '=', $request->targetSearch)->get();
        if ($target->count()) {
            return $target[0];
        }
        return false;
    }

    public function Rolls() {
        return $this->HaveMany('App\Models\Roll');
    }
}

