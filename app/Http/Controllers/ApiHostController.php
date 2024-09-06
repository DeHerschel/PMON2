<?php

namespace App\Http\Controllers;
use App\Models\Target;
use Illuminate\Http\Request;


class ApiHostController extends Controller
{
    public function postData(Request $request) {

        $data = json_decode($request->getContent());
        $target = Target::where('ip', $data->ip)->first();
        unset($data->ip);
        $data = json_encode($data);
        $target->pingData = $data;
        $target->save();
    }

    public function getData(Target $target) {
        return $target->pingData;

    }
}
