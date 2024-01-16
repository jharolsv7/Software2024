<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/inicio', [AdminController::class, 'index'])->name('admin.index');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route Hooks - Do not delete//
	Route::view('infoweb', 'livewire.infowebs.index')->middleware('auth');
	Route::view('partidos', 'livewire.partidos.index')->middleware('auth');
	Route::view('sancion', 'livewire.sancions.index')->middleware('auth');
	Route::view('jugador', 'livewire.jugadors.index')->middleware('auth');
	Route::view('equipos', 'livewire.equipos.index')->middleware('auth');
	Route::view('egresos', 'livewire.egresos.index')->middleware('auth');
	Route::view('ingresos', 'livewire.ingresos.index')->middleware('auth');