<?php

use App\Mail\IssueMailable;
use App\Http\Livewire\Tools;
use App\Http\Livewire\DashBoard;
use App\Http\Livewire\ShowTarget;
use App\Http\Livewire\ShowTargets;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TargetController;
use App\Http\Controllers\SettingController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
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
Route::get('dashboard', DashBoard::class)->name('dashboard')->middleware('auth');
Route::get('/targets', ShowTargets::class)->name('targets.index')->middleware('auth');
// Route::post('/hosts/add', [TargetController::class, 'store'])->name('targets.store');
Route::get('/targets/{target}', ShowTarget::class)->name('targets.show')->middleware('auth');
// Route::get('/hosts/{target}/edit', [TargetController::class, 'edit'])->name('targets.edit');
// Route::put('/hosts/{target}', [TargetController::class, 'update'])->name('targets.update');
// Route::delete('/hosts/{target}', [TargetController::class, 'destroy'])->name('targets.destroy');
//Route::resource('targets', TargetController::class)->parameters(['hosts'=>'target'])->names('targets')->middleware('auth');
Route::get('/tools', Tools::class)->name('settings.index')->middleware('auth');
Route::get('/register', [RegisteredUserController::class, 'create'])
->name('register')->middleware('auth');
Route::post('/register', [RegisteredUserController::class, 'store'])
->middleware('auth');
