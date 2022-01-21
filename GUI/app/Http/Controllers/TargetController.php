<?php

namespace App\Http\Controllers;

use App\Models\Target;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTarget as RequestStoreTarget;
use App\Http\Requests\UpdateTarget as RequestUpdateTarget;

use Illuminate\Support\Str;

class TargetController extends Controller {

    public function index() {
        $targets = Target::orderBy('id', 'desc')->paginate(4);
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
        return redirect()->route('targets.show', $target->id);
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
        return view('Targets.show', compact('target'));
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

}

