<?php

namespace App\Http\Controllers;

use App\Models\Target;
use Illuminate\Http\Request;
use App\Http\Controllers\TargetController;
class SettingController extends Controller {
    public function index() {
        return view('settings.index');
    }
    public function search(Request $request) {
        $target = TargetController::search($request);
        if ($target) {
            return view('settings.index', compact('target'));
        }
        $error = 'Not found';
        return view('settings.index', compact('error'));
    }
}
