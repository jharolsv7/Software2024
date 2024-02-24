<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goleadore;
use App\Models\Equipo;
use App\Models\Sancionequipo;
use App\Models\Sancionjugador;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{

/*Tabla de Posiciones*/ 
   public function tablaPosiciones(Request $request) {
    $posiciones = Equipo::orderBy('grupo')->orderByDesc('puntos')->get();

    return response()->json($posiciones->map(function ($equipo) {
        return [
            'Grupo' => $equipo->grupo,
            'Equipo' => $equipo->nombre,
            'Goles_a_Favor' => $equipo->goles_a_favor,
            'Goles_en_Contra' => $equipo->goles_en_contra,
            'Puntos' => $equipo->puntos,
        ];
    }));
}

/*Lista de Equipos*/ 
public function equipos(Request $request){
    $equipos = Equipo :: all();
    return response()-> json($equipos);
    }

/*Lista de Goleadores*/ 
public function goleadores(Request $request) {
    $goleadores = Goleadore::with('jugador')->get()->map(function ($goleadore) {
        return [
            'Nombre' => $goleadore->jugador->nombre,
            'Goles' => $goleadore->goles
        ];
    });

    return response()->json($goleadores);
}

/*Sancion Equipos*/ 
public function Sancionequipos(Request $request) {
    $sanciones = Sancionequipo::with('equipo')->get()->map(function ($sancion) {
        return [
            'Equipo' => $sancion->equipo->nombre,
            'Detalles' => $sancion->detalles,
            'Fecha' => $sancion->fecha,
            'Monto' => $sancion->monto,
        ];
    });

    return response()->json($sanciones);
}

 /*Sancion Jugador*/ 
 public function Sancionjugadores(Request $request) {
    $sanciones = Sancionjugador::with('jugador')->get()->map(function ($sancion) {
        return [
            'Nombre' => $sancion->jugador->nombre,
            'Detalles' => $sancion->detalles,
            'Fecha' => $sancion->fecha,
            'Monto' => $sancion->monto,
        ];
    });

    return response()->json($sanciones);
}
}