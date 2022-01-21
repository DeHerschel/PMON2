<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TargetController;
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

Route::get('/', HomeController::class)->name('home');

Route::get('/hosts', [TargetController::class, 'index'])->name('targets.index');
Route::post('/hosts/add', [TargetController::class, 'store'])->name('targets.store');
Route::get('/hosts/{target}', [TargetController::class, 'show'])->name('targets.show');
Route::get('/hosts/{target}/edit', [TargetController::class, 'edit'])->name('targets.edit');
Route::put('/hosts/{target}', [TargetController::class, 'update'])->name('targets.update');
Route::delete('/hosts/{target}', [TargetController::class, 'destroy'])->name('targets.destroy');

Route::get('/settings',[SettingController::class, 'index'])->name('settings.index');
Route::post('/settings', [SettingController::class, 'search'])->name('settings.search');
