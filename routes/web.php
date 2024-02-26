<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InformeControllerSancionJugador;
use App\Http\Controllers\InformeControllerSancionEquipo;
use App\Http\Controllers\InformeControllerGoleadores;
use App\Http\Controllers\InformeControllerEquipo;
use App\Http\Controllers\InformeControllerBalance;


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
Route::get('generar-pdf', [InformeControllerEquipo::class, 'generarPDF'])->name('informe.generarPDF');
Route::get('generar-pdf-sancion-jugador', [InformeControllerSancionJugador::class, 'generarPDF'])->name('informe.generarPDFSancionJugador');
Route::get('generar-pdf-sancion-equipo', [InformeControllerSancionEquipo::class, 'generarPDF'])->name('informe.generarPDFSancionEquipor');
Route::get('generar-pdf-goleadores', [InformeControllerGoleadores::class, 'generarPDF'])->name('informe.generarPDFGoleadores');
Route::get('generar-pdf-balance', [InformeControllerBalance::class, 'generarPDF'])->name('informe.generarPDFBalance');


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
	Route::view('equiposreporte', 'livewire.equipos.lista')->middleware('auth');
	Route::view('sancionjugadoreporte', 'livewire.sancionjugadors.lista')->middleware('auth');
	Route::view('sancionequiporeporte', 'livewire.sancionequipos.lista')->middleware('auth');
	Route::view('goleadoresreporte', 'livewire.goleadores.lista')->middleware('auth');
	Route::view('balancereporte', 'livewire.ingresos.lista')->middleware('auth');
	Route::view('vocalia', 'livewire.sancions.index')->middleware('auth');
