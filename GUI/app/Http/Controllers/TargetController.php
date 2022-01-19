<?php

namespace App\Http\Controllers;

use App\Models\Target;
use Illuminate\Http\Request;


class TargetController extends Controller {
    public function index() {
        $targets = Target::orderBy('id', 'desc')->paginate(4);
        return view('Targets.index', compact('targets'));
    }
    public function show(Target $target) {;

        return view('Targets.show', compact('target'));
    }
    public function store(Request $request) {

        $request->validate([
            'targetName' => 'required',
            'targetIp' => 'required'
        ]);

        $target = new Target();
        $target->IP = $request->targetIp;
        $target->domain = $request->targetDom;
        $target->MAC = $request->targetMac;
        $target->name = $request->targetName;
        $target->save();
        // return redirect()->route('targets.show', $target->id)
        return view('settings.index');
    }
    public function edit(Target $target){
        return view('Targets.edit', compact('target'));
    }
    public function update(Request $request,Target $target) {
        $request->validate([
            'targetName' => 'required',
            'targetIp' => 'required'
        ]);
        $target->name = $request->targetName;
        $target->IP = $request->targetIp;
        $target->domain = $request->targetDom;
        $target->MAC = $request->targetMac;
        $target->save();
        return view('Targets.show', compact('target'));
    }
}

