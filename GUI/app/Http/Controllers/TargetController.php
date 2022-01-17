<?php

namespace App\Http\Controllers;

use App\Models\Target;
use Illuminate\Http\Request;


class TargetController extends Controller {
    public function index() {
        $targets = Target::All();
        return view('Targets.index', compact('targets'));
    }
    public function show($target) {
        return view('Targets.show', compact('target'));
    }
}

