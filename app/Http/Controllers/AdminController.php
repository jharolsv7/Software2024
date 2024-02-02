<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingreso;
use App\Models\Egreso;
use App\Models\Partido;
use App\Models\Goleadore;
use App\Models\Equipo;
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


        // Obtener datos de la tabla 'goleadores' con los nombres de los jugadores
        $goleadores = DB::table('goleadores')
            ->join('jugador', 'goleadores.jugador_id', '=', 'jugador.id')
            ->select('jugador.nombre as nombre', 'goleadores.goles')
            ->orderBy('goleadores.goles', 'desc')
            ->get();

        // Preparar datos para el gráfico de goleadores
        $goleadoresData = [];

        foreach ($goleadores as $goleador) {
            $goleadoresData[] = [
                'nombre' => $goleador->nombre,
                'goles' => $goleador->goles
            ];
        }

        // Obtener datos de la tabla 'partidos'
        $partidos = DB::table('partidos')
            ->select('ganador')
            ->get();

        // Inicializar contadores
        $ganados = 0;
        $empatados = 0;

        foreach ($partidos as $partido) {
            // Comparar el ganador para determinar el resultado del partido
            if ($partido->ganador == 'Empate') {
                $empatados++;
            } else {
                $ganados++;
            }
        }

        // Crear el array con los datos de los partidos
        $partidosData = [
            'Ganados' => $ganados,
            'Empatados' => $empatados
        ];

        // Obtener datos de la tabla 'tarjetas' utilizando Eloquent
        $tarjetas = Partido::select(DB::raw('SUM(tarjetaAmarilla) as amarillas'), DB::raw('SUM(tarjetaRoja) as rojas'))->first();

        // Preparar datos para el gráfico de tarjetas
        $tarjetasData = [
            'amarillas' => $tarjetas->amarillas,
            'rojas' => $tarjetas->rojas
        ];

        // Obtener la cantidad total de partidos en la tabla 'partidos'
        $jugados = DB::table('partidos')->count();

          $PartidosTotales = 43; 

        // Calcular el porcentaje de progreso
        $porcentajeProgreso = ($jugados/$PartidosTotales ) * 100;

        // Crear el array con los datos de progreso
        $progresoData = [
            'Completados' => $porcentajeProgreso,
            'Faltantes' => 100 - $porcentajeProgreso
        ];
    
        return view('admin.index', compact('labels', 'ingresosData', 'egresosData', 'goleadoresData', 'partidosData', 'tarjetasData', 'progresoData'));
    }
}