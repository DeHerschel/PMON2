<?php

namespace App\Http\Controllers;

use App\Models\Target;
use Illuminate\Http\Request;


class TargetController extends Controller {
    public function index() {
        $targets = Target::orderBy('id', 'desc')->paginate(4);
        return view('Targets.index', compact('targets'));
    }
    public function show($id) {
        $target = Target::find($id);
        return view('Targets.show', compact('target'));
    }
}

