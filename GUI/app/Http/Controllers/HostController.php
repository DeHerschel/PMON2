<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class HostController extends Controller {
    public function index(){
        return view('hosts/index');
    }
    public function show($host) {
        return view('hosts/show', compact('host'));
    }
}

