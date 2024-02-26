<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Sancionjugador;

class InformeControllerSancionJugador extends Controller
{
    public function generarPDF(Request $request)
    {
        // Obtener los datos de las sanciones de jugadores
        $sanciones = Sancionjugador::with('jugador')->get();

        // Configurar Dompdf
        $options = new Options();
        $options->set('defaultFont', 'Helvetica');
        $dompdf = new Dompdf($options);

        // Generar el HTML del informe
        $html = '<html><head><style>';
        $html .= '.logo { width: 200px; height: auto; }';
        $html .= '.header { text-align: center; margin-bottom: 20px; }';
        $html .= '.context { margin-bottom: 20px; }';
        $html .= '.table { width: 100%; border-collapse: collapse; }';
        $html .= '.table th, .table td { border: 1px solid #000; padding: 8px; }';
        $html .= '</style></head><body>';
        
        // Logo
        $html .= '<div class="header">';
        $html .= '<img src="' . asset('img/Espe.png') . '" alt="Logo" class="logo">';
        $html .= '<img src="' . asset('img/software.jpg') . '" alt="Logo" class="logo">';
        $html .= '</div>';

        // Contexto sobre las sanciones
        $html .= '<div class="context">';
        $html .= '<p>A continuación observe un reporte General de todas las Sanciones que posee cada Jugador con el detalles y monto de sanción.</p>';
        $html .= '</div>';

        // Tabla de sanciones
        $html .= '<table class="table">';
        $html .= '<thead><tr><th>ID</th><th>Jugador</th><th>Detalles</th><th>Fecha</th><th>Monto</th><th>Estado</th></tr></thead>';
        $html .= '<tbody>';
        foreach ($sanciones as $sancion) {
            $html .= '<tr>';
            $html .= '<td>' . $sancion->id . '</td>';
            $html .= '<td>' . $sancion->jugador->nombre . '</td>';
            $html .= '<td>' . $sancion->detalles . '</td>';
            $html .= '<td>' . $sancion->fecha . '</td>';
            $html .= '<td>' . $sancion->monto . '</td>';
            $html .= '<td>' . $sancion->estado . '</td>';
            $html .= '</tr>';
        }
        $html .= '</tbody></table>';
        $html .= '</body></html>';

        // Cargar el HTML en Dompdf
        $dompdf->loadHtml($html);

        // Renderizar el PDF
        $dompdf->render();

        // Descargar el PDF
        return $dompdf->stream('informe_sanciones_jugadores.pdf');
    }
}