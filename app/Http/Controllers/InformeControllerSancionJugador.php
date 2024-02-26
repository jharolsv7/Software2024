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
        
        // Agregar el contexto sobre las sanciones
        $html .= '<h1 style="text-align: center;">Informe de Sanciones de Jugadores</h1>';
        $html .= '<p style="text-align: center;">Fecha de impresión: ' . date('Y-m-d H:i:s') . '</p>';
        $html .= '<p style="text-align: center;">A continuación observe un reporte General de todas las Sanciones que posee cada Jugador con el detalle y monto de sanción.</p>';


        // Tabla de sanciones
        $html .= '<table style="width: 100%; border-collapse: collapse; text-align: center;">';
        $html .= '<thead><tr style="background-color: #ccc;"><th style="padding: 10px;">ID</th><th style="padding: 10px;">Jugador</th><th style="padding: 10px;">Detalles</th><th style="padding: 10px;">Fecha</th><th style="padding: 10px;">Monto</th><th style="padding: 10px;">Estado</th></tr></thead>';
        $html .= '<tbody>';
        foreach ($sanciones as $sancion) {
            $html .= '<tr style="border: 1px solid #000;">';
            $html .= '<td style="padding: 10px; border: 1px solid #000;">' . $sancion->id . '</td>';
            $html .= '<td style="padding: 10px; border: 1px solid #000;">' . $sancion->jugador->nombre . '</td>';
            $html .= '<td style="padding: 10px; border: 1px solid #000;">' . $sancion->detalles . '</td>';
            $html .= '<td style="padding: 10px; border: 1px solid #000;">' . $sancion->fecha . '</td>';
            $html .= '<td style="padding: 10px; border: 1px solid #000;">' . $sancion->monto . '</td>';
            $html .= '<td style="padding: 10px; border: 1px solid #000;">' . $sancion->estado . '</td>';
            $html .= '</tr>';
        }
        $html .= '</tbody></table>';
        // Cargar el HTML en Dompdf
        $dompdf->loadHtml($html);

        // Renderizar el PDF
        $dompdf->render();

        // Descargar el PDF
        return $dompdf->stream('informe_sanciones_jugadores.pdf');
    }
}