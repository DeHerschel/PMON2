<?php

namespace App\Http\Controllers;

use App\Models\Target;
use Illuminate\Http\Request;
use App\Http\Controllers\TargetController;
use App\Http\Requests\StoreTarget as RequestStoreTarget;
class SettingController extends Controller {
    public function index() {
        return view('settings.index');
    }
}
