<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        // Obtener datos de la tabla 'ingresos'
        $ingresos = DB::table('ingresos')
                        ->select('detalles', DB::raw('SUM(monto) as total'))
                        ->groupBy('detalles')
                        ->get();

        // Obtener datos de la tabla 'egresos'
        $egresos = DB::table('egresos')
                        ->select('detalles', DB::raw('SUM(monto) as total'))
                        ->groupBy('detalles')
                        ->get();

        // Preparar datos para el gráfico de ingresos
        $labels = [];
        $ingresosData = [];

        foreach ($ingresos as $ingreso) {
            $labels[] = $ingreso->detalles;
            $ingresosData[] = $ingreso->total;
        }

        // Preparar datos para el gráfico de egresos
        $egresosData = [];

        foreach ($egresos as $egreso) {
            $egresosData[] = $egreso->total;
        }

        // Obtener datos de la tabla 'goleadores'
        $goleadores = DB::table('goleadores')
                        ->select('jugador_id', 'goles') // Seleccionar tanto el jugador como el número de goles
                        ->orderBy('goles', 'desc') // Ordenar por número de goles en orden descendente
                        ->get();

        // Preparar datos para el gráfico de goleadores
        $goleadoresData = [];

        foreach ($goleadores as $goleador) {
            $goleadoresData[] = [
                'jugador_id' => $goleador->jugador_id,
                'goles' => $goleador->goles
            ];
        }
        // Obtener datos de la tabla 'partidos'
        $partidos = DB::table('partidos')
                        ->select('ganador')
                        ->orderBy('ganador', 'desc') // Ordenar por número de goles en orden descendente
                        ->get();

        // Preparar datos para el gráfico de goleadores
        $partidosData = [];

        foreach ($partidos as $partido) {
            $partidosData[] = $partido->ganador;
        }

        return view('admin.index', compact('labels', 'ingresosData', 'egresosData', 'goleadoresData','partidosData'));
    }
}