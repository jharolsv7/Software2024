<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        // Obtener datos de ingresos y egresos en una sola consulta
        $data = DB::table('ingresos')
                ->select('detalles', DB::raw('SUM(monto) as ingresos'), DB::raw('0 as egresos'))
                ->groupBy('detalles')
                ->unionAll(DB::table('egresos')
                ->select('detalles', DB::raw('SUM(monto) as ingresos'), DB::raw('0 as egresos'))
                ->groupBy('detalles'))
                ->get();


        // Organizar datos fusionados en un array de objetos
        $mergedData = [];
        foreach ($data as $item) {
        $mergedData[$item->detalles] = (object) [
            'detalles' => $item->detalles,
            'ingresos' => $item->ingresos,
            'egresos' => $item->egresos
            ];
        }

        // Preparar datos para el gráfico combinado de ingresos y egresos
        $labels = [];
        $ingresosData = [];
        $egresosData = [];

        foreach ($mergedData as $data) {
        $labels[] = $data->detalles;
        $ingresosData[] = $data->ingresos;
        $egresosData[] = $data->egresos;
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
        ->select('ganador', 'golesEquipo1', 'golesEquipo2')
        ->get();

        // Inicializar contadores
        $ganados = 0;
        $empatados = 0;
        $perdidos = 0;

        foreach ($partidos as $partido) {
        // Comparar los puntajes para determinar el resultado del partido
        if ($partido->ganador == 'equipo_uno') {
            $ganados++;
        } elseif ($partido->ganador == 'equipo_dos') {
            $perdidos++;
        } else {
            if ($partido->golesEquipo1 == $partido->golesEquipo2) {
                $empatados++;
            } else {
                // Suponiendo que si no hay ganador, hay un empate
                $empatados++;
            }
        }
        }

// Crear el array con los datos de los partidos
$partidosData = [
'Ganados' => $ganados,
'Empatados' => $empatados,
'Perdidos' => $perdidos
];


    
        // Obtener datos de la tabla 'tarjetas'
        $tarjetas = DB::table('partidos')
        ->select(DB::raw('SUM(tarjetaAmarilla) as amarillas'), DB::raw('SUM(tarjetaRoja) as rojas'))
        ->get();

        // Preparar datos para el gráfico de tarjetas
        $tarjetasData = [];
        foreach ($tarjetas as $tarjeta) {
        $tarjetasData = [
            'amarillas' => $tarjeta->amarillas,
            'rojas' => $tarjeta->rojas
        ];
        }


        return view('admin.index', compact('labels', 'ingresosData', 'egresosData', 'goleadoresData','partidosData','tarjetasData'));
    }
}