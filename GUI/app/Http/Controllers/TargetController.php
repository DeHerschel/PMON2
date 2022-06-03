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
        $targets = Auth::user()->Role->Targets()->orderBy('id', 'desc')->paginate(9);
        if (Auth::user()->Role->id == 1){
            $targets = Target::orderBy('id', 'desc')->paginate(9);
        }
        return view('Targets.index', compact('targets'));
    }
    
    public function show(Target $target) {
        return view('Targets.show', compact('target'));
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

    public static function store(Target $target) {
        $target->save();
    }
}

