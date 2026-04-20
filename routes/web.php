<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route Hooks - Do not delete//
	Route::view('goleadores', 'livewire.goleadores.index')->middleware('auth');
	Route::view('partidos', 'livewire.partidos.index')->middleware('auth');
	Route::view('fase', 'livewire.fases.index')->middleware('auth');
	Route::view('sancionequipo', 'livewire.sancionequipos.index')->middleware('auth');
	Route::view('sancionjugador', 'livewire.sancionjugadors.index')->middleware('auth');
	Route::view('inscripcion', 'livewire.inscripcions.index')->middleware('auth');
	Route::view('infoweb', 'livewire.infowebs.index')->middleware('auth');
	Route::view('sancion', 'livewire.sancions.index')->middleware('auth');
	Route::view('jugador', 'livewire.jugadors.index')->middleware('auth');
	Route::view('equipos', 'livewire.equipos.index')->middleware('auth');
	Route::view('egresos', 'livewire.egresos.index')->middleware('auth');
	Route::view('ingresos', 'livewire.ingresos.index')->middleware('auth');