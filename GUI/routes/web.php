<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\HostController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', HomeController::class);
Route::get('/hosts', [HostController::class, 'index']);
Route::get('/hosts/{host}', [HostController::class, 'show']);
Route::get('/settings',[SettingController::class, 'index']);
