<?php

namespace App\Http\Controllers;

use App\Models\Target;
use Illuminate\Http\Request;

class SettingController extends Controller {
    public function index() {
        return view('settings.index');
    }
    public function addTarget(Request $request) {
        $target = new Target();
        $target->IP = $request->targetIp;
        $target->domain = $request->targetDom;
        $target->MAC = $request->targetMac;
        $target->name = $request->targetName;
        $target->save();
        // return redirect()->route('targets.show', $target->id)
        return view('settings.index');
    }
}
