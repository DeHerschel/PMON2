<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiHostController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('api_auth')->post('/host',[ApiHostController::class, 'index'])->name('apihost');

Route::middleware('api_auth')->post('/host', [ApiHostController::class, 'postData']);
Route::get('/host/{target}', [ApiHostController::class, 'getData']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
