<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Goleadore;
use App\Models\Jugador;

class InformeControllerGoleadores extends Controller
{
    public function generarPDF(Request $request)
    {
        // Obtener los datos de los 10 mejores goleadores
        $goleadores = Goleadore::with('jugador')
            ->orderBy('goles', 'desc')
            ->take(10)
            ->get();

        // Configurar Dompdf
        $options = new Options();
        $options->set('defaultFont', 'Helvetica');
        $dompdf = new Dompdf($options);

        // Generar el HTML del informe
        $html = '<html><body>';
        $html .= '<h1>Informe de los 10 Mejores Goleadores</h1>';
        $html .= '<table border="1" cellpadding="5">';
        $html .= '<tr><th>ID</th><th>Jugador</th><th>Equipo</th><th>Goles</th></tr>';
        foreach ($goleadores as $goleador) {
            $html .= '<tr>';
            $html .= '<td>' . $goleador->id . '</td>';
            $html .= '<td>' . $goleador->jugador->nombre . '</td>';
            $html .= '<td>' . $goleador->jugador->equipo->nombre . '</td>';
            $html .= '<td>' . $goleador->goles . '</td>';
            $html .= '</tr>';
        }
        $html .= '</table>';
        $html .= '</body></html>';

        // Cargar el HTML en Dompdf
        $dompdf->loadHtml($html);

        // Renderizar el PDF
        $dompdf->render();

        // Descargar el PDF
        return $dompdf->stream('informe_goleadores.pdf');
    }
}
