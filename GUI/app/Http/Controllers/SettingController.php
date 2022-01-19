<?php

namespace App\Http\Controllers;

use App\Models\Target;
use Illuminate\Http\Request;

class SettingController extends Controller {
    public function index() {
        return view('settings.index');
    }

}
